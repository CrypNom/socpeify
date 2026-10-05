<?php
require_once __DIR__.'/db.php';
session_set_cookie_params(['httponly'=>true,'samesite'=>'Lax']);
if(session_status()===PHP_SESSION_NONE) session_start();
function e($s){ return htmlspecialchars((string)$s,ENT_QUOTES,'UTF-8'); }
function csrf(){ if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function csrf_ok(){ return isset($_POST['csrf'],$_SESSION['csrf']) && hash_equals($_SESSION['csrf'],$_POST['csrf']); }
function csrf_field(){ return '<input type="hidden" name="csrf" value="'.e(csrf()).'">'; }
function admin_only(){ if(empty($_SESSION['uid'])){ header('Location: login.php'); exit; } }
