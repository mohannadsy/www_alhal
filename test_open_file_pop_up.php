<!--Trigger-->
<?php
include('include/nav.php')
?>

<style>
    body{
  height: 100vh;
  text-align: center;
}
  /*Trigger Button*/
.login-trigger {
  font-weight: bold;
  color: #fff;
  background: linear-gradient(to bottom right, #B05574, #F87E7B);
  padding: 15px 30px;
  border-radius: 30px;
  position: relative; 
  top: 50%;
}

/*Modal*/
h4 {
  font-weight: bold;
  color: #fff;
}
.close {
  color: #fff;
  transform: scale(1.2)
}
.modal-content {
  font-weight: bold;
  background: linear-gradient(to bottom right,#F87E7B,#B05574);
}
.form-control {
  margin: 1em 0;
}
.form-control:hover, .form-control:focus {
  box-shadow: none;  
  border-color: #fff;
}
.username, .password {
  border: none;
  border-radius: 0;
  box-shadow: none;
  border-bottom: 2px solid #eee;
  padding-left: 0;
  font-weight: normal;
  background: transparent;  
}
.form-control::-webkit-input-placeholder {
  color: #eee;  
}
.form-control:focus::-webkit-input-placeholder {
  font-weight: bold;
  color: #fff;
}
.login {
  padding: 6px 20px;
  border-radius: 20px;
  background: none;
  border: 2px solid #FAB87F;
  color: #FAB87F;
  font-weight: bold;
  transition: all .5s;
  margin-top: 1em;
}
.login:hover {
  background: #FAB87F;
  color: #fff;
}
</style>

<a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Login</a>

<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog" style="min-width: 1000px">

    <div class="modal-content" style="min-height: 600px;"> 
      <div class="modal-body">
        <button onclick="" data-dismiss="modal" class="close">&times;</button>
        <h4>Item Account Card</h4>
        <iframe id="iframe" src="item_card.php#form" frameborder="0" style="min-width: 900px;min-height: 500px;"></iframe>
      </div>
    </div>
  </div>  
</div>

<?php
include('include/footer.php');
?>
    <script>
      $('iframe').load(function(){
        $('iframe').contents().find('#nav').hide();
      });
    </script>