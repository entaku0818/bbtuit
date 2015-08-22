<!DOCTYPE html>
<html lang="ja">
<head>
<?php echo $this->Html->charset(); ?>
<meta name="copyright" content="&copy; atomicbox">
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->meta('icon');?>
<?php echo $this->fetch('meta');?>
<?php echo $this->Html->css('/css/futsal'); ?>
<?php echo $this->Html->css('/css/reset'); ?>
<?php echo $this->Html->css('/css/style'); ?>
<?php echo $this->fetch('css');?>
<?php echo $this->fetch('script');?>
</head>
<body>
<div id="contents">
	<?php echo $this->fetch('content'); ?>
</div>
</body>
</html>