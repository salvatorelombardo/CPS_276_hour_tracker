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

    require_once '../classes/Validation.php';
    require_once '../classes/Pdo_methods.php';
    require_once '../classes/General.php';

    $validate = new Validation();

    $i=0;
    $error=false;

    while($i < count($dataObj->elements)){
		if(!$validate->validate($dataObj->elements[$i]->regex, $dataObj->elements[$i]->value)){
			$error = true;
			$dataObj->elements[$i]->status = 'error';
		}
		$i++;
	}
	
	if($error){

       
		$dataObj->masterstatus = 'fielderrors';
		$data = json_encode($dataObj);
        echo $data;
        
        
	}else{

        
        $General = new General();
		$pdo = new PdoMethods();


        $sql = "INSERT INTO hour_log (job_date, job_hours, description) VALUES (:jobDate, :hours, :description)";


        $elementNames = array('jobDate^^str','hours^^str','description^^str');


        $bindings = $General->createBindedArray($elementNames, $dataObj);

        return;
        // $data = json_encode($bindings);
        // $dataObj = json_encode($dataObj);
        // echo $data . $dataObj;
        $result = $pdo->otherBinded($sql, $bindings);


        $data = json_encode($result);
        // $dataObj = json_encode($dataObj);
        echo $data;


        return;


        if($result = 'noerror'){
            $response = (object) [
                'masterstatus' => 'success',
                'msg' => 'The account has been added',
            ];
            echo json_encode($response);

        }
        else {
            $response = (object) [
                'masterstatus' => 'error',
                'msg' => 'There was a problem adding the job hours',
            ];
            echo json_encode($response);
        }

        return;

    }   
}

?>