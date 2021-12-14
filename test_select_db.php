<?php
include('include/nav.php');
?>

<?php
    $select_db_query = "show databases like 'souq%';";
    $select_db_execute = mysqli_query($con , $select_db_query);
    while($row = mysqli_fetch_row($select_db_execute)){
        echo $row[0] . "<br>";
    }
    if(isset($_POST['open_db']) && isset($_POST['selected_database'])){
        $selected_database = $_POST['selected_database'];
        update_value_in_config('database' , $selected_database);
        //echo "<script>window.open('#')</script>";
    }
?>

<?php
include('include/footer.php');
?>