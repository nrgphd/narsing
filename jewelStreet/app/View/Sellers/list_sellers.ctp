
<div class="wrapper-out">	

	<div class="users index">
		
	<h4 class="head4"><?php echo __('Supervisor'); ?></h4>
	
		<div class="col-sm-12 txt-center margin-btm">
			<?php echo $this->element('monthYearFilter'); ?>
		</div>
		
		<div class="col-sm-12 txt-rt margin-btm">
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
				<span class="glyphicon glyphicon-plus-sign"></span> &nbsp; Add Salesman
			</button>

			<!-- Modal -->
			
			<?php echo $this->element('addSeller'); ?>		
		
		</div>
				
		<?php if ($sellers) { ?>
		
		<h4><?php echo "Sales Staff Particulars In Year <b><i>". $year ."</i></b> For The Month Of <b><i>". date("F", mktime(null, null, null, $month)). "</i></b>."; ?> </h4>
		
		<table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped" style="font-size: 12px;">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('time_stayed (HH:MM:SS)'); ?></th>
					<th><?php echo $this->Paginator->sort('phone'); ?></th>
					<th><?php echo $this->Paginator->sort('total_gold_sold (Grams)'); ?></th>
					<th><?php echo $this->Paginator->sort('total_earnings_of_the_month ($)'); ?></th>
				<!-- <th class="actions"><?php echo __('Actions'); ?></th> -->
				</tr>
			</thead>
			<tbody>
			<?php 
			
			for ($i=0; $i<count($sellers); $i++){ ?>
			<tr>
				<td><?php echo h($sellers[$i]['Seller']['id']); ?>&nbsp;</td>
				<td><?php echo h($sellers[$i]['Seller']['name']); ?>&nbsp;</td>
								
				<td>					
					<div class="col-sm-12 txt-lt margin-btm">
						<!-- Link trigger modal -->
						<?php echo $this->Html->link($totalHours[$i], '#myModal1'.$i, array('data-toggle' => "modal", 'data-target' => "#myModal1".$i))?>
							<!-- <a href="" data-toggle="modal" data-target="#myModal1" > <?php echo $totalHours[$i]; ?></a> -->
						<!-- Modal -->		
						<?php echo '<div class="modal fade" id="myModal1'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';?>				
						
						<?php echo $this->element('hoursListShow', array('k' => $i)); ?>
						
						<?php echo "</div>"; ?>
					</div>					
				</td>
					
				<td><?php echo h($sellers[$i]['Seller']['mobile']); ?>&nbsp;</td>
				
				<td>					
					<div class="col-sm-12 txt-lt margin-btm">
						<!-- Link trigger modal -->
						<?php echo $this->Html->link($totalGold[$i], '#myModal2', array('data-toggle' => "modal", 'data-target' => "#myModal2"));?>
						<!-- <a href="" data-toggle="modal" data-target="#myModal2" > <?php echo $totalGold[$i]." grams"; ?></a> -->
						<!-- Modal -->
							<?php echo $this->element('goldListShow', array('i' => $i)); ?>						
					</div>
				</td>
				
				<td>					
					<div class="col-sm-12 txt-lt margin-btm">
						<!-- Link trigger modal -->
						<?php echo $this->Html->link($totalEarnings[$i], '#myModal2', array('data-toggle' => "modal", 'data-target' => "#myModal2"));?>
						<!-- <a href="" data-toggle="modal" data-target="#myModal2" > <?php echo $totalEarnings[$i]; ?></a> -->
						<!-- Modal -->
							<?php echo $this->element('goldListShow', array('i' => $i)); ?>						
					</div>
				</td>
				
			<!-- <td class="actions">
					<div class="btn-group">
						<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
							Action<span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-default pull-right" role="menu">
							
							<li>
								<?php echo $this->Html->link(__('View'), array('action' => 'view', $sellers[$i]['Seller']['id'])); ?>
							</li>
							
							<li>
								<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sellers[$i]['Seller']['id'])); ?>
							</li>
							
							<li>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sellers[$i]['Seller']['id']), array(), __('Are you sure you want to delete # %s?', $sellers[$i]['User']['id'])); ?>
							</li>
						</ul>
					</div>
					
				</td> -->
			</tr>
		<?php } ?>
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
		
	<?php }else {
			echo "Sorry...! No Earnings In <b>". $year. "</b> For The Month Of <b>". date("F", mktime(null, null, null, $month)). "</b>.";
	}?>
		
	</div>
	
</div>