<?php
class Validacao{

  public static function validarNome($v){
    $exp = "/^[a-zA-ZÁ-ù0-9 ]{2,100}$/";
    return preg_match($exp,$v);
  }

}
