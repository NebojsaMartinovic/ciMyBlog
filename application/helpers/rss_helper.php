<?php 
function getRSS($link){
	$rss = file_get_contents($link);
	$xml = simplexml_load_string($rss);
	$posts = array();
	foreach($xml->channel->item as $item){
			$posts[] = array(
				'title'=>(string)$item->title,
				'description'=>(string)$item->description,
				'pubDate'=>(string)$item->pubDate,
				'link'=>(string)$item->link
				);
	}
	return $posts;
}

 ?>