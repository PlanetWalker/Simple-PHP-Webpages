<?php
if (!isset($vist_page))
{
	$vist_page     =   "logger.php";
}
if (!isset($comment))
{
	$comment     =   "nothing special";
}
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
// Getting OS Name
function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
							'/kalilinux/i'          =>  'KaliLinux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile',
							'/Windows Phone/i'      =>  'Windows Phone'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}
// END of Getting OS
//
// Get browser
function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
							'/Mozilla/i'	=>	'Mozila',
							'/Mozilla/5.0/i'=>	'Mozila',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
							'/OPR/i'        =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
							'/Bot/i'		=>	'BOT Browser',
							'/Valve Steam GameOverlay/i'  =>  'Steam',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}
// END of getting browser
function getIP() 
{ 
	if (isset($_SERVER)) 
	{ 
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) 
		{ 
			$realip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
		} 
		else
			if (isset($_SERVER['HTTP_CLIENT_IP'])) 
			{ 
				$realip = $_SERVER['HTTP_CLIENT_IP']; 
			} 
			else 
			{ 
				$realip = $_SERVER['REMOTE_ADDR']; 
			} 
		} 
	else 
	{
		if (getenv("HTTP_X_FORWARDED_FOR")) 
		{ 
			$realip = getenv( "HTTP_X_FORWARDED_FOR"); 
		} 
		else
			if (getenv("HTTP_CLIENT_IP")) 
			{ 
				$realip = getenv("HTTP_CLIENT_IP"); 
			}
			else
			{ 
				$realip = getenv("REMOTE_ADDR"); 
	} 
} 
return $realip; 
}
//session_start();
	$_SESSION[$vist_page]=1;
	$_SESSION[$comment]=1;
	$user_os        =   getOS();
	$user_browser   =   getBrowser();

	// Getting visitor IP address
	//$ip = $_SERVER['REMOTE_ADDR'];
	$ip = getIP();
	// Getting where visitor come
	$site_refer = $_SERVER['HTTP_REFERER'];
		// If hes connected directly 
		if($site_refer == ""){
			$site = "direct connection";
		}
	  // If he doesn't
		else{
			$site = $site_refer;
		}
	  // Hide ownr's IP address
		$owner = "Ip of the first owner"; 
 		$owner2 = "Ip of the second owner"; 
	  
		if($ip == $owner){ //Change it here 
			$ip = "127.0.0.1"; 
			$country = "XX";
		}
		if($ip == $owner2){ //Change it here 
			$ip = "localhost"; 
			$country = "XX";
		}
	  //If that wasn't you, it woun't change IP address and it will find info about IP address
		else{
			$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
			$country = $details->country;
		}
		// Writing in to txt file
	 $date = date("Y-m-d - H:i:s ");
	 $myfile = file_put_contents('includes/accessed.txt',"". $date. " | ". $country. " | ". $ip." | ". $vist_page." | ". $user_os. " | ". $user_browser. " | From: ". $site. " | user agent:" .$user_agent . "".PHP_EOL , FILE_APPEND | LOCK_EX);
	fclose($myfile);
	include_once('mysql.php');
	$sql = "INSERT INTO `liste`
	(`date`, `country`, `ip`, `vist_page`, `user_os`, `user_browser`, `site`, `comment`, `user_agent`) VALUES 
	('$date', '$country', '$ip', '$vist_page', '$user_os', '$user_browser', '$site', '$comment','$user_agent');
	";
    mysqli_query($conn, $sql);
?>