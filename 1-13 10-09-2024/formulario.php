<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário do Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'menu.php'; menu('formulario.php'); ?>
    <div class="container mt-4">
        <h1>Formulário de Cadastro de Aluno</h1>
        <form action="recebe.php" method="post">
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nascimento" class="col-sm-2 col-form-label">Data de Nascimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="nascimento" name="nascimento" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="curso" class="col-sm-2 col-form-label">Curso</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="curso" name="curso" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="altura" class="col-sm-2 col-form-label">Altura (cm)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="altura" name="altura" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
