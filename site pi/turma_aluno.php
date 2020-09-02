<?php
session_start();

if (!isset($_SESSION['logado_aluno'])) {
    header("Location: portal_aluno.php");
}

if (isset($_POST['id_turma'])) {
    try {
        require_once("conexao.php");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("UPDATE pi_aluno SET id_turma = ? WHERE id_aluno = ?");
        $query->execute(array($_POST['id_turma'], $_SESSION['logado_aluno']));
        if ($query->rowCount() > 0) {
            header("Location: portal_aluno.php");
        } else {
            header("Location: portal_aluno.php?edita=sem_alteracao");
        }
        $conn = null;
    } catch (PDOException $e) {
        header("Location: portal_aluno.php?edita=erro");
    }
} else {
    header("Location: portal_aluno.php");
}
