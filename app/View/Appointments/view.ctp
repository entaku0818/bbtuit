<div class="appointments view">
<h2><?php echo $this->Session->flash();
		echo __('Appointment'); ?></h2>
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
		<dt><?php echo __('table'); ?></dt>
		<dd>
			<?php echo h($appointment['Appointment']['table']); ?>
			&nbsp;
		</dd>
		<?php foreach ($participant as $participant): ?>
		<dt><?php echo __('参加者'); ?></dt>
		<dd>
			<?php echo h($participant['Participant']['name']); ?>
			&nbsp;

		</dd>
		<?php endforeach; ?>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Appointment'), array('action' => 'edit', $appointment['Appointment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('参加'), array('action' => 'join', $appointment['Appointment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Appointment'), array('action' => 'delete', $appointment['Appointment']['id']), array(), __('Are you sure you want to delete # %s?', $appointment['Appointment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Appointments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Appointment'), array('action' => 'add')); ?> </li>
	</ul>
</div>
