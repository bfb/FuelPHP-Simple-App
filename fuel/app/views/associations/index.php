<h2 class="first">Lista</h2>

<table cellspacing="0">
	<tr>
		<th width="40">Id</th>
		<th width="80"><div align="left">Inscrição</div></th>
		<th><div align="left">Nome</div></th>
		<th width="120">Ações</th>
	</tr>

	<?php foreach ($associations as $association): ?>	<tr>
		<td><?php echo $association->id; ?></td>
		<td><?php echo $association->code; ?></td>
		<td><?php echo $association->name; ?></td>
		<td>
			<?php echo Html::anchor('associations/view/'.$association->id, 'Ver'); ?> / 
			<?php echo Html::anchor('associations/edit/'.$association->id, 'Editar'); ?> / 
			<?php echo Html::anchor('associations/delete/'.$association->id, 'Deletar', array('onclick' => "return confirm('Você tem certeza?')")); ?>		</td>
	</tr>
	<?php endforeach; ?></table>

<br />

<?php echo Html::anchor('associations/create', 'Adicionar nova inscrição'); ?>