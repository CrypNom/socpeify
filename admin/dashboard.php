<?php require '../includes/functions.php'; admin_only(); $n=fn($t,$w='1')=>db()->query("SELECT COUNT(*) FROM $t WHERE $w")->fetchColumn(); ?>
<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Dashboard</title><link rel="stylesheet" href="../assets/css/style.css"></head>
<body><section class="wrap sec"><h1>Dashboard</h1><p><a href="messages.php">Messages</a> | <a href="logout.php">Log out</a></p><div class="grid">
<div class="card"><h3><?=$n('projects')?></h3>Projects</div><div class="card"><h3><?=$n('messages')?></h3>Inquiries</div>
<div class="card"><h3><?=$n('messages','is_read=0')?></h3>New inquiries</div><div class="card"><h3><?=$n('services')?></h3>Services</div><div class="card"><h3><?=$n('testimonials')?></h3>Testimonials</div></div></section></body></html>
