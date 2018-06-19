<?php 
// The user credentials I will use to login to the WebDav host
$credentials = array(
	'charmy1',
	'Indiecharmy0107'
);
// Prepare the file we are going to upload
$filename = 'Documents';

// The URL where we will upload to, this should be the exact path where the file
// is going to be placed
$remoteUrl = 'https://cloud.indie.host/remote.php/webdav/';
// Initialize cURL and set the options required for the upload. We use the remote
// path we specified together with the filename. This will be the result of the
// upload.
$ch = curl_init($remoteUrl . $filename);
// I'm setting each option individually so it's easier to debug them when
// something goes wrong. When your configuration is done and working well
// you can choose to use curl_setopt_array() instead.
// Set the authentication mode and login credentials
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, implode(':', $credentials));
// Define that we are going to upload a file, by setting CURLOPT_PUT we are
// forced to set CURLOPT_INFILE and CURLOPT_INFILESIZE as well.
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PROPFIND" );
// Execute the request, upload the file
$response = curl_exec($ch);
echo $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
print_r($xml);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
print_r($array);
//if(curl_exec($ch) === false)
//{
//    echo 'Curl error: ' . curl_error($ch);
//}
//else
//{
//    echo 'Operation completed without any errors';
//}
// print_r(json_encode($response));
 
?>