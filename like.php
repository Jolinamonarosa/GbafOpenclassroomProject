<?php
session_start();
include_once 'database.php';
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(403);
   die(); 
}

require 'vote.php';
$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
$vote = new Vote($bdd);
if($_GET['votes'] == 1) {
    $vote->like('articles', $_GET['ref_id'],$_GET['ref'], $_SESSION['user_id']);
} else {
    $vote->dislike('articles', $_GET['ref_id'], $_GET['ref'], $_SESSION['user_id']);
}

header('Location: minichat.php?id=' . $_GET['ref_id']);
