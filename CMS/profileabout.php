<?php
  $abouttitel ="";
  $aboutdescrip ="";

  $DB = new connectionDB;
  $DB->connecttoDB();
  $sql = " SELECT * FROM tblprofileabout where id =  '$memberid'";
  $DB->runquery($sql);
  if($row = $DB->result->fetch_assoc()){
    $abouttitel =$row["titleabout"];
    $aboutdescrip =$row["aboutdesc"];
  }
  $DB->closeDB();
  unset($DB);
?>


<?php include("modalprofileabout.php"); ?>
<section class ="abtUs" id ="aboutUs" style = "background-color :#1d1b1c">  


  <div class="container.fluid">
    <div class="row">
      <div class="page-header" >
        <h1>About Us</h1>
      </div>
      <div class = "col-md-6" id = "col6" data-toggle="modal" data-target="#about-desc">
      <div class ="msg-hover">
      </div> 
         <div><h2 id = "abttitle" ><?php echo $abouttitel ?></h2></div>
        <div>
          <p id = "abtdesc"> <?php echo $aboutdescrip  ?>
          </p>
        </div>
      </div>
      
      <div class= "col-md-2">
      </div>
      <div class = "col-md-4" id ="abtgilid">
        <center><h2>Important People</h2></center>
        <?php include ("modlprofileimportant.php"); ?>
        <div id = "abtpip">

        <?php
          $peoplename ="";
          $peoplepos ="";
          $peopleimg ="";
          $peoplenum = 1;
          $DB = new connectionDB;
          $DB->connecttoDB();
          $sql = " SELECT * FROM tblprofileimportant where id =  '$memberid'";
          $DB->runquery($sql);
          while($row = $DB->result->fetch_assoc()){
            $peoplename = $row["name"];
            $peoplepos = $row["position"] ;
            $peopleimg = $row["personimg"] ;


            echo '<div class = "blocks">
            <center> <p> <p> <div class = "abtimage">
            <img   src = "'.$peopleimg.'" id = "Imgperson'.$peoplenum.'" alt= "description"  style="width:100%; height:100%;"/>
            </div> </p>
            <p id = "nameabout'.$peoplenum.'" style= "text-indent:0;"> '.$peoplename.'</p>
            <p id = "positionabout'.$peoplenum.'" style="font-weight:700; line-height: 0px; text-indent: 0;" >'.$peoplepos.'</p> </center>
            </div>';


              $peoplenum++;
          }
          $DB->closeDB();
          unset($DB);
        ?>

      </div>
    </div>
  </div>

</section>

