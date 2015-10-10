

<?php
    

      if( isset( $_POST['tel'] )){
        include("connect.php");
        include("formvariables.php");

        mkdir("/profilefiles/$folders", 0777); 


        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblmembers values('', '$noc','$telephone', '$fax', '$cell', '$email',  '$nat',  '$intss', '$doa', 'active' , '$foc', '$ye', '$noe')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
        
        $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tblmembers where telephone=  '$telephone'";
        $DB->runquery($sql);
        if($row = $DB->result->fetch_assoc()){
          $memid = $row["id"];
          }
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblcontactp values('$memid','$cfn1', '$cmn1', '$cln1','$cd1' , '1')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblcontactp values('$memid','$cfn2', '$cmn2', '$cln2','$cd2', '2' )";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblrepresentative values('$memid','main', '$rfname1', '$rmname1', '$rlname1', '$rdes1','$radd1', '$rcn1', '$rem1' )";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblrepresentative values('$memid','alternate', '$rfname2', '$rmname2', '$rlname2', '$rdes2','$radd2', '$rcn2', '$rem2')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tbladdress values('$memid','$compaddress' )";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblproperties values('$memid','$urls', '$folders' )";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblusers values('$us','$pw', 'member' ,'$memid' )";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tbltags values('$memid','$tags' )";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        //add codes here...............................................
        
        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofilehome values('$memid','This is the Name of the Company', 'This is the Tagline of the Company', 'gallery/logoimg.png', 'gallery/image.jpg' )";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofileservices values('$memid','Name of Service 1', 'This is a small description of service offered by your company.', 'gallery/image.jpg')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofiletaglines values('$memid','This is the tagline/motto/quotes by the company', 'gallery/image.jpg')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofileabout values('$memid','Title of the About Us', 'This is a very short but meaningful description. This is a very short but meaningful description. This is a very short but meaningful description. This is a very short but meaningful description. This is a very short but meaningful description.')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofileimportant values('$memid','Name of Important Person', 'Position', 'gallery/image.jpg')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofilecontact values('$memid','telephone/emailaddress')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofilesocial values('$memid','Facebook', 'url')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofilesocial values('$memid','Instagram', 'url')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);


        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofilesocial values('$memid','Twitter', 'url')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tblprofilesocial values('$memid','Google Plus', 'url')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);


        header ("Location: allmembers.php");
      }

    


  ?>

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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class = "container">
            <div class="row" id="head-img">
                <img id ="img-head" src="img/completelogo.png"></img>
                  <p> 12A P. Dandan St., Batangas City      Landline: (043) 984-4828     Mobile; 0927-701-3921     pccibatangas@gmail.com 
                    </p>
            </div>
<div class="row" id = "forms">
		 <form role="form" action="addmembers.php" method="POST">
                <div class="col-lg-12">
                		<?php include("panel1.php"); ?>
                		<?php include("panel2.php"); ?>
                		<?php include("panel3.php"); ?>
                		<?php include("panel4.php"); ?>
                		<?php include("panel5.php"); ?>

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <p><b>Additional Information</b></p> 
                        </div>
                        <div class="panel-body">
                           <div class="form-group" id ="groups">
                                <label class="control-label col-sm-12"><p>Enter tags, seperated with comma ( , )  </p></label>
                                    <div class="col-sm-12">
                                    <textarea name="tags" placeholder="Enter Tags" rows="5" id = "txtare" required  ></textarea></div>
                            </div>
                            <div class="form-group" id ="groups">
                              <label class="control-label col-sm-12"><p> Properties  </p></label>
                                <label class="control-label col-sm-2">URL:  </label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" name="urls" placeholder="Enter URL to be used" required></div>
                                <label class="control-label col-sm-2">Foldername:  </label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" name="folders" placeholder="Enter Foldername to be used" required></div>
                            </div>

                            <div class="form-group" id ="groups">
                              <label class="control-label col-sm-12"><p> Login Account  </p></label>
                                <label class="control-label col-sm-2">Username:  </label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" name="usn" placeholder="Enter Username" required></div>
                                <label class="control-label col-sm-2">Password:  </label>
                                <div class="col-sm-4">
                                <input type="text" class="form-control" name="pass" placeholder="Enter Password"required></div>
                            </div>
                    </div><!--panel body-->
                </div><!--panel-->

                <button type= "submit" class="btn btn-primary" id= "btnaddmember">Add Member</button>

				</form>
            </div>
</div>

</div>

</body>
</html>
