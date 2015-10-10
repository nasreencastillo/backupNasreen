<?php
$memberid = 1; //edit na session ----
include("../connect.php");

  //get the foldername .. ----------------
  $foldernames ="";
  $urlname ="";
  $DB = new connectionDB;
  $DB->connecttoDB();
  $sql = " SELECT * FROM tblproperties where id =  '$memberid'";
  $DB->runquery($sql);
  if($row = $DB->result->fetch_assoc()){
    $foldernames =$row["foldername"];
    $urlname = $row["url"];
  }
  $DB->closeDB();
  unset($DB);

  //profile abouttttt===================================

  if (isset($_POST['Titleabout']) && isset($_POST['TitleDescript'])){
    $tit = mysql_real_escape_string($_POST['Titleabout']);
    $de = mysql_real_escape_string($_POST['TitleDescript']);
    $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblprofileabout set titleabout = '$tit' , aboutdesc = '$de' where id ='$memberid'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
     }

     //profile contanct
     
       if (isset($_POST['Contactdetail'])) {
       
        $cdet = mysql_real_escape_string($_POST['Contactdetail']);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "DELETE from tblprofilecontact  where id ='$memberid'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofilecontact  VALUES('$memberid', '$cdet')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
     
     }

     
     if (isset($_POST['ig']) && isset($_POST['fb']) && isset($_POST['tw']) && isset($_POST['gp'])  ){
        $ig = mysql_real_escape_string($_POST['ig']);
        $fb = mysql_real_escape_string($_POST['fb']);
        $tw = mysql_real_escape_string($_POST['tw']);
        $gp = mysql_real_escape_string($_POST['gp']);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblprofilesocial set url = '$ig' where id ='$memberid' and socialsite ='Instagram' ";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblprofilesocial set url = '$fb' where id ='$memberid' and socialsite ='Facebook' ";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblprofilesocial set url = '$tw' where id ='$memberid' and socialsite ='Twitter' ";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblprofilesocial set url = '$gp' where id ='$memberid' and socialsite ='Google Plus' ";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
     }


  //profilehome ----------------------------------------------------------------------------------

    $error = ''; 
    function compress_image($source_url, $destination_url, $quality)
     { $info = getimagesize($source_url); 
      if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url); 
      elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url); 
      elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url); imagejpeg($image, $destination_url, $quality); 
      return $destination_url; }


  if (isset($_FILES["filelogo"]) && isset($_POST["ags"]) && isset($_FILES["files"]))
  {
    $a = mysql_real_escape_string($_POST["coms"]);
    $b = mysql_real_escape_string($_POST["ags"]);


    if ($_FILES["filelogo"]["error"] > 0)
    { $error = $_FILES["filelogo"]["error"]; echo"nass";} 
    else if (($_FILES["filelogo"]["type"] == "image/gif") || ($_FILES["filelogo"]["type"] == "image/jpeg") || ($_FILES["filelogo"]["type"] == "image/png") || ($_FILES["filelogo"]["type"] == "image/pjpeg")) 
      { $url = '../profilefiles/'.$foldernames.'/homelogoimg.jpg'; 
    $filename = compress_image($_FILES["filelogo"]["tmp_name"], $url, 80); 
    $buffer = file_get_contents($url); 
     }
    else { $error = "Uploaded image should be jpg or gif or png"; 
      } 

   

    if ($_FILES["files"]["error"] > 0)
    { $error = $_FILES["files"]["error"];} 
    else if (($_FILES["files"]["type"] == "image/gif") || ($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/png") || ($_FILES["files"]["type"] == "image/pjpeg")) 
      { $url = '../profilefiles/'.$foldernames.'/homeimage.jpg'; 
    $filename = compress_image($_FILES["files"]["tmp_name"], $url, 80); 
    $buffer = file_get_contents($url); 
     }
    else { $error = "Uploaded image should be jpg or gif or png"; 
      } 
        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblprofilehome set companyname = ' $a' , tagline = '$b', logoimg = '/pccibatangas/profilefiles/$foldernames/homelogoimg.jpg' , backgroundimg = '/pccibatangas/profilefiles/$foldernames/homeimage.jpg' where id ='$memberid'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
        //echo $urlname;
        header("Location: profile/$urlname");
    }

    //profiletagline.php -----------------------------------------------------------------

    if (isset($_POST['profiletagline']) && isset($_FILES['filetagline'])){
      if ($_FILES["filetagline"]["error"] > 0)
    { $error = $_FILES["filetagline"]["error"];} 
    else if (($_FILES["filetagline"]["type"] == "image/gif") || ($_FILES["filetagline"]["type"] == "image/jpeg") || ($_FILES["filetagline"]["type"] == "image/png") || ($_FILES["filetagline"]["type"] == "image/pjpeg")) 
      { $url = '../profilefiles/'.$foldernames.'/taglineimage.jpg'; 
    $filename = compress_image($_FILES["filetagline"]["tmp_name"], $url, 80); 
    $buffer = file_get_contents($url); 
     }
    else { $error = "Uploaded image should be jpg or gif or png"; 
      } 

      $tags = mysql_real_escape_string($_POST['profiletagline']);   


        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblprofiletaglines set taglines = '$tags' , backimg = '/pccibatangas/profilefiles/$foldernames/taglineimage.jpg' where id ='$memberid'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        header("Location: profile/$urlname#profiletaglineedit");
     }



     //profileimportant people ---------------
    $ctrpip = 0;

     if (isset($_POST['counterpip'])) {

      $DB = new connectionDB;
      $DB->connecttoDB();
      $sqls = "DELETE FROM tblprofileimportant where id ='$memberid'";
      $DB->runquery($sqls);
      $DB->closeDB();
      unset($DB);


            $ctrpip = mysql_real_escape_string($_POST['counterpip']);

            for($bilanger = 0; $ctrpip>$bilanger; $bilanger++){
              if( $_POST['person'.($bilanger+1)]!="" || $_POST['position'.($bilanger+1)]!="" ){

                 if ($_FILES["filepip".($bilanger+1)]["error"] > 0)
                  { $error = $_FILES["filepip".($bilanger+1)]["error"];} 
                  else if (($_FILES["filepip".($bilanger+1)]["type"] == "image/gif") || ($_FILES["filepip".($bilanger+1)]["type"] == "image/jpeg") || ($_FILES["filepip".($bilanger+1)]["type"] == "image/png") || ($_FILES["filepip".($bilanger+1)]["type"] == "image/pjpeg")) 
                    { $url = '../profilefiles/'.$foldernames.'/pip'.($bilanger+1).'.jpg'; 
                  $filename = compress_image($_FILES["filepip".($bilanger+1)]["tmp_name"], $url, 80); 
                  $buffer = file_get_contents($url); 
                   }
                  else { $error = "Uploaded image should be jpg or gif or png"; 
                    } 

                    $posi = mysql_real_escape_string($_POST['position'.($bilanger+1)]);
                    $namimps = mysql_real_escape_string($_POST['person'.($bilanger+1)]);
                    $nas=0;
                    $nas = $bilanger+1;

                      $DB = new connectionDB;
                      $DB->connecttoDB();
                      $sqls = "INSERT INTO tblprofileimportant VALUES('$memberid', '$namimps' , '$posi' , '/pccibatangas/profilefiles/$foldernames/pip$nas.jpg')";
                      $DB->runquery($sqls);
                      $DB->closeDB();
                      unset($DB);
              }
            }
            header("Location: profile/$urlname#aboutUs");
     }




     //profileservices
      //profileimportant people ---------------
    $ctrserv = 0;

     if (isset($_POST['counterserv'])) {
      $DB = new connectionDB;
      $DB->connecttoDB();
      $sqls = "DELETE FROM tblprofileservices where id ='$memberid'";
      $DB->runquery($sqls);
      $DB->closeDB();
      unset($DB);


          $ctrserv = mysql_real_escape_string($_POST['counterserv']);

            for($bilanger = 0; $ctrserv>$bilanger; $bilanger++){
              if( $_POST['service'.($bilanger+1)]!="" || $_POST['descser'.($bilanger+1)]!="" ){

                 if ($_FILES["fileserv".($bilanger+1)]["error"] > 0)
                  { $error = $_FILES["fileserv".($bilanger+1)]["error"];} 
                  else if (($_FILES["fileserv".($bilanger+1)]["type"] == "image/gif") || ($_FILES["fileserv".($bilanger+1)]["type"] == "image/jpeg") || ($_FILES["fileserv".($bilanger+1)]["type"] == "image/png") || ($_FILES["fileserv".($bilanger+1)]["type"] == "image/pjpeg")) 
                    { $url = '../profilefiles/'.$foldernames.'/serv'.($bilanger+1).'.jpg'; 
                  $filename = compress_image($_FILES["fileserv".($bilanger+1)]["tmp_name"], $url, 80); 
                  $buffer = file_get_contents($url); 
                   }
                  else { $error = "Uploaded image should be jpg or gif or png"; 
                    } 

                    $se = mysql_real_escape_string($_POST['service'.($bilanger+1)]);
                    $de = mysql_real_escape_string($_POST['descser'.($bilanger+1)]);
                    $nas=0;
                    $nas = $bilanger+1;

                      $DB = new connectionDB;
                      $DB->connecttoDB();
                      $sqls = "INSERT INTO tblprofileservices VALUES('$memberid', '$se' , '$de' , '/pccibatangas/profilefiles/$foldernames/serv$nas.jpg')";
                      $DB->runquery($sqls);
                      $DB->closeDB();
                      unset($DB);
              }
            }
            header("Location: profile/$urlname#services");

            }






?>


