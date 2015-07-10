<div class="sellers form">
<?php echo $this->Form->create('Seller'); ?>
	<fieldset>
		<legend><?php echo __('Edit Seller'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('mobile');
		echo $this->Form->input('region_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Seller.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Seller.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sellers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seller Calculations'), array('controller' => 'seller_calculations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller Calculation'), array('controller' => 'seller_calculations', 'action' => 'add')); ?> </li>
	</ul>
</div>
