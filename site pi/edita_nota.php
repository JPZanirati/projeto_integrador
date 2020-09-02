<?php
session_start();

if (!isset($_SESSION['logado_prof'])) {
    header("Location: prof.php");
}

$id_nota = "";
$nota_um = "";
$nota_dois = "";
$erro = "";

if (isset($_GET['id_nota'])) {
    try {
        require_once("conexao.php");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("SELECT * FROM pi_nota WHERE id_nota = ?");
        $query->execute(array($_GET['id_nota']));
        if ($query->rowCount() > 0) {
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);
            $id_nota = $resultado[0]->id_nota;
            $nota_um = $resultado[0]->nota_um;
            $nota_dois = $resultado[0]->nota_dois;
        } else {
            $erro = "Não foi possível retornar a nota";
        }
        $conn = null;
    } catch (PDOException $e) {
        $erro = "Mensagem de erro:" . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Editar nota</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row pt-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>Editar Nota</h2>
                <p class="text-danger"><?php echo $erro ?></p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form method="POST" action="nota_muda.php" class="was-validated">
                    <input type="hidden" name="id_nota" value="<?php echo $id_nota ?>"></input>
                    <input type="hidden" name="id_turma" value="<?php echo $_GET['id_turma'] ?>">
                    <input type="hidden" name="id_aluno" value="<?php echo $_GET['id_aluno'] ?>">
                    <div class="form-group">
                        <label for="nota_um">Primeira nota:</label>
                        <input type="text" class="form-control" id="nota_um" name="nota_um" value="<?php echo htmlspecialchars($nota_um) ?>" required>
                    </div>
                    <div class="form-group text-left">
                        <label for="nota_dois">Segunda nota:</label>
                        <input type="text" class="form-control" id="nota_dois" name="nota_dois" value="<?php echo htmlspecialchars($nota_dois) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
                <a class="btn btn-danger" href="portal_prof.php">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>