<?php

require_once("conexao.php");
$query = $conn->prepare("SELECT * FROM pi_aluno WHERE id_aluno = ?");
$parametros = array($_GET['id_aluno']);
$query->execute($parametros);
$resposta = $query->fetchAll(PDO::FETCH_OBJ);
$nome = $resposta[0]->nome_aluno;
$id_aluno = $resposta[0]->id_aluno;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Excluir aluno</title>
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
                <h2>Excluir o aluno "<?php echo htmlspecialchars($nome) ?>"?</h2>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                <form method="post" action="actions.php">
                    <input type="hidden" name="acao" value="excluir">
                    <input type="hidden" name="table" value="aluno">
                    <input type="hidden" name="id_aluno" value="<?php echo $id_aluno; ?>">
                    <button type="submit" class="btn btn-danger" href="actions.php?id_aluno=<?php echo $id_aluno ?>">Confirmar</button>
                    <a class="btn btn-secondary" href="index.php">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>