<div class="courts form">
	<h2><?php echo __('Login'); ?></h2>
	<?php
		echo $this->Session->flash('auth');
		echo $this->Form->create('Court');
		echo $this->Form->input('username', array(
			'label' => __('Courtsname', true),
			'value' => $courtname
		));
		echo $this->Form->input('password', array(
			'label' => __('Password', true),
			'value' => ''
		));
	?>
<?php echo $this->Form->end(__('Login')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Court'), array('controller' => 'courts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Appointments'), array('controller' => 'appointments', 'action' => 'index')); ?> </li>
	</ul>
</div>