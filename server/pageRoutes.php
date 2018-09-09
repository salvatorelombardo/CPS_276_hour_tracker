<?php 

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = '';
}

switch($page){

    case "addViewHours" :require 'controller/add_view_hours.php'; $pageData = addViewHours(); break;
    case "logout":require 'controller/login.php'; $pageData = logout(); break;
    default: require 'controller/login.php'; $pageData = loginPage(); break;
}

?>