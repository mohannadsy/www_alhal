

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert..</title>
</head>
<body>
<?php

function convert_db_to_json($tbl ,$our_file){
  
$connect_to_db = mysqli_connect("localhost", "root", "", "souq");
   
$our_file = file_get_contents("db_to_json.json");
$data = json_decode($our_file , true);
//   $odata = $data->student->name;
  foreach ($data as $item) {
                foreach($item as $key => $value) {
                    $sql_query = "INSERT INTO .$tbl. ( $key) VALUES ( $value )";
                }
            }
            echo $sql_query;
            if ($connect_to_db->query($sql_query) === TRUE) {
                echo "Converting Done  successfully...";
              }  }

              if (isset($_POST['btn'])) {
                convert_db_to_json('db_to_json.json','accounts');
            }
            ?>
 
<form action = "?" method = "POST">    
       <p> <button  name="btn" >Convert</button>  </p>
    </form>
</body>
</html>

