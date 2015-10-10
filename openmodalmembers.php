<html lang="en">
<head>
  <title>PCCI: Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="PCCI, services">
  <meta name="description" content="">
  <meta name="author" content="Nahid Abdulmalik, Nasreen Castillo, Ronnel DeOcampo">
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  <script src="js/members.js"></script>
   <link rel="stylesheet" href="css/members.css">

</head>
<body>
<?php
	include("connect.php");

  $addresss = "";

	if (isset($_POST['open'])){
 $cname =  $_POST['open']; 
    if($cname!="")
    {

        //tbladdress
        $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tbladdress where id =  '$cname'";
        $DB->runquery($sql);
        if($row = $DB->result->fetch_assoc()){
          $addresss = $row["address"]; 
        }
        $DB->closeDB();
        unset($DB);
        //tblmembers



        $nature ="";
        $interst="";
        $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tblmembers where id =  '$cname'";
        $DB->runquery($sql);
        if($row = $DB->result->fetch_assoc()){
          echo '
          <div class="modal-dialog modal-lg">
          <form role="form" action="allmembers.php" method="POST">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Member</h4>
              </div>
              <div class="modal-body"> 
          <div class="row">
          <div class="col-sm-12">

          
          <!--start panel 1-->

          <div class="panel panel-primary">
                        <div class="panel-heading">
                            <p><b>INFORMATION SHEET – CORPORATE</b></p> 
                        </div>
                        <div class="panel-body">
                           <div class="form-group" id ="groups">

                            <input type="text" class="form-control" id = "ids" name="idss" value="'. $cname.'" required>

                                <label class="control-label col-sm-3">Name of Company:  </label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="noc" value="'. $row["companyname"].'" required></div>
              </div>

               <div class="form-group" id ="groups">
                                <label class="control-label col-sm-3">Address:  </label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="adres" value="'.$addresss.'" required></div>
              </div>


              <div class="form-group" id ="groups">
                                <label class="control-label col-sm-2">Telephone:  </label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="tel" value="'. $row["telephone"].'"></div>
                <label class="control-label col-sm-2">Fax:  </label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="fax" value="'. $row["fax"].'"></div>
              </div>

              <div class="form-group" id ="groups">
                <label class="control-label col-sm-2">Cell Number:  </label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="cell" value="'. $row["cell"].'"></div>
                <label class="control-label col-sm-2">E-mail:  </label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="e-mail" value="'. $row["email"].'" required></div>
              </div>

              <div class="form-group" id ="groups">
                <label class="control-label col-sm-2">Form of Company:  </label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="foc" value="'. $row["formofcompany"].'" required></div>
                <label class="control-label col-sm-2">Year Established:  </label>
                <div class="col-sm-4">
                <input type="text" class="form-control" name="year" value="'. $row["yearestablished"].'"></div>
              </div>

              <div class="form-group" id ="groups">
                <label class="control-label col-sm-2">Number of Employees:  </label>
                <div class="col-sm-4">
                <input type="text" class="form-control"  name="noe" value="'. $row["numofemployees"].'"></div>
                <label class="control-label col-sm-2">Date of Application  </label>
                <div class="col-sm-4">
                <input type="text" class="form-control"  name="doa" value="'. $row["dateofapplication"].'" required></div>
              </div>
                    </div><!--panel body-->
                </div>
          <!--end panel 1-->';

          $nature = $row["nature"];
          $interst =$row["interest"];

          }
        $DB->closeDB();
        unset($DB);
      }

       //tblcontactp
        $fname = array("", "");
        $mname = array("", "");
        $lname = array("", "");
        $designation = array("", "");
        $x = 0;
       

        for ( $nas =  1; $nas<3; $nas++)
        {

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tblcontactp where id =  '$cname' and cpnum = '$nas'";
        $DB->runquery($sql);
        while($row = $DB->result->fetch_assoc()){
          $fname[$x] = $row["fname"];
          $mname[$x] = $row["mname"];
          $lname[$x] = $row["lname"];
          $designation[$x] = $row["designation"];
          $x++;

        }
        $DB->closeDB();
        unset($DB);

        }



        echo'
        <!--second panel-->
                 <div class="panel panel-green">
                        <div class="panel-heading">
                            <p><b>Contact Persons</b></p> 
                        </div>
                        <div class="panel-body">
                           <label class="control-label col-sm-12"> <p>Contact Person 1 </p> </label>
                           <div class="form-group" id ="groups">
                                <label class="control-label col-sm-1">First Name:  </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="fname1" value="'.$fname[0].'" required></div>
                  <label class="control-label col-sm-1">Middle Name:  </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="mname1" value="'.$mname[0].'"></div>
                  <label class="control-label col-sm-1">Last Name:  </label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="lname1" value="'.$lname[0].'" required></div>
              </div>

                           <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> <p>Designation </p> </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="des1" value="'.$designation[0].'" required></div>
              </div>

                 <label class="control-label col-sm-12"> <p>Contact Person 2 </p> </label>
                           <div class="form-group" id ="groups">
                                <label class="control-label col-sm-1">First Name:  </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="fname2" value="'.$fname[1].'"></div>
                  <label class="control-label col-sm-1">Middle Name:  </label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="mname2" value="'.$mname[1].'"></div>
                  <label class="control-label col-sm-1">Last Name:  </label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="lname2" value="'.$lname[1].'"></div>
              </div>
                           <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> <p>Designation </p> </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="des2" value="'.$designation[1].'"></div>
              </div>
                    </div><!--panel body-->
                </div><!--panel-->
<!--end second panel -->
          ';



          echo'

          <!--Third Panel-->
                 <div class="panel panel-red">
                        <div class="panel-heading">
                            <p><b>Nature of Business:</b></p> 
                        </div>
                        <div class="panel-body">
                           <div class="form-group" id ="groups">
                                 
                    <label class="control-label col-sm-12"> <p>Specify: </p> </label>
                      <input type="text" class="form-control" id="natstext" name="natofbus" value="'.$nature.'" required></div>
                  

                    </div><!--panel body-->
                </div><!--panel-->';

          
                echo '

                <!--Fourth Panel-->
                 <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <p><b>Interest:</b></p> 
                        </div>
                        <div class="panel-body">
              <label class="control-label col-sm-12"> <p>Specify: </p> </label>
                <input type="text" class="form-control" id="intertext" name="interest" value="'.$interst.'" required>
            

                    </div><!--panel body-->
                </div><!--panel-->
               

                ';
                

        $fnames = array("","");
        $mnames = array("","");
        $lnames = array("","");
        $desigs = array("","");
        $addrs = array("","");
        $conts = array("","");
        $emails = array("","");
        $y = 0;

        $repres = array("main","alternate");
        for ($nas = 0; $nas<2; $nas++){
       $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tblrepresentative where id =  '$cname' and type = '$repres[$nas]'";
        $DB->runquery($sql);
        while($row = $DB->result->fetch_assoc()){
          $fnames[$y]= $row["fname"];
          $lnames[$y]= $row["mname"];
          $mnames[$y]= $row["lname"];
          $desigs[$y]= $row["designation"];
          $addrs[$y]= $row["address"];
          $conts[$y]= $row["contact"];
          $emails[$y]= $row["email"];
          $y++;
        }
        $DB->closeDB();
        unset($DB);
      }



        echo '

        <!--Fifth Panel-->
                 <div class="panel panel-info">
                        <div class="panel-heading">
                            <p><b>I/We name as my/our representative(s) to the Philippine Chamber of Commerce and Industry - Batangas</b></p> 
                        </div>
                        <div class="panel-body">
                          <div class="col-sm-6">
                             <label class="control-label col-sm-12"> <p>Main </p> </label>
                           <div class="form-group" id ="groups">
                                <label class="control-label col-sm-12">First Name:  </label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="rfnam1" value="'.$fnames[0].'" required></div>
                  <label class="control-label col-sm-12">Middle Name:  </label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="rmname1" value="'.$mnames[0].'"></div>
                  <label class="control-label col-sm-12">Last Name:  </label>
                <div class="col-sm-12">
                <input type="text" class="form-control" name="rlname1" value="'.$lnames[0].'" required></div>
              </div>

                           <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> Designation  </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="rdes1" value="'.$desigs[0].'" required></div>
              </div>

              <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> Address  </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="radd1" value="'.$addrs[0].'" required></div>
              </div>

              <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> Contact Number:  </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="rcn1" value="'.$conts[0].'" required></div>
              </div>

              <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> E-mail:  </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="rem1" value="'.$emails[0].'" required></div>
              </div>
               </div>


               <div class="col-sm-6">
                             <label class="control-label col-sm-12"> <p>Alternate </p> </label>
                           <div class="form-group" id ="groups">
                                <label class="control-label col-sm-12">First Name:  </label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="rfnam2" value="'.$fnames[1].'"></div>
                  <label class="control-label col-sm-12">Middle Name:  </label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="rmname2" value="'.$mnames[1].'"></div>
                  <label class="control-label col-sm-12">Last Name:  </label>
                <div class="col-sm-12">
                <input type="text" class="form-control" name="rlname2" value="'.$lnames[1].'"></div>
              </div>

                           <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> Designation  </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="rdes2" value="'.$desigs[1].'n"></div>
              </div>

              <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> Address  </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="radd2" value="'.$addrs[1].'"></div>
              </div>

              <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> Contact Number:  </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="rcn2" value="'.$conts[1].'r"></div>
              </div>

              <div class="form-group" id ="groups">
                               <label class="control-label col-sm-12"> E-mail:  </label>
                               <div class="col-sm-12">
                <input type="text" class="form-control" name="rem2" value="'.$emails[1].'"></div>
              </div>
               </div>
                </div><!--panel body-->
                </div><!--panel-->


        ';



        

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tbltags where id =  '$cname'";
        $DB->runquery($sql);
        if($row = $DB->result->fetch_assoc()){

          echo'
           <div class="panel panel-success">
                        <div class="panel-heading">
                            <p><b>Additional Information</b></p> 
                        </div>
                        <div class="panel-body">
                           <div class="form-group" id ="groups">
                                <label class="control-label col-sm-12"><p>Enter tags, seperated with comma ( , )  </p></label>
                                    <div class="col-sm-12">
                                    <textarea name="tags" value="Enter tags" rows="5" id = "txtare" required  > '.$row["tags"].'</textarea></div>
                            </div>
                            ';


        }
        $DB->closeDB();
        unset($DB);



        $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tblproperties where id =  '$cname'";
        $DB->runquery($sql);
        if($row = $DB->result->fetch_assoc()){

        echo'
                              <div class="form-group" id ="groups">
                              <label class="control-label col-sm-12"><p> Properties  </p></label>
                                <label class="control-label col-sm-2">URL:  </label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" name="urls" value="'.$row["url"].'" ></div>
                                <label class="control-label col-sm-2">Foldername:  </label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" name="folders" value="'.$row["foldername"].'" ></div>
                            </div>';

                }
        $DB->closeDB();
        unset($DB);


        $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tblusers where id =  '$cname'";
        $DB->runquery($sql);
        if($row = $DB->result->fetch_assoc()){
        echo'
           <div class="form-group" id ="groups">
                              <label class="control-label col-sm-12"><p> Login Account  </p></label>
                                <label class="control-label col-sm-2">Username:  </label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" name="usn" value="'.$row["username"].'" required></div>
                                <label class="control-label col-sm-2">Password:  </label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" name="pass" value="'.$row["password"].'"required></div>
                            </div>
                    </div><!--panel body-->
                </div><!--panel-->  ';

        }
        $DB->closeDB();
        unset($DB);
          echo '
                    
                    </div>
                    </div>
                    </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
              </form>
          </div>';





    }
    ?>
</body>
</html>