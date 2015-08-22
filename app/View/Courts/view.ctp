<div class="courts view">
<h2><?php echo __('Court'); ?></h2>
<?php echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js', false); ?>
<?php echo $this->Html->script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', false); ?>
<?php 
	$address = chr(34) . $court['Court']['address'] . chr(34); 
	$address_encode = urlencode($court['Court']['address']);
	$gmap_url = chr(39) . "http://maps.google.co.jp/maps?q=".$address_encode . chr(39);
?>
<?php
    $this->Html->scriptStart(array('inline' => false));
    echo
<<<END
       var address = $address;
END;
    $this->Html->scriptEnd();
?>
<?php echo $this->Html->script('google_map.js', false); ?>

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
		<dt><?php echo __('GoogleMap'); ?></dt>
		<dd>
			<?php 
//				echo $this->Html->link(
//				'GoogleMapへリンク',
//				$gmap_url,
//		    		array('type'=>'submit', 'class' => 'button', 'target' => '_blank'));
			echo $this->Form->button('googleへリンク', array('onclick' => 'location.href='.$gmap_url));
			?>
			&nbsp;
		</dd>
	</dl>
	
	<h3>

	<?php 
	$options = array(
	    'div' => array(
        'id' => 'map-canvas',
		  )
		);
	echo $this->Form->end($options); ?>
	</h3>
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
