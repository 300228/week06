<?php include 'header.php'; ?>
<?php 
if ($_POST){
  echo $_POST["name"],"<br/>";
  echo "Status:<br/>";
  
  //new syntax in php 7
  $statuslist = $_POST["status"]?? ["N/A"];
  
  foreach( $statuslist as $status ) {
    echo "$status <br/>";
  }
  
  $dinner = $_POST["dinner"]?? "";
  echo "$dinner <br/>";
}
else {
  header("Location: status.html");
}

?>




<?php include('footer.php'); ?>