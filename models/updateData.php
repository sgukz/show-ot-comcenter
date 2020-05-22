<?php
$url = 'http://sgdev.tech:3000/update';
$data = [
    'dateTime' => $_POST['dateTime'],
    'idUser' => $_POST['name_comp'],
];
$post = json_encode($data);
$headers = array('Content-Type: application/json');

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
