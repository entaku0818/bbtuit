<div class="courts form">
	<h2><?php echo __('Add Court'); ?></h2>
	<fieldset>
	<?php
		echo $this->Form->create('Court');
		echo $this->Form->input('username', array(
			'label' => __('courtname')
		));
		echo $this->Form->input('password');
		echo $this->Form->input('address');
		echo $this->Form->input('court');
		echo $this->Form->end(__('Submit'));
	?>
	</fieldset>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Login'), array('action' => 'login')); ?></li>
		<li><?php echo $this->Html->link(__('List Appointments'), array('controller' => 'appointments', 'action' => 'index')); ?> </li>
	</ul>
</div>