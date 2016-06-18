<head></head>
<link rel="stylesheet" type="text/css" href="new_file.css">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head><body><div class="container-fluid wrapper">
<div class="header"><h1>RSS Feed Aggregator</h1></div>
<?php
    $rss = new DOMDocument();
	$variable = $_GET["var"];
	$sites =  parse_ini_file("rss.ini");
	$feed = array();
$site=$sites[$variable];
foreach ($site as $ssite) {
	

	$rss->load($ssite);
    $files[0]=$rss;
    
	foreach( $files as $file ) {
    foreach ($file->getElementsByTagName('item') as $node) {
        $feed[$node->getElementsByTagName('pubDate')->item(0)->nodeValue] = array ( 
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            
            );
	
	}}}
	
        krsort( $feed );
		$feed=array_values($feed);
    
    $limit = 200;
	 ?>
	 <hr>
	 <?php
    for( $i = 1; $i <= sizeof($feed); $i=$i+3 ) {
    	echo '<div class="row arjun">';
		echo '<div class="col-md-1"></div>';
    	for( $j = $i; $j <=$i+ 2&&$j<sizeof($feed); $j=$j+1 ){
    	$post=$feed[$j];
        $title = str_replace(' & ', ' &amp; ', $post['title']);
        $link = $post['link'];
        $description = $post['desc'];
        $date = $post['date'];?>
      <div class='sec col-md-3'>

 	<?php
        echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
        echo '<small><em>Posted on '.$date.'</em></small></p>';
        echo '<p>'.$description.'</p>';
		echo '</br></br></br>';
		 
?>


       </div>
       <?php
		}echo '<div class="col-md-1"></div>';?>
		</div>
		<?php
    }
?></div>
</body> </html>