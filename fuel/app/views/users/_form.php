<?php echo Form::open(); ?>
	<p>
		<?php echo Form::label('Usuário:', 'username'); ?><br/>
<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'fields', 'size' => '55')); ?>
	</p>
	<p>
		<?php echo Form::label('Senha:', 'password'); ?><br/>
<?php echo Form::input('password', '',array('class' => 'fields', 'size' => '20')); ?>
	</p>
	<p>
		<?php echo Form::label('Confirmar senha:', 'cpassword'); ?><br/>
<?php echo Form::input('cpassword', '', array('class' => 'fields', 'size' => '20')); ?>
	</p>
	<p>
		<?php echo Form::label('Email:', 'email'); ?><br/>
<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'fields', 'size' => '55')); ?>
	</p>

	<div class="actions">
		<?php echo Form::submit('submit', 'Salvar', array('class' => 'buttons')); ?>	</div>

<?php echo Form::close(); ?>