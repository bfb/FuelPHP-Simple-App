<?php
	if($errors){
		echo '<div class=\'errors\'><ul>';
		foreach($errors as $e){
			echo '<li>' . $e . '</li>';
		}
		echo '</ul></div>';
	}
?>
<?php echo Form::open(); ?>
	<p>
		<?php echo Form::label('Senha:', 'password'); ?><br/>
		<?php echo Form::input('password', '', array('type' => 'password', 'class' => 'login_fields')); ?>
	</p>
	<p>
		<?php echo Form::label('Confirmar senha:', 'cpassword'); ?><br/>
		<?php echo Form::input('cpassword', '', array('type' => 'password', 'class' => 'login_fields')); ?>
	</p>

	<div class="actions">
		<?php echo Form::submit('submit', 'Trocar', array('class' => 'buttons')); ?>	</div>

<?php echo Form::close(); ?>