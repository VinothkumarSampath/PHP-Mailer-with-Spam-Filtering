<?php session_start();
if (isset($_POST["op"]) && ($_POST["op"]=="send")) {  

		/******** START OF CONFIG SECTION *******/
		$subject1 = "Contact Form ";
		// Select if you want to check form for standard spam text
		$SpamCheck = "Y"; // Y or N
		$SpamReplaceText = "*content removed*";
		// Error message prited if spam form attack found
		$SpamErrorMessage = "<p align=\"center\"><font color=\"red\">Malicious code content detected.
		</font><br><b>Your IP Number of <b>".getenv("REMOTE_ADDR")."</b> has been logged.</b></p>";
		/******** END OF CONFIG SECTION *******/
		
		$name		    = $_POST['name'];
		$suburb			= $_POST['suburb'];
		$address		= $_POST['service'];
		$phone		    = $_POST['phone'];
		$email		    = $_POST['email'];
		$comments	    = $_POST['comments'];

		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				} else { ?>
					<script type="application/javascript">
					window.location="thankyou.php?send=2#page";
					</script>
				<?php	exit();
		} 
		
		
	$word='Cryto';
		$mystring = $name.' '.$comments;

             if(strpos($mystring, $word) !== false){
                  echo "<script> alert('Error. Plese try again.');
                  window.history.back();
                  </script>";
              exit;

             }

	$userph= substr($phone, 0, 2);
		$peps=array(81,82,83,84,85,86,87,88,89,80,90,91,92,93,94,95,96,97,98,99);
		if (in_array($userph, $peps))
             {
              echo '<script>  alert("Malicious code content detected please try agin");
                    window.history.back();
             </script>';
             exit();
             }


  $ccl=str_word_count($comments);
			if($ccl <=1){

			     echo '<script>  alert("Please enter your comments more than one words!..");

                window.history.back();
             </script>';
                     exit();
			}

		
		if ($SpamCheck == "Y") 
			{		   
			// Check for Website URL's in the form input boxes as if we block website URLs from the form,
			// then this will stop the spammers wastignt ime sending emails
			if (preg_match("/http/i", "$name")) {echo "$SpamErrorMessage"; exit();}
			if (preg_match("/http/i", "$address")) {echo "$SpamErrorMessage"; exit();} 
			if (preg_match("/http/i", "$email")) {echo "$SpamErrorMessage"; exit();} 
			if (preg_match("/http/i", "$phone")) {echo "$SpamErrorMessage"; exit();} 
			if (preg_match("/http/i", "$comments")) {echo "$SpamErrorMessage"; exit();} 
			
			// Patterm match search to strip out the invalid charcaters, this prevents the mail injection spammer 
			$pattern = '/(;|\||`|>|<|&|^|"|'."\r|'".'|{|}|[|]|\)|\()/i'; // build the pattern match string 
			
			$name = preg_replace($pattern, "", $name);
			$address = preg_replace($pattern, "", $address);
			$email = preg_replace($pattern, "", $email); 
			$phone = preg_replace($pattern, "", $phone); 
			$comments = preg_replace($pattern, " ", $comments); 
			
			// Check for the injected headers from the spammer attempt 
			// This will replace the injection attempt text with the string you have set in the above config section
			$find = array("/bcc\:/i","/Content\-Type\:/i","/cc\:/i","/to\:/i"); 
			$name = preg_replace($find, "$SpamReplaceText", $name);
			$address = preg_replace($find, "$SpamReplaceText", $address);
			$email = preg_replace($find, "$SpamReplaceText", $email); 
			$phone = preg_replace($find, "$SpamReplaceText", $phone); 
			$comments = preg_replace($find, "$SpamReplaceText", $comments); 
			
			// Check to see if the fields contain any content we want to ban
			if(stristr($name, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 
			if(stristr($comments, $SpamReplaceText) !== FALSE) {echo "$SpamErrorMessage"; exit();} 

		}
		
		if (preg_match("/seo|search engine optimization|first page|ass|Como puedo|+1 213 425 1453|Muchas|porn|mouth|fuck|cum|blow job|throat|1st page|1 page|top page|search engines|search engine|Cкaйп|Ламинин|Черновцах|Черновцы|Л|и|й|search rank/i", "$comments")) {
			$subject1 = "V G R A";
			$email1	= "vgra@otpspr.nets";
			$mail_content = "XJS*C4JDBQADN1.NSBN3*2IDNEN*GTUBE-STANDARD-ANTI-UBE-TEST-EMAIL*C.34X";
		} 
		else
		{
			$email1	= "enquiry@website.com.au";
			$mail_content = '
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Notification</title>
				<style>
				body{
				font-family:Arial, Helvetica, sans-serif;
				font-size:14px;
				width:800px;
				height:auto;	
				color:#2F2F2F;
				line-height:20px;
				float:left;
				border:2px solid #CCC;
				padding:20px;
				border-radius:10px;
				-webkit-border-radius:10px;
				-moz-border-radius:10px;
				}
				figure{
				float:right;
				}
				.wrap_01{
				float:left;
				}
				.highlight{
				font-size:15px;
				color:#06C;
				}
				.highlight a {
				text-decoration:none;
				color:#06C;
				}
				.high_01{
				font-weight:bold; color:#06C;
				}
				.address{
				font-size:13px;
				float:left;
				}
				.address p{
				line-height:5px;
				}
				.title{
				font-size:30px;
				
				font-weight:bold;
				color:#00A1EB;
				}
				.footertxt{
				padding:0px;
				margin:0px;
				color:#333;
				font-size:12px;
				}
				</style>
			</head>
			
			<body>
				
				<div class="wrap_01">
				Enquiry from the website
				<p> <span class="high_01">Name</span> : '.$name.'.</p>
				<p> <span class="high_01">Email-Id</span> : '.$email.'.</p>
				<p> <span class="high_01">Phone</span> : '.$phone.'</p>
				<p> <span class="high_01">Suburb</span> : '.$suburb.'</p>
				<p> <span class="high_01">Service</span> : '.$address.'</p>
				<p> <span class="high_01">Message</span> : '.$comments.'</p>
			
				</div>
			</body>
			</html>';
		}
		
		
			//error_reporting(E_ALL);
			error_reporting(E_STRICT);
			
			//date_default_timezone_set('America/Toronto');
			
			require_once('mailer/class.phpmailer.php');
			//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
			
			$mail             = new PHPMailer();
			
			//$body             = file_get_contents('contents.html');
			$body = $mail_content;
			//$body             = preg_replace('/[\]/','',$body);
			
		//	$mail->IsSMTP(); // telling the class to use SMTP
			$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Host       = "website.com.au"; // sets the SMTP server
			$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
			$mail->Username   = "enquiry@website.com.au"; // SMTP account username
			$mail->Password   = "password";        // SMTP account password
			
			//change this
			//$mail->SetFrom($email, $name);
			$mail->SetFrom($email1, $name);
			$mail->AddReplyTo($email,$name);
			$mail->Subject    = $subject1;
			
			//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			
			$mail->MsgHTML($body);
			
			$address = "website@gmail.com";
			$mail->AddAddress($address, "Info");
	
			if(!$mail->Send()) {
			   //echo "Mailer Error: " . $mail->ErrorInfo;?>
				<script type="application/javascript">
				window.location="thankyou.php?send=0#page";
				</script>
			<?php } else {
			?>
			<script type="application/javascript">
					window.location="thankyou.php?send=1#page";
				 </script>
		<?php }
}
?>

