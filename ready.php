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
  background-image:linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
  border: 0;
  border-radius: 8px;
  box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
  box-sizing: border-box;
  color: #FFFFFF;
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

    </style>
</head>
<body>
    <div>
        <button class="button-63" role="button" onclick = "window.open('com_bill.php' , '_self')">فاتورة جديدة</button>
    </div>
    <div>
        <button class="button-63" role="button" onclick = "window.open('account_card.php' , '_self')">حساب جديد</button>
    </div>
    <div>
        <button class="button-63" role="button" onclick = "window.open('payment_bonds.php' , '_self')">سند دفع</button>
    </div>
    <div>
        <button class="button-63" role="button" onclick = "window.open('catch_bonds.php' , '_self')">سند قبض</button>
    </div>
    <div>
        <button class="button-63" role="button" onclick = "window.open('item_card.php' , '_self')">إضافة مواد</button>
    </div>
    


</body>
</html>

<?php
include('include/footer.php');
?>