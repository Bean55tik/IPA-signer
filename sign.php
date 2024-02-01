<?php
// Get the uploaded files and password from the form
  $ipa = new CURLFile($_FILES['ipa']['tmp_name']);
  $p12 = new CURLFile($_FILES['p12']['tmp_name']);
  $mobile = new CURLFile($_FILES['mobile']['tmp_name']);
  $pass = $_POST['pass'];
// Upload IPA
$curl = curl_init('https://api.starfiles.co/upload/upload_file');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
curl_setopt($curl, CURLOPT_POSTFIELDS, array('upload' => $ipa));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($curl);
$output_decoded = json_decode($output, true);
if(!isset($output_decoded['file']))
    die('Failed ' . __LINE__ . ': ' . $output);
$ipa_output = $output_decoded['file'];
curl_close($curl);
// Upload P12
$curl = curl_init('https://api.starfiles.co/upload/upload_file');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
curl_setopt($curl, CURLOPT_POSTFIELDS, array('upload' => $p12));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($curl);
$output_decoded = json_decode($output, true);
if(!isset($output_decoded['file']))
    die('Failed ' . __LINE__ . ': ' . $output);
$p12_output = $output_decoded['file'];
curl_close($curl);
// Upload Mobileprovision
$curl = curl_init('https://api.starfiles.co/upload/upload_file');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
curl_setopt($curl, CURLOPT_POSTFIELDS, array('upload' => $mobile));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($curl);
$output_decoded = json_decode($output, true);
if(!isset($output_decoded['file']))
    die('Failed ' . __LINE__ . ': ' . $output);
$mobileprovision_output = $output_decoded['file'];
curl_close($curl);
// Sign
header('Location: ' . file_get_contents('https://sign.starfiles.co?ipa=' . $ipa_output . '&p12=' . $p12_output . '&mobileprovision=' . $mobileprovision_output . '&password=' . $pass));
?>