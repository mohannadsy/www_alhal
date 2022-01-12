<?php
include 'include/nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
*{  box-sizing: border-box;

   }
   span {
    text-align: center;
    margin: 15%;
    font-size: large;
    font-weight: 700;
    color: #0fcb3aba;
    font-size: x-large; 
       font-family: cursive;
  
}

.container {
    display: grid;
    max-width: 80%;
    max-height: 50%;
    padding: 0px;
    margin: 100px 80px 70px 80px;
}
a {
    max-width: 50%;
    color: #0c0d0f;
    text-decoration: none;
    /* background-color: #d7ecf0; */
    -webkit-text-decoration-skip: objects;
}
.row {
    margin: auto;
    width: 90%;
    max-height: 100%;
    display: inline-flex;
}
.item_in_col {
    display: flex;
    width: 100%;
    padding: auto;
    margin: 15px 14px;
    display: block;
    padding: 7px;
    font-size: larger;
    color: #54677b;
}

.col-md-4 {
  
    align-content: stretch;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 30.0;
    max-width: 50%;
    margin: 40px;
    margin-bottom: 0px;
    padding: 40px;
    max-width: 20%;
    height: 70%;
    display: inline-block;
    background-color: aliceblue;
    padding-bottom: 0px;
    border-radius: 70px;
    max-width: 20%
} 

.img {
    width: 70%;
    height: 90px;
    border-radius: 45px;
    box-shadow: rgb(214 143 255 / 47%) 0 49px 25px -22px;
}
.center{
  text-align:center;
}
.img:active,
.img:hover {
  outline: 0;
}
.span:active,
.span:hover {
  outline: 0;
}
@media (min-width: 768px) {
  #img {
    font-size: 25px;
    justify-content: center;
  }
}
</style>

</head>
<body>
<div class="container">

<div class="row"> 
        <div class="col-md-2">
          <!-- first col  -->
              <span >  الملفات    </span>
              <br>   <br>  <br>   <br>
                <a href="<?= "open_file.php" ?>"   > 
                  <img  class="img"
                  src="assets/images/open_file.jfif"
                  />     <span class="item_in_col"> فتح ملف </span>
                </a>
                <br>   <br>
              
                <a href="<?= "open_file.php" ?>"   >  
                  <img  class="img"
                  src="assets/images/new_file.jfif"
                  />
                  <span class="item_in_col" >  ملف جديد  </span>
                </a> 
        </div>



        <div  class="col-md-2">
              <span> المواد  </span>
              <br>   <br>  <br>   <br>
                <a href="<?= "item_card.php" ?>"   > 
                  <img  class="img"
                  src="assets/images/item_card.jfif"
                /> <span class="item_in_col"> بطاقة مادة </span>
                </a>  
                <br>   <br>
              
                <a href="<?= "category_card.php" ?>"   > 
                  <img  class="img"
                  src="assets/images/category_card.png"
                  /> <span class="item_in_col"> بطاقة صنف </span>
                </a>
                <!-- <br>   <br>
                <a href="<?= "item_list.php" ?>"   > 
                  <img  class="img"
                  src="assets/images/items_list.jfif"/>
                  <span class="item_in_col"> قائمة المواد  </span>
                </a> -->
        </div>

        <div  class="col-md-2">
                <span> الحسابات  </span>
                <br>   <br>  <br>   <br>
                <a href="<?= "account_card.php" ?>"   > 
                    <img  class="img"
                    src="assets/images/account_card.jpg"
                    /> <span class="item_in_col"> بطاقة حساب   </span>
                  </a>  <br>   <br> 
                  <a href="<?= "accountStatement.php" ?>"   > 
                    <img  class="img"
                    src="assets/images/account_statement.png"
                    /> <span class="item_in_col"> كشف حساب    </span>
                  </a>
                   <!-- <br>   <br> -->
                  <!-- <a href="<?= "account_list.php" ?>"   > 
                    <img  class="img"
                    src="assets/images/account_list.png"
                      /><span class="item_in_col"> قائمة الحسابات     </span>
                  </a>  -->
        </div>
  

        <!-- </div>  -->


<!-- <div class="row"> -->

      <div  class="col-md-2"> 
          <span> الفواتير </span>
          <br>   <br>  <br>   <br>
          <a href="<?= "com_bill.php" ?>"   > 
              <img  class="img"
              src="assets/images/bill.jpg"
              /><span class="item_in_col"> فاتورة    </span>
            </a>   <br>   <br>

            <a href="<?= "bills_list.php" ?>"   > 
              <img  class="img"
              src="assets/images/items_list.jfif"
              /><span class="item_in_col"> قائمة الفواتير    </span>
            </a>  
      </div>

            
      <div  class="col-md-2">
          <span> السندات  </span>
          <br>   <br>  <br>   <br>
          <a href="<?= "payment_bonds.php" ?>"   > 
              <img  class="img"
              src="assets/images/payment_bond.png"
              /> <span class="item_in_col">   سند قبض  </span>
            </a>  <br>   <br>
            <a href="<?= "catch_bonds.php" ?>"   > 
              <img  class="img"
              src="assets/images/catch_bounds.jpg"
              />  <span class="item_in_col">  سند وصل    </span>
            </a> 
      </div>

      <div  class="col-md-2">
          <span> الحركات  </span> <br>   <br>  <br>   <br>
            <a href="<?= "report_item.php" ?>"   > 
              <img  class="img"
              src="assets/images/item_report.png"
              /><span class="item_in_col">   حركة مادة   </span>
            </a>   <br>   <br>
            <a href="<?= "report_commission.php" ?>"   > 
              <img  class="img"
              src="assets/images/commission_report.png"
              /> <span class="item_in_col">  حركة كومسيون    </span>
            </a> 
      </div>

</div>
<!-- </div> -->


</body>
</html>

<?php
include 'include/footer.php';
?>