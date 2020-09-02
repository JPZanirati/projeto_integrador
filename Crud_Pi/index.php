<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Cadastro de usuários</title>
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
			<div class="col-sm-12 col-md-6 col-lg-6">
				<p class="text-success">Bem vindo</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<h2>Lista de Professores</h2>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 text-right">
				<div class="btn-group mr-2" role="group" aria-label="Primeiro grupo">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal_prof">Cadastro de Professores</button>
				</div>
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal_aluno">Cadastro de Alunos</button>
				<!-- The Modal -->
				<div class="modal fade" id="myModal_prof">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Cadastro de Professores</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								<form method="POST" action="actions.php" class="was-validated">
									<input type="hidden" name="acao" value="cadastrar">
									<input type="hidden" name="table" value="prof">
									<input type="hidden" name="id_turma" value="5">
									<div class="form-group text-left">
										<label for="nome">Nome:</label>
										<input type="text" class="form-control" id="nome_prof" placeholder="Nome do Professor" name="nome_prof" required>
									</div>
									<div class="form-group text-left">
										<label for="cpf">CPF:</label>
										<input type="number" class="form-control" id="cpf" placeholder="00000000000" name="cpf" required>
									</div>
									<div class="form-group text-left">
										<label for="telefone">Telefone:</label>
										<input type="number" class="form-control" id="telefone" placeholder="0000-00000" name="telefone" required>
									</div>
									<div class="form-group text-left">
										<label for="senha">Senha:</label>
										<input type="password" class="form-control" id="senha" placeholder="***********" name="senha" required>
									</div>
									<button type="submit" class="btn btn-primary" href="cadastra.php">Cadastrar</button>
								</form>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
				<!-- The Modal -->
				<div class="modal fade" id="myModal_aluno">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Cadastro de Alunos</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								<form method="POST" action="actions.php" class="was-validated">
									<input type="hidden" name="acao" value="cadastrar">
									<input type="hidden" name="table" value="aluno">
									<input type="hidden" name="id_turma" value="5">
									<div class="form-group text-left">
										<label for="nome">Nome:</label>
										<input type="text" class="form-control" id="nome_aluno" placeholder="Nome do Aluno" name="nome_aluno" required>
									</div>
									<div class="form-group text-left">
										<label for="cpf">CPF:</label>
										<input type="text" class="form-control" id="cpf" placeholder="00000000000" name="cpf" required>
									</div>
									<div class="form-group text-left">
										<label for="telefone">Telefone:</label>
										<input type="fone" class="form-control" id="telefone" placeholder="0000-00000" name="telefone" required>
									</div>
									<div class="form-group text-left">
										<label for="senha">Senha:</label>
										<input type="password" class="form-control" id="senha" placeholder="***********" name="senha" required>
									</div>
									<button type="submit" class="btn btn-primary" href="cadastra.php">Cadastrar</button>
								</form>
							</div>
							<!-- Modal footer -->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		if (isset($_GET['cadastro'])) {
			if ($_GET['cadastro'] == "sucesso") {
				echo '<p class="text-success">Cadastro realizado com sucesso</p>';
			} else if ($_GET['cadastro'] == "erro") {
				echo '<p class="text-danger">Erro ao realizar cadastro</p>';
			}
		}
		if (isset($_GET['excluir'])) {
			if ($_GET['excluir'] == "sucesso") {
				echo '<p class="text-success">Conta excluida com sucesso</p>';
			} else if ($_GET['excluir'] == "erro") {
				echo '<p class="text-danger">Erro ao realizar a exclusão</p>';
			}
		}
		if (isset($_GET['edita'])) {
			if ($_GET['edita'] == "sucesso") {
				echo '<p class="text-success">Conta editada com sucesso</p>';
			} else if ($_GET['edita'] == "sem_alteracao") {
				echo '<p class="text-warning">Não houve alteração na conta</p>';
			} else if ($_GET['edita'] == "erro") {
				echo '<p class="text-danger">Erro ao editar conta</p>';
			}
		}
		?>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Professor</th>
					<th>CPF</th>
					<th>Telefone</th>
					<th>Idioma</th>
					<th class="text-center">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
				try {
					require_once('conexao.php');
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query = $conn->prepare("SELECT * FROM pi_prof Join pi_turma on pi_prof.id_turma = pi_turma.id_turma");
					$query->execute();
					if ($query->rowCount() > 0) {
						$resultado = $query->fetchAll(PDO::FETCH_OBJ);
						foreach ($resultado as $indice => $prof) {
							echo '<tr>
								<td>' . $prof->id_prof . '</td>
								<td>' . $prof->nome_prof . '</td>
								<td>' . $prof->cpf . '</td>
								<td>' . $prof->telefone . '</td>
								<td>' . $prof->idioma . '</td>
								<td class="text-center">
								<a href="editar_prof.php?id_prof=' . $prof->id_prof . '" title="Editar"><i class="fa fa-pencil"></i></a>
								<a href="excluir_prof.php?id_prof=' . $prof->id_prof . '" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>';
						}
						echo '</td>
							</tr>';

						echo "</table>";
					} else {
						echo "Nenhuma contas encontrada!";
					}
				} catch (PDOException $e) {
					echo "Mensagem de erro:" . $e->getMessage();
				}
				?>
			</tbody>
		</table>
		<br>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<h2>Lista de Alunos</h2>
			</div>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Aluno</th>
					<th>CPF</th>
					<th>Telefone</th>
					<th>Idioma</th>
					<th class="text-center">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
				try {
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query = $conn->prepare("SELECT * FROM pi_aluno Join pi_turma on pi_aluno.id_turma = pi_turma.id_turma");
					$query->execute();
					if ($query->rowCount() > 0) {
						$resultado = $query->fetchAll(PDO::FETCH_OBJ);
						foreach ($resultado as $indice => $aluno) {
							echo '<tr>
								<td>' . $aluno->id_aluno . '</td>
								<td>' . $aluno->nome_aluno . '</td>
								<td>' . $aluno->cpf . '</td>
								<td>' . $aluno->telefone . '</td>
								<td>' . $aluno->idioma . '</td>
								<td class="text-center">
								<a href="editar_aluno.php?id_aluno=' . $aluno->id_aluno . '" title="Editar"><i class="fa fa-pencil"></i></a>
								<a href="excluir_aluno.php?id_aluno=' . $aluno->id_aluno . '" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>';
						}

						echo '</td>
							</tr>';

						echo "</table>";
					} else {
						echo "Nenhuma contas encontrada!";
					}
					$conn = null;
				} catch (PDOException $e) {
					echo "Mensagem de erro:" . $e->getMessage();
				}
				?>
			</tbody>
		</table>
	</div>
</body>

</html>