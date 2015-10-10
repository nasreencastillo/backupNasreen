 <?php include("..\connect.php"); 
   echo"nas";
    if(isset( $_POST['posit'] )  && isset( $_POST['addr']) ){
      echo"nas";
    $position = mysql_real_escape_string($_POST['posit']);
    $address = mysql_real_escape_string($_POST['addr']);
      $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tbladdress values('1', '$address', '$position')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
    }
    else{
      echo"rons";
    }
    ?>