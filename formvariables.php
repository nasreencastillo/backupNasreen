<?php

        $telephone = mysql_real_escape_string($_POST['tel']);
        $noc = mysql_real_escape_string($_POST['noc']);
        $fax = mysql_real_escape_string($_POST['fax']);
        $cell = mysql_real_escape_string($_POST['cell']);
        $email = mysql_real_escape_string($_POST['e-mail']);
        $nat = mysql_real_escape_string($_POST['natofbus']);
        $intss = mysql_real_escape_string($_POST['interest']);
        $doa =  mysql_real_escape_string($_POST['doa']);
        $foc = mysql_real_escape_string($_POST['foc']);
        $ye = mysql_real_escape_string($_POST['year']);
        $noe = mysql_real_escape_string($_POST['noe']);
        $memid ="";

        $cfn1 = mysql_real_escape_string($_POST['fname1']);
        $cmn1 = mysql_real_escape_string($_POST['mname1']);
        $cln1 = mysql_real_escape_string($_POST['lname1']);
        $cd1 = mysql_real_escape_string($_POST['des1']);

        $cfn2 = mysql_real_escape_string($_POST['fname2']);
        $cmn2 = mysql_real_escape_string($_POST['mname2']);
        $cln2 = mysql_real_escape_string($_POST['lname2']);
        $cd2 = mysql_real_escape_string($_POST['des2']);

        $rfname1 = mysql_real_escape_string($_POST['rfnam1']);
        $rmname1 = mysql_real_escape_string($_POST['rmname1']);
        $rlname1 = mysql_real_escape_string($_POST['rlname1']);
        $rdes1 = mysql_real_escape_string($_POST['rdes1']);
        $radd1 =mysql_real_escape_string( $_POST['radd1']);
        $rcn1 = mysql_real_escape_string($_POST['rcn1']);
        $rem1 = mysql_real_escape_string($_POST['rem1']);

        $rfname2 = mysql_real_escape_string($_POST['rfnam2']);
        $rmname2 = mysql_real_escape_string($_POST['rmname2']);
        $rlname2 = mysql_real_escape_string($_POST['rlname2']);
        $rdes2 = mysql_real_escape_string($_POST['rdes2']);
        $radd2 = mysql_real_escape_string($_POST['radd2']);
        $rcn2 = mysql_real_escape_string($_POST['rcn2']);
        $rem2 = mysql_real_escape_string($_POST['rem2']);

        $compaddress = mysql_real_escape_string($_POST['adres']); 

        $urls = mysql_real_escape_string($_POST['urls']); 
        $folders = mysql_real_escape_string($_POST['folders']); 

        $us = mysql_real_escape_string($_POST['usn']); 
        $pw = mysql_real_escape_string($_POST['pass']); 

        $tags =  mysql_real_escape_string($_POST['tags']); 

        ?>