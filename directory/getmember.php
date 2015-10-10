<?php
$con = mysqli_connect('localhost', 'root', '', 'dbpcci');
if (!$con) {
	die("Could not connect:" . mysqli_error);
}
$query  = "SELECT tblmembers.companyname, tblmembers.nature, tblmembers.interest, tbltags.tags, tblprofilehome.logoimg, tblproperties.url FROM tblmembers 
			INNER JOIN tbltags ON tblmembers.id = tbltags.id
			INNER JOIN tblprofilehome ON tblmembers.id = tblprofilehome.id
			INNER JOIN tblproperties ON tblmembers.id = tblproperties.id ";
$result = $con->query($query);
$res    = array();
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$res[] = $row;
	}
} else {
	echo 'No data existing!';
}
$response = json_encode($res);
echo $response;
?>

