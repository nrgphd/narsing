<div class="supervisors view">
<h2><?php echo __('Supervisor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($supervisor['Supervisor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($supervisor['User']['email'], array('controller' => 'users', 'action' => 'view', $supervisor['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($supervisor['Supervisor']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($supervisor['Supervisor']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($supervisor['Region']['region'], array('controller' => 'regions', 'action' => 'view', $supervisor['Region']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Supervisor'), array('action' => 'edit', $supervisor['Supervisor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Supervisor'), array('action' => 'delete', $supervisor['Supervisor']['id']), array(), __('Are you sure you want to delete # %s?', $supervisor['Supervisor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Supervisors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supervisor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
	</ul>
</div>
