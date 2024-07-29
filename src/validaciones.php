<?php
namespace gamboamartin\src;
use gamboamartin\errores\errores;
use gamboamartin\validacion\validacion;


class validaciones extends validacion{

    /**
     * TOTAL
     * Valida la data del filtro especial proporcionado.
     *
     * Esta función recibe dos parámetros, un string que representa el campo y un array que representa el filtro.
     * Verifica si el campo está vacío, si el valor es un campo en el filtro, si existe un operador y si existe un valor.
     * Si alguna de estas condiciones no se cumple, la función retorna un error. Si todas las condiciones se cumplen retorna true.
     *
     * @param string $campo El nombre del campo a validar.
     * @param array $filtro El filtro a validar.
     *
     * @return true|array Devuelve `true` si la validación es correcta, si no, devuelve un array con información sobre el error.
     *
     * @throws errores Si el campo está vacío, si el valor del filtro no es un campo, si no existe un operador o si el valor es un array.
     * @version 16.104.0
     * @url https://github.com/gamboamartin/validaciones/wiki/src.validaciones.valida_data_filtro_especial
     */
    final public function valida_data_filtro_especial(string $campo, array $filtro): true|array
    {
        if($campo === ''){
            return $this->error->error(mensaje: "Error campo vacio", data: $campo, es_final: true);
        }
        if(!isset($filtro[$campo]['valor_es_campo']) && is_numeric($campo)){
            return $this->error->error(mensaje:'Error el campo debe ser un string $filtro[campo]', data:$filtro,
                es_final: true);
        }
        if(!isset($filtro[$campo]['operador'])){
            return $this->error->error(mensaje:'Error debe existir $filtro[campo][operador]', data:$filtro,
                es_final: true);
        }
        if(!isset($filtro[$campo]['valor'])){
            $filtro[$campo]['valor'] = '';
        }
        if(is_array($filtro[$campo]['valor'])){
            return $this->error->error(mensaje:'Error $filtro['.$campo.'][\'valor\'] debe ser un dato', data:$filtro,
                es_final: true);
        }
        return true;
    }


}

