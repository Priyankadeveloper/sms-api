<?php 
include(config.php);
if(isset($_POST['submit'])){
    $to = "contactus@gintara.in"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $fle=$_FILES["fle"]["name"];
    $tmp=$_FILES["fle"]["tmp_name"];
    move_uploaded_file($tmp,"upload/".$fle);
   if($_FILES["fle"]["name"]!==""){
/*    $query_image=mysql_query("insert into users set profile_pic='$fle' where email='$email'");
*/    $image=mysql_query("SELECT * from users ORDER by id DESC LIMIT 1");
    $image=mysql_fetch_array($image);


    }
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the Comment of following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];
    $message3 = "Here is a copy of your message " .'<img src="upload/".$fle>'. "\n\n" . $_POST['message'];


    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
Approved: <input type="radio" name="first_name" value="Approved"><br>
Disapproved: <input type="radio" name="last_name" value="Disapproved"><br>
<input type="hidden" name="email" value="priyankadecentinfotech@gmail.com"><br>
Comment:<br><textarea rows="5" name="message" cols="30"></textarea><br>
Image: <img src="https://decentinfotechab.com/event_website/upload/Chrysanthemum.jpg" width="300px" height="300px"><br/>
<!--Image:<br/><input type="file" name="fle"/>
--><input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 