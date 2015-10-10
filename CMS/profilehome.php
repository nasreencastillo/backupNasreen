<?php
  $homecompanyname ="";
  $hometaglines ="";
  $homelogoimg ="";
  $homebackimg ="";

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




 <section class ="advertise" id ="home" style = "background-image :url(<?php echo $homebackimg; ?>);" data-speed="6" data-type="background";>   
        <div class = "container.fluid"> 
          <div class = "opacblack">
            <?php include("modalprofilehome.php") ?>
            <div class = "row"  style="margin:0;">
              <div class="col-md-12" id='tray'>
                    <div class="jumbotron" id = "bot">
                    <div class ="div-circle" >
                      <img src = "<?php echo $homelogoimg; ?>" id="logoimg" class ="mgs"></img>
                    </div>
                      <center>
                        <h1 id = "compname" ><?php echo $homecompanyname; ?></h1>
                        <p id = "taglines" > <?php echo $hometaglines; ?> </p> 
                      </center>
                    </div>
              </div>
            </div>
         </div>
      </div>
</section>


