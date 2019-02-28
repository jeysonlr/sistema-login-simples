<?php
header('Content-Type: text/html; charset=utf-8; lang="pt-br"');
session_start();

if(isset($_POST['email']) && empty($_POST['email']) == false){
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $dsn = "mysql:dbname=blog;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try {
       $db = new PDO($dsn, $dbuser, $dbpass);

       $sql = $db->query("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'");

       if($sql->rowCount() > 0) {

        $dado = $sql->fetch();

        $_SESSION['id'] = $dado['id'];//salvando a sessao com id de ususrio conectado

        header("location: index.php");

       }

    } catch (PDOException $e) {
        echo "Conexão falhou!".$e->getMessage();
    }

}
?>
Página de Login! <br><br>
<form method="post">
    
    E-mail: <br>
    <input type="email" name= "email"> <br><br>

    Senha: <br>
    <input type="password" name= "senha"> <br><br>

    <input type="submit" value="Entrar">
</form>