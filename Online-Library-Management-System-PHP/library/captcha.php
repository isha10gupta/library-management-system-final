<?php 
// Start a new session or resume the existing session
session_start(); 

// Generate a random number between 10000 and 99999
$text = rand(10000,99999); 

// Store the generated random number in a session variable
$_SESSION["vercode"] = $text; 

// Set the dimensions of the CAPTCHA image
$height = 25; 
$width = 65;   

// Create a blank image with the specified dimensions
$image_p = imagecreate($width, $height); 

// Allocate black color for the image background
$black = imagecolorallocate($image_p, 0, 0, 0); 

// Allocate white color for the text
$white = imagecolorallocate($image_p, 255, 255, 255); 

// Set the font size for the text
$font_size = 14; 

// Add the generated random number (text) to the image at the specified position
imagestring($image_p, $font_size, 5, 5, $text, $white);  

// Output the image in JPEG format with a quality of 80
imagejpeg($image_p, null, 80); 
?>  
