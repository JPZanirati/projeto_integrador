<?php

require_once("conexao.php");
$query = $conn->prepare("SELECT * FROM pi_prof WHERE id_prof = ?");
$parametros = array($_GET['id_prof']);
$query->execute($parametros);
$resposta = $query->fetchAll(PDO::FETCH_OBJ);
$nome = $resposta[0]->nome_prof;
$id_prof = $resposta[0]->id_prof;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Excluir Professor</title>
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
				<h2>Excluir o Professor "<?php echo htmlspecialchars($nome) ?>"?</h2>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 mt-4">
				<form method="post" action="actions.php">
					<input type="hidden" name="acao" value="excluir">
					<input type="hidden" name="table" value="prof">
					<input type="hidden" name="id_prof" value="<?php echo $id_prof; ?>">
					<button type="submit" class="btn btn-danger">Confirmar</button>
					<a class="btn btn-secondary" href="index.php">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
</body>

</html>