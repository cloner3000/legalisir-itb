<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link id="bs-css" href="<?php echo base_url() ?>css/bootstrap.css" rel="stylesheet">
	<link id="bs-css" href="<?php echo base_url() ?>css/bootstrap-theme.min.css" rel="stylesheet">
	<link id="bs-css" href="<?php echo base_url() ?>css/style.css" rel="stylesheet">
	<?php 
	if(isset($customCssSource) && is_array($customCssSource) && !empty($customCssSource)): 
		foreach($customCssSource as $src):	?>
		<link href="<?php echo base_url()?>css/<?php echo $src ?>" rel="stylesheet">
	<?php 
		endforeach; 
	endif; ?>
	<?php 
	if(isset($customCss) && !empty($customCss)): 
	?>
	<style type="text/css">
	<?php echo $customCss ?>	
	</style>
	<?php endif; ?>
	<title><?php echo isset($pageTitle)?$pageTitle.' - ':'' ?>   Legalisir Ijazah SITH ITB</title>	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body> 
<div id="wrap">