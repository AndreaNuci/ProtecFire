<?php

class ControladorAlertas {

    public static function ctrEvaluarAlertas($temperatura, $humo, $gas){

        $nivel = "Normal";

        if($temperatura > 60 || $humo > 70 || $gas > 70){
            $nivel = "Critica";
        }
        else if($temperatura > 45 || $humo > 50 || $gas > 50){
            $nivel = "Riesgo";
        }
        else if($temperatura > 35 || $humo > 30 || $gas > 30){
            $nivel = "Preventiva";
        }

        return $nivel;
    }
}