<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Nahid Abdulmalik, Nasreen Castillo, Ronnel De Ocampo">
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
    <script src="../js/jquery.min.js"></script>
    
    <link rel="stylesheet" href="/pccibatangas/css/bootstrap.css">
    <script src="/pccibatangas/js/bootstrap.min.js"></script>
    <script src="mapish.js"></script>


    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 50%;
      }
    </style>

  </head>
 

  <body>
 <?php include("..\connect.php"); 
    if(isset( $_POST['posit'] )  && isset( $_POST['addr']) ) {
      echo"nas";
    $position = mysql_real_escape_string($_POST['posit']);
    $address = mysql_real_escape_string($_POST['addr']);
      $DB = new connectionDB;
        $DB->connecttoDB();
        $sqls = "INSERT INTO tbladdress values('2', '$address', '$position')";
        $DB->runquery($sqls);
        $DB->closeDB();
        unset($DB);
    }
    ?>


    <div id="map"></div>
    <div class="container.fluid">
      <div class="row" style="margin:0;">
       <div class="col-md-12" style="margin:0;">
          <div id="selectedLocations"style="margin:0;padding:0;" >
           
            <h3 id="lbl">The following locations are selected</h3>
            <button type="button" class="btn" id="save">Save selected locations</button>

            <div id="mapmarks">
            <ul id='demo'> </ul>
            <table class="table" id="nel" style="margin:0;padding:0;"> </table>

            </div>
          

            </div>
          </div>
      </div>
    </div>

    
  </body>
</html>