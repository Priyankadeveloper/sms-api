<?php
include(config.php);
if(isset($_POST['submit'])){

$to = 'xxx@gmail.com';

$subject = 'HTML Form in HTML Email';

$headers = "From: xxx@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$fle=$_FILES["fle"]["name"];
$tmp=$_FILES["fle"]["tmp_name"];
move_uploaded_file($tmp,"upload/".$fle);
mysql_query("INSERT into users(profile_pic) values ('$fle')");

$message = '<html><body>';
$message .= '<form action="http://decentinfotechab.com/event_website/linkform.php" method="post" target="_blank" enctype="multipart/form-data">';
/*$message .= '<label>Upload Image</label><br />';
$message .= '<input name="rating" type="file" name="fle"/> ★☆☆☆<br />';
$message .= '<input name="rating" type="radio" /> ★★☆☆<br />';
$message .= '<input name="rating" type="radio" /> ★★★☆<br />';
$message .= '<input name="rating" type="radio" /> ★★★★<br />';
$message .= '<br />';*/
$message .= 'http://decentinfotechab.com/event_website/linkform.php';
/*$message .= '<label for="commentText">Leave a quick review:</label><br />';
$message .= '<textarea cols="75" name="commentText" rows="5"></textarea><br />';
$message .= '<br />';
$message .= '<img src="upload/".$fle/><br/>';
$message .= '<input type="submit" value="Submit your review" name="submit"/>&nbsp;</form>';
*/
$message .= '</body></html>';


$send=mail($to, $subject, $message, $headers);
}
?>
<form action="" method="post" enctype="multipart/form-data">
Image:<br/><input type="file" name="fle"/>
<input type="submit" name="submit" value="Submit">
</form>