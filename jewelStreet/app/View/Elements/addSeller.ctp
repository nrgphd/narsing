<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<!-- <h4 class="modal-title txt-center" id="myModalLabel">Supervisor</h4> -->
				  </div>
				  <div class="modal-body" style="height:500px; overflow:auto;">
					<center>
						<div style="font-size: 20px;margin: 10px;">Add Salesman</div>
						<div style="font-size: 11px;margin: 10px;">
			
							
							<?php echo $this->Form->create('Seller',array('controller' => 'sellers', 'action' => 'add')); ?>
							<table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped" style="font-size: 12px;">
								<tr>
									<td class="capitalize"><?php echo __(h('Name')); ?>
									</td>
					
									<td class="capitalize"><?php echo $this->Form->input('name',array('type'=>'text','label'=> false, 'required' => true, 'class' => 'form-control capitalize')); ?>
									</td>
								</tr>
								
								<tr>
									<td class="capitalize"><?php echo __(h('Email')); ?>
									</td>
					
									<td class="capitalize"><?php echo $this->Form->input('User.email',array('label'=> false, 'class' => 'form-control capitalize')); ?>
									</td>
								</tr>
								
								<tr>
									<td class="capitalize"><?php echo __(h('Password')); ?>
									</td>
					
									<td class="capitalize"><?php echo $this->Form->input('User.password',array('label'=> false, 'class' => 'form-control capitalize')); ?>
									</td>
								</tr>
					
								<tr>
									<td class="capitalize"><?php echo __(h('Mobile')); ?>
									</td>
					
									<td class="capitalize"><?php echo $this->Form->input('mobile',array('type'=>'text','label'=> false, 'class' => 'form-control capitalize')); ?>
									</td>
								</tr>
					
							</table>
							<div class="txt-rt btm-margin">
								<?php echo $this->Form->submit('Update', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
								<?php 
									/* echo $this->Form->button('Cancel', array(
										'type' => 'button',
										'div' => false,
										'class' => array('btn', 'btn-danger', 'btn-sm'),
										'onclick' => 'location.href=\'../../jewelStreet/Users/supervisor\''
								)); */
								?>
							</div>
							<?php $this->Form->end(); ?>
										
						</div>
					</center>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>