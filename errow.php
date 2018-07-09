<!DOCTYPE html>
<html>
<head>
    <title>Prog Web</title>
</head>
<body>

<h1>Em caso de ERRO!</h1>

<form method="POST" action="um.php">


    Nome: <input type="text" name="nome"><br>
    Endereço: <input type="text" name="endereco"><br>
    Email <input type="text" name="email"><br>

    Data de Nascimento: <input type="text" name="data_nascimento"><br>

  
        <input type="submit" value="Salvar">
</form>

</body>
</html>

<?php 

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];

?>
