<?php 

function loginPage(){

    $pageData['base'] = "";
    $pageData['title'] = "Login Page";
    $pageData['heading'] = "Hour Tracker Login Page";
    $pageData['nav'] = false;
    // $pageData['content'] = file_get_contents('views/admin/add_view_hours.html');
    $pageData['content'] = file_get_contents('views/admin/login.html');
    $pageData['js'] = "Util^login";
    $pageData['security'] = false;

    return $pageData;

}

?>