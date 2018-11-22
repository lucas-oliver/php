<?php
class Treinador{

  private $idTreinador;
  private $nome;
  private $idade;
  private $regiao;
  // private $pokemon;
  // private $insignia;


  public function __construct(){}
  public function __destruct(){}

  public function __get($a){ return $this->$a;}
  public function __set($a,$v){ $this->$a = $v;}



  public function __toString(){
    return nl2br("
                  Nome: $this->nome
                  Idade: $this->idade
                  Região: $this->regiao");
                  // Pokemons: $this->pokemon
                  // Insiguinias: $this->insignia
  }
}
