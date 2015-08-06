<div class="appointments view">
<h2><?php echo __('Appointment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($appointment['Appointment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($appointment['Appointment']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order Id'); ?></dt>
		<dd>
			<?php echo h($appointment['Appointment']['order_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($appointment['Appointment']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start'); ?></dt>
		<dd>
			<?php echo h($appointment['Appointment']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stop'); ?></dt>
		<dd>
			<?php echo h($appointment['Appointment']['stop']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Court Id'); ?></dt>
		<dd>
			<?php echo h($appointment['Appointment']['court_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Court'); ?></dt>
		<dd>
			<?php echo h($appointment['Appointment']['court']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Appointment'), array('action' => 'edit', $appointment['Appointment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Appointment'), array('action' => 'delete', $appointment['Appointment']['id']), array(), __('Are you sure you want to delete # %s?', $appointment['Appointment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Appointments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Appointment'), array('action' => 'add')); ?> </li>
	</ul>
</div>
