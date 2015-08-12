<div class="appointments index">
	<h2><?php echo __('Appointments'); ?></h2>
	<div class="paging">
	<?php
		echo $this->Html->link('< '.__('prev day'), array('action' => 'index/'.$prev));
		echo $this->Html->link(__('next day').' >', array('action' => 'index/'.$next));
	?>
	</div>
	<h4><?php echo $strdate . __(' appointments'); ?></h4>
	<ul class="timeline">
		<li class="time0">00:00</li>
		<li class="time1">01:00</li>
		<li class="time2">02:00</li>
		<li class="time3">03:00</li>
		<li class="time4">04:00</li>
		<li class="time5">05:00</li>
		<li class="time6">06:00</li>
		<li class="time7">07:00</li>
		<li class="time8">08:00</li>
		<li class="time9">09:00</li>
		<li class="time10">10:00</li>
		<li class="time11">11:00</li>
		<li class="time12">12:00</li>
		<li class="time13">13:00</li>
		<li class="time14">14:00</li>
		<li class="time15">15:00</li>
		<li class="time16">16:00</li>
		<li class="time17">17:00</li>
		<li class="time18">18:00</li>
		<li class="time19">19:00</li>
		<li class="time20">20:00</li>
		<li class="time21">21:00</li>
		<li class="time22">22:00</li>
		<li class="time23">23:00</li>
	</ul>
	<p class="appo-area-p1">1番席</p>
	<div class="appo-area1">
	<?php foreach ($appointments as $appointment): ?>
		<?php if ($appointment['Appointment']['table'] == 1): ?>
			<div class="<?php echo $appointment['Appointment']['class']; ?>" style="height:<?php echo $appointment['Appointment']['height']; ?>px">
				<p><?php echo $this->Html->link(__($appointment['Appointment']['name']), array('action' => 'view', $appointment['Appointment']['id']));?>

				</p>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>
	<p class="appo-area-p2">2番席</p>
	<div class="appo-area2">
	<?php foreach ($appointments as $appointment): ?>
		<?php if ($appointment['Appointment']['table'] == 2): ?>
			<div class="<?php echo $appointment['Appointment']['class']; ?>" style="height:<?php echo $appointment['Appointment']['height']; ?>px">
				<p><?php echo $appointment['Appointment']['name'] ?></p>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>
	<p class="appo-area-p3">3番席</p>
	<div class="appo-area3">
	<?php foreach ($appointments as $appointment): ?>
		<?php if ($appointment['Appointment']['table'] == 3): ?>
			<div class="<?php echo $appointment['Appointment']['class']; ?>" style="height:<?php echo $appointment['Appointment']['height']; ?>px">
			<p><?php echo $appointment['Appointment']['name'] ?></p>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__($str), array('controller' => 'users', 'action' => $page)); ?> </li>
		<li><?php echo $this->Html->link(__('Add Appointment'), array('action' => 'add/'.$link)); ?></li>
		<li><?php echo $this->Html->link(__('登録コート一覧'), array('controller' => 'courts')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>