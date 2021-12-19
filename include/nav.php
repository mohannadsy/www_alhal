
<?php 
    include('css.php'); 
    @include('sql/connection.php');
    include('sql/sql_queries.php');
    include('helper/config_functions.php');
    include('helper/operation_functions.php');
    include('helper/database_functions.php');
    include('helper/javascript_functions.php');
    include('helper/ready_queries_functions.php');
?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">Home</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="test_index.php">Test</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="test_noor.php">Nour</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="test_sara.php">Sara</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="test_rgd.php">Raghad</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>