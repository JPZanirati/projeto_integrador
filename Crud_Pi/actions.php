<?php

require_once("conexao.php");

switch ($_POST['acao']) {
    case 'cadastrar':
        if (isset($_POST['nome_prof']) || isset($_POST['nome_aluno']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['senha'])) {
            if (!empty($_POST['nome_prof']) || !empty($_POST['nome_aluno']) && !empty($_POST['cpf']) && !empty($_POST['telefone']) && !empty($_POST['senha'])) {
                $nome_prof = $_POST['nome_prof'];
                $nome_aluno = $_POST['nome_aluno'];
                $cpf = $_POST['cpf'];
                $telefone = $_POST['telefone'];
                $senha = hash('sha256', $_POST['senha']);
                $id_turma = $_POST['id_turma'];

                switch ($_POST['table']) {
                    case 'prof':
                        try {
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query = $conn->prepare("INSERT INTO pi_prof (nome_prof, cpf, telefone, senha, id_turma) VALUES (?, ?, ?, ?, ?)");
                            $query->execute(array($nome_prof, $cpf, $telefone, $senha, $id_turma));
                            if ($query->rowCount() > 0) {
                                header("Location: index.php?cadastro=sucesso");
                            } else {
                                header("Location: index.php?cadastro=erro");
                            }
                            $conn = null;
                        } catch (PDOException $e) {
                            echo "Mensagem de erro:" . $e->getMessage();
                        }
                        break;
                    case 'aluno':
                        try {
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query = $conn->prepare("INSERT INTO pi_aluno (nome_aluno, cpf, telefone, senha, id_turma) VALUES (?, ?, ?, ?, ?)");
                            $query->execute(array($nome_aluno, $cpf, $telefone, $senha, $id_turma));
                            if ($query->rowCount() > 0) {
                                header("Location: index.php?cadastro=sucesso");
                            } else {
                                header("Location: index.php?cadastro=erro");
                            }
                            $conn = null;
                        } catch (PDOException $e) {
                            echo "Mensagem de erro:" . $e->getMessage();
                        }
                        break;
                    default:
                        header("Location: index.php");
                }
            }
        }
        break;
    case 'excluir':
        switch ($_POST['table']) {
            case 'prof':
                if (isset($_POST["id_prof"])) {
                    try {
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = $conn->prepare("DELETE FROM pi_prof WHERE id_prof = ?");
                        $query->execute(array($_POST['id_prof']));
                        if ($query->rowCount() > 0) {
                            header("Location: index.php?excluir=sucesso");
                        } else {
                            header("Location: index.php?excluir=erro");
                        }
                        $conn = null;
                    } catch (PDOException $e) {
                        header("Location: index.php?excluir=erro");
                    }
                } else {
                    header("Location: index.php");
                }
                break;
            case 'aluno':
                if (isset($_POST["id_aluno"])) {
                    try {
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = $conn->prepare("DELETE FROM pi_aluno WHERE id_aluno = ?");
                        $query->execute(array($_POST['id_aluno']));
                        if ($query->rowCount() > 0) {
                            header("Location: index.php?excluir=sucesso");
                        } else {
                            header("Location: index.php?excluir=erro");
                        }
                        $conn = null;
                    } catch (PDOException $e) {
                        header("Location: index.php?excluir=erro");
                    }
                } else {
                    header("Location: index.php");
                }
                break;
            default:
                header("Location: index.php");
        }
        break;
    case 'editar':
        switch ($_POST['table']) {
            case 'prof':
                if (isset($_POST['id_prof'])) {
                    try {
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = $conn->prepare("SELECT * FROM pi_prof WHERE id_prof = ?");
                        $query->execute(array($_POST['id_prof']));
                        if ($query->rowCount() > 0) {
                            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
                            $valida_senha = $resultado[0]->senha;
                        } else {
                            $erro = "Não foi possível retornar a conta";
                        }
                    } catch (PDOException $e) {
                        $erro = "Mensagem de erro:" . $e->getMessage();
                    }
                }
                if (isset($_POST['nome_prof']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['senha'])) {
                    if (!empty($_POST['nome_prof']) && !empty($_POST['cpf']) && !empty($_POST['telefone']) && !empty($_POST['senha'])) {
                        $id_prof = $_POST['id_prof'];
                        $nome_prof = $_POST['nome_prof'];
                        $cpf = $_POST['cpf'];
                        $telefone = $_POST['telefone'];
                        $senha = $_POST['senha'];

                        if ($senha != $valida_senha) {
                            $senha = hash('sha256', $senha);
                        }

                        try {
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query = $conn->prepare("UPDATE pi_prof SET nome_prof = ?, cpf = ?, telefone = ?, senha = ? WHERE id_prof = ?");
                            $query->execute(array($nome_prof, $cpf, $telefone, $senha, $id_prof));
                            if ($query->rowCount() > 0) {
                                header("Location: index.php?edita=sucesso");
                            } else {
                                header("Location: index.php?edita=sem_alteracao");
                            }
                            $conn = null;
                        } catch (PDOException $e) {
                            header("Location: index.php?edita=erro");
                        }
                    }
                }
                break;
            case 'aluno':
                if (isset($_POST['id_aluno'])) {
                    try {
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = $conn->prepare("SELECT * FROM pi_aluno WHERE id_aluno = ?");
                        $query->execute(array($_POST['id_aluno']));
                        if ($query->rowCount() > 0) {
                            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
                            $valida_senha = $resultado[0]->senha;
                        } else {
                            $erro = "Não foi possível retornar a conta";
                        }
                    } catch (PDOException $e) {
                        $erro = "Mensagem de erro:" . $e->getMessage();
                    }
                }
                if (isset($_POST['nome_aluno']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['senha'])) {
                    if (!empty($_POST['nome_aluno']) && !empty($_POST['cpf']) && !empty($_POST['telefone']) && !empty($_POST['senha'])) {
                        $id_aluno = $_POST['id_aluno'];
                        $nome_aluno = $_POST['nome_aluno'];
                        $cpf = $_POST['cpf'];
                        $telefone = $_POST['telefone'];
                        $senha = $_POST['senha'];

                        if ($senha != $valida_senha) {
                            $senha = hash('sha256', $senha);
                        }

                        try {
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query = $conn->prepare("UPDATE pi_aluno SET nome_aluno = ?, cpf = ?, telefone = ?, senha = ? WHERE id_aluno = ?");
                            $query->execute(array($nome_aluno, $cpf, $telefone, $senha, $id_aluno));
                            if ($query->rowCount() > 0) {
                                header("Location: index.php?edita=sucesso");
                            } else {
                                header("Location: index.php?edita=sem_alteracao");
                            }
                            $conn = null;
                        } catch (PDOException $e) {
                            header("Location: index.php?edita=erro");
                        }
                    }
                }
            default:
                header("Location: index.php");
        }
        break;
    default:
        header("Location: index.php");
}
