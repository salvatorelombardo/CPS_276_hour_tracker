<?php 

function loginPage(){

    $pageData['base'] = "";
    $pageData['title'] = "Login Page";
    $pageData['heading'] = "Hour Tracker Login Page";
    $pageData['nav'] = false;
    $pageData['content'] = file_get_contents('views/admin/login.html');
    $pageData['js'] = false;
    $pageData['security'] = false;

    return $pageData;

}

?>