<head></head>
<link rel="stylesheet" type="text/css" href="frontpage.css">

</head><body >
<div class=center style="width:1200px;position: relative; ">
	
	<img src="logo.jpg" alt="Mountain View" style=";left:310;position:absolute;width:1200px;height:px;">
	<div class=left>
<?php
    $rss = new DOMDocument();
	$ini_array = parse_ini_file("rss.ini");
	$color="grow";
    echo "</br></br></br></br></br>";
	$start=420;
	$height=200;
	foreach( array_keys($ini_array) as $tag ) {
			echo '<a class="';
	echo $color;
	echo '"  href="./new_file.php?var=';
	echo $tag;
	echo '">';
	echo '<h2 style=" left: ';
	echo $start;
	echo ';top: ';
	echo $height;
	echo ';' ;
	echo '" >';

	echo $tag;
	echo "</h2>";	
	echo "</a>";
	$start=$start+strlen($tag)*15+30;
	if($start>750&&$start<930){
		$color="grow1";
		$start=930;

	}
	if($start>1200){$start=420;
	echo '</br>';$color="grow";
				$height =$height+30;
	}
	
	}
	echo "</h2>";	 ?>
</div></div>
</body> </html>