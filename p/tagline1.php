<?php
  $taglinetag ="";
  $taglinebackimg ="";

  $DB = new connectionDB;
  $DB->connecttoDB();
  $sql = " SELECT * FROM tblprofiletaglines where id =  '$memberid'";
  $DB->runquery($sql);
  if($row = $DB->result->fetch_assoc()){
    $taglinetag = $row["taglines"];
    $taglinebackimg  = $row["backimg"];
   }
  $DB->closeDB();
  unset($DB);
?>

 <section class ="sepia" id ="profiletaglineedit" data-toggle="modal" data-target="#modaltagliness" id ="edittagline1" style = "background-image :url(<?php echo $taglinebackimg ?>);" data-speed="6" data-type="background"> 
        <div class = "container.fluid" >
            <div class = row  style="margin:0;">
              <div class="col-md-12" id='tray' style= "padding:4%;">
                    <div class="jumbotron" style="background-color:transparent; padding:0px;margin:auto;">
                      <center>
                        <h1 id = "thisTagline"><?php echo $taglinetag ?></h1>
                      </center>
                    </div>
            </div>
      </div>
      </div>
</section>