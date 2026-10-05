<?php require_once __DIR__.'/functions.php'; $title=$title??SITE_NAME; $desc=$desc??SITE_TAGLINE; ?>
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=e($title)?> | <?=e(SITE_NAME)?></title><meta name="description" content="<?=e($desc)?>">
<link rel="canonical" href="<?=e(SITE_URL.strtok($_SERVER['REQUEST_URI'],'?'))?>">
<meta property="og:title" content="<?=e($title)?>"><meta property="og:description" content="<?=e($desc)?>"><meta property="og:type" content="website">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;800&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<script type="application/ld+json"><?=json_encode(['@context'=>'https://schema.org','@type'=>'ProfessionalService','name'=>SITE_NAME,'url'=>SITE_URL,'email'=>SITE_EMAIL,'telephone'=>SITE_PHONE,'description'=>'Website design and development'],JSON_UNESCAPED_SLASHES)?></script></head>
<body><header class="nav"><a class="logo" href="index.php"><?=e(SITE_NAME)?></a>
<button class="burger" aria-label="Menu" onclick="document.body.classList.toggle('open')"><span></span><span></span></button>
<nav><a href="index.php">Home</a><a href="index.php#services">Services</a><a href="portfolio.php">Portfolio</a><a href="index.php#process">Process</a><a href="index.php#pricing">Pricing</a><a href="contact.php">Contact</a><a class="btn sm" href="contact.php">Get started</a></nav></header><main>
