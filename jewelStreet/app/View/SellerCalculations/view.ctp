<div class="sellerCalculations view">
<h2><?php echo __('Seller Calculation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sellerCalculation['SellerCalculation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seller'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sellerCalculation['Seller']['name'], array('controller' => 'sellers', 'action' => 'view', $sellerCalculation['Seller']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($sellerCalculation['SellerCalculation']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('InTime'); ?></dt>
		<dd>
			<?php echo h($sellerCalculation['SellerCalculation']['inTime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OutTime'); ?></dt>
		<dd>
			<?php echo h($sellerCalculation['SellerCalculation']['outTime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('GoldSold'); ?></dt>
		<dd>
			<?php echo h($sellerCalculation['SellerCalculation']['goldSold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RateOfGramGold'); ?></dt>
		<dd>
			<?php echo h($sellerCalculation['SellerCalculation']['rateOfGramGold']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Seller Calculation'), array('action' => 'edit', $sellerCalculation['SellerCalculation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Seller Calculation'), array('action' => 'delete', $sellerCalculation['SellerCalculation']['id']), array(), __('Are you sure you want to delete # %s?', $sellerCalculation['SellerCalculation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Seller Calculations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller Calculation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sellers'), array('controller' => 'sellers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller'), array('controller' => 'sellers', 'action' => 'add')); ?> </li>
	</ul>
</div>
