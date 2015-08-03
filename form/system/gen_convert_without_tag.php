<?php 
	function getTextBetweenTags($string, $tagname) {
	    $pattern = "/<$tagname ?.*>(.*)<\/$tagname>/";
	    preg_match($pattern, $string, $matches);
	    return $matches[1];
	}
?>