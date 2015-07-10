
<div class="wrapper-out">
	

	<div class="users index">
		
	<h4 class="head4"><?php echo __('Admin'); ?></h4>
		<div class="col-sm-12 txt-rt margin-btm">
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
				<span class="glyphicon glyphicon-plus-sign"></span> &nbsp; Add Supervisor
			</button>

				<?php echo $this->element('addSupervisor'); ?>			
				
		</div>
		
		<table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped" style="font-size: 12px;">
			<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('mobile'); ?></th>
				<th><?php echo $this->Paginator->sort('email'); ?></th>
			<!-- <th class="actions"><?php echo __('Actions'); ?></th> -->
			</tr>
			</thead>
			<tbody>
			<?php foreach ($supervisors as $user): ?>
			<tr>
				<td><?php echo h($user['Supervisor']['id']); ?>&nbsp;</td>
				<td><?php echo h($user['Supervisor']['name']); ?>&nbsp;</td>
				<td><?php echo h($user['Supervisor']['mobile']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				
			<!-- <td class="actions">
					<div class="btn-group">
						<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
							Action<span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-default pull-right" role="menu">
							
							<li>
								<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
							</li>
							
							<li>
								<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
							</li>
							
							<li>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
							</li>
						</ul>
					</div>
					
				</td> -->
			</tr>
		<?php endforeach; ?>
			</tbody>
		</table>
		<p class="para txt-center">
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
			?>	
		</p>
		<div class="txt-center">
			<nav>
				<ul class="pagination">
					<?php
					echo "<li>".$this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'))."</li>";
					echo "<li>".$this->Paginator->numbers(array('separator' => ''), array('class' => 'active'))."</li>";
					echo "<li>".$this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'))."</li>";
					?>
				</ul>
			</nav>
		</div>
		
	</div>
	
</div>