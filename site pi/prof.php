<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/prof.css" />

  <title>Document</title>
</head>

<body>
  <!--Cabeçalho-->
  <header class="cabecalho">
    <div class="logo">
      <a href="#">
        <img src="image/logo.jpg" alt="" />
      </a>
    </div>
    <nav class="menu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="nivel.php">Teste de nivelamento</a></li>
        <li><a href="aluno.php">Portal do aluno</a></li>
        <li><a href="prof.php">Portal do professor</a></li>
      </ul>
    </nav>
    <form class="pesquisa">
      <input type="text" name="pesquisa" placeholder="Pesquisar" />
      <button type="submit">Pesquisar</button>
    </form>
  </header>

  <!--area prof-->
  <div class="fundo">
    <div class="foto">
      <img src="image/teacher.jpg" alt="" />
    </div>
    <div class="textos">

      <form method="POST" action="valida_login_prof.php">
        <!-- ----- NUMERO ID ----- -->
        <div class="form-group">
          <label for="">Número de identificação:</label>
          <input type="text" class="form-control" name="id_prof" placeholder="digite seu ID" />
          <label for="">Senha:</label>
          <input type="password" class="form-control" name="senha" placeholder="digite sua senha" />
          <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
      </form>
    </div>
    <!--rodapé-->
    <footer class="rodape">
      <div>
        <h3>Institucional</h3>
        <ul>
          <li><a href="">Sobre nós</a></li>
          <li><a href="">Unidades</a></li>
          <li><a href="">Política de privacidade</a></li>
        </ul>
      </div>

      <div>
        <h3>Cursos</h3>
        <ul>
          <li><a href="">Inglês</a></li>
          <li><a href="">Espanhol</a></li>
          <li><a href="">Alemão</a></li>
          <li><a href="">Francês</a></li>
        </ul>
      </div>
      <div>
        <h3>A Graham</h3>
        <ul>
          <li><a href="aluno.php">Portal do aluno</a></li>
          <li><a href="prof.php">Portal do professor</a></li>
        </ul>
      </div>
    </footer>
    <!--rodapé-->
</body>

</html>