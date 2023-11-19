<?php

// Set your OneSignal REST API Key and App ID

function sendNotice($topic,$title,$body,$file,$rowId){
$restApiKey = '#';
$appId = '#';

// Set the notification content
$notification = array(
    'app_id' => $appId,
    'included_segments' => array('My College'),
    'headings' => array('en' => $title),
    'contents' => array('en' => $body),
    'big_picture' => $file,
     'data' => array(
            'row_id' => $rowId
        ),
    'filters' => array(
        array(
            'field' => 'tag',
            'key' => 'target',
            'relation' => '=',
            'value' => "all"
        )
        
    )
);

// Encode the notification as JSON
$jsonNotification = json_encode($notification);

// Set the request headers
$headers = array(
    'Content-Type: application/json',
    'Authorization: Basic ' . $restApiKey
);

// Create a new cURL resource
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, '#');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonNotification);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    return true;
}

// Close the cURL resource
curl_close($ch);
}

?>
