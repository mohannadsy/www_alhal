<?php
include('include/nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.button-63 {
    align-items: center;
    background-image:linear-gradient(144deg,#90a4ae, #607d8b 50%,#78909c);
    border: 0;
    border-radius: 8px;
    box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
    box-sizing: border-box;
    color: #212121;
    display: flex;
    font-family: Phantomsans, sans-serif;
    font-size: 20px;
    justify-content: center;
    line-height: 1em;
    max-width: 100%;
    min-width: 140px;
    padding: 19px 24px;
    text-decoration: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    white-space: nowrap;
    cursor: pointer;
    }
    .button-63:active,
    .button-63:hover {
    outline: 0;
}

@media (min-width: 768px) {
.button-63 {
    font-size: 24px;
    min-width: 196px;
  }
}



        body {
            text-align: right;
            background-color: #b0bec5;
        }

        .container {
            background-color: #fbe9e7;
            border-style: groove;
            margin-top: 5%;
        }

        #res_number {
            column-width: 50px;
        }
    </style>
</head>
<body>
<div class="col-3" id="receipt_number1">
        <div class="row justify-content-center" style="padding-top: 10px;">
            <h2> حول البرنامج </h2>
        </div>
</div>
    <div class="container">
        <div class="col-md-5" id="receipt_number">
            <div class="row justify-content-start" style="padding-top: 10px;">
            <br> 
            </div>
        </div>
    </div>
    
</body>
</html>


<?php
include('include/footer.php');
?>