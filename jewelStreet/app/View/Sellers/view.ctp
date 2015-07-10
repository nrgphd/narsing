<div class="sellers view">
<h2><?php echo __('Seller'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($seller['Seller']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($seller['User']['email'], array('controller' => 'users', 'action' => 'view', $seller['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($seller['Seller']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($seller['Seller']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($seller['Region']['region'], array('controller' => 'regions', 'action' => 'view', $seller['Region']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Seller'), array('action' => 'edit', $seller['Seller']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Seller'), array('action' => 'delete', $seller['Seller']['id']), array(), __('Are you sure you want to delete # %s?', $seller['Seller']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sellers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seller Calculations'), array('controller' => 'seller_calculations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller Calculation'), array('controller' => 'seller_calculations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Seller Calculations'); ?></h3>
	<?php if (!empty($seller['SellerCalculation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Seller Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('InTime'); ?></th>
		<th><?php echo __('OutTime'); ?></th>
		<th><?php echo __('GoldSold'); ?></th>
		<th><?php echo __('RateOfGramGold'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($seller['SellerCalculation'] as $sellerCalculation): ?>
		<tr>
			<td><?php echo $sellerCalculation['id']; ?></td>
			<td><?php echo $sellerCalculation['seller_id']; ?></td>
			<td><?php echo $sellerCalculation['date']; ?></td>
			<td><?php echo $sellerCalculation['inTime']; ?></td>
			<td><?php echo $sellerCalculation['outTime']; ?></td>
			<td><?php echo $sellerCalculation['goldSold']; ?></td>
			<td><?php echo $sellerCalculation['rateOfGramGold']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'seller_calculations', 'action' => 'view', $sellerCalculation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'seller_calculations', 'action' => 'edit', $sellerCalculation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'seller_calculations', 'action' => 'delete', $sellerCalculation['id']), array(), __('Are you sure you want to delete # %s?', $sellerCalculation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Seller Calculation'), array('controller' => 'seller_calculations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
