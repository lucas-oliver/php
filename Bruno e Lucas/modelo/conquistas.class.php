<?php
class Conquistas{

  private $insignias;
  private $fitas;
  private $simbolos;
  private $medalhas;
  private $pokePingPong;
  private $ligas;

  public function __construct(){}
  public function __destruct(){}

  public function __get($a){ return $this->$a;}
  public function __set($a,$v){ $this->$a = $v;}

  public function __toString(){
    return nl2br("
                  Insígnias: $this->insignias
                  Fitas: $this->fitas
                  Símbolos: $this->simbolos
                  Medalhas: $this->medalhas
                  Troféus do Poké-Ping-Pong: $this->pokePingPong
                  Troféus das Ligas: $this->ligas");
  }
}
