<h2 class="first">Novo usuário</h2>
<?php
	if($errors){
		echo '<div class=\'errors\'><ul>';
		foreach($errors as $e){
			echo '<li>' . $e . '</li>';
		}
		echo '</ul></div>';
	}
?>
<?php echo render('users/_form'); ?>
<br />
<p><?php echo Html::anchor('users', 'Voltar'); ?></p>
