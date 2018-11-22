<?php
session_start();
ob_start(); //buffer do PHP
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro de Pokemon</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>
      <div class="container">
        <h1 class="jumbotron bg-info">Cadastro de pokemon</h1>

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
                <a class="nav-link" href="cadastro-pokemon.php">Pokemon<span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </nav>

        <form name="cadpokemon" method="post" action="">

          <div class="form-group">
            <input type="text" name="txtnome" placeholder="Nome" class="form-control">
          </div>

          <div class="form-group">
            <input type="number" name="txtaltura" placeholder="Altura" class="form-control">
          </div>

          <div class="form-group">
            <input type="number" name="txtpeso" placeholder="Peso" class="form-control">
          </div>

          <div class="form-group">
            <select name="selsexo" class="form-control">
              <option value="macho">Macho</option>
              <option value="femea">Fêmea</option>
            </select>
          </div>

          <div class="form-group">
            <select name="seltipo" class="form-control">
              <option value="aco">Aço</option>
              <option value="agua">Água</option>
              <option value="dragao">Dragão</option>
              <option value="eletrico">Elétrico</option>
              <option value="fada">Fada</option>
              <option value="fantasma">Fantasma</option>
              <option value="fogo">Fogo</option>
              <option value="gelo">Gelo</option>
              <option value="inseto">Inseto</option>
              <option value="lutador">Lutador</option>
              <option value="normal">Normal</option>
              <option value="noturno">Noturno</option>
              <option value="pedra">Pedra</option>
              <option value="planta">Planta</option>
              <option value="psiquico">Psíquico</option>
              <option value="terra">Terra</option>
              <option value="veneno">Veneno</option>
              <option value="voador">Voador</option>
            </select>
          </div>

          <div class="form-group">
            <select name="seltipo2" class="form-control">
              <option value="">Sem 2° tipo</option>
              <option value="aco">Aço</option>
              <option value="agua">Água</option>
              <option value="dragao">Dragão</option>
              <option value="eletrico">Elétrico</option>
              <option value="fada">Fada</option>
              <option value="fantasma">Fantasma</option>
              <option value="fogo">Fogo</option>
              <option value="gelo">Gelo</option>
              <option value="inseto">Inseto</option>
              <option value="lutador">Lutador</option>
              <option value="normal">Normal</option>
              <option value="noturno">Noturno</option>
              <option value="pedra">Pedra</option>
              <option value="planta">Planta</option>
              <option value="psiquico">Psíquico</option>
              <option value="terra">Terra</option>
              <option value="veneno">Veneno</option>
              <option value="voador">Voador</option>
            </select>
          </div>

          <div class="form-group">
            <select name="selcaracteristica" class="form-control">
              <option value="comum">Comum</option>
              <option value="shiny">Shiny</option>
              <option value="alola">Alola form</option>
              <option value="alola shiny">Alola form shiny</option>
            </select>
          </div>

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
          include_once "modelo/pokemon.class.php";
          include_once "dao/pokemondao.class.php";
          include_once "util/padronizacao.class.php";


          //depois de fazer a padronizacao:
          // $pok = new Pokemon();
          // $pok->nome = Padronizacao::converterMaiMin($_POST['txtnome']);
          // $pok->editora = Padronizacao::converterMaiMin($_POST['txteditora']);
          // $pok->autor = Padronizacao::converterMaiMin($_POST['txtautor']);
          // $pok->anoLanc = $_POST['txtanolanc'];
          // $pok->genero = $_POST['selgenero'];

          $pok = new Pokemon();

          $pok->nome = Padronizacao::converterMaiMin($_POST['txtnome']);
          $pok->altura = $_POST['txtaltura'];
          $pok->peso = $_POST['txtpeso'];
          $pok->sexo = $_POST['selsexo'];
          $pok->tipo = $_POST['seltipo'];
          $pok->tipo2 = $_POST['seltipo2'];
          $pok->caracteristica = $_POST['selcaracteristica'];

          $pokDAO = new PokemonDAO();
          $pokDAO->cadastrarpokemon($pok);

          $_SESSION['msg'] = "Pokemon cadastrado com sucesso!";
          $pok->__destruct();

          header("location:cadastro-pokemon.php");

          //depois de testado
          // echo "Pokemon cadastrado com sucesso!";
          // echo $pok;
        }
        ?>
      </div>
  </body>
</html>
