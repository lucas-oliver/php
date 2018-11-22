<?php
require_once "config/conexaobanco.class.php";
class ConquistasDAO{

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }
  public function __destruct(){}

  public function cadastrarConquistas($con){
      try{
        $stat = $this->conexao->prepare("insert into conquistas(insignias,fitas,simbolos,medalhas,pokePingPong,ligas)values(?,?,?,?,?,?)");

        $stat->bindValue(1, $con->insignias);
        $stat->bindValue(2, $con->fitas);
        $stat->bindValue(3, $con->simbolos);
        $stat->bindValue(4, $con->medalhas);
        $stat->bindValue(5, $con->pokePingPong);
        $stat->bindValue(6, $con->ligas);

      }catch(PDOException $e){
        echo "Erro ao cadastrar! ".$e;
      }//fecha catch
  }//fecha metodo cadastrar

  public function buscarConquistas(){
      try{
        $stat = $this->conexao->query("select * from conquistas");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, "Conquista");
        return $array;
      }catch(PDOException $e){
        echo "Erro ao buscar a conquista!".$e;
      }//fecha catch
  }//fecha método

  public function filtrar($filtro, $pesquisa){
    try{
      $query = "";
      switch($filtro){
        case "insignias": $query="where insignias like '%".$pesquisa."%'";
        break;
        case "fitas": $query="where fitas like '%".$pesquisa."%'";
        break;
        case "simbolos": $query="where simbolos like '%".$pesquisa."%'";
        break;
        case "medalhas": $query="where medalhas like '%".$pesquisa."%'";
        break;
        case "pokePingPong": $query="where pokePingPong like '%".$pesquisa."%'";
        break;
        case "ligas": $query="where ligas like '%".$pesquisa."%'";
        break;
      }//fecha switch

      if(empty($pesquisa)){
        $query = "";
      }

      $stat = $this->conexao->query("select * from conquistas ".$query);
      $array = $stat->fetchAll(PDO::FETCH_CLASS, "Conquistas");
      return $array;
    }catch(PDOException $e){
      echo "Erro ao filtrar conquista!".$e;
    }//fecha catch
  }//fecha filtrar

  public function alterarConquistas($con){
    try{
      $stat = $this->conexao->prepare("update conquistas set insignias=?, fitas=?, simbolos=?, medalhas=?, pokePingPong=?, ligas=?");
      $stat->bindValue(1,$con->insignias);
      $stat->bindValue(2,$con->fitas);
      $stat->bindValue(3,$con->simbolos);
      $stat->bindValue(4,$con->medalhas);
      $stat->bindValue(5,$con->pokePingPong);
      $stat->bindValue(6,$con->ligas);

      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao alterar livro! ".$e;
    }//fecha catch
  }//fecha alterarLivro
}
