<?php
        session_start();
        include('social/config.php');
	include('includes/db.php');
        include('social/auth/Hybrid/Auth.php');
        if(isset($_GET['provider']))
        {
        	$provider = $_GET['provider'];
        	
        	try{
        	
        	$hybridauth = new Hybrid_Auth( $config );
        	
        	$authProvider = $hybridauth->authenticate($provider);

	        $user_profile = $authProvider->getUserProfile();
	        
			if($user_profile && isset($user_profile->identifier))
                        {
				$name = $user_profile->displayName;
                                $email = $user_profile->email;
				
				$password = rand(00000,99999);
				$pass = md5($password);
				
				$flag = 0;
				$timezone = "Asia/Calcutta";
                                date_default_timezone_set($timezone);
                                $added = date("Y-m-d H:i:s");
				
				$_SESSION['email'] = $email;
				
				$sql_check = mysql_query("SELECT * FROM users where email = '$email' ");
				$row_check = mysql_fetch_array($sql_check);

				if(is_array($row_check)) 
				{
				

                                        $_SESSION['id'] = $row_check['id'];

                                        echo "<script type='text/javascript'>window.location='login-script.php'</script>";
                                        exit();	
				}
				else{
					
					$sql_add = mysql_query("INSERT INTO users (password, name, email, flag, added) VALUES ('$pass', '$name', '$email','$flag','$rdate')");
					
					if (!$sql_add)
					{
						die('Error: ' . mysql_error());
					
					}
					else{
						$query = mysql_query("SELECT id from users where email = '$email' ");
						$row_id = mysql_fetch_array($query);
						
						$_SESSION['id'] = $row_id['id'];
						
						$subject = "Welcome to littlefashions.in";
						$emailTo = $email;
						$emailfrom = "info@littlefashions.in"; 
						$body = "Dear $name, \n\nWelcome to Emedihelp, \n\nYour Account Details: \n\nUsername: $email \nPassword: $password \n\nAbout Emedihelp: \n\nE-Medihelp is the India's first ever online drug portal that is hell-bent on revolutionizing the healthcare sector.\n\nEmedihelp helps to find and get medicines in case of medicines in case of emergencies.\n\nIn a country like india,one needs to travel long distances and cannot find medicines within their budget .so this application helps find people medicines of a particular composition in all price ranges .users can procure the required medicines at their doorsteps , afeature which is especially useful for senior citizens. \n\n\n\nWith Regards,\nEmedi Help.";
						$headers = 'From: Emedihelp <'.$emailfrom.'>' . "\r\n" . 'Reply-To: ' . $emailfrom;
								
						mail($emailTo, $subject, $body, $headers);
						$emailSent = true;
					
						//echo "<script type='text/javascript'>window.location='login-script.php'</script>";
						//exit();	
					}
				}
	        }	        

			}
			catch( Exception $e )
			{ 
			
				 switch( $e->getCode() )
				 {
                        case 0 : echo "Unspecified error."; break;
                        case 1 : echo "Hybridauth configuration error."; break;
                        case 2 : echo "Provider not properly configured."; break;
                        case 3 : echo "Unknown or disabled provider."; break;
                        case 4 : echo "Missing provider application credentials."; break;
                        case 5 : echo "Authentication failed. "
                                         . "The user has canceled the authentication or the provider refused the connection.";
                                 break;
                        case 6 : echo "User profile request failed. Most likely the user is not connected "
                                         . "to the provider and he should to authenticate again.";
                                 $twitter->logout();
                                 break;
                        case 7 : echo "User not connected to the provider.";
                                 $twitter->logout();
                                 break;
                        case 8 : echo "Provider does not support this feature."; break;
                }

                // well, basically your should not display this to the end user, just give him a hint and move on..
                echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();

                echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";

			}
        
        }
?>