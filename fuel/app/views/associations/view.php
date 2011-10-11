<p>
	<strong>Inscrição:</strong>
	<?php echo $association->code; ?></p>
<p>
	<strong>Nome:</strong>
	<?php echo $association->name; ?></p>
<p>
	<strong>Endereço:</strong>
	<?php echo $association->address; ?></p>
<p>
	<strong>Telefone:</strong>
	<?php echo $association->phone; ?></p>
<p>
	<strong>Celular:</strong>
	<?php echo $association->mobile; ?></p>

<?php echo Html::anchor('associations/edit/'.$association->id, 'Editar'); ?> / 
<?php echo Html::anchor('associations', 'Voltar'); ?>