<?php 

function addViewHours(){

    $pageData['base'] = "../";
    $pageData['title'] = "Add & View Hours";
    $pageData['heading'] = "Add & View Hours";
    $pageData['nav'] = true;
    $pageData['content'] = file_get_contents('views/admin/add_view_hours.html');
    $pageData['js'] = "Util^general^addViewHours";
    $pageData['security'] = false;
    


    return $pageData;  
}

function addHours($dataObj){


}


?>