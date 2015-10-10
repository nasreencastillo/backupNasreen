<?php
    include("connect.php");
if( isset( $_POST['idss'] )){
        include("formvariables.php");
        $memid = $_POST['idss'];
        

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblmembers SET companyname ='$noc', telephone = '$telephone', fax = '$fax', cell= '$cell', email= '$email', nature =  '$nat', interest=  '$intss', dateofapplication = '$doa', status = 'active' , formofcompany = '$foc', yearestablished = '$ye', numofemployees = '$noe' where id = '$memid' ";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        
        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblcontactp SET fname = '$cfn1', mname = '$cmn1',  lname = '$cln1',designation = '$cd1' where id = '$memid' and cpnum ='1'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
        
        $DB = new connectionDB;
        $DB->connecttoDB();
         $sqls = "UPDATE tblcontactp SET fname = '$cfn2', mname = '$cmn2',  lname = '$cln2',designation = '$cd2' where id = '$memid' and cpnum ='2'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
        
        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblrepresentative SET fname =  '$rfname1', mname = '$rmname1', lname =  '$rlname1', designation = '$rdes1', address = '$radd1', contact = '$rcn1', email = '$rem1' where id = '$memid' and type ='main'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
                $DB = new connectionDB;
        $DB->connecttoDB();
         $sqls = "UPDATE tblrepresentative SET fname =  '$rfname2', mname = '$rmname2', lname =  '$rlname2', designation = '$rdes2', address = '$radd2', contact = '$rcn2', email = '$rem2' where id = '$memid' and type ='alternate'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);


        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tbladdress SET address = '$compaddress' where id = '$memid' ";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblproperties SET url = '$urls', foldername = '$folders' where id = '$memid'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tblusers SET username ='$us',password = '$pw', type ='member' where id ='$memid' ";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);

        $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "UPDATE tbltags SET tags='$tags' where id = '$memid'";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
      }

        ?>





<?php

	if (isset($_POST['search'])){
 $cname =  $_POST['search']; 
 $info= "";

    
        $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tblmembers where companyname LIKE  '%$cname%'";
        $DB->runquery($sql);
        while($row = $DB->result->fetch_assoc()){
           $info = $info . '<div class = "col-sm-3" id ="outputs" ids = "'.$row["id"].'"  data-toggle="modal" data-target="#myModal"" >
          <div class = "row" >
            <img class ="img-circle" src = "img/RCBC-logo.png" id ="imglogo">
          </div>
          <div class="row">
            <h3 onclick ="getname()" > '. $row["companyname"].'</h3>
            <p>
              <b>Telephone number</b>'. $row["telephone"].'<br>
              <b>E-mail</b> '. $row["email"].'<br>
              <b>Nature of Business</b>'. $row["nature"].'<br>
              <b>Interest</b>'. $row["interest"].'<br>
              <b>Status</b>'. $row["status"].'<br>
            </p>
          </div>
      </div>'; 
          }
          echo $info;
        $DB->closeDB();
        unset($DB);
      
    }
    else
    {


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

  <link rel="stylesheet" href="css/allmembers.css">

  <script type="text/javascript">
  $(function(){
  	$('#input').keyup(function(){
  		var a = $('#input').val();
  		$.post('allmembers.php',{"search":a},function(data){
  			$('#display').html(data);
  		});
  	});

    $(document).on("click", ".col-sm-3", function() {
          var idmember = $(this).attr('ids');
            $.post('openmodalmembers.php',{"open":idmember},function(data){
            $('#myModal').html(data);
          });
          });

  });


  </script>

</head>
<body>

<form role="form" action="allmembers.php" method="POST">
	<label class="control-label col-sm-2">Company Name:  </label>
   		<div class="col-sm-4">
     		<input type="text" class="form-control" name="search" placeholder="Search" id = "input"></div>
</form>
<div class= "col-sm-12" id = "display">
<?php
 $DB = new connectionDB;
        $DB->connecttoDB();
        $sql = " SELECT * FROM tblmembers";
        $DB->runquery($sql);
        while($row = $DB->result->fetch_assoc()){
          echo '<div class = "col-sm-3" id ="outputs" ids = "'.$row["id"].'"  data-toggle="modal" data-target="#myModal"" >
          <div class = "row" >
            <img class ="img-circle" src = "img/RCBC-logo.png" id ="imglogo">
          </div>
          <div class="row">
            <h3 onclick ="getname()" > '. $row["companyname"].'</h3>
            <p>
              <b>Telephone number</b>'. $row["telephone"].'<br>
              <b>E-mail</b> '. $row["email"].'<br>
              <b>Nature of Business</b>'. $row["nature"].'<br>
              <b>Interest</b>'. $row["interest"].'<br>
              <b>Status</b>'. $row["status"].'<br>
            </p>
          </div>
      </div>'; 
    }

      ?>


	</div>



<div class="modal fade" id="myModal" role="dialog">
</body>
  
  

</body>

<?php } ?>
</html>

