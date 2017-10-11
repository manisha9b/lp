<?php

	// Get Vale From Input First Name
	$fname = trim($_POST['fname']);
	$fname = strip_tags(htmlspecialchars($fname));
	$fname = str_replace(array("\r","\n"),array(" "," "),$fname);
	
	// Get Vale From Input Last Name
	$lname = trim($_POST['lname']);
	$lname = strip_tags(htmlspecialchars($lname ));
	$lname = str_replace(array("\r","\n"),array(" "," "),$lname);
	
	// Get Vale From Input Name Subject
	$subject = trim($_POST['subject']);
	$subject = strip_tags(htmlspecialchars($subject));
	
	// Get Vale From Input Name Email
	$email = trim($_POST['email']);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	
	// Get Vale From Input Name Msg
	$msg = trim($_POST['msg']);
	$msg = strip_tags(htmlspecialchars($msg));
	
	
	// Check if Vale is Empty then Exit
	if ( empty($fname) || empty($lname) || empty($subject) || empty($email) || empty($msg) ){
		echo "Please fill out the all fields";
	}
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email Adderss is not valid";
    }
    else{
	
		$mail_to = "nabi.rangpur@gmail.com"; 	// Change Your Email Address Here

		$name = $fname.' '.$lname;
		
		$email_subject  = "A new message from healthcare website ". $name;
		
		$msg_body  = "Name: ".$name."\r\n";
		$msg_body .= "Subject: ".$subject."\n";
		$msg_body .= "Email: ".$email."\n\n";
		$msg_body .= "Message:\n".$msg."\n";
		$email_headers  = "From <" .$email. "> ";
		
		if(mail($mail_to, $email_subject, $msg_body, $email_headers)){
			
			echo " Thank You! Your Message Has Been Sent Successfully";
		}else{
			
			echo " Oops! Somethis went wrong.we couldn't sent your message";
		}
	}
	
