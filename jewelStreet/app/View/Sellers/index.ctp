<div class="sellers index">
	<h2><?php echo __('Sellers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('region_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sellers as $seller): ?>
	<tr>
		<td><?php echo h($seller['Seller']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($seller['User']['email'], array('controller' => 'users', 'action' => 'view', $seller['User']['id'])); ?>
		</td>
		<td><?php echo h($seller['Seller']['name']); ?>&nbsp;</td>
		<td><?php echo h($seller['Seller']['mobile']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($seller['Region']['region'], array('controller' => 'regions', 'action' => 'view', $seller['Region']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $seller['Seller']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $seller['Seller']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $seller['Seller']['id']), array(), __('Are you sure you want to delete # %s?', $seller['Seller']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Seller'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seller Calculations'), array('controller' => 'seller_calculations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seller Calculation'), array('controller' => 'seller_calculations', 'action' => 'add')); ?> </li>
	</ul>
</div>
