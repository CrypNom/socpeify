<?php require '../includes/functions.php'; $e='';
if($_SERVER['REQUEST_METHOD']==='POST'){ if(!csrf_ok()) $e='Session expired.'; else {
 $s=db()->prepare('SELECT * FROM users WHERE username=?'); $s->execute([trim($_POST['username']??'')]); $u=$s->fetch();
 if($u && password_verify($_POST['password']??'',$u['password_hash'])){ session_regenerate_id(true); $_SESSION['uid']=$u['id']; header('Location: dashboard.php'); exit; }
 $e='Wrong username or password.'; usleep(500000);} } ?>
<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin login</title><link rel="stylesheet" href="../assets/css/style.css"></head>
<body><section class="wrap sec narrow"><h1>Admin login</h1><?php if($e) echo '<p class="msg bad">'.e($e).'</p>'; ?>
<form method="post" class="form"><?=csrf_field()?><input name="username" placeholder="Username" required><input name="password" type="password" placeholder="Password" required><button class="btn">Sign in</button></form></section></body></html>
