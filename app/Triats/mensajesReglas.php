<?php

namespace App\Triats;

trait mensajesReglas{

    public function getMensajesReglas(){
        return [
            "required" =>'El campo :attribute es requerido',
            "numeric" => 'El campo :attribute debe ser numérico',
            "integer" => 'El campo :attribute debe ser numérico',
            "string" => 'El campo :attribute debe ser tipo caracter',
            "max" => 'El campo :attribute no puede ser mayor a :max',
            "min" => 'El campo :attribute no puede ser menor a :min',
            "in" => 'El campo :attribute debe ser uno de los siguientes valores [ :values ]',
            "date" => 'El campo :attribute debe ser una fecha válida',
            "email" => 'El campo :attribute debe ser un email válido',
            "date_format" => 'El campo :attribute debe tener el formato Y-m-d',
            "exists" =>'El valor indicado en el atributo :attribute no se encuentra registrado',
        ];
    }

}

?>