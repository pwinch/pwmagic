<?php

session_start();
if(($_SESSION['security_code'] == $_POST['security_code']) && (!empty($_SESSION['security_code'])) ) {
	// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
	unset($_SESSION['security_code']);
	#print_r($_REQUEST) . "<br />";
	#exit;
	$msg2=proc_info($_REQUEST);
} else {
	echo "Sorry.  You didn't enter the correct Captcha Code!<br />";	
	// Insert your code for showing an error message here
	unset($_SESSION['security_code']);
}

function proc_info($info)
{
	extract($info);
	include "/home/peterw/public_html/classes/databaseClass.php";
	$db = new Database();
	$db->connectMagic();
	foreach($info as $ik=>$iv)
	{
		$label[]=$ik;
		$val[]=mysql_real_escape_string($iv, $db->magic());
	}
	$labels = implode(", ", $label);
	$values = "'" . implode("','" , $val) . "'";
	$isql = "INSERT INTO contact_us($labels) VALUES ($values)";
	#echo "$isql <br />";
	mysql_query($isql, $db->magic());
	
	$msg = "Hey Gang,<br />We just got at lead from $inquisitor_fname, $inquisitor_lname ($inquisitor_email) Requesting<b> $subject:<br />$inquiry</b><br /><br />Please get back to them with a quote.<br /><br />Thanks<br /><br >Lead System";

	$msg2 = "Dear $inquisitor_fname,<br /><br />Thank you for taking the time to inquire about how The Magic of Peter Winch &amp; Miss Direction can help make your next event and theatrical, magical and entertaining one.<br /><br />We've contact our sales department and someone will get back to you soon to discuss the options<br /><br />Peter Winch<br />Magician";

	$CC="Miss Direction <miss.direction@peterwinchmagic.com>\n";

        $header = "";
        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=iso-8859-1\n";
        $header .= "From: Peter Winch <peter@peterwinchmagic.com>\n";
        if(!is_null($BCC))
                $header .= "Bcc: " . $BCC . " \n";
        if(!is_null($CC))
                $header .= "CC: " . $CC . " \n";

        $header .= "Return-Path: Peter Winch <peter@peterwinchmagic.com>\n";
        $header .= "Return-Receipt-To: Exteres Corporation<peter@peterwinchmagic.com>\n";
        $header .= "Reply-To: Peter Winch <peter@peterwinchmagic.com>\n";

	$db->disconnectMagic();
	unset($db);
	mail("peter@peterwinchmagic.com","New Lead",$msg,$header);
	mail("peter@shadowmanmagic.com","nl",$header);
	$to = "$inquisitor_fname $inquisitor_name <$inquisitor_email>";
	mail($to,"Thank you for  your inquery!",$msg2,$header);
	return $msg2;
}

?>
<head>
<html>
<title>Thank You</title>
<style type="text/css">
body{
	background-color: black;
	color: green;
	font-weight: bold;
}
#container{
	width: 900px;
	margin: 20px;
}
</style>
</head>
<body>
<div id='container'>
<?=$msg2?>
</div>
</body>
</html>
