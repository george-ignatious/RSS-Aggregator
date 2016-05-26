<head></head>
<link rel="stylesheet" type="text/css" href="new_file.css">
</head><body>
<?php
    $rss = new DOMDocument();
	$sites =  file('sites.txt');
	$feed = array();
	foreach( $sites as $site ) {
	$rss->load($site);
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
    echo '<h1>RSS Feed Aggregator</h1>';
    $limit = 200;
    foreach( $feed as $post ) {
        $title = str_replace(' & ', ' &amp; ', $post['title']);
        $link = $post['link'];
        $description = $post['desc'];
        $date = $post['date'];
        
 echo '<h5>';
        echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
        echo '<small><em>Posted on '.$date.'</em></small></p>';
        echo '<p>'.$description.'</p>';
		echo '</br></br></br>';
		 echo '</h5>';
       

    }
?></body> </html>