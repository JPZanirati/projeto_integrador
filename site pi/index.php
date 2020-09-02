<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
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
  <!--Cabeçalho-->

  <!--Slide-->
  <div class="border">
    <div class="slidershow middle">
      <div class="slides">
        <input type="radio" name="r" id="r1" checked />
        <input type="radio" name="r" id="r2" />
        <input type="radio" name="r" id="r3" />
        <input type="radio" name="r" id="r4" />
        <input type="radio" name="r" id="r5" />
        <div class="slide s1">
          <img src="image/banner1.jpg" alt="" />
        </div>
        <div class="slide">
          <img src="image/banner2.jpg" alt="" />
        </div>
        <div class="slide">
          <img src="image/banner3.png" alt="" />
        </div>
        <div class="slide">
          <img src="image/banner4.png" alt="" />
        </div>
        <div class="slide">
          <img src="image/banner5.png" alt="" />
        </div>
      </div>

      <div class="navigation">
        <label for="r1" class="bar"></label>
        <label for="r2" class="bar"></label>
        <label for="r3" class="bar"></label>
        <label for="r4" class="bar"></label>
        <label for="r5" class="bar"></label>
      </div>
    </div>
  </div>
  <!--Slide-->

  <!--Blocos_3motivos-->
  <div class="Blocos_3motivos">
    <div class="bloco1">
      <h1>Porque escolher a Graham School?</h1>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe,
        perferendis
      </p>
    </div>

    <div class="bloco2">
      <h1>Porque escolher a Graham School?</h1>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe,
        perferendis
      </p>
    </div>

    <div class="bloco3">
      <h1>Porque escolher a Graham School?</h1>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe,
        perferendis
      </p>
    </div>
  </div>
  <!--Blocos 3motivos-->

  <!--Blocos_Cursos-->
  <div class="Blocos_Cursos">
    <div class="KIDS">
      <h1>KIDS</h1>
      <img src="image/kids.JPG" alt="" />
    </div>

    <div class="TEENS">
      <h1>TEENS</h1>
      <img src="image/teens.JPG" alt="" />
    </div>

    <div class="ADULTS">
      <h1>ADULTS</h1>
      <img src="image/adults.JPG" alt="" />
    </div>

    <div class="PERSONALIZADO">
      <h1>CUSTOM</h1>
      <img src="image/custom.JPG" alt="" />
    </div>
  </div>
  <!--Blocos_Cursos-->

  <!--contato-->
  <div class="contato">
    <h1>CONTATO</h1>
    <div>
      <input type="text" placeholder="Nome" />
      <input type="text" placeholder="Estado, cidade" />
    </div>
    <div>
      <input type="email" placeholder="Email" />
      <input type="number" placeholder="Telefone" />
    </div>
    <textarea name="" id="" cols="48" rows="10" placeholder="Mensagem"></textarea>
    <div>
      <button>Enviar</button>
    </div>
  </div>
  <!--contato-->

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
        <li><a href="">Portal do aluno</a></li>
        <li><a href="prof.php">Portal do professor</a></li>
      </ul>
    </div>
  </footer>
  <!--rodapé-->
</body>

</html>