<h2 class="first">Nova inscrição</h2>
<?php
	if($errors){
		echo '<div class=\'errors\'><ul>';
		foreach($errors as $e){
			echo '<li>' . $e . '</li>';
		}
		echo '</ul></div>';
	}
?>
<?php echo render('associations/_form'); ?>
<br />
<p><?php echo Html::anchor('associations', 'Voltar'); ?></p>
