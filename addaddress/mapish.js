
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

var labels = "X";
var markers=['0'];
var poss=[];
var pos=[];




function initMap() {


$(document).ready(function(){

      $("#save").click(function(){      
        for (var i = 1; i < markers.length+1; i++) {

          alert(markers[i]['position']);
          alert(markers[i]['address']);
          var posit = ''+markers[i]['position'];
          var addr = ''+markers[i]['address'];
          $.post('mapish.php',{"posit":posit ,"addr":addr});
          alert("hey");
        }
      });
});

var geocoder = new google.maps.Geocoder;

var youAreat = new google.maps.InfoWindow;



  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: null, lng: null},
    zoom: 16
  });

  //map.addEventListener("load", changelabel);
//--------------------------------------------searchBox------------------------------//
  /*var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers1 = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers1.forEach(function(marker) {
      marker.setMap(null);
    });
    markers1 = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers1.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });


*/
//------------------------------searchBox----------------------------//
  google.maps.event.addListener(map, 'click', function(event) {
  
    //addMarker(event.latLng, map);
    geocodeLatLng(event.latLng, geocoder, map);




  });



  var infoWindow = new google.maps.InfoWindow;

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      
      map.setCenter(pos);


    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}







//------------------------------------------FUNCTION FOR ADDING MARKER----------------------------------------------------//
function addMarker(location, map) {
  // Add the marker at the clicked location, and add the next-available label
  // from the array of alphabetical characters.
  var marker = new google.maps.Marker({
    position: location,
    label: labels,
    map: map
  });

  google.maps.event.addListener(marker, 'click', function(event){
  marker.setMap(null);
  });

  markers.push(marker);
  
}

google.maps.event.addDomListener(window, 'load', initialize);
//------------------------------------------FUNCTION FOR ADDING MARKER----------------------------------------------------//



//------------------------------------------FUNCTION FOR GEOCODER----------------------------------------------------//


function geocodeLatLng(locpos, geocoder, map) {

  geocoder.geocode({'location': locpos}, function(results, status) {

    var res="";
    if (status === google.maps.GeocoderStatus.OK) {

      if (results[1]) {        
        var marker = new google.maps.Marker({
          position: locpos,
          map: map,
          address: results[1].formatted_address,
          title: 'Double click to remove'
        });
    
        var infowindow = new google.maps.InfoWindow;
        
        infowindow.setContent(results[1].formatted_address);
        res = results[1].formatted_address;
        infowindow.open(map, marker);
        
        markers.push(marker);

        


        google.maps.event.addListener(marker, 'dblclick', function(event){
        
          marker.setMap(null);
          removeMarker(marker);
          showMarkers(map);
          changelabel();
        });

         marker.addListener('click', function() {
        
          infowindow.setContent(res);
          infowindow.open(map, marker);
        });
          

    
        showMarkers(map);
        //changelabel();


        
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }


    
    

  });

}

//------------------------------------------FUNCTION FOR GEOCODER----------------------------------------------------//




function showMarkers(map) {
/*
var list = document.getElementById('demo');
list.innerHTML="";

for (var i = 0; i < markers.length; i++) {

      var entry = document.createElement('li');
      entry.style.listStyleType="none";
      var infoAdd = markers[i]['address'];
      var infoLoc = markers[i]['position'];
      entry.appendChild(document.createTextNode("Address: "+infoAdd+" \
        Latitude, Longitude: "+infoLoc));
      
      list.appendChild(entry);

      entry.addEventListener("click", function(event) {
        var temp = event.target.innerHTML.split(':');
        
        var temp1 = temp[2].split(',');
        var temp2 = temp1[0].split('(');
        var temp3 = temp1[1].split(')');
        
        var lt = temp2[1];
        var ln = temp3[0];
        map.setCenter(new google.maps.LatLng(lt, ln));
      });
  }

*/
  
  var table = document.getElementById("nel");
  table.innerHTML="";



  var header = table.createTHead();
  var row0 = header.insertRow(0);
  var cell01 = row0.insertCell(0);
  var cell02 = row0.insertCell(1);
  var cell03 = row0.insertCell(2);

  cell01.innerHTML = "Address";
  cell02.innerHTML = "GPS (Latitude, Longitude)";
  cell03.innerHTML = "Search";
  
  for (var i = 1; i < markers.length+1; i++) {


      var row = table.insertRow(i);

      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);

      var btn = document.createElement('input');
      btn.type = 'button';
      btn.setAttribute("class", "btn btn-default");
      btn.style.whiteSpace="normal";
      btn.value = "Find this Location";
      
      cell1.innerHTML = markers[i]['address'];
      cell2.innerHTML = markers[i]['position'];
      
      cell3.appendChild(btn);
      

      btn.addEventListener("click", function(event) {
      
      var temp = event.target.parentNode.parentNode.textContent;
      var temp1 = temp.split('(');
      var temp2 = temp1[1].split(',');
      var temp3 = temp2[1].split(')');
      var latt = temp2[0];
      var lngg = temp3[0];
      
      map.setCenter(new google.maps.LatLng(latt,lngg));

      });
  }


}

//--------------------------------function label changer-------------------------------//
function changelabel(){
  if (markers.length<2)
    {
    document.getElementById("lbl").innerHTML="No location selected";
    }
    else{
    document.getElementById("lbl").innerHTML="The following are selected";
    }
}
//--------------------------------function label changer-------------------------------//

//------------------------------------------FUNCTION FOR DELETINGMARKER----------------------------------------------------//


function removeMarker(marker) {

  for (var i = 1; i < markers.length+1; i++) {

    if (marker['position']==markers[i]['position']){
      markers.splice(i, 1);
    }

  }

}
}


//------------------------------------------FUNCTION FOR DELETINGMARKER----------------------------------------------------//
