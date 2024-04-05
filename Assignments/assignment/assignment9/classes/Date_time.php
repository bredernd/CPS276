<?php

require_once 'Pdo_methods.php';

class Date_time extends PdoMethods{

    public function checkSubmit(){

	    $getDateTime = isset($_POST['dateTime']) ? $_POST['dateTime'] : '';
	    $note = isset($_POST['notes']) ? $_POST['notes'] : '';
	    $date_time = strtotime($getDateTime);

        if(!$date_time || !$note){
            
            return "You did not enter all required fields.";
        }
        $date_time = date('Y-m-d H:i:s', strtotime($getDateTime));
		
		$pdo = new PdoMethods();

		$sql = "INSERT INTO noteTime (date_time, note) VALUES (:dtime, :fnote)";
		 
	    $bindings = [
			[':dtime',$date_time,'str'],
			[':fnote',$note,'str']
		];

		$result = $pdo->otherBinded($sql, $bindings);

		if($result === 'error'){
			return 'There was an error adding user input';
		}
		else {
			return 'Note has been added';
		}


	}

    public function getTable(){

        $getBDate = isset($_POST['begDate']) ? $_POST['begDate'] : '';
	    $getEDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';
	    $bDate =  strtotime($getBDate);
        $eDate =  strtotime($getEDate);

        $table = "";

        $pdo = new PdoMethods();

        $sql = "SELECT date_time, note FROM noteTime WHERE date_time BETWEEN :begDate AND :endDate ORDER BY date_time DESC";

        $bindings = [
			[':begDate',$bDate,'int'],
			[':endDate',$eDate,'int']
		];

        $result = $pdo->selectBinded($sql, $bindings);

        if($result === 'error'){
			return 'There has been and error processing your request';
		}
		else {
            if(is_array($result)){
                foreach($result as $key => $row){
                    $result[$key]['date_time'] = date("Y-m-d H:i:s", strtotime($row['date_time']));
                }
                return $this->makeTable($result);	
            }
            else {
                return 'no table found';
            }
        }

    }

   
    private function makeTable($result){
            $table = "<div class='table-responsive'>";
            $table .= "<table class='table table-bordered table-striped table-hover'><thead><tr>";
            $table .= "<th>Date and Time</th><th>Note</th></tr></thead><tbody>";

            $rowColor = 0;
        
            foreach ($result as $row) {
                $rowColorClass = ($rowColor % 2 == 0) ? 'even' : 'odd';
                $table .= "<tr class='$rowColorClass'>";
                $table .= "<td>{$row['date_time']}</td>";
                $table .= "<td>{$row['note']}</td></tr>";
                $rowColor++;
            }
            $table .= "</tbody></table></div>";
            return $table;
        }


}
?>