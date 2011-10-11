<?php echo Form::open(); ?>
	<p>
		<?php echo Form::label('Usuário:', 'username'); ?><br/>
<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'login_fields')); ?>
	</p>
	<p>
		<?php echo Form::label('Senha:', 'password'); ?><br/>
<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('type' => 'password', 'class' => 'login_fields')); ?>
	</p>

	<div class="actions">
		<?php echo Form::submit('submit', 'Acessar', array('class' => 'buttons')); ?>	</div>

<?php echo Form::close(); ?>