<?php
class Pokemon{

  private $idPokemon;
  private $nome;
  private $altura;
  private $peso;
  private $sexo;
  private $tipo;
  private $tipo2;
  private $caracteristica;




  public function __construct(){}
  public function __destruct(){}

  public function __get($a){ return $this->$a;}
  public function __set($a,$v){ $this->$a = $v;}



  public function __toString(){
    return nl2br("
                  Nome: $this->nome
                  Altura: $this->altura
                  Peso: $this->peso
                  Sexo: $this->sexo
                  Tipo: $this->tipo - $this->tipo2
                  Caracteristica: $this->caracteristica");
  }
}
