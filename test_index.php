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
    <button class="btn btn-danger" type="submit" name="reset_souq">RESET souq DB</button>
</form>
<?php
if (isset($_POST['reset_souq'])) {
    // reset_auto_increment_all_tables($con);

    backup($con , get_value_from_config('database'));

    // drop_all_tables($con);
    // import_database_tables($con, get_value_from_config('sql_path'));
}
?>



<script>

</script>

<?php
include('include/footer.php');
?>