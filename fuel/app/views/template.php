<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Controle de inscrições</title>
	<style>
		body {
			font-family: Arial, Helvelica;
			font-size: 12px;
			background: #FFF;
		}
		#content {
			width: 900px;
			background: #EEE;
			border: 1px Solid #CCC;
			padding: 20px;
			margin: 0 auto;
		}
		#login {
			width: 220px;
			background: #EEE;
			border: 1px Solid #CCC;
			padding: 20px;
			background: #EEE;
			margin: 0 auto;
			box-shadow: 0 0 8px #999;
		}
		.login_fields {
			width: 200px;
			border: 1px Solid #CCC;
			padding: 5px;
		}
		.fields {
			border: 1px Solid #CCC;
			padding: 5px;
		}
		.buttons {
			border: 0;
			background: #333;
			display: inline-block;
			padding: 5px 10px 5px 10px;
			color: #fff;
			font-size: 12px;
			font-weight: bold;
			text-decoration: none;
			-moz-border-radius: 6px;
			-webkit-border-radius: 6px;
			-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
			-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
			text-shadow: 0 -1px 1px #333;
			border-bottom: 1px solid rgba(0,0,0,0.25);
			position: relative;
			cursor: pointer;
		}
		
		#header {
			font-size: 14px;
			padding-bottom: 10px;
		}
		
		.search {
			background: #DDD;
			padding: 10px;
			border: 1px Solid #BBB;
		}
		.notice {
			padding: 5px;
			border: 1px Solid #A8D08D;
			background: #E6FFD6;
		}
		.notice p {
			padding: 10px;
			margin: 0;
		}
		table {
			width: 100%;
		}
		table th {
			background: #DDD;
			padding: 10px;
			border-right: 1px Solid #CCC;
			border-bottom: 1px Solid #CCC;
		}
		table td {
			padding: 10px;
			border-bottom: 1px Solid #CCC;
		}
		h2 {
			padding: 5px;
			margin: 0;
		}
		.errors {
			padding: 5px;
			border: 1px Solid #E0A0A0;
			background: #FBD2D2;
		}
		a, a:link, a:visited, a:active {
			color: #0890E3;
			text-decoration: underline;
		}
		a:hover {
			color: #0890E3;
			text-decoration: none;
		}
	</style>
	<script type="text/javascript">


	</script>
</head>
<body>
	<?php if(Auth::check()){ ?>
	<div id="content">
		<div id="header">
			Olá <?php echo Auth::instance()->get_screen_name(); ?>!
			<?php echo Html::anchor('associations/index', 'Associados'); ?> / 
			<?php echo Html::anchor('users/index', 'Usuários'); ?> / 
			<?php echo Html::anchor('passwords/create', 'Trocar senha'); ?> / 
			<?php echo Html::anchor('home/logout', 'Sair (logout)'); ?>
		</div>
		<div class="search">
			<h2>Buscar:</h2>
			<form action="http://localhost:8888/controle/public/index.php/search/index" method="get" name="search_form" id="search_form">
				<input type="textfield" onClick="select()" name="search" id="search" class="fields" size="50" value="Palavra-chave" />
				<input type="radio" name="type_search" value="name" checked /> Nome
				<input type="radio" name="type_search" value="Inscrição" /> Inscrição
				<input type="submit" name="submit" value="Buscar" class="buttons" />
			</form>
		</div>
		<h1><?php echo $title; ?></h1>
		<?php if (Session::get_flash('notice')): ?>
			<div class="notice"><p><?php echo implode('</p><p>', (array) Session::get_flash('notice')); ?></div></p>
		<?php endif; ?>
		<?php echo $content; ?>
	</div>
	<?php } else { ?>
	<div id="login">
		<?php echo $content; ?>
	</div>
	<?php } ?>
</body>
</html>
