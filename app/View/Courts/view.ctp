<div class="courts view">
<h2><?php echo __('Court'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($court['Court']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($court['Court']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($court['Court']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($court['Court']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($court['Court']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($court['Court']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Court'), array('action' => 'edit', $court['Court']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Court'), array('action' => 'delete', $court['Court']['id']), array(), __('Are you sure you want to delete # %s?', $court['Court']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Court'), array('action' => 'add')); ?> </li>
	</ul>
</div>
