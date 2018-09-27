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

        // return;
        // $data = json_encode($bindings);
        // $dataObj = json_encode($dataObj);
        // echo $data . $dataObj;
        $result = $pdo->otherBinded($sql, $bindings);


        // $data = json_encode($result);
        // $dataObj = json_encode($dataObj);
        // echo $data;


        // return;


        if($result = 'noerror'){
            $response = (object) [
                'masterstatus' => 'success',
                'msg' => 'The account has been added',
            ];


            // $sql = "SELECT * FROM hour_log"
            // echo json_encode($response);


            viewHoursTable('getJobHourTable');

        }
        else {
            $response = (object) [
                'masterstatus' => 'error',
                'msg' => 'There was a problem adding the job hours',
            ];
            echo json_encode($response);
        }

        // return;

    }   
}


function viewHoursTable($dataObj){

    require_once '../classes/Pdo_methods.php';
    require_once '../classes/General.php';
    

    //   $General = new General();
        $pdo = new PdoMethods();
        
        // $sql = "SELECT * FROM hour_log (job_date, job_hours, description) VALUES (:jobDate, :hours, :description)";
        $sql = "SELECT id , job_date , job_hours , description FROM hour_log";

        $records = $pdo->selectNotBinded($sql);
       

            if($records == 'error'){
                echo 'There has been and error processing your request';
            }else{

            if(count($records!=0)){

                $table="";

            $table.='<table id="editDeleteTable" class="table table-hover table-sm table-striped">';
                    $table.='<figure>Hour Tracker</figure><thead><tr><th style="width:45%">Description</th><th>Job Date</th><th>Job Hours</th><th>Edit Hours</th><th>Delete Hours</th></tr></thead><tbody>';

                    foreach($records as $row){

                        $table.="<tr><td> ".$row["description"]."</td>";
                            $table.="<td class='align-middle'>".$row["job_date"]."</td>";
                            $table.="<td class='align-middle text-center'>".$row["job_hours"]."</td>";
                            $table.='<td class="align-middle" ><button value="Edit" class="btn btn-block btn-sm" type="button" id="E'.$row["id"].'" data-action="edit">Edit Hours</button></td>';
                            $table.='<td class="align-middle" ><button value="Delete" class="btn btn-danger btn-block btn-sm btn-sm" type="button" id="D'.$row["id"].'" data-action="delete">Delete Hours</button></td></tr>';
                    }
                    $table.='</tbody></table>';
                    echo $table;
                        }
    }
}

function deleteTableRow($dataObj){


    require_once '../classes/Pdo_methods.php';
    
    /*function console_log($data){
            
        echo '<script>';
            echo 'console.log('.json_encode($data).')';
            echo '</script>';}
        
        console_log($dataObj);*/

        
        $pdo = new PdoMethods();
        
        $sql = "DELETE FROM hour_log WHERE id=:id";


	    $bindings = array(
		array(':id',$dataObj->id,'int'),
	    );

        $records = $pdo->selectBinded($sql, $bindings);

        if($result = 'noerror'){

            $object = (object) [
                'masterstatus' => 'success',
                'msg' => 'Record Deleted'
            ];
            // viewHoursTable('getJobHourTable');

            // echo json_encode($object);
        }
        else {
            $object = (object) [
                'masterstatus' => 'error',
                'msg' => 'Could not delete record'
            ];
            // echo json_encode($object);
        }
        
        


        
    

}
         



?>