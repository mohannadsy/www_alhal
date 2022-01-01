<?php
include('include/nav.php');
?>

<style>

</style>

<a href="open_file.php">Open File</a> <br>
<a href="test_blank.php">Test Blank</a> <br>
<a href="account_card.php">Acocunt Card</a>


<br><br>
<form action="" method="post">
    <button class="btn btn-secondary" type="submit" name="TRUNCATE_DB"> TRUNCATE DB</button>
    <button class="btn btn-secondary" type="submit" name="RESET_auto_increment_DB">RESET auto increment DB</button>
    <button class="btn btn-secondary" type="submit" name="insert_main_accounts_DB">insert main accounts DB</button>
    <button class="btn btn-secondary" type="submit" name="backup_DB">backup DB</button>
    <button class="btn btn-danger" type="submit" name="drop_tables_DB">drop tables DB</button>
</form>
<?php
if (isset($_POST['TRUNCATE_DB'])) {
    truncate_all_tables($con);
}
if(isset($_POST['RESET_auto_increment_DB'])){
    reset_auto_increment_all_tables($con);
}
if(isset($_POST['insert_main_accounts_DB'])){
    insert_main_accounts($con);
}
if(isset($_POST['backup_DB'])){
        backup($con , get_value_from_config('database'));
}
if(isset($_POST['drop_tables_DB'])){
    drop_all_tables($con);
}
// import_database_tables($con, get_value_from_config('sql_path'));
?>



<script>

</script>

<?php
include('include/footer.php');
?>