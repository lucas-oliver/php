<?php
require_once "config/conexaobanco.class.php";
class PokemonDAO{

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }
  public function __destruct(){}

  public function cadastrarPokemon($pok){
      try{                              //SQL
        $stat = $this->conexao->prepare("insert into pokemon(idPokemon,nome,altura,peso,sexo,tipo,tipo2,caracteristica)values(null,?,?,?,?,?,?,?)");

        $stat->bindValue(1, $pok->nome);
        $stat->bindValue(2, $pok->altura);
        $stat->bindValue(3, $pok->peso);
        $stat->bindValue(4, $pok->sexo);
        $stat->bindValue(5, $pok->tipo);
        $stat->bindValue(6, $pok->tipo2);
        $stat->bindValue(7, $pok->caracteristica);

        $stat->execute();

      }catch(PDOException $e){
        echo "Erro ao cadastrar! ".$e;
      }//fecha catch
  }//fecha metodo

  public function buscarPokemon(){
      try{
        $stat = $this->conexao->query("select * from pokemon");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, "Pokemon");
        return $array;
      }catch(PDOException $e){
        echo "Erro ao buscar o pokemon!".$e;
      }//fecha catch
  }//fecha método

  public function filtrar($filtro, $pesquisa){
    try{
      $query = "";
      switch($filtro){
        case "idPokemon": $query="where idPokemon like '%".$pesquisa."%'";
        break;
        case "nome": $query="where nome like '%".$pesquisa."%'";
        break;
        case "altura": $query="where altura like '%".$pesquisa."%'";
        break;
        case "peso": $query="where peso like '%".$pesquisa."%'";
        break;
        case "sexo": $query="where sexo like '%".$pesquisa."%'";
        break;
        case "tipo": $query="where tipo like '%".$pesquisa."%'";
        break;
        case "tipo2": $query="where tipo2 like '%".$pesquisa."%'";
        break;
        case "caracteristica": $query="where caracteristica like '%".$pesquisa."%'";
        break;
      }//fecha switch

      if(empty($pesquisa)){
        $query = "";
      }

      $stat = $this->conexao->query("select * from pokemon ".$query);
      $array = $stat->fetchAll(PDO::FETCH_CLASS, "Pokemon");
      return $array;
    }catch(PDOException $e){
      echo "Erro ao filtrar pokemon!".$e;
    }//fecha catch
  }//fecha filtrar

  public function deletarPokemon($id){
    try{
      $stat = $this->conexao->prepare("delete from pokemon where idPokemon=?");
      $stat->bindValue(1, $id);
      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao deletar pokemon!".$e;
    }//fecha catch
  }//fecha deletar

  public function alterarPokemon($con){
    try{
      $stat = $this->conexao->prepare("update pokemon set nome=?, altura=?, peso=?, sexo=?, tipo=?, tipo2=?, caracteristica=? where idPokemon=?");
      $stat->bindValue(1,$con->nome);
      $stat->bindValue(2,$con->altura);
      $stat->bindValue(3,$con->peso);
      $stat->bindValue(4,$con->sexo);
      $stat->bindValue(5,$con->tipo);
      $stat->bindValue(6,$con->tipo2);
      $stat->bindValue(7,$con->caracteristica);

      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao alterar pokemon! ".$e;
    }//fecha catch
  }//fecha alterar
}
