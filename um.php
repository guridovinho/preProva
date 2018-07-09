<!-- QUESTÃO 01 -- PARTE 01 e 03
        Crie um formulário em HTML para a inserção de dados na tabela.
        (...) e grava os dados, validando antes da inserção se os dados estão de acordo com a estrutura da tabela. (Valide se o campo for inteiro, se for data, se possui o tamanho máximo no caso do tipo string, ou seja, sempre que for pertinente de acordo com a estrutura da tabela acima)
-->

<!DOCTYPE html>
<html>
<head>
    <title>CREATE | inserir | Questão 01</title>
</head>
<body>

<!-- Um formulario tem que começar e terminar com a tag form
a na tag de abertura TEM QUE TER O METODO E O ACTION
O metodo que vamos usar é o POST, o GET será usado em outra pagina
O ACTION DIZ. Poderiamos enviar pra outra páginas ,mas vamos enviar pra propria pagina, por isso action = um.php -->

<form method="POST" action="um.php">
    <!-- Para cada campo do formulario vamos criar um INPUT BEM básico
    A estrutura genérica é:

    Nome do campo que vai aparecer pro usuario: <input type="text" name="nome do campo usado no php"><br>
    O nome perto do name vai em minisculo e sem acentuacao e cedilha
    E por ultimo usamos o atributo REQUIRED que faz com que o navegador impessa(?) que sistema prossiga sem 
    preencher esses campos

    LEMBRE DO NAME USADO PQ VAMOS USAR DEPOIS
     -->

    Nome: <input type="text" name="nome" required><br>
    Endereço: <input type="text" name="endereco" required><br>
    <!--No email mudamos o type pra email pq dai o navegador só aceita se tu usar um formato de email valido com @ e .com 
        Pra senhas é só por password ai ela nao aparece testa ai -->
    Email <input type="email" name="email" required><br>
    <!-- As datas em no MySQL usando o formato japones AAAA/MM/DD
        Podermos converter, mas não vamos, então LEMBRE DE NA HORA DE INSERIR OS DADOS USAR O FORMATO CERTO CARALHO-->
    Data de Nascimento: <input type="text" name="data_nascimento" required><br>

    <!-- AIN MAIS NA PROVA ELE PIDIU OTRA COISSA
        É só modificar a estrura, pro exemplo se ele pedir telefone você coloca
        Telefone <input type="text" name="telefone"><br>
        BAAAAAAAAARBADA
    
        Por ultimo vai o botão de enviar
        PS: Se der algum erro no php e pa, é só apertar F5 apos enviar o formulario pra reenviar ele sem precisa preenche-lo novamente
    -->
        <input type="submit" value="Salvar">

        <br>
        <br>

        <h4><a href="index.php">Página INICIAL | HOME</a></h4>
</form>

</body>
</html>

<?php 
//E agora josé?  Primeiro vamos resgatar o nosso amigo $conn
//Estamos dizendo pro PHP incluir esse arquivo, caso não o ache vai parar a porra toda ENTÃO NÃO ESQUEÇA DESSE CARA OU O PROGRAMA NÃO VAI FUNCIONAR E TU VAI RODAR E CHORAR
require 'db.php';

//Agora vem a magica, se não entendeu se fode ai jajaja MAS QUE BELO FILADAPUTA TEMOS AQUI, HÃÃN....
$conn = conectar_banco();

/*Vamos receber os dados do formulario, se usassemos as variaveis diretamenta ia dar um monte de erro
Coloquei um arquivo chamado errow.php pra mostrar o que aconteceria
Por que da erro? É que as variaveis $_POST recebem os dados do formulario, mas como elas vao receber dados
SE NENHUM FORMULARIO FOI ENVIADO PORRA
Portanto precisamos testar se algum dado foi enviado 
Como testamos uma coisa?
Sim, com ele o sr IF
*/
//Essa linha testa se a variavel nome existe, ela só vai existir se o usuario enviar um formulario uma vez que botamos 
//o REQUIRED no formulario 
if (isset($_POST['nome'])) {
//Usar $_POST em tudo é uma bosta, então vamos passar esses variaveis para outros mais "amigaveis"
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    //Viu que o nome da variavel é o mesmo que colocamos no NAME do input HTML, NEAH? NNEEEEEEEAAAAAAAAAHHHHHHHHHH???? *aAaAHHHHHHHHHH ENTENDI*


    /*Agora vamos inserir essa garotada ui *UUUUUIIII*
    A primeira linha é $stmt = $conn->prepare("QUERY");

    Um insert funciona assim: INSERT INTO nome_da_tabela(nomes_das_colunas) VALUES(valores)
    OS DADOS TEM QUE ESTAR NA MESMA ORDEM *Talkeii*

    Vamos um usar uma paradinha pra nos proteger de mysql injection e ficar mais melhor  de programar
    No query NÃO VAMOS USAR AS VARIAVEIS DIRETAMENTE, ao invés vamos usar :nome_da_coluna *saqueeei*

    */
    $stmt = $conn->prepare("INSERT INTO contatos(nome,endereco,email,data_nascimento) VALUES(:nome,:endereco,:email,:data_nascimento)");
    //*Ficou suuuuper tranquilo de entender** 
    //Agora asSIM vamos usar as variaveis
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':data_nascimento', $data_nascimento);

    //E executamos esse carinha
    $stmt->execute();

    //Pronto

}

?>
