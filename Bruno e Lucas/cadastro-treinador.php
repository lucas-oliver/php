<?php
session_start();
ob_start(); //buffer do PHP
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro de Treinador</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>
      <div class="container">
        <h1 class="jumbotron bg-info">Cadastro de Treinador</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Sistema</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastro-treinador.php">Treinador<span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </nav>

        <form name="cadtreinador" method="post" action="">

          <div class="form-group">
            <input type="text" name="txtnome" placeholder="Nome" class="form-control">
          </div>

          <div class="form-group">
            <input type="number" name="txtidade" placeholder="Idade" class="form-control">
          </div>

          <div class="form-group">
            <select name="selregiao" class="form-control">
              <option value="alola">Alola</option>
              <option value="hoenn">Hoenn</option>
              <option value="ilhas laranja">Ilhas Laranja</option>
              <option value="ilhas sevii">Ilhas Sevii/Orre/Almia</option>
              <option value="johto">Johto</option>
              <option value="kalos">Kalos</option>
              <option value="Kanto">Kanto</option>
              <option value="sinnoh">Sinnoh</option>
              <option value="unova">Unova</option>
            </select>
          </div>

          <!-- <div class="form-group">
            <input type="number" name="txtpokemon" placeholder="pokemon" class="form-control">
          </div>

          <div class="form-group">
            <input type="number" name="txtinsignia" placeholder="insignia" class="form-control">
          </div> -->


          <div class="form-group">
            <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
            <input type="reset" name="Limpar" value="Limpar" class="btn btn-danger">
          </div>

        </form>
        <?php
        if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
        ?>

        <?php
        if(isset($_POST['cadastrar'])){
          include_once "modelo/treinador.class.php";
          include_once "dao/treinadordao.class.php";
          include_once "util/padronizacao.class.php";


          //depois de fazer a padronizacao:
          // $liv = new Pokemon();
          // $liv->titulo = Padronizacao::converterMaiMin($_POST['txttitulo']);
          // $liv->editora = Padronizacao::converterMaiMin($_POST['txteditora']);
          // $liv->autor = Padronizacao::converterMaiMin($_POST['txtautor']);
          // $liv->anoLanc = $_POST['txtanolanc'];
          // $liv->genero = $_POST['selgenero'];

          $tre = new Treinador();

          $tre->nome = Padronizacao::converterMaiMin($_POST['txtnome']);
          $tre->idade = $_POST['txtidade'];
          $tre->regiao = $_POST['selregiao'];
          // $tre->sexo = $_POST['txtpokemon'];
          // $tre->tipo = $_POST['txtinsignia'];

          $treDAO = new TreinadorDAO();
          $treDAO->cadastrarTreinador($tre);

          $_SESSION['msg'] = "Treinador cadastrado com sucesso!";
          $tre->__destruct();

          header("location:cadastro-treinador.php");

          //depois de testado
          // echo "treinador cadastrado com sucesso!";
          // echo $tre;
        }
        ?>
      </div>
  </body>
</html>
