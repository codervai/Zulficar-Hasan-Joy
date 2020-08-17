<?php 
if(isset($_POST['email']))
{
  $firstname = $_POST['name']; // type your form feild name
  $email = $_POST['email']; // type your form feild name
  $subject = $_POST['subject']; // type your form feild name
  $message = $_POST['message']; // type your form feild name
  $date = time();

  $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
    {
      $ipaddress = getenv('HTTP_CLIENT_IP');
    }
    else if(getenv('HTTP_X_FORWARDED_FOR')){
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    }
    else if(getenv('HTTP_X_FORWARDED')){
        $ipaddress = getenv('HTTP_X_FORWARDED');
    }
    else if(getenv('HTTP_FORWARDED_FOR')){
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    }
    else if(getenv('HTTP_FORWARDED')){
       $ipaddress = getenv('HTTP_FORWARDED');
    }
    else if(getenv('REMOTE_ADDR')){
        $ipaddress = getenv('REMOTE_ADDR');
    }
    else{
        $ipaddress = 'UNKNOWN';
    }

  $email_message = "Contact Us<br/>
          One new Inquiry come from Company Name<br/>
          <b>First Name: </b>".$name."<br/>
          <b>Email Id: </b>".$email."<br/>
          <b>Subject: </b>".$subject."<br/>
          <b>Message: </b>".$message."<br/>
          <b>IP </b>".$ipaddress."<br/>";


  $headers ='';
    $headers .="From:".$name."<".$email."> \r\n".
    "Reply-To:".$email." \r\n" .  
    "X-Mailer: PHP/" . phpversion()." \r\n";  
    $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";
    
    if(mail('your email here' ,'Contact Us', $email_message,$headers))
    {
       $_SESSION['success_contact'] = 'Your Request Successfully Sent';
    }
    unset($_POST);
  
}

?>
