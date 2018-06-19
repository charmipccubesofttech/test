<?php 

// The user credentials I will use to login to the WebDav host
$credentials = array(
	'charmy1',
	'Indiecharmy0107'
);
// Prepare the file we are going to upload
$filename = 'Documents/test.txt';
$filepath = $filename;
$filesize = filesize($filepath);
$fh = fopen($filepath, 'r');

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
curl_setopt($ch, CURLOPT_PUT, true);
curl_setopt($ch, CURLOPT_INFILE, $fh);
curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
// Execute the request, upload the file
curl_exec($ch);
echo $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// Close the file handle
fclose($fh);

?>