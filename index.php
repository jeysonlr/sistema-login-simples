<?php
header('Content-Type: text/html; charset=utf-8; lang="pt-br"');
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){
    echo "Área Restrita...";
} else {
    header("location: login.php");
}
echo '<a href="logout.php?token='.md5(session_id()).'">Sair</a>';
// sim, MD5 é seguro suficiente nesse contexto (e é apenas exemplo).
?>