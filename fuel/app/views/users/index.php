<h2 class="first">Lista</h2>

<table cellspacing="0">
	<tr>
		<th width="20">Id</th>
		<th>Username</th>
		<th>Email</th>
		<th width="120">Ações</th>
	</tr>

	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user->id; ?></td>
		<td><?php echo $user->username; ?></td>
		<td><?php echo $user->email; ?></td>
		<td>
			<?php echo Html::anchor('users/edit/'.$user->id, 'Edit'); ?> /
			<?php echo Html::anchor('users/delete/'.$user->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>					
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo Html::anchor('users/create', 'Adicionar novo usuário'); ?>