<?php
session_start();

if (!isset($_SESSION['logado_prof'])) {
    header("Location: prof.php");
}

$id_prof = $_POST['id_prof'];
$senha = hash('sha256', $_POST['senha']);

try {
    require_once('conexao.php');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare("SELECT * FROM pi_prof WHERE id_prof = ? AND senha = ?");
    $query->execute(array($id_prof, $senha));
    if ($query->rowCount() > 0) {
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        $_SESSION['logado_prof'] = true;
        $_SESSION['logado_prof'] = $resultado[0]->id_prof;
        $_SESSION['nome'] =  $resultado[0]->nome_prof;

        header("Location: portal_prof.php");
    } else {
        header("Location: prof.php?erro");
    }
    $conn = null;
} catch (PDOException $e) {
    echo "Mensagem de erro:" . $e->getMessage();
}
