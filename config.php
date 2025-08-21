<?php
$APP_URL = "https://afovob.net";
$db_host = "localhost";
$db_name = "puleeshop_fb_automation";
$db_user = "puleeshop_fb_automation";
$db_pass = "2E!,!09fbx<Iy+Lm";
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) { die("DB failed: " . $conn->connect_error); }
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
function is_logged_in(){ return isset($_SESSION['user_id']); }
function require_login(){ if(!is_logged_in()){ header("Location: /login.php"); exit; } }
function csrf_token(){ if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function csrf_check(){ if($_SERVER['REQUEST_METHOD']==='POST'){ if(!hash_equals($_SESSION['csrf']??'', $_POST['_token']??'')) die('Invalid CSRF'); } }
function e($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
function role_in($roles){ return isset($_SESSION['role']) && in_array($_SESSION['role'], (array)$roles); }
?>
