<h2 class="first">Editar inscrição</h2>

<?php echo render('associations/_form'); ?>
<br />
<p>
<?php echo Html::anchor('associations/view/'.$association->id, 'Ver'); ?> /
<?php echo Html::anchor('associations', 'Voltar'); ?></p>
