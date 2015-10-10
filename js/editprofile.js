//Javascript para sa pag eedit ng Profile


//profilehome.php--------------------------------------
$(document).ready(function(){   // para pagkabukas ng modal, nakalagay na yung mga words sa textbox, eedit na lang. :D
	$(function() {
		document.getElementById("coms").value =  $('#compname').text();
		document.getElementById("ags").value =  $('#taglines').text();
		var ccc = $('#logoimg').attr('src');
		$('#blah').attr('src', ccc);
		var scrass=  $('#home').css("background-image");     
		$('#imgback').css('background-image', scrass);
		$('#imgback').css("background-size", "100% 100%");
	});
	$("#okHome").click(function() {
		$("#taglines").text($('#ags').val());  
		$("#compname").text($('#coms').val());
		var srcas = $('#blah').attr('src');
		$('#logoimg').attr('src', srcas);
		var scrs=  $('#imgback').css('background-image');
		$('#home').css("background", scrs);
		$('#home').css("background-size", "100% 100%");
	});

	$(function() {
		document.getElementById("titleabt").value =  $('#abttitle').text();
		document.getElementById("descabt").value =  $('#abtdesc').text();
	});
	$("#okAbt").click(function() {
		$("#abttitle").text($('#titleabt').val());  
		$("#abtdesc").text($('#descabt').val());
	});

//end of profilehome.php

//profile about -------------------------------------------



	/*importantpeople*/


	var ctrimp = 0;
	$("#editprofilepeople").click(function(){
	$('#abtpip').each(function() {
		ctrimp = $('.blocks', $(this)).length;
		if (ctrimp<1){
		ctrimp =1;
		}
	});

	$("#ImportantPeoplePanel").empty();

	for( var ia = 1; ia<=ctrimp; ia++){
		var srcimgperson = $('#Imgperson'+ia).attr('src');
		var newTextBox = $(document.createElement('div'))
	   .attr("id", 'PanelPeoples' + ia);     
		newTextBox.after().html('<label>Person Name' + ia + ' : </label>' +
			'<input type="text" placeholder = "Name of Important Person" class="form-control"  name="person' + ia + '" id="persona' + ia + '" value="'+  $("#nameabout"+ia).text()+'" >' +
			'<label>Position : </label>' +
			'<input type="text" placeholder = "Position" class="form-control"  name="position' + ia + '" id="position' + ia + '" value="'+  $("#positionabout"+ia).text()+'" >' +
                  '<input type="file"  numberss = "'+ia+'" onchange="readURLss(this);" name ="filepip'+ia+'"/>'+
                  '<img id="personImg'+ia+'" src="'+srcimgperson+'" alt="your image" style = "overflow:hidden; height: 200px; width: 200px;"/>'
			); 
		newTextBox.appendTo("#ImportantPeoplePanel");  
    }
    ctrimp++;
    document.getElementById("counterpip").value =  (ctrimp-1);


});

$("#addPerson").click(function () {   
  if(ctrimp>5){
    alert("Only 5 Persons allowed");
    return false;
	}    
  var newTextBox = $(document.createElement('div'))
	   .attr("id", 'PanelPeoples' + ctrimp);     
		newTextBox.after().html('<label>Person Name' + ctrimp+ ' : </label>' +
			'<input type="text" placeholder = "Name of Important Person" class="form-control"  name="person' + ctrimp + '" id="persona' + ctrimp + '">' +
			'<label>Position : </label>' +
			'<input type="text" placeholder = "Position" class="form-control"  name="position' + ctrimp + '" id="position' + ctrimp + '" >' +
                  '<input type="file" numberss = "'+ctrimp+'" onchange="readURLss(this);" name ="filepip'+ctrimp+'"/>'+
                  '<img id="personImg'+ctrimp+'" src="img/s.jpg" alt="your image"  style = "overflow:hidden; height: 200px; width: 200px;" />'
                  );
		newTextBox.appendTo("#ImportantPeoplePanel");  
  ctrimp++;
  document.getElementById("counterpip").value =  (ctrimp-1);
});


$("#removePerson").click(function () {
  if(ctrimp==0){
	  alert("No more Persons to remove");
	  return false;
   }     
  ctrimp--;
  document.getElementById("counterpip").value =  (ctrimp-1);
   $("#PanelPeoples" + ctrimp).empty();
});



//end of important people.

//services ================================

	var ctrserv = 0;
	$("#editservices").click(function(){
	$('#servicesprofile').each(function() {
		ctrserv = $('.col-lg-4', $(this)).length;
		if (ctrserv<1){
		ctrserv =1;
		}
	});

	$("#ServicesGroup").empty();

	for( var ia = 1; ia<=ctrserv; ia++){
		var srcimgperson = $('#Imgserv'+ia).attr('src');
		var newTextBox = $(document.createElement('div'))
	   .attr("id", 'Panelserv' + ia);     
		newTextBox.after().html('<label>Service Name' + ia + ' : </label>' +
			'<input type="text" placeholder = "Name of Service" class="form-control"  name="service' + ia + '" id="service' + ia + '" value="'+  $("#servname"+ia).text()+'" >' +
			'<label>Description : </label>' +
			'<textarea placeholder = "Position" class="form-control" row = 5; name="descser' + ia + '" id="descser' + ia + '"  > '+  $("#serdes"+ia).text()+' </textarea>' +
                  '<input type="file"  numberses = "'+ia+'" onchange="readURLsas(this);" name = "fileserv'+ia+'"/>'+
                  '<img id="servsImg'+ia+'" src="'+srcimgperson+'" alt="your image" style = "overflow:hidden; height: 200px; width: 200px;"/>'); 
		newTextBox.appendTo("#ServicesGroup");  
    }
    ctrserv++;
    document.getElementById("counterserv").value =  (ctrserv-1);

});

$("#addServ").click(function () {   
  if(ctrserv>5){
    alert("Only 5 Persons allowed");
    return false;
	}    
  var newTextBox = $(document.createElement('div'))
	   .attr("id", 'Panelserv' + ctrserv);     
		newTextBox.after().html('<label>Service Name' + ctrserv + ' : </label>' +
			'<input type="text" placeholder = "Name of Service" class="form-control"  name="service' + ctrserv + '" id="service' + ctrserv + '"  >' +
			'<label>Description : </label>' +
			'<textarea placeholder = "Position" class="form-control" row = 5; name="descser' + ctrserv + '" id="descser' + ctrserv + '"  >  </textarea>' +
                  '<input type="file"  numberses = "'+ctrserv+'" onchange="readURLsas(this);" name = "fileserv'+ctrserv+'"/>'+
                  '<img id="servsImg'+ctrserv+'" src="img/s.jpg" alt="your image" style = "overflow:hidden; height: 200px; width: 200px;"/>');
		newTextBox.appendTo("#ServicesGroup");  
  ctrserv++;
  document.getElementById("counterserv").value =  (ctrserv-1);
});


$("#removeServ").click(function () {
  if(ctrserv==0){
	  alert("No more Persons to remove");
	  return false;
   }     
  ctrserv--;
  document.getElementById("counterserv").value =  (ctrserv-1);
   $("#Panelserv" + ctrserv).remove();
});


//tagliness --------------------------------------------
$("#profiletaglineedit").mouseenter(function(){
		$("#thisTagline").animate({opacity: .5 },"fast");
		$(".taghover").animate({opacity: .7 },"fast");
	});
	$("#profiletaglineedit").mouseleave(function(){
		$(".taghover").animate({opacity: 0},"fast");
		$("#thisTagline").animate({opacity: 1 },"fast");
	});

	$(function() {
		document.getElementById("profiletagline").value =  $('#thisTagline').text();
		var tagss=  $('#profiletaglineedit').css("background-image");
		$('#profiletaglineimage').css("background-image" , tagss);
		$('#profiletaglineimage').css("background-size", "100% 100%");
	});


	$("#oKtag").click(function() {
		$("#thisTagline").text($('#profiletagline').val());  
		var scrs=  $('#profiletaglineimage').css('background-image');
		$('#profiletaglineedit').css("background", scrs);
		$('#profiletaglineedit').css("background-size", "100% 100%");
	});





//profilecontact.php
var counter = 2;

$("#addButton").click(function () {      
  if(counter>5){
    alert("Only 5 Contacts allow");
    return false;
	}    
  var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);      
  newTextBoxDiv.after().html('<label>Contact Information '+ counter + ' : </label>' +'<input type="text" placeholder = "Contact Number or E-mail Address" class="form-control"  name="textbox' + counter + '" id="textbox' + counter + '" value="" >');
  newTextBoxDiv.appendTo("#TextBoxesGroup");  
  counter++;
});

$("#removeButton").click(function () {
  if(counter==0){
	  alert("No more textbox to remove");
	  return false;
   }     
  counter--;
   $("#TextBoxDiv" + counter).empty();
});
    
$("#okCont").click(function () {
	$("#conts").empty();	  
  for(i=1; i<counter; i++){
	  	if($('#textbox' + i).val() != "")
	  	{
		  	var newdivcont = document.createElement('div');
		    newdivcont.setAttribute("class", 'row' ); 
		    newdivcont.setAttribute("id" ,''+i);     
			$(newdivcont).after().html(' <p id = "contactnums">'+$('#textbox' + i).val()+' </p>');
			$(newdivcont).appendTo("#conts");

			 var a = $('#textbox' + i).val()
		      $.post('profilequery.php',{"Contactdetail":a});
		}
   }
   $("#location").text($('#modallocation').val()); 
   $("#fblink").attr("href", $('#linkfb').val());
   $("#twlink").attr("href", $('#linktw').val());
   $("#iglink").attr("href", $('#linkig').val());
   $("#gplink").attr("href", $('#linkgp').val());

   var a = $('#linkfb').val();
   var b = $('#linktw').val();
   var c = $('#linkig').val();
   var d = $('#linkgp').val();
   $.post('profilequery.php',{"fb":a, "tw":b, "ig":c, "gp":d});


});

$("#edithomecontact").click(function(){
	$('#conts').each(function() {
		counter = $('.row', $(this)).length;
		if (counter<1){
		counter =1;
		}
		
	});
	$("#TextBoxesGroup").empty();
	for(i = 1; i<=counter; i++){
		var newTextBox = $(document.createElement('div'))
	   .attr("id", 'TextBoxDiv' + i);      
		newTextBox.after().html('<label>Contact Information '+ i + ' : </label>' +'<input type="text" placeholder = "Contact Number or E-mail Address" class="form-control"  name="textbox' + i + '" id="textbox' + i + '" value="'+  $("#"+i).text()+'" >');
		newTextBox.appendTo("#TextBoxesGroup");  
    }
    counter++;
	//insert codes here
	document.getElementById("modallocation").value =  $('#location').text();
	document.getElementById("linkfb").value =  $('#fblink').attr("href");
	document.getElementById("linktw").value =  $('#twlink').attr("href");
	document.getElementById("linkig").value =  $('#iglink').attr("href");
	document.getElementById("linkgp").value =  $('#gplink').attr("href");
	
});

});
//profilehome function
function readURL(input) { 
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#blah').attr('src', e.target.result);                          
		}
		reader.readAsDataURL(input.files[0]);
	}
}
function readURLs(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#imgback').css('background-image', "url("+e.target.result+")");                                  
		}
		reader.readAsDataURL(input.files[0]);
	}
}
//end of profilehome.php

//profiletagline.php
function readURLtagline(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#profiletaglineimage').css('background-image', "url("+e.target.result+")");                                  
		}
		reader.readAsDataURL(input.files[0]);
	}
}


//profileaboutPersonImg
function readURLss(input) { 
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			var numImg = $(input).attr('numberss');  
			$('#personImg'+numImg).attr('src', e.target.result);                             
		}
		reader.readAsDataURL(input.files[0]);
	}
}

//prfileservices
function readURLsas(input) { 
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			var numser = $(input).attr('numberses');  
			$('#servsImg'+numser).attr('src', e.target.result);                             
		}
		reader.readAsDataURL(input.files[0]);
	}
}