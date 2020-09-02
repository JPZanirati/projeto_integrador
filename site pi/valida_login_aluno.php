<?php
session_start();

if (!isset($_SESSION['logado_aluno'])) {
    header("Location: aluno.php");
}

$cpf = $_POST['cpf'];
$senha = hash('sha256', $_POST['senha']);

try {
    require_once('conexao.php');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare("SELECT * FROM pi_aluno WHERE cpf = ? AND senha = ?");
    $query->execute(array($cpf, $senha));
    if ($query->rowCount() > 0) {
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        $_SESSION['logado_aluno'] = true;
        $_SESSION['logado_aluno'] = $resultado[0]->id_aluno;
        $_SESSION['nome'] =  $resultado[0]->nome_aluno;

        header("Location: portal_aluno.php");
    } else {
        header("Location: aluno.php?erro");
    }
    $conn = null;
} catch (PDOException $e) {
    echo "Mensagem de erro:" . $e->getMessage();
}
