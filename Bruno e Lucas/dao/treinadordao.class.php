<?php
require_once "config/conexaobanco.class.php";
class TreinadorDAO{

  private $conexao = null;

  public function __construct(){
    $this->conexao = ConexaoBanco::getInstance();
  }
  public function __destruct(){}

  public function cadastrarTreinador($tre){
      try{                              //SQL
        $stat = $this->conexao->prepare("insert into treinador(idTreinador,nome,idade,regiao)values(null,?,?,?)");

        $stat->bindValue(1, $tre->nome);
        $stat->bindValue(2, $tre->idade);
        $stat->bindValue(3, $tre->regiao);
        // $stat->bindValue(4, $pok->pokemon);
        // $stat->bindValue(5, $pok->insignia);

        $stat->execute();

      }catch(PDOException $e){
        echo "Erro ao cadastrar! ".$e;
      }//fecha catch
  }//fecha metodo

  public function buscarTreinador(){
      try{
        $stat = $this->conexao->query("select * from treinador");
        $array = $stat->fetchAll(PDO::FETCH_CLASS, "Treinador");
        return $array;
      }catch(PDOException $e){
        echo "Erro ao buscar treinador!".$e;
      }//fecha catch
  }//fecha método

  public function filtrar($filtro, $pesquisa){
    try{
      $query = "";
      switch($filtro){
        case "idTreinador": $query = "where idTreinador=".$pesquisa;
        break;
        case "nome": $query="where nome like '%".$pesquisa."%'";
        break;
        case "idade": $query="where idade like '%".$pesquisa."%'";
        break;
        case "regiao": $query="where regiao like '%".$pesquisa."%'";
        break;
      }//fecha switch

      if(empty($pesquisa)){
        $query = "";
      }

      $stat = $this->conexao->query("select * from treinador ".$query);
      $array = $stat->fetchAll(PDO::FETCH_CLASS, "Treinador");
      return $array;
    }catch(PDOException $e){
      echo "Erro ao filtrar treinador!".$e;
    }//fecha catch
  }//fecha filtrar

  public function deletarTreinador($id){
    try{
      $stat = $this->conexao->prepare("delete from treinador where idtreinador=?");
      $stat->bindValue(1, $id);
      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao deletar treinador!".$e;
    }//fecha catch
  }//fecha deletar

  public function alterarTreinador($tre){
    try{
      $stat = $this->conexao->prepare("update livro set nome=?, idade=?, regiao=? where idTreinador=?");
      $stat->bindValue(1,$tre->nome);
      $stat->bindValue(2,$tre->idade);
      $stat->bindValue(3,$tre->regiao);
      $stat->bindValue(4,$tre->idTreinador);

      $stat->execute();
    }catch(PDOException $e){
      echo "Erro ao alterar treinador! ".$e;
    }//fecha catch
  }//fecha alterarLivro

  public function gerarJSON($filtro,$pesquisa){
    try{
      $query="";
      switch($filtro){
        case "codigo":
        $query = "where idTreinador = ".$pesquisa;
        break;
      }
      $stat = $this->conexao->query("select * from treinador ".$query);
      return json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
    }catch(PDOException $e){
      echo "Erro ao gerar JSON! ".$e;
    }//fecha catch
  }//fecha método
}
