

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert to Arabic</title>
</head>

<body>
    <?php

function convert_number_to_arabic_text($num){
  require 'vendor/autoload.php';
  $obj = new \ArPHP\I18N\Arabic();
  echo $obj->int2str($num).' ليرة سورية فقط لا غير' ;
}
    ?>

    <form action="?" method="POST">
<label> inter number</label>
        <input type="number" name="num">
        <input type="submit" name="button1"
                class="button" value="Convert" />
          
<p>   

<?php 

if(array_key_exists('num', $_POST)) {
  convert_number_to_arabic_text(intval($_POST['num']));
}

?>

</p>


</form>
</body>

</html>