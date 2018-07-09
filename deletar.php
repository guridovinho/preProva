<!-- QUESTÃO 03 --
            Crie uma página que com um ‘id’ recebido por GET, apague um registro do banco, apresentando uma mensagem de sucesso ou um erro caso não consiga excluir.


-->
<!DOCTYPE html>
<html>
<head>
    <title>DELETE | deletar</title>
</head>
<body>
<?php  
        //Esses dois nao falo mais
        require 'db.php';

        $conn = conectar_banco();

        //Pegando o id via GET

        $id = $_GET['id'];

        
        $stmt = $conn->prepare("DELETE FROM contatos WHERE id = :id");

     
        $stmt->bindParam(':id', $id);

        $stmt->execute();
      

        $linhas_deletadas = $stmt->rowCount();

        ?>


        <?php if ($linhas_deletadas < 1): ?>
            <center>
                <h1>Erro durante o delete</h1>
                <br><br>
                <a href="index.php">Voltar</a>
            </center>
        <?php else: ?>
            <center>
                <h1>Registro deletado com sucesso</h1>
                <br><br>
                <a href="index.php">Voltar</a>
            </center>    
        <?php endif ?>

</body>
</html>
