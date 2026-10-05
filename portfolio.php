<?php $title='Portfolio'; $desc='Selected websites built by Scopeify Inc.'; require 'includes/header.php';
$cats=['Business','E-Commerce','Portfolio','Landing Pages']; $c=$_GET['cat']??'';
if(in_array($c,$cats,true)){ $q=db()->prepare('SELECT * FROM projects WHERE category=? ORDER BY id DESC'); $q->execute([$c]); } else { $q=db()->query('SELECT * FROM projects ORDER BY id DESC'); } $rows=$q->fetchAll(); ?>
<section class="wrap sec"><h1>Our work</h1><div class="filters"><a href="portfolio.php">All</a><?php foreach($cats as $k): ?><a href="?cat=<?=urlencode($k)?>"><?=e($k)?></a><?php endforeach; ?></div>
<div class="grid"><?php foreach($rows as $p): ?><article class="card"><h3><?=e($p['title'])?></h3><small><?=e($p['category'])?> &middot; <?=e($p['technologies'])?></small><p><?=e($p['description'])?></p><?php if($p['url']): ?><a class="btn sm" href="<?=e($p['url'])?>" rel="noopener">View project</a><?php endif; ?></article><?php endforeach; if(!$rows) echo '<p>No projects in this category yet.</p>'; ?></div></section>
<?php require 'includes/footer.php'; ?>
