<?php

$dataObj = $_POST['data'];

/* IF THERE IS A FILE INCLUDED THEN GRAB THE FILE ARRAY */
$file = $_FILES;

$dataObj = json_decode($dataObj);

/*function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  console_log($dataObj);*/



switch($dataObj->flag){
    case 'login':require '../controller/login.php'; login($dataObj); break;
    case 'addViewHours':require '../controller/add_view_hours.php'; addHours($dataObj);break;
}

?>