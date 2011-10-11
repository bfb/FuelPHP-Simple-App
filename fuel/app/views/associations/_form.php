<?php echo Form::open(); ?>
	<p>
		<?php echo Form::label('Inscrição:', 'code'); ?><br/>
<?php echo Form::input('code', Input::post('code', isset($association) ? $association->code : ''), array('class' => 'fields')); ?>
	</p>
	<p>
		<?php echo Form::label('Nome:', 'name'); ?><br/>
<?php echo Form::input('name', Input::post('name', isset($association) ? $association->name : ''), array('size' => '55', 'class' => 'fields')); ?>
	</p>
	<p>
		<?php echo Form::label('Endereço:', 'address'); ?><br/>
<?php echo Form::input('address', Input::post('address', isset($association) ? $association->address : ''), array('size' => '100', 'class' => 'fields')); ?>
	</p>
	<p>
		<?php echo Form::label('Telefone:', 'phone'); ?><br/>
<?php echo Form::input('phone', Input::post('phone', isset($association) ? $association->phone : ''), array('size' => '20', 'class' => 'fields')); ?>
	</p>
	<p>
		<?php echo Form::label('Celular:', 'mobile'); ?><br/>
<?php echo Form::input('mobile', Input::post('mobile', isset($association) ? $association->mobile : ''), array('size' => '20', 'class' => 'fields')); ?>
	</p>

	<div class="actions">
		<?php echo Form::submit('submit', 'Salvar', array('class' => 'buttons')); ?>	</div>

<?php echo Form::close(); ?>