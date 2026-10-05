<?php $title='Contact'; $desc='Tell us about your project and get a quote.'; require 'includes/functions.php';
$err=[]; $ok=false; $f=['name'=>'','email'=>'','phone'=>'','business'=>'','service'=>'','budget'=>'','message'=>''];
if($_SERVER['REQUEST_METHOD']==='POST'){
 foreach($f as $k=>$_) $f[$k]=trim($_POST[$k]??'');
 if(!csrf_ok()) $err[]='Session expired. Reload the page and try again.';
 if(!empty($_POST['website'])) $err[]='Spam detected.'; // honeypot
 if(time()-($_SESSION['last_post']??0)<20) $err[]='Please wait a moment before sending again.';
 if(mb_strlen($f['name'])<2) $err[]='Enter your name.';
 if(!filter_var($f['email'],FILTER_VALIDATE_EMAIL)) $err[]='Enter a valid email address.';
 if(mb_strlen($f['message'])<10) $err[]='Message must be at least 10 characters.';
 if(!$err){ $s=db()->prepare('INSERT INTO messages(name,email,phone,business,service,budget,message) VALUES(?,?,?,?,?,?,?)');
  $s->execute([mb_substr($f['name'],0,120),$f['email'],mb_substr($f['phone'],0,40),mb_substr($f['business'],0,120),mb_substr($f['service'],0,120),mb_substr($f['budget'],0,60),mb_substr($f['message'],0,5000)]);
  $_SESSION['last_post']=time();
  @mail(SITE_EMAIL,'New project request from '.str_replace(["\r","\n"],'',$f['name']),$f['message'],'Reply-To: '.$f['email']); // needs server mail config
  $ok=true; $f=array_map(fn()=>'',$f); } }
require 'includes/header.php'; $svc=db()->query('SELECT title FROM services WHERE active=1')->fetchAll(PDO::FETCH_COLUMN); ?>
<section class="wrap sec narrow"><h1>Tell us about your project</h1>
<?php if($ok) echo '<p class="msg ok">Thanks. We received your request and will reply soon.</p>'; foreach($err as $x) echo '<p class="msg bad">'.e($x).'</p>'; ?>
<form method="post" class="form" novalidate><?=csrf_field()?><input class="hp" name="website" tabindex="-1" autocomplete="off">
<input name="name" placeholder="Name" required value="<?=e($f['name'])?>"><input name="email" type="email" placeholder="Email" required value="<?=e($f['email'])?>">
<input name="phone" placeholder="Phone" value="<?=e($f['phone'])?>"><input name="business" placeholder="Business name" value="<?=e($f['business'])?>">
<select name="service"><option value="">Service required</option><?php foreach($svc as $t) echo '<option'.($f['service']===$t?' selected':'').'>'.e($t).'</option>'; ?></select>
<select name="budget"><option value="">Budget</option><option>Under $500</option><option>$500 - $1,500</option><option>$1,500+</option></select>
<textarea name="message" rows="5" placeholder="Message" required><?=e($f['message'])?></textarea><button class="btn">SEND PROJECT REQUEST</button></form></section>
<?php require 'includes/footer.php'; ?>
