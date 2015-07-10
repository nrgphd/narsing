
<div class="wrapper-out">
	<h4 class="head4 margin-btm"><?php echo __('Salesman'); ?></h4>
	
	<div class="col-md-3">
			<!-- Nav tabs -->
			  <ul class="nav nav-pills nav-stacked" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">In Time</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Out Time</a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Gold Sold</a></li>
				
			  </ul>
			</div>
			<div class="col-md-9">
			  <!-- Tab panes -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
				
					<div class="users forms" style="padding: 10px;">
					<?php echo $this->Form->create('SellerCalculation', array('controller' => 'sellerCalculations', 'action' => 'inTime'))?>
						<!-- <h5 class="head4">In Time</h5> -->
						<table class=" table myTable">
							<tr>
								<td>
									<div class='col-sm-8'>In Time : </div>
								</td>
								
								<td>
									<div class='col-sm-8'><?php echo $this->Form->input('inTime',array('type'=>'time', 'label' => false, 'div' => false, 'timeFormat' => 24,
				    						'class' => 'form-control col-md-4 col-lg-4', 'style' => array('width : auto !important ; margin : 0px 5px')));	?></div>
								</td>
							</tr>	
																		
							<tr>
								<td>
									<div class='col-sm-8'>Date of Working: </div>
								</td>
								
								<td>
									<div class='col-sm-8'><?php echo $this->Form->input('dateOfPresent',array('type'=>'date', 'label' => false, 'div' => false, 'dateFormat' => 'DMY',
				    						'minYear' => date('Y') - 10, 'maxYear' => date('Y'), 'class' => 'form-control col-md-4 col-lg-4', 'style' => array('width : auto !important ; margin : 0px 5px')));	?></div>
								</td>
							</tr>
							
							
							
						</table>
						<div class="txt-rt btm-margin col-md-8">
								<?php echo $this->Form->submit('Submit', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
								<?php 
									/* echo $this->Form->button('Cancel', array(
										'type' => 'button',
										'div' => false,
										'class' => array('btn', 'btn-danger', 'btn-sm'),
										'onclick' => 'location.href=\'../../jewelStreet/Users/salesman\''
								)); */
								?>
						</div>
						
						<?php echo $this->Form->end(); ?>
						
					</div>	
				</div> <!-- end of pan 1-->
				
				<div role="tabpanel" class="tab-pane" id="profile">
					<div class="users forms" style="padding: 10px;">
						<!-- <h5 class="head4">In Time</h5> -->
						<?php echo $this->Form->create('SellerCalculation', array('controller' => 'sellerCalculations', 'action' => 'outTime'))?>
						<table class=" table myTable">
							<tr>
								<td>
									<div class='col-sm-8'>Out Time : </div>
								</td>
								
								<td>
									<div class='col-sm-8'><?php echo $this->Form->input('outTime',array('type'=>'time', 'label' => false, 'div' => false, 'timeFormat' => 24,
				    						'class' => 'form-control col-md-4 col-lg-4', 'style' => array('width : auto !important ; margin : 0px 5px')));	?></div>
								</td>
							</tr>	
																		
							<tr>
								<td>
									<div class='col-sm-8'>Date of Working: </div>
								</td>
								
								<td>
									<div class='col-sm-8'><?php echo $this->Form->input('dateOfPresent',array('type'=>'date', 'label' => false, 'div' => false, 'dateFormat' => 'DMY',
				    						'minYear' => date('Y') - 10, 'maxYear' => date('Y'), 'class' => 'form-control col-md-4 col-lg-4', 'style' => array('width : auto !important ; margin : 0px 5px')));	?></div>
								</td>
							</tr>
						
						</table>
						<div class="txt-rt btm-margin col-md-8">
								<?php echo $this->Form->submit('Submit', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
								<?php 
									/* echo $this->Form->button('Cancel', array(
										'type' => 'button',
										'div' => false,
										'class' => array('btn', 'btn-danger', 'btn-sm'),
										'onclick' => 'location.href=\'../../jewelStreet/Users/salesman\''
								)); */
								?>
						</div>
						<?php echo $this->Form->end(); ?>
						
					</div>	
				
				</div> <!-- end of pan 2-->
				<div role="tabpanel" class="tab-pane" id="messages">
										<div class="users forms" style="padding: 10px;">
						<!-- <h5 class="head4">In Time</h5> -->
									
						
						<?php echo $this->Form->create('SellerCalculation', array('controller' => 'sellerCalculations', 'action' => 'goldSold'))?>
						<table class=" table myTable">
						<tr>
								<td>
									<div class='col-sm-8'> Date of Working: </div>
								</td>
								
								<td>
									<div class='col-sm-8'><?php echo $this->Form->input('dateOfPresent',array('type'=>'date', 'label' => false, 'div' => false, 'dateFormat' => 'DMY',
				    						'minYear' => date('Y') - 10, 'maxYear' => date('Y'), 'class' => 'form-control col-md-4 col-lg-4', 'style' => array('width : auto !important ; margin : 0px 5px')));	?></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class='col-sm-8'>Gold Quantity: </div>
								</td>
								<td>
									<div class='col-sm-8'>
										<?php echo $this->Form->input('goldGramsSold',array('type'=>'text', 'id' => 'gramsSold', 'label'=> false, 'required' => true, 'placeholder' => 'Enter weight in grams', 'class' => 'form-control')); ?>
									</div>
									<?php $this->Js->get('#gramsSold')->event(
			    				'change',
			   					 $this->Js->request(
			        			 array('controller' => 'sellerCalculations','action' => 'ajaxUpdateGoldGrams', $totalGoldGrams, $sellerId),
			        			 array('async' => true, 
			        			 		'update' => '#gramsTillNow',
			        			 		'dataExpression' => true, 
										'method' => 'post', 
										'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true)) 
								)
			   				 )
					);
					?>
								</td>
							</tr>	
							
							<tr>
								<td>
									<!-- <div class='col-sm-6'>Total Gold Sold Till Now: </div> -->
							</td>
							<td>
									<div class='col-sm-6'>
										<span id='gramsTillNow'> <?php echo $totalGoldGrams." Grams of Gold Sold Till Now";?> </span>
									</div>
								</td>
							</tr>
							
						<!-- <tr>
								<td>
									<div class='col-sm-6'>Rate of Gold Per Gram: </div> 
								</td>
							 <td>
									<div class='col-sm-6'>
										<?php echo $this->Form->input('rateOfGramGold',array('type'=>'text', 'label'=> false, 'required' => true, 'placeholder' => 'Cost of Gram Gold on this day', 'class' => 'form-control')); ?>
									</div>
								</td> 
							</tr> -->
							
						</table>
						<div class="txt-rt btm-margin col-md-8">
								<?php echo $this->Form->submit('Submit', array('class' => array('btn', 'btn-success', 'btn-sm'), 'div' => false)); ?>
								<?php 
									echo $this->Form->button('Cancel', array(
										'type' => 'button',
										'div' => false,
										'class' => array('btn', 'btn-danger', 'btn-sm'),
										'onclick' => 'location.href=\'../../jewelStreet/Users/salesman\''
									));
								?>
						</div>
						
						<?php echo $this->Form->end(); ?>
						
					</div>	
				
				</div> <!-- end of pan 3-->
				</div>
			</div>




</div>