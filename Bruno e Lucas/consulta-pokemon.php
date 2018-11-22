<?php
session_start();
ob_start();
include_once "dao/pokemondao.class.php";
include_once "modelo/pokemon.class.php";

$pokDAO = new PokemonDAO();
$array = $pokDAO->buscarpokemon();

//só para teste
//var_dump($array);
//echo "<br>qtd livros: ".count($array);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Consulta pokemon</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>
      <div class="container">
        <h1 class="jumbotron bg-info">Consulta de pokemon</h1>

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
                <a class="nav-link" href="cadastro-pokemon.php">Cad. Pokemon <span class="sr-only"></span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="consulta-pokemon.php">Cons. Pokemon <span class="sr-only"></span></a>
              </li>

            </ul>
          </div>
        </nav>

        <h1>Sistema para gerenciamento de pokemon</h1>
        <h2>Consulta de pokemon</h2>
        <?php
        if(isset($array)){
          if(count($array)==0){
            echo "<h3>Não há pokemons cadastrados!</h3>";
            return;
          }
        ?>

        <form name="pesquisa" method="post" action="">
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" name="txtfiltro"
              class="form-control" placeholder="Digite sua pesquisa">
            </div>
            <div class="form-group col-md-6">
              <select name="selfiltro" class="form-control">
                <option value="todos">Todos</option>
                <option value="idpokemon">Código</option>
                <option value="nome">Nome</option>
                <option value="altura">Altura</option>
                <option value="peso">Peso</option>
                <option value="sexo">Sexo</option>
                <option value="tipo">Tipo</option>
                <option value="tipo2">Tipo2</option>
                <option value="caracteristica">Caracteristica</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <input type="submit" name="filtrar" value="Filtrar"
                   class="btn btn-primary btn-block">
          </div>
        </form>
        <?php
        if(isset($_POST['filtrar'])){
          $pesquisa = $_POST['txtfiltro'];
          $filtro = $_POST['selfiltro'];
          $pokDAO = new PokemonDAO();
          $array = $pokDAO->filtrar($filtro, $pesquisa);
          if(count($array) == 0){
            echo "<h2>Sua pesquisa não retornou nenhum pokemon!</h2>";
            return;
          }//fecha if
        }//fecha if
        ?>

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
              <tr>
                <th>Alterar</th>
                <th>Excluir</th>
                <th>Código</th>
                <th>Nome</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>Sexo</th>
                <th>Tipo</th>
                <th>Tipo2</th>
                <th>Caracteristica</th>
              </tr>
            </thead>

            <tfoot>
              <th>Alterar</th>
              <th>Excluir</th>
              <th>Código</th>
              <th>Nome</th>
              <th>Altura</th>
              <th>Peso</th>
              <th>Sexo</th>
              <th>Tipo</th>
              <th>Tipo2</th>
              <th>Caracteristica</th>
            </tfoot>

            <tbody>
              <?php
                  foreach($array as $pok){
                    echo "<tr>";
                      echo "<td><a href='alterar-pokemon.php?id=$pok->idPokemon 'class='btn btn-warning'>Alterar</a></td>";
                      echo "<td><a href='consulta-pokemon.php?id=$pok->idPokemon 'class='btn btn-danger'>Excluir</a></td>";
                      echo "<td>$pok->idPokemon</td>";
                      echo "<td>$pok->nome</td>";
                      echo "<td>$pok->altura</td>";
                      echo "<td>$pok->peso</td>";
                      echo "<td>$pok->sexo</td>";
                      echo "<td>$pok->tipo</td>";
                      echo "<td>$pok->tipo2</td>";
                      echo "<td>$pok->caracteristica</td>";
                    echo "</tr>";
                  }//fecha foreach
              }//fecha if
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php
      if(isset($_GET['id'])){
        $pokDAO = new PokemonDAO();
        $pokDAO->deletarPokemon($_GET['id']);
        header("location:consulta-pokemon.php");
      }//fecha if
      ?>
  </body>
</html>
