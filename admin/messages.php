<?php require '../includes/functions.php'; admin_only();
if($_SERVER['REQUEST_METHOD']==='POST' && csrf_ok()){ $id=(int)($_POST['id']??0);
 if(($_POST['do']??'')==='read') db()->prepare('UPDATE messages SET is_read=1 WHERE id=?')->execute([$id]);
 if(($_POST['do']??'')==='delete') db()->prepare('DELETE FROM messages WHERE id=?')->execute([$id]); header('Location: messages.php'); exit; }
$rows=db()->query('SELECT * FROM messages ORDER BY id DESC')->fetchAll(); ?>
<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Messages</title><link rel="stylesheet" href="../assets/css/style.css"></head>
<body><section class="wrap sec"><h1>Messages</h1><p><a href="dashboard.php">Dashboard</a></p><?php foreach($rows as $m): ?>
<article class="card"><h3><?=e($m['name'])?> <small><?=$m['is_read']?'':'NEW'?></small></h3><small><?=e($m['email'])?> &middot; <?=e($m['phone'])?> &middot; <?=e($m['business'])?> &middot; <?=e($m['service'])?> &middot; <?=e($m['budget'])?></small><p><?=nl2br(e($m['message']))?></p>
<form method="post"><?=csrf_field()?><input type="hidden" name="id" value="<?=$m['id']?>"><button name="do" value="read" class="btn sm ghost">Mark as read</button> <button name="do" value="delete" class="btn sm ghost" onclick="return confirm('Delete this message?')">Delete</button></form></article><?php endforeach; if(!$rows) echo '<p>No inquiries yet.</p>'; ?></section></body></html>
