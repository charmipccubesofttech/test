<?php 

// The user credentials I will use to login to the WebDav host
$credentials = array(
	'charmy1',
	'Indiecharmy0107'
);
// Prepare the file we are going to upload
$filename = 'test.txt';
$filepath = $filename;
//$filesize = filesize($filepath);
//$fh = fopen($filepath, 'r');

$remoteUrl = 'https://cloud.indie.host/remote.php/webdav/'.$filename;
$ch = curl_init($remoteUrl);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, implode(':', $credentials));
curl_setopt($ch, CURLOPT_URL, $remoteUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");


// Execute the request, upload the file
//curl_exec($ch);
$response = curl_exec($ch);
echo $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

?>