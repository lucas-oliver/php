<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Cadastro de Conquistas</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="vendor/components/jquery/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
  <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
  <body>
      <div class="container">
        <h1 class="jumbotron bg-info">Cadastro de Conquistas</h1>

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
                <a class="nav-link" href="cadastro-conquistas.php">Conquistas<span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </nav>

        <form name="cadconquistas" method="post" action="">

          <div class="form-group">
            <input type="number" name="txtinsignias" placeholder="Insignias" class="form-control">
          </div>

          <div class="form-group">
            <input type="number" name="txtfitas" placeholder="Fitas" class="form-control">
          </div>

          <div class="form-group">
            <input type="number" name="txtsimbolos" placeholder="Simbolos" class="form-control">
          </div>

          <div class="form-group">
            <input type="number" name="txtmedalhas" placeholder="Medalhas" class="form-control">
          </div>

          <div class="form-group">
            <input type="number" name="txtpokepingpong" placeholder="Troféus do Poké-Ping-Pong" class="form-control">
          </div>

          <div class="form-group">
            <input type="number" name="txtligas" placeholder="Troféus das Ligas" class="form-control">
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
          include_once "modelo/conquistas.class.php";
          include_once "dao/conquistasdao.class.php";
          include_once "util/padronizacao.class.php";

          $con = new Conquistas();

          $con->insignias = $_POST['txtinsignias'];
          $con->fitas = $_POST['txtfitas'];
          $con->simbolos = $_POST['txtsimbolos'];
          $con->medalhas = $_POST['txtmedalhas'];
          $con->pokePingPong = $_POST['txtpokepingpong'];
          $con->ligas = $_POST['txtligas'];

          $conDAO = new ConquistasDAO();
          $conDAO->cadastrarConquistas($con);

          $_SESSION['msg'] = "Conquista cadastrada com sucesso!";
          $con->__destruct();

          header("location:cadastro-conquistas.php");

          // //depois de testado
          // echo "Conquistas cadastradas com sucesso!";
          // echo $con;
        }
        ?>
      </div>
  </body>
</html>
