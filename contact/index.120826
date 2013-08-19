<html>
<head>
<title>Contact Us!</title>
<?php
        include "/home/peterw/public_html/classes/databaseClass.php";
        include "/home/peterw/public_html/classes/page_tracker.php";

        $db = new Database();
        $db->connectMagic();

        $pt = new PTracker($db);
        $pt->report();

        unset($pt);
        $db->disconnectMagic($db);
        unset($db);
?>

<style type='text/css'>
#container{
	width: 900px;
	margin: 20px;
}
.input_line{
	clear: both;
	width: 900px;
	padding-bottom: 10px;
	margin-bottom: 10px;
	height: 12px;
	font-weight: bold;
}
.section{
	float: left;
	width: 150px;
	text-align: right;
}

.line_sect{
	float: left;
}
body{
	background-color: black;
	color: green;
}
label{
	padding-right: 5px;
}
</style>

</head>
<body>
<div id='container'>
	<img src='/images/contactUs2.png' border='0' />
	<div width='850' style='width: 850px; font-size: 20px;'>
		Hello and thank you for your interest in having Peter Winch & Miss Direction help to make you event a magical one!  We offer a wide variety of performances to suit several needs, such as Blue & Gold Dinner Event, to Corporate Events to Fundraiser Shows...
	</div>
<form method='post' action='proc.php'>
<div class='input_line'>
	<div class='section' width='150' style='width: 150px;'>
<label>Enter your name: </label>
	</div>
	<div class='line_sect' style='width: 100px;'><input type='text' width='95' id='inquisitor_fname' name='inquisitor_fname' style='width: 95px;' /></div>
	<div class='line_sect' style='width: 100px;'><input type='text' width='95' id='inquisitor_lname', name='inquisitor_lname' style='width: 95px;' /></div>
</div>
<div class='input_line'>
	<div width='150' style='float: left; width: 150px; min-width: 150px; nax-width: 150px;'>
<label>&nbsp;</label>
	</div>
	<div class='line_sect' style='width: 100px;'><i>(First Name)</i></div>
	<div class='line_sect' style='width: 100px;'><i>(Last Name)</i></div>
</div>
<!-- div class='input_line'>
	<div class='section'><label>Subject: </label></div>
	<div class='line_sect' style="width: 300px;"><input type='text' id='subject' name='subject' style='width: 300px;' /></div>
</div>
<div class='input_line'>
	<div class='section'><label>Inquiry: </label></div>
	<div class='line_sect'>
	<textarea rows='20' cols='40' id='inquiry' name='inquiry'></textarea>
	</div>
</div -->
<div class='input_line'>
	<div class='section'><label>e-mail:</label></div>
	<div class='line_sect'><input type='text' id='inquisitor_email' name='inquisitor_email' style='width: 200px;' />
	</div>
</div>
<div class='input_line'>
<img src="captcha.jpg" alt="" />
Security Code:
<input id="security_code" name="security_code" type="text" />
</div><br />
<div id='controls' class='input_line'>
	<input type='submit' value='Make Inquiry' />
</div>
</form>
</div>
</body>
</html>
