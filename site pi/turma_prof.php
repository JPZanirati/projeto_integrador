<?php
session_start();

if (!isset($_SESSION['logado_prof'])) {
    header("Location: portal_prof.php");
}

if (isset($_POST['id_turma'])) {
    try {
        require_once("conexao.php");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("UPDATE pi_prof SET id_turma = ? WHERE id_prof = ?");
        $query->execute(array($_POST['id_turma'], $_SESSION['logado_prof']));
        if ($query->rowCount() > 0) {
            header("Location: portal_prof.php");
        } else {
            header("Location: portal_prof.php?edita=sem_alteracao");
        }
        $conn = null;
    } catch (PDOException $e) {
        header("Location: portal_prof.php?edita=erro");
    }
} else {
    header("Location: portal_prof.php");
}
