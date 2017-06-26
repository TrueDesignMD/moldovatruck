<?

	$ch2 = curl_init(); 
	curl_setopt($ch2, CURLOPT_URL, "http://moldovatruck.md/cargo/city.php?".$_POST['params']);
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
	//curl_setopt($curl, CURLINFO_HEADER_OUT, true);
	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch2, CURLOPT_VERBOSE, 1);
	curl_setopt($ch2, CURLOPT_ENCODING, "gzip, deflate, sdch");
	$headers[] = 'Accept: */*';
	$headers[] = 'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4';
	$headers[] = 'Conections: keep-alive';
	//$headers[] = 'Content-Type: application/x-www-form-urlencoded';
	//$headers[] = 'Cache-Control: max-age=0';
	$headers[] = 'Host: moldovatruck.md';
	//$headers[] = 'Origin: https://www.e-primariaclujnapoca.ro';
	$headers[] = 'Referer: http://moldovatruck.md/';
	//$headers[] = 'User-Agent: '.$_SERVER['HTTP_USER_AGENT'];
	$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36';
	//$headers[] = 'Upgrade-Insecure-Requests: 1';
	//$headers[] = "Remote Address: ".$ip;
	//$headers[] = "HTTP_X_FORWARDED_FOR: ".$ip;
	//$headers[] = "Set-Cookie: PHPSESSID=".$cookie;
	//$headers[] = "Cookie: PHPSESSID=".$cookie;
	
	curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers); 	
	$res = curl_exec($ch2);
	$res = iconv(mb_detect_encoding($res, mb_detect_order(), true), "UTF-8", $res);
	echo $res;
	curl_close($ch2);



?>