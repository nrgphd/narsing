<div class="sellerCalculations form">
<?php echo $this->Form->create('SellerCalculation'); ?>
	<fieldset>
		<legend><?php echo __('Add Seller Calculation'); ?></legend>
	<?php
		echo $this->Form->input('seller_id');
		echo $this->Form->input('date');
		echo $this->Form->input('inTime');
		echo $this->Form->input('outTime');
		echo $this->Form->input('goldSold');
		echo $this->Form->input('rateOfGramGold');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Seller Calculations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sellers'), array('controller' => 'sellers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller'), array('controller' => 'sellers', 'action' => 'add')); ?> </li>
	</ul>
</div>
