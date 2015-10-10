<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PCCI: Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="PCCI, services">
    <meta name="description" content="">
    <meta name="author" content="Nahid Abdulmalik, Nasreen Castillo, Ronnel DeOcampo">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/login.css">


  </head>
  <body>

  	<div class= "wrapper" id="loginbox">

  		<div class = "row" id = "loginhead">
  			<b>PCCI-Batangas Login</b>
  		</div>


  		<div id = "container">
            <form class="form-horizontal" role="form" action="login.php" method="POST">
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="users">Username:</label>
	    <div class="col-sm-10">
	      <input type="username" class="form-control" name="user" placeholder="Enter Username">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="pwd">Password:</label>
	    <div class="col-sm-10"> 
	      <input type="password" class="form-control" name="pwd" placeholder="Enter password">
	    </div>
	  </div>
	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label><input type="checkbox"> Remember me</label>
	      </div>
	    </div>
	  </div>
	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type= "submit" class="btn btn-default" ID= "logs">Login</button>
	    </div>
	  </div>
</form>
	<?php
		include("connect.php");
		session_start();
		$_SESSION["userid"] = "";
			if( isset( $_POST['user'] ) and isset( $_POST['pwd']) ){
				$dats = '';
				$user = mysql_real_escape_string($_POST['user']);
				$pass = mysql_real_escape_string($_POST['pwd']);
				$DB = new connectionDB;
				$DB->connecttoDB();
				$sqls = " SELECT * FROM tblusers where username=  '$user'  and Password=  '$pass'";
				$DB->runquery($sqls);
				if($row = $DB->result->fetch_assoc()){
					if($row["type"]=="member")
					{
						$memid = $row["id"];
				$user = new connectionDB;
				$user->connecttoDB();
				$sql = " SELECT * FROM tblproperties where id=  '$memid'";
				$user->runquery($sql);
				if($row = $user->result->fetch_assoc()){
					$_SESSION["userid"] = $memid;
					$url= $row["url"];
					header ("Location: profile/".$url);
					}
				$user->closeDB();
					}
					else if($row["type"]=="admin")
					{
					header ("Location: home.php");
					}
				}
				else{
					$dats = '<div>Username or Password Incorrect</div>';
				}
				echo $dats;
				$DB->closeDB();
			}
	?>

	</div>
  </body>

 </html>




