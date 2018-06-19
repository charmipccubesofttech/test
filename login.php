<?php 
// The user credentials I will use to login to the WebDav host
$credentials = array(
		'charmy1',
	'Indiecharmy0107'
);

$login_url = 'https://cloud.indie.host/remote.php/webdav/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $login_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_USERPWD, implode(':', $credentials));
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PROPFIND" );
$response = curl_exec($ch);
echo $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 
//$resArr = json_decode($response);
//echo "<pre>"; print_r($resArr); echo "</pre>";
//     print_r($response);

//
//if (curl_errno($ch)) { echo 'Error:' . curl_error($ch); }
//else
//{
//     print_r($result);
//    echo '<br>';
//    echo 'Operation completed without any errors';
//}
curl_close ($ch);

 
