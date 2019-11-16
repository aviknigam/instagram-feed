<?php

// INCLUDE THIS FUNCTION
function instagramGET($picID) {
	$content = file_get_contents("https://www.instagram.com/p/$picID");
	preg_match('/meta property="og:image" content="(.*)" \/>/', $content, $output_array);
	$output = $output_array[1];
	echo $output;
}
?>

<!-- 
	
	Extract the part of the instagram permalink URL
	e.g. https://www.instagram.com/p/Bwgu4s3B2qe/  <--- the letters and numbers after the /p/ ==> Bwgu4s3B2qe

 -->
 
<img class="" src="<?= instagramGET('Bwgu4s3B2qe'); ?>" alt="" height="300px">