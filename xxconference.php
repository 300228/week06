<?php include 'header.php'; ?>
<?php
if ($_POST){
  $program_price = array("1"=>150, "2"=>100, "3"=>60, "N/A"=>0);
  //new syntax in php 7
  $programlist = $_POST["program"]?? ["N/A"];
  $name = $_POST["name"]??"N/A";
  $price = 0;
  foreach( $programlist as $program ) {
    $price += $program_price[$program];

  }
  echo '<div class="alert alert-primary" role="alert">'
    . htmlspecialchars($name) . '，您要繳交 ' . $price . ' 元'
    . '</div>';
}
else {
  header("Location: conference.html");
}
?>
<?php include('footer.php'); ?>
