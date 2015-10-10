<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PCCI: Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="PCCI, services">
    <meta name="description" content="">
    <meta name="author" content="Nahid Abdulmalik, Nasreen Castillo, Ronnel DeOcampo">

    
    <link rel="stylesheet" href="/pccibatangas/css/bootstrap.css">
    <script src="/pccibatangas/js/jquery.min.js"></script>
    <script src="/pccibatangas/js/bootstrap.min.js"></script>
    <link href="/pccibatangas/mycss.css" rel="stylesheet">
    <link rel="stylesheet" href="/pccibatangas/css/style_nas.css">
    <link rel="stylesheet" href="/pccibatangas/css/css_profile.css">
    <script src="/pccibatangas/js/profile_js.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script>-->
    <script>
      // function initialize() {
      //   var mapCanvas = document.getElementById('map');
      //   var mapOptions = {
      //     center: new google.maps.LatLng(44.5403, -78.5463),
      //     zoom: 8,
      //     mapTypeId: google.maps.MapTypeId.ROADMAP
      //   }
      //   var map = new google.maps.Map(mapCanvas, mapOptions)
      // }
      // google.maps.event.addDomListener(window, 'load', initialize);
    </script>



    
  </head>

  <body>
<?php

  include("../connect.php");
  session_start();
  $geturl =$_GET["url"];
  $memberid = "";

  $DB = new connectionDB;
  $DB->connecttoDB();
  $sql = " SELECT * FROM tblproperties where url =  '$geturl'";
  $DB->runquery($sql);
  if($row = $DB->result->fetch_assoc()){
    $memberid= $row["id"];
    if(isset($_SESSION["userid"]) && $_SESSION["userid"] ==$memberid)
    {
      header("Location: ../CMS/profile.php?url=".$geturl);
    }
  }
  $DB->closeDB();
  unset($DB);
?>



      <?php include('profilehome.php'); ?>
      <?php include('profileservices.php'); ?>
      <?php include('tagline1.php'); ?>
      <?php include('profileabout.php'); ?>
      <?php include('profilecontact.php'); ?>
<!-- 
<script>
  window.intercomSettings = {
    app_id: "biq2zggq",
    name: "Nikola Tesla", // Full name
    email: "nikola@example.com", // Email address
    created_at: 1312182000 // Signup date as a Unix timestamp
  };
</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/biq2zggq';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>

 -->



  </body>
</html>