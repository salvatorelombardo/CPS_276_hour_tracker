<?php 

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = '';
}

switch($page){


    case "logout":require 'controller/login.php'; $pageData = logout(); break;
    default: require 'controller/login.php'; $pageData = loginPage(); break;
}

?>