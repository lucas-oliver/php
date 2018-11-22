<?php
session_start();
ob_start(); //buffer do PHP

if(isset($_GET['id'])){
    include_once "dao/pokemondao.class.php";
    include_once "modelo/pokemon.class.php";

    $pokDAO = new PokemonDAO();
    $array = $pokDAO->filtrar("codigo", $_GET['id']);
    //var_dump($array);
    $liv = $array[0];
    //echo $liv;
    //só para teste....
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Alteração de Pokemon</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>
      <div class="container">
        <h1 class="jumbotron bg-info">Alteração de Pokemon</h1>

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
                <a class="nav-link" href="cadastro-pokemon.php">Cad. Pokemon <span class="sr-only">(current)</span></a>
              </li>

                <li class="nav-item">
                  <a class="nav-link" href="consulta-pokemon.php">Cons. Pokemon <span class="sr-only"></span></a>
                </li>

            </ul>
          </div>
        </nav>

        <form name="cadpokemon" method="post" action="">

          <div class="form-group">
            <input type="text" name="txtnome"
             placeholder="Nome" class="form-control"
             value="<?php if(isset($pok)){ echo $pok->nome; } ?>">
          </div>

          <div class="form-group">
            <input type="number" name="txtaltura"
            placeholder="Altura" class="form-control"
            value="<?php if(isset($pok)){ echo $pok->altura; } ?>">
          </div>

          <div class="form-group">
            <input type="number" name="txtpeso"
            placeholder="Peso" class="form-control"
            value="<?php if(isset($pok)){ echo $pok->peso; } ?>">
          </div>


          <!-- sexo -->
          <div class="form-group">
            <select name="selsexo" class="form-control">


              <option value="Masculino"
                <?php
                if(isset($pok)){
                  if($pok->sexo == "Masculino"){ echo 'selected=selected'; }
                }
                ?>
                >Masculino
              </option>

              <option value="Feminino"
                <?php
                if(isset($pok)){
                  if($pok->sexo == "Feminino"){ echo 'selected=selected'; }
                }
                ?>
                >Feminino
              </option>
            </select>
          </div>
          <!-- //sexo -->

          <!-- //tipo -->
          <div class="form-group">
            <select name="seltipo" class="form-control">

              <option value="aco"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "aco"){ echo 'selected=selected'; }
                }
                ?>
                >Aço
              </option>

              <option value="agua"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "agua"){ echo 'selected=selected'; }
                }
                ?>
                >Água
              </option>

              <option value="dragao"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "dragao"){ echo 'selected=selected'; }
                }
                ?>
                >Dragão
              </option>

              <option value="eletrico"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "eletrico"){ echo 'selected=selected'; }
                }
                ?>
                >Elétrico
              </option>

              <option value="fada"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "fada"){ echo 'selected=selected'; }
                }
                ?>
                >Fada
              </option>

              <option value="fantasma"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "fantasma"){ echo 'selected=selected'; }
                }
                ?>
                >Fantasma
              </option>

              <option value="fogo"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "fogo"){ echo 'selected=selected'; }
                }
                ?>
                >Fogo
              </option>

              <option value="gelo"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "gelo"){ echo 'selected=selected'; }
                }
                ?>
                >Gelo
              </option>

              <option value="inseto"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "inseto"){ echo 'selected=selected'; }
                }
                ?>
                >Inseto
              </option>

              <option value="lutador"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "lutador"){ echo 'selected=selected'; }
                }
                ?>
                >Lutador
              </option>

              <option value="normal"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "normal"){ echo 'selected=selected'; }
                }
                ?>
                >Normal
              </option>

              <option value="noturno"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "noturno"){ echo 'selected=selected'; }
                }
                ?>
                >Noturno
              </option>

              <option value="pedra"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "pedra"){ echo 'selected=selected'; }
                }
                ?>
                >Pedra
              </option>

              <option value="planta"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "planta"){ echo 'selected=selected'; }
                }
                ?>
                >planta
              </option>

              <option value="psiquico"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "psiquico"){ echo 'selected=selected'; }
                }
                ?>
                >Psíquico
              </option>

              <option value="terra"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "terra"){ echo 'selected=selected'; }
                }
                ?>
                >Terra
              </option>

              <option value="venenoso"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "venenoso"){ echo 'selected=selected'; }
                }
                ?>
                >Venenoso
              </option>

              <option value="voador"
                <?php
                if(isset($pok)){
                  if($pok->tipo == "voador"){ echo 'selected=selected'; }
                }
                ?>
                >Voaor
              </option>


            </select>
          </div>
          <!-- //tipo

          //tipo2 -->
          <div class="form-group">
            <select name="seltipo2" class="form-control">

              <?php
              if(isset($pok)){
                if($pok->tipo2 == ""){ echo 'selected=selected'; }
              }
              ?>
              >Sem 2° tipo
            </option>

              <option value="aco"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "aco"){ echo 'selected=selected'; }
                }
                ?>
                >Aço
              </option>

              <option value="agua"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "agua"){ echo 'selected=selected'; }
                }
                ?>
                >Água
              </option>

              <option value="dragao"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "dragao"){ echo 'selected=selected'; }
                }
                ?>
                >Dragão
              </option>

              <option value="eletrico"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "eletrico"){ echo 'selected=selected'; }
                }
                ?>
                >Elétrico
              </option>

              <option value="fada"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "fada"){ echo 'selected=selected'; }
                }
                ?>
                >Fada
              </option>

              <option value="fantasma"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "fantasma"){ echo 'selected=selected'; }
                }
                ?>
                >Fantasma
              </option>

              <option value="fogo"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "fogo"){ echo 'selected=selected'; }
                }
                ?>
                >Fogo
              </option>

              <option value="gelo"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "gelo"){ echo 'selected=selected'; }
                }
                ?>
                >Gelo
              </option>

              <option value="inseto"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "inseto"){ echo 'selected=selected'; }
                }
                ?>
                >Inseto
              </option>

              <option value="lutador"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "lutador"){ echo 'selected=selected'; }
                }
                ?>
                >Lutador
              </option>

              <option value="normal"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "normal"){ echo 'selected=selected'; }
                }
                ?>
                >Normal
              </option>

              <option value="noturno"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "noturno"){ echo 'selected=selected'; }
                }
                ?>
                >Noturno
              </option>

              <option value="pedra"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "pedra"){ echo 'selected=selected'; }
                }
                ?>
                >Pedra
              </option>

              <option value="planta"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "planta"){ echo 'selected=selected'; }
                }
                ?>
                >planta
              </option>

              <option value="psiquico"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "psiquico"){ echo 'selected=selected'; }
                }
                ?>
                >Psíquico
              </option>

              <option value="terra"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "terra"){ echo 'selected=selected'; }
                }
                ?>
                >Terra
              </option>

              <option value="venenoso"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "venenoso"){ echo 'selected=selected'; }
                }
                ?>
                >Venenoso
              </option>

              <option value="voador"
                <?php
                if(isset($pok)){
                  if($pok->tipo2 == "voador"){ echo 'selected=selected'; }
                }
                ?>
                >Voaor
              </option>


            </select>
          </div>
          <!-- //tipo2

          //caracteristica -->
          <div class="form-group">
            <select name="selcaracteristica" class="form-control">

              <option value=""



              <option value="comum"
                <?php
                if(isset($pok)){
                  if($pok->caracteristica == "comum"){ echo 'selected=selected'; }
                }
                ?>
                >Comum
              </option>

              <option value="shiny"
                <?php
                if(isset($pok)){
                  if($pok->caracteristica == "shiny"){ echo 'selected=selected'; }
                }
                ?>
                >Shiny
              </option>

              <option value="alola"
                <?php
                if(isset($pok)){
                  if($pok->caracteristica == "alola"){ echo 'selected=selected'; }
                }
                ?>
                >Alola
              </option>

              <option value="alola shiny"
                <?php
                if(isset($pok)){
                  if($pok->caracteristica == "alola shiny"){ echo 'selected=selected'; }
                }
                ?>
                >Alola Shiny
              </option>


            </select>
          </div>
          //caracteristica---------------------------------------




          <div class="form-group">
            <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
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
        if(isset($_POST['alterar'])){
          include_once "modelo/pokemon.class.php";
          include_once "dao/pokemondao.class.php";
          include_once "util/padronizacao.class.php";

          $pok = new Pokemon();
          $pok->idPokemon = $_GET['id'];
          $pok->nome = Padronizacao::converterMaiMin($_POST['txtnome']);
          $pok->altura = $_POST['txtaltura'];
          $pok->peso = $_POST['txtpeso'];
          $pok->sexo = $_POST['selsexo'];
          $pok->tipo = $_POST['seltipo'];
          $pok->tipo2 = $_POST['seltipo2'];
          $pok->caracteristica = $_POST['selcaracteristica'];

          $pokDAO = new PokemonDAO();
          $pokDAO->alterarPokemon($pok);

          $_SESSION['msg'] = "Pokemon alterado com sucesso!";
          $pok->__destruct();

          //depois de testado
          // echo "Livro cadastrado com sucesso!";
          // echo $liv;
          header("location:consulta-pokemon.php");
        }
        ?>
      </div>
  </body>
</html>
