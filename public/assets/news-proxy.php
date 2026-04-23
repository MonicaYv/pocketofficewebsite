<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");

$apiKey = "2c70e17865984379a33ca5ed071253f3";

$q = urlencode($_GET['q'] ?? 'Apple');
$from = date('Y-m-d', strtotime('-3 days'));
$sortBy = "publishedAt";

$url = "https://newsapi.org/v2/everything?q=$q&from=$from&sortBy=$sortBy&apiKey=$apiKey";

// Fetch using file_get_contents
$response = file_get_contents($url);

if ($response === FALSE) {
    echo json_encode([
        "status" => "error",
        "message" => "Unable to fetch news"
    ]);
    exit;
}

echo $response;
exit;