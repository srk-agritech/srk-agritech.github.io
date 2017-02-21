<?php 
$errors = '';
$myemail = 'aggrawal.jiten@gmail.com';//<-----sales executive.
if(empty($_POST['txtname'])  || 
   empty($_POST['txtemail']) || 
   empty($_POST['txtquery']))
{
    $errors .= "\n Error: all fields are required";
}

$txtname = $_POST['txtname']; 
$txtemail = $_POST['txtemail']; 
$txtphone = $_POST['txtphone'];
$txtaddress = $_POST['txtaddress'];
$txtquery = $_POST['txtquery'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$txtemail))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $txtname \n Email: $txtemail \n Phone-mobile: \n $txtphone \n Addresse:  \n $txtaddress \n Query: \n $txtquery "; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $txtemail";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>