<!-- QUESTÃO 01 -- PARTE 02
        Crie também o PHP que faz a conexão com o banco de dados 
-->

<?php 

function conectar_banco() 
    {
        $servername = "localhost"; // origem do servidor (se fosse externo, seria uma URL)
        $username = "root";
        $password = "";
        //Aqui eu criei o DB prova antes, com o arquivo fornecido pelo Professor Everton
        $db = "prova"; //determinando qual arquivo de db

        try 
        {
            $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //aqui eu usei OBJETOS no bd, pra isso a linha de baixo
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            //$conn é sobre a conexao e é super impportante para o código todo

            return $conn; 
        }

        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
