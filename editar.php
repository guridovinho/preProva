<!-- QUESTÃO 04 -- 
        Crie uma página de atualização de dados de um registro, recebendo o ‘id’ do registro por GET. A página deverá validar utilizando ‘JavaScript’ se os tipos de dados e tamanho dos campos estão ou não de acordo com o que será inserido no banco. Caso algum não esteja deve ser cancelado o envio do formulário e um texto em vermelho deve ser apresentado para o usuário.

-->

<?php 
require 'db.php';// id via GET de novo ja que URL é editar.php?id=X
$id = $_GET['id'];
$conn = conectar_banco();// UM select especifico
$stmt = $conn->prepare("SELECT * FROM contatos WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$contato = $stmt->fetch();?>
<!DOCTYPE html>
<html>
<head>
    <title>UPDATE | editar</title>
</head>
<body>
<!-- AQUI EU VOU EDITAR O CODIGO E DEIXAR TUDO MINUSCULO (Lembrar: método POST)
  -->
<form method="POST" action="editar.php?id=<?=$contato->Id?>">
   
    Nome: <input type="text" name="nome" required value="<?=$contato->Nome?>"><br>
    Endereço: <input type="text" name="endereco" required value="<?=$contato->Endereco?>"><br>
    Email <input type="email" name="email" required value="<?=$contato->Email?>"><br>
    Data de Nascimento: <input type="text" name="data_nascimento" required value="<?=$contato->Data_Nascimento?>"><br>
          <input type="submit" value="Salvar"><br><br>
        <a href="index.php">Ir para o INDEX | HOME</a>
</form>

</body>
</html>
<?php 
if (isset($_POST['nome'])) {

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    /*  UPDATE 
    Então: UPDATE tabela SET coluna = valor, outra_coluna = outro valor
    */

    $stmt = $conn->prepare("UPDATE contatos SET nome = :nome, endereco = :endereco, email = :email, data_nascimento = :data_nascimento WHERE id = :id");
    // Ai vem o bindzao da massa VRAU
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':id',$id);
    $stmt->execute();

    // Ai O AMIGO update/REFRESH
    header("Refresh:0");

    

}

?>