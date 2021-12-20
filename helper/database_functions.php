<?php

function backup($con, $database)
{
    $sql = "SHOW TABLES";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }
    $sqlScript = "";
    foreach ($tables as $table) {
        // Prepare SQLscript for creating table structure
        $query = "SHOW CREATE TABLE $table";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $sqlScript .= "\n\n" . $row[1] . ";\n\n";
        $query = "SELECT * FROM $table";
        $result = mysqli_query($con, $query);
        $columnCount = mysqli_num_fields($result);
        // Prepare SQLscript for dumping data for each table
        for ($i = 0; $i < $columnCount; $i++) {
            while ($row = mysqli_fetch_row($result)) {
                $sqlScript .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $columnCount; $j++) {
                    $row[$j] = $row[$j];
                    if (isset($row[$j])) {
                        $sqlScript .= '"' . $row[$j] . '"';
                    } else {
                        $sqlScript .= '""';
                    }
                    if ($j < ($columnCount - 1)) {
                        $sqlScript .= ',';
                    }
                }
                $sqlScript .= ");\n";
            }
        }

        $sqlScript .= "\n";
    }

    if (!empty($sqlScript)) {
        // Save the SQL script to a backup file
        $backup_file_name = "backups/" . $database . '_backup_' . time() . '.sql';
        $fileHandler = fopen($backup_file_name, 'w+');
        $number_of_lines = fwrite($fileHandler, $sqlScript);
        fclose($fileHandler);
    }
}

function backup_to_file($con, $database)
{

    $sql = "SHOW TABLES";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }
    $sqlScript = "";
    foreach ($tables as $table) {
        // Prepare SQLscript for creating table structure
        $query = "SHOW CREATE TABLE $table";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        $sqlScript .= "\n\n" . $row[1] . ";\n\n";
        $query = "SELECT * FROM $table";
        $result = mysqli_query($con, $query);
        $columnCount = mysqli_num_fields($result);
        // Prepare SQLscript for dumping data for each table
        for ($i = 0; $i < $columnCount; $i++) {
            while ($row = mysqli_fetch_row($result)) {
                $sqlScript .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $columnCount; $j++) {
                    $row[$j] = $row[$j];
                    if (isset($row[$j])) {
                        $sqlScript .= '"' . $row[$j] . '"';
                    } else {
                        $sqlScript .= '""';
                    }
                    if ($j < ($columnCount - 1)) {
                        $sqlScript .= ',';
                    }
                }
                $sqlScript .= ");\n";
            }
        }

        $sqlScript .= "\n";
    }

    if (!empty($sqlScript)) {
        // Save the SQL script to a backup file
        $backup_file_name = "backups/" . $database . '_backup_' . time() . '.sql';
        $fileHandler = fopen($backup_file_name, 'w+');
        $number_of_lines = fwrite($fileHandler, $sqlScript);
        fclose($fileHandler);
        // Download the SQL backup file to the browser
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backup_file_name));
        ob_clean();
        flush();
        readfile($backup_file_name);
        exec('rm ' . $backup_file_name);
    }
}

function show_message_create($test)
{
    $success_msg = "تم انشاء قاعدة البيانات بنجاح";
    $error_msg = "لم يتم انشاء قاعدة البيانات. قم بتغيير اسم قاعدة البيانات";
    if ($test)
        echo "<script>alert('$success_msg')</script>";
    else
        echo "<script>alert('$error_msg')</script>";
}


function import_database_tables($con, $filePath)
{
    // Connect & select the database

    // Temporary variable, used to store current query
    $templine = '';

    // Read in entire file
    $lines = file($filePath);

    $error = '';

    // Loop through each line
    foreach ($lines as $line) {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '') {
            continue;
        }

        // Add this line to the current segment
        $templine .= $line;

        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';') {
            // Perform the query
            if (!$con->query($templine)) {
                $error .= 'Error importing query "<b>' . $templine . '</b>": ' . $con->error . '<br /><br />';
            }

            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error) ? $error : true;
}


function create_database($con, $db_name)
{
    $sql_path = get_value_from_config('sql_path');
    $host = get_value_from_config('host');
    $user = get_value_from_config("user");
    $pass = get_value_from_config("pass");
    $db_query = "create database $db_name;";
    $db_execute = mysqli_query($con, $db_query);
    show_message_create($db_execute);
    update_value_in_config('database', $db_name);
    $con = mysqli_connect($host, $user, $pass, $db_name) or die('Connection Failed');
    import_database_tables($con, $sql_path);
}

function show_message_drop($test)
{
    $success_msg = "تم حذف قاعدة البيانات بنجاح";
    $error_msg = "لم يتم حذف قاعدة البيانات";
    if ($test)
        echo "<script>alert('$success_msg')</script>";
    else
        echo "<script>alert('$error_msg')</script>";
}

function drop_database($con, $db_name)
{
    $db_query = "drop database $db_name;";
    if ($db_name == "souq")
        echo "<script>alert('لا تستطيع حذف قاعدة البيانات الاساسية')</script>";
    else {
        $db_execute = mysqli_query($con, $db_query);
        update_value_in_config('database', 'souq');
        show_message_drop($db_execute);
    }
}


function reset_auto_increment_all_tables($con){
    $select_tables_query = "show tables";
    $select_tables_exec = mysqli_query($con , $select_tables_query);
    while($table = mysqli_fetch_row($select_tables_exec)){
        $query = resetAutoIncrement($table[0]);
        $query_exec = mysqli_query($con , $query);
    }
}

function drop_all_tables($con){
    $select_tables_query = "show tables";
    $select_tables_exec = mysqli_query($con , $select_tables_query);
    while($table = mysqli_fetch_row($select_tables_exec)){
        $query = "drop table $table[0]";
        $query_exec = mysqli_query($con , $query);
    }
}


