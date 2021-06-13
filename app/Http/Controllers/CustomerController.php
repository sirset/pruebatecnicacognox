<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Triats\mensajesReglas;
use App\Http\Controllers\Session;
use App\Models\customersModel;
use App\Models\accountsModel;
use App\Models\transactionsModel;

class CustomerController extends Controller
{
    use MensajesReglas;

    public function login(){
        return view("login");
    }

    public function home(){
        return view("customer.home");
    }
    //lado de estado de cuenta
    public function estadoCuenta(){   
        
        return view("customer.estado",["accounts"=>customersModel::find(session("customer"))->accounts]);
    }

    public function estadoCuentapost(Request $request){
        
        if($request->input("account")==0){
            return view("customer.estado", ["error" => "No seleciono ninguna cuenta","accounts"=>customersModel::find(session("customer"))->accounts]);
        }
        $account = accountsModel::find($request->input("account"));
        $transactions = DB::select('select * from vista_transactions where accountOrigine = :i OR accountDestino = :j ',["i" => $request->input("account"),"j" => $request->input("account")]);
        $transactions = json_decode(json_encode($transactions), true);
        
        return view("customer.verEstado",["transactions" => $transactions,"accountsOrigin"=> $request->input("account"),"account"=>$account]);
    }
    //lado de la transferencia
    public function transferencias(){
        return view("customer.transferencia");
    }

    public function transferenciapropias(Request $request){
        return view("customer.transferenciaCuentaPropia",["accounts"=>customersModel::find(session("customer"))->accounts]);
    }
    public function transferenciapropiaspost(Request $request){
        if($request->input("accountOrigin")==0||$request->input("accountDestination")==0){
            return view("customer.transferenciaCuentaPropia", ["error" => "selecione cuenta valida","accounts"=>customersModel::find(session("customer"))->accounts]);
        }
        if($request->input("accountOrigin")==$request->input("accountDestination")){
            return view("customer.transferenciaCuentaPropia", ["error" => "No puede selecionar la misma cuenta","accounts"=>customersModel::find(session("customer"))->accounts]);
        }
        if($request->input("valor")<=0){
            return view("customer.transferenciaCuentaPropia", ["error" => "asignar un valor valido","accounts"=>customersModel::find(session("customer"))->accounts]);
        }
        if((accountsModel::find($request->input("accountOrigin"))->first())["money"] < $request->input("valor")){
            return view("customer.transferenciaCuentaPropia", ["error" => "saldo insuficiente","accounts"=>customersModel::find(session("customer"))->accounts]);
        }
        
        $code = date("YmdHis").$request->input("accountOrigin");
        $data = ["accountOrigin_id"=> $request->input("accountOrigin"),"accountDestination_id"=>$request->input("accountDestination"),"money"=>$request->input("valor"),"code"=>$code];
        transactionsModel::create($data);
        $Cuentadebito = accountsModel::find($request->input("accountOrigin"));
        $Cuentadebito->money = $Cuentadebito->money - $request->input("valor");
        $Cuentadebito->save();
        $Cuentacredito = accountsModel::find($request->input("accountDestination"));
        $Cuentacredito->money = $Cuentacredito->money + $request->input("valor");
        $Cuentacredito->save();
        return view("customer.transferenciaCuentaPropia",["success"=>$code,"accounts"=>customersModel::find(session("customer"))->accounts]);
    }
    public function transferenciaterceros(Request $request){
        $accountterceros = customersModel::find(session("customer"))->registered_accounts;
        $cuentasterceros = [];
        
        foreach($accountterceros as $cuenta){
            $cuentasterceros[] = accountsModel::find($cuenta["account_id"]);
        }
        if(empty($cuentasterceros)){
            return view("customer.transferencia",["error"=>"no tiene cuenta registrada"]);
        }
        return view("customer.transferenciaTerceros",["accounts"=>customersModel::find(session("customer"))->accounts,"accountstercero"=>$cuentasterceros]);
    }
    public function transferenciatercerospost(Request $request){
        $accountterceros = customersModel::find(session("customer"))->registered_accounts;
        $cuentasterceros = [];
        foreach($accountterceros as $cuenta){
            $cuentasterceros[] = accountsModel::find($cuenta["account_id"]);
        }
        if($request->input("accountOrigin")==0||$request->input("accountDestination")==0){
            return view("customer.transferenciaTerceros", ["error" => "selecione cuenta valida","accounts"=>customersModel::find(session("customer"))->accounts,"accountstercero"=>$cuentasterceros]);
        }
        if($request->input("valor")<=0){
            return view("customer.transferenciaTerceros", ["error" => "asignar un valor valido","accounts"=>customersModel::find(session("customer"))->accounts,"accountstercero"=>$cuentasterceros]);
        }
        if((accountsModel::find($request->input("accountOrigin"))->first())["money"] < $request->input("valor")){
            return view("customer.transferenciaTerceros", ["error" => "saldo insuficiente","accounts"=>customersModel::find(session("customer"))->accounts,"accountstercero"=>$cuentasterceros]);
        }
        
        $code = date("YmdHis").$request->input("accountOrigin");
        $data = ["accountOrigin_id"=> $request->input("accountOrigin"),"accountDestination_id"=>$request->input("accountDestination"),"money"=>$request->input("valor"),"code"=>$code];
        transactionsModel::create($data);
        $Cuentadebito = accountsModel::find($request->input("accountOrigin"));
        $Cuentadebito->money = $Cuentadebito->money - $request->input("valor");
        $Cuentadebito->save();
        $Cuentacredito = accountsModel::find($request->input("accountDestination"));
        $Cuentacredito->money = $Cuentacredito->money + $request->input("valor");
        $Cuentacredito->save();
        return view("customer.transferenciaTerceros",["success"=>$code,"accounts"=>customersModel::find(session("customer"))->accounts,"accountstercero"=>$cuentasterceros]);
    }
    public function Ingresar(Request $request){
        $error = $this->validatelogin($request);
        if(!empty($error)){
            return view("login",["errors"=>$error]);
        }
        $customer = customersModel::where("identification",$request->input("identification"))->where("password",$request->input("password"))->get()->first();
        if(empty($customer)){
            return view("login",["errors"=>["Clave o identificacion erroneas."]]);
        }
        session(['customer' => $customer["id"]]);
        return redirect()->route('Home');
    }

    public function validatelogin(Request $request){
        $rules = [
            'identification' => ['required', 'string'],
            'password' => ['required', 'string', 'max:4',"min:4"],
        ];
        $validacion = Validator::make(
            $request->all(),
            $rules,
            $this->getMensajesReglas()
        );
        if ($validacion->fails()) {
            return  $validacion->errors()->all();
        }
        return null;
    }

    public function salir(Request $request){
        $request->session()->flush();
        return redirect()->route('Login');
    }
}
