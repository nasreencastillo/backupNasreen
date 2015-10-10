<?php
  $contactadd = "";
  $DB = new connectionDB;
  $DB->connecttoDB();
  $sql = " SELECT * FROM tbladdress where id =  '$memberid'";
  $DB->runquery($sql);
  if($row = $DB->result->fetch_assoc()){
    $contactadd = $row["address"];
  }
  $DB->closeDB();
  unset($DB);
?>


      <section class ="Cont" id ="Contacts" >
                <div class = "row" id = "cont">
                        <div class = "col-sm-2">
                           <h3>This site</h3>  <br>  <br>
                           <p>
                            Home        <br>
                            services     <br>
                            About Us     <br>
                            Contacts      <br>
                            <p>
                        </div>
                        <div class = "col-sm-4">
                          <h3>Location</h3><br>  <br>
                          <p id = "location">
                          <?php echo $contactadd ?></p>
                        </div>
                        <div class = "col-sm-3" >
                           <h3>Contact</h3><br>  <br>
                           <div id= "conts">
                            <?php
                              $contnum =1;
                              $DB = new connectionDB;
                              $DB->connecttoDB();
                              $sql = " SELECT * FROM tblprofilecontact where id =  '$memberid'";
                              $DB->runquery($sql);
                              while($row = $DB->result->fetch_assoc()){
                                echo '
                                  <div class="row" id ="'.$contnum.'">
                                  <p id = "contactnums">'.$row["contactinfo"].' </p>
                                  </div>

                                ';

                                $contnum++;

                              }
                              $DB->closeDB();
                              unset($DB);
                            ?>
                           </div>
                          

                           
                        </div>
                         <div class = "col-sm-3">
                           <h3>Social</h3><br>  <br>
                           <p>

                            <?php
                             $site = array("fblink", "iglink", "twlink", "gplink");
                              $contactsite = "";
                              $contacturl = "";
                              $cts =0;

                              $DB = new connectionDB;
                              $DB->connecttoDB();
                              $sql = " SELECT * FROM tblprofilesocial where id =  '$memberid'";
                              $DB->runquery($sql);
                              while($row = $DB->result->fetch_assoc()){
                                echo '<div class = "row"> <a  id ="'.$site[$cts].'" href = "'.$row["url"].'"> <span>'.$row["socialsite"].'</span> </a> </div>';
                              $cts++;
                              }
                              $DB->closeDB();
                              unset($DB);
                            ?>


                          <p>
                        </div>
                </div>
                <div id="map">
                  
                  
                </div>
                </div>
      </section>


