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

    function convert_db_to_json($tbl, $our_file)
    {

        $connect_to_db = mysqli_connect("localhost", "root", "", "souq");
        $table_content = "select * from " . $tbl;
        $results = mysqli_query($connect_to_db, $table_content);
        $json_file = array();
        while ($item = mysqli_fetch_assoc($results)) {
            $json_file[] = $item;
        }

        $our_file = json_encode($json_file, JSON_UNESCAPED_UNICODE);
        echo "<pre>";
        print_r($our_file);
        echo "</pre>";


        if (file_put_contents("db_to_json.json", $our_file))
            echo "JSON file created successfully...";
        else
            echo " Error ...";
    }
    if (isset($_POST['btn'])) {
        convert_db_to_json('accounts', 'db_to_json.json');
    }
    ?>

    <form action="?" method="POST">

        <p> <button name="btn">Convert</button> </p>


    </form>
</body>

</html>