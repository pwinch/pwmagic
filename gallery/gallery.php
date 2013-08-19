<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Some photos from our past events</title>
<meta name='keywords' content='Grand Illusion, Corporate Events, Fundraisers Images, Low Angeles Illusion Show, Hollywood Fundraiser' />
<meta name='descriptoin' content='View some photos from our events throughout California, including Fundraisersin Los Angeles and Hollywood' />
<?php
	include "/home/peterw/public_html/classes/databaseClass.php";
	$db = new Database();
	$db->connectMagic();

        include "/home/peterw/public_html/classes/page_tracker.php";

        $pt = new PTracker($db);
        $pt->report();

        unset($pt);
?>

<style type='text/css'>
body{
	background-color: black;
	color: green;
}
#container{
	margin: 15px;
	width: 750px;
	text-align: center;
}
div#container2 {
    height: 275px;
    width: 1000px;
    overflow: auto;
    white-space: nowrap;
}

div#photo_blowup {
    width: 400px;
    height: 500px;
    top: 200px;
    left: 10px;
    position: absolute;
    z-index: 100;
}

</style>
<meta type='description' content='Photos from Many Illusions we have used for our Corporate clients throughout California, Nevada, Arizona, and Montana' />
</head>
<body>
	<center><div id="container">
<?
	$sql = "SELECT gid, imgname, level, width, height FROM gallery ORDER BY level DESC";
	$rs = mysql_query($sql, $db->magic());
	while($row = mysql_fetch_assoc($rs))
	{
		extract($row);
		list($major,$minor)=explode(".",$level);
		$img_level[]=$level;
		$img[$major][$minor]=($imgname == "tophat" ? "<a href='http://www.peterwinchmagic.com' title='Return Home'>":"") . "<img src='/images/gallery/$imgname.png' style='" . ($major>0 ? "border: 2px white solid;":"") . " height: " . ($height/4) . "px; width: " . ($width/4) .  "px;' " . ($major>0 ? "class='hover'":"") . " />" . ($imgname=="tophat" ? "</a>":'');
		$img_width[$major][$minor]=$width;
		$img_height[$major][$minor]=$height;
	}
	mysql_free_result($rs);
?>
	<table>
<?
	foreach($img as $major=>$other)
	{
	#	echo "M: $major\n";
	#	$imgs=array_reverse($img,true);
	#	print_r($imgs[$major]) . "\n";

		$blanks = 4 - count($img[$major]);
		echo "<tr>"; //B: $blanks\n";
		for($x=0;$x<$blanks;$x++)
			echo "<td style='min-width: 100px;'></td>\n";
		echo "<td>" . implode("</td><td style='min-width: 100px;'></td><td align='cener' valign='middle'>" , array_reverse($img[$major])) . "</td></tr>\n";
	#	echo min($img[$major]) . "\n";
#exit;
	}
?>
		</table>
	</div></center>
	<div id='photo_blowup'><img id='blowup' src="/images/gallery/spacer.png" border='0' /></div>
</body>
<?
	$db->disconnectMagic();
?>
                <link type="text/css" href="/jquery/css/ui-lightness/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
                <!-- link type="text/css" href="http://www.exteres.net/Demo/demo.css" rel="stylesheet" />
                <script type="text/javascript" src="http://www.exteres.net/Demo/demo.js"></script -->
                <script type="text/javascript" src="/jquery/js/jquery-1.4.2.min.js"></script>
                <script type="text/javascript" src="/jquery/js/jquery-ui-1.8.5.custom.min.js"></script>
                <script language="javascript">
                        $(function(){
				$(".hover").mouseover(function()
				{
					var info = $(this).attr('src');
					$("#blowup").attr('src',info);
				});
				$(".hover").mouseout(function()
				{
					$("#blowup").attr('src','/images/gallery/spacer.png');
				});
                                $("#more_information").toggle();
                                $("#moreinfoswitch").live('click',function()
                                {
                                        $("#Close").toggle();
                                        $("#moreinfo").toggle();
                                        $("#more_information").toggle();
                                });
                        });
                </script>

</html>

