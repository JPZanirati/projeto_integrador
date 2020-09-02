<?php
session_start();

if (!isset($_SESSION['logado_aluno'])) {
  header("Location: aluno.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Portal do Aluno</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/entrou_aluno.css" />

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
        <li><a href="portal_aluno.php">Portal do aluno</a></li>
        <li><a href="portal_prof.php">Portal do professor</a></li>
      </ul>
    </nav>
    <form class="pesquisa">
      <input type="text" name="pesquisa" placeholder="Pesquisar" />
      <button type="submit">Pesquisar</button>
    </form>
  </header>
  <!--Fim Cabeçalho-->

  <!--Tabela de notas-->
  <div class="Fundo_tabela">
    <div class="Tabela">
      <h1>Bem-vindo, <?php echo $_SESSION['nome'] ?>!</h1>

      <form method="POST" action="turma_aluno.php">
        <input type="hidden" name="id_aluno" value="<?php echo $_SESSION['logado_aluno'] ?>">
        <label for="">Turma:</label>
        <select name="id_turma" id="">
          <option value="1">Inglês</option>
          <option value="2">Espanhol</option>
          <option value="3">Alemão</option>
          <option value="4">Francês</option>
        </select>
        <input class="envia" type="submit"></input>
      </form>

      <table class="tabela_turmas">
        <thead>
          <tr>
            <th>Turma</th>
            <th>Professor</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Média geral</th>
          </tr>
        </thead>

        <tbody>
          <?php
          try {
            require_once('conexao.php');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $conn->prepare("SELECT id_aluno, nome_aluno, nota_um, nota_dois, pi_prof.nome_prof, idioma FROM pi_aluno 
            join pi_turma using (id_turma) 
              join pi_prof using(id_turma) 
              left join pi_nota using(id_aluno)
              where pi_aluno.id_aluno = ?");
            $query->execute(array($_SESSION['logado_aluno']));
            if ($query->rowCount() > 0) {
              $resultado = $query->fetchAll(PDO::FETCH_OBJ);
              foreach ($resultado as $indice => $aluno) {
                echo '<tr>
                <td>' . $aluno->idioma . '</td>
								<td>' . $aluno->nome_prof . '</td>
								<td>' . $aluno->nota_um . '</td>
                <td>' . $aluno->nota_dois . '</td>
                <td>' . ($aluno->nota_um + $aluno->nota_dois) / 2 . '</td>';
              }
              echo '</td></tr>';
              echo "</table>";
            } else {
              echo "Nenhum aluno encontrado!";
            }
          } catch (PDOException $e) {
            echo "Mensagem de erro:" . $e->getMessage();
          }
          ?>
        </tbody>
      </table>

      <form method="POST" action="logout_aluno.php">
        <button class="logout">Logout <i class="fa fa-sign-out"></i></button>
      </form>
    </div>
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