<!-- QUESTÃO 02 
        Crie uma página PHP para a listagem dos dados da tabela. A página deverá consultar o banco e exibir as informações utilizando uma tag “table” de forma correta. Lembre-se de colocar as tags de cabeçalho das colunas
-->
<?php 

require 'db.php';
$conn = conectar_banco();
$stmt = $conn->prepare("SELECT * FROM contatos");
$stmt->execute();
$contatos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>READ | exibir</title>
</head>
<body>
<br>
<center>
    <table border="2">
        <tr>
            <th>Nome</th>
            <th>Endereco</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Remover</th>
            <th>Editar</th>
        </tr>

    <?php foreach ($contatos as $contato): ?>
       
            <td><?=$contato->Nome?></td>
            <td><?=$contato->Endereco?></td>
            <td><?=$contato->Email?></td>
            <td><?=$contato->Data_Nascimento?></td>
            
            <td><a href="deletar.php?id=<?=$contato->Id?>">Remover</a></td>
            <td><a href="editar.php?id=<?=$contato->Id?>" target="_blank">Editar</a></td>
        </tr>
        
    <?php endforeach ?>
    </table>
    <br><br>
    <h4><a href="index.php">Página INICIAL | HOME</a></h4>
</center>
    
</body>
</html>
