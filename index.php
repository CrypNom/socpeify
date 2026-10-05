<?php $title='Websites that grow your business'; $desc='Premium website design and development for stores, businesses, startups and individuals.'; require 'includes/header.php';
$services=db()->query('SELECT * FROM services WHERE active=1 ORDER BY sort,id')->fetchAll();
$projects=db()->query('SELECT * FROM projects ORDER BY id DESC LIMIT 3')->fetchAll();
$plans=db()->query('SELECT * FROM pricing ORDER BY sort')->fetchAll();
$tests=db()->query('SELECT * FROM testimonials WHERE active=1 LIMIT 3')->fetchAll(); ?>
<section class="hero"><div class="glow"></div><div class="wrap"><h1>WE BUILD.<br>YOU GROW.</h1>
<p>Premium websites designed to turn your business into a powerful digital experience.</p>
<a class="btn" href="contact.php">START YOUR PROJECT</a> <a class="btn ghost" href="portfolio.php">VIEW OUR WORK</a></div>
<div class="mock" aria-hidden="true"><i></i><i></i><i></i><div class="card float">New order #1042</div><div class="card float b">+38% conversions</div></div></section>
<section id="services" class="wrap sec"><h2>What we build</h2><div class="grid"><?php foreach($services as $s): ?>
<article class="card rv"><h3><?=e($s['title'])?></h3><p><?=e($s['description'])?></p><small><?=e($s['features'])?></small></article><?php endforeach; ?></div></section>
<section id="process" class="wrap sec"><h2>How we turn ideas into digital experiences</h2><ol class="steps"><?php foreach([['Discovery','Understand the business and requirements.'],['Strategy','Plan structure, features and user experience.'],['Design','Create the visual experience.'],['Development','Build with modern technologies.'],['Testing','Check responsiveness, speed, forms and functionality.'],['Launch','Deploy and get ready for customers.']] as $p): ?><li class="rv"><b><?=$p[0]?></b><span><?=$p[1]?></span></li><?php endforeach; ?></ol></section>
<section class="wrap sec"><h2>Recent work</h2><div class="grid"><?php foreach($projects as $p): ?><article class="card rv"><h3><?=e($p['title'])?></h3><small><?=e($p['category'])?></small><p><?=e($p['description'])?></p></article><?php endforeach; ?></div></section>
<section id="pricing" class="wrap sec"><h2>Pricing</h2><div class="grid"><?php foreach($plans as $p): ?><article class="card rv"><h3><?=e($p['name'])?></h3><p><?=e($p['audience'])?></p><b class="price"><?=e($p['price_label'])?></b><a class="btn sm" href="contact.php">REQUEST A QUOTE</a></article><?php endforeach; ?></div></section>
<?php if($tests): ?><section class="wrap sec"><h2>Client words</h2><div class="grid"><?php foreach($tests as $t): ?><blockquote class="card"><?=e($t['quote'])?><footer><?=e($t['name'])?></footer></blockquote><?php endforeach; ?></div></section><?php endif; ?>
<section class="wrap sec cta"><h2>Ready to start?</h2><a class="btn" href="contact.php">START YOUR PROJECT</a></section>
<?php require 'includes/footer.php'; ?>
