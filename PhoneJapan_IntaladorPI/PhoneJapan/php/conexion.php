<?php
include("configurationdb.php");
//Checking if we are into the OpenShift App
  if (isset($_ENV['OPENSHIFT_APP_NAME'])) {
    $db_user=$_ENV['OPENSHIFT_MYSQL_DB_USERNAME']; //Openshift db name OPENSHIFT_MYSQL_DB_USERNAME
    $db_host=$_ENV['OPENSHIFT_MYSQL_DB_HOST']; //Openshift db host OPENSHIFT_MYSQL_DB_HOST
    $db_password=$_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']; //Openshift db password OPENSHIFT_MYSQL_DB_PASSWORD
    $db_name=$database; //Openshift db name
  } else {
    if($username==null){
      header("Location: ./installation/index.php");
    }else{
      $db_user=$username; //my db user
      $db_host=$localhost; //my db host
      $db_password=$password; //my db password
      $db_name=$database; //my db name
    }
  }
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
   //TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
     header("Location: ./installation/index.php");
     printf("Connection failed: %s\n", $connection->connect_error);
     exit();

}else{
}
?>
