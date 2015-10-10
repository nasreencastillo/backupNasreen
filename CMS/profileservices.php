<?php
  $servicename ="";
  $servicedesc="";
  $serviceimg="";

  $DB = new connectionDB;
  $DB->connecttoDB();
  $sql = " SELECT * FROM tblprofilehome where id =  '$memberid'";
  $DB->runquery($sql);
  if($row = $DB->result->fetch_assoc()){
    $homecompanyname = $row["companyname"];
    $hometaglines = $row["tagline"];
    $homelogoimg = $row["logoimg"];
    $homebackimg = $row["backgroundimg"];
  }
  $DB->closeDB();
  unset($DB);
?>





<section class ="serv" id ="services">
  <div class = "container-fluid">
  <!-- services Mismo-->
      <div class = "servdesc"> <?php include("modalservices.php"); ?>
        <div class="page-header">
        <h1> SERVICES OFFERED </h1> 
        </div> 
        <div class = "ServonDB">
          <div class = "row" id = "servicesprofile">
    
              <?php
                $servnum = 1;
                $servn= "";
                $servimg ="";
                $servdes ="";

                $DB = new connectionDB;
                $DB->connecttoDB();
                $sql = " SELECT * FROM tblprofileservices where id =  '$memberid'";
                $DB->runquery($sql);
                while($row = $DB->result->fetch_assoc()){
                  echo '<div class = "col-lg-4" id = "servicess'.$servnum.' ">
                  <div class = "imgservices">
                          <img src = "'.$row['serviceimg'].'" alt= "description" id ="Imgserv'.$servnum.'" style="width:100%; height:100%;">
                        </div>
                          <center>
                         <p id ="servname'.$servnum.'">'. $row["servicename"].' </p>
                         <p id ="serdes'.$servnum.'">
                         '.$row["servicedesc"].'
                        </p>
                        <center>
              </div>';
              $servnum++;
                
              }
                $DB->closeDB();
                unset($DB);
              ?>

              



          </div>
        </div>
      </div>
</div>
</section>


