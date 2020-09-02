<?php
session_start();

if (!isset($_SESSION['logado_prof'])) {
    header("Location: portal_prof.php");
}

if (empty($_POST['id_nota'])) {
    try {
        require_once("conexao.php");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("INSERT INTO pi_nota(nota_um, nota_dois, id_aluno, id_turma, id_prof) VALUES (?,?,?,?,?)");
        $query->execute(array($_POST['nota_um'], $_POST['nota_dois'], $_POST['id_aluno'], $_POST['id_turma'], $_SESSION['logado_prof'],));
        if ($query->rowCount() > 0) {
            header("Location: portal_prof.php?edita=sucesso");
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
if (isset($_POST['id_nota'])) {
    try {
        require_once("conexao.php");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("UPDATE pi_nota SET nota_um = ?, nota_dois = ? WHERE id_nota = ?");
        $query->execute(array($_POST['nota_um'], $_POST['nota_dois'], $_POST['id_nota']));
        if ($query->rowCount() > 0) {
            header("Location: portal_prof.php?edita=sucesso");
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
