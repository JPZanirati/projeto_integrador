<?php

$id_prof = "";
$nome = "";
$cpf = "";
$senha = "";
$telefone = "";
$erro = "";

if (isset($_GET['id_prof'])) {
	try {
		require_once("conexao.php");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $conn->prepare("SELECT * FROM pi_prof WHERE id_prof = ?");
		$query->execute(array($_GET['id_prof']));
		if ($query->rowCount() > 0) {
			$resultado = $query->fetchAll(PDO::FETCH_OBJ);
			$id_prof = $resultado[0]->id_prof;
			$nome = $resultado[0]->nome_prof;
			$cpf = $resultado[0]->cpf;
			$senha = $resultado[0]->senha;
			$telefone = $resultado[0]->telefone;
		} else {
			$erro = "Não foi possível retornar a conta";
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
	<title>Editar professor</title>
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
				<h2>Editar de Professor</h2>
				<p class="text-danger"><?php echo $erro ?></p>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12">
				<form method="POST" action="actions.php" class="was-validated">
					<input type="hidden" name="acao" value="editar">
					<input type="hidden" name="table" value="prof">
					<input type="hidden" name="id_prof" value="<?php echo $id_prof ?>"></input>
					<div class="form-group">
						<label for="nome">Nome:</label>
						<input type="text" class="form-control" id="nome" placeholder="Nome do Professor" name="nome_prof" value="<?php echo htmlspecialchars($nome) ?>" required>
					</div>
					<div class="form-group text-left">
						<label for="cpf">CPF:</label>
						<input type="number" class="form-control" id="cpf" placeholder="cpf do Professor" name="cpf" value="<?php echo htmlspecialchars($cpf) ?>" required>
					</div>
					<div class="form-group text-left">
						<label for="telefone">Telefone:</label>
						<input type="number" class="form-control" id="cpf" placeholder="0000-00000" name="telefone" value="<?php echo htmlspecialchars($telefone) ?>" required>
					</div>
					<div class="form-group text-left">
						<label for="senha">Senha:</label>
						<input type="password" class="form-control" id="senha" placeholder="***********" name="senha" value="<?php echo htmlspecialchars($senha) ?>" required>
					</div>
					<button type="submit" class="btn btn-primary">Salvar alterações</button>
				</form>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12 text-center mt-4">
				<a class="btn btn-danger" href="index.php">Voltar</a>
			</div>
		</div>
	</div>
</body>

</html>