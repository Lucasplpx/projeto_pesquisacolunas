
<h1>Digite E-mail ou Cpf do Usuario</h1>


<form method="get">

    <input type="text" name="campo" />
    <input type="submit" value="Pesquisar"/>

</form>

<hr/>

<?php

    if(!empty($_GET['campo'])){
        $campo = $_GET['campo'];

        try{
            $pdo = new PDO("mysql:dbname=projeto_pesquisacolunas;host=localhost", "root", "");
        }catch(PDOException $e){
            echo "ERRO: ".$e->getMessage();
            exit;
        }

        $sql = "SELECT * FROM usuarios WHERE email = :email OR cpf = :cpf";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $campo);
        $sql->bindValue(":cpf", $campo);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            echo 'Nome: '.$dado['nome'];
        }

    }

   

?>
