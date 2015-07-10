				<?php //echo "<pre>"; print_r($i); exit;?>
				
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title txt-center" id="myModalLabel">Total Time Particulars </h4>
								  </div>
								  <div class="modal-body" style="height:500px; overflow:auto;">
									<center>
										
										<div style="font-size: 11px;margin: 10px;">
							
											<table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped" style="font-size: 12px;">
												<thead>
													<tr>
														<th><?php echo $this->Paginator->sort('id'); ?></th>
														<th><?php echo $this->Paginator->sort('date'); ?></th>
														<th><?php echo $this->Paginator->sort('time_in'); ?></th>
														<th><?php echo $this->Paginator->sort('time_out'); ?></th>
														<th><?php echo $this->Paginator->sort('total_hours_of_the_day'); ?></th>
														
													</tr>
												</thead>
												<tbody>
												<?php for ($j=0; $j<count($sellers[$k]['SellerCalculation']); $j++) {?>
												
													<tr>
														<td class="capitalize"><?php echo h($sellers[$k]['Seller']['id']); ?>
														</td>
													
														<td class="capitalize"><?php echo h($sellers[$k]['SellerCalculation'][$j]['dateOfPresent']); ?>
														</td>
															<td class="capitalize"><?php echo h($sellers[$k]['SellerCalculation'][$j]['inTime']); ?>
														</td>
														<td class="capitalize"><?php echo h($sellers[$k]['SellerCalculation'][$j]['outTime']); ?>
														</td>
														<td class="capitalize">
															<?php
															$time1 = strtotime($sellers[$k]['SellerCalculation'][$j]['inTime']);
															$time2 = strtotime($sellers[$k]['SellerCalculation'][$j]['outTime']);
															$workingHours = $time2 - $time1;
															$workingHours = date('H:i:s', $workingHours);
																echo h($workingHours);
															?>
														</td>
													</tr>
													
													<?php } ?>
													
												</tbody>
											</table>
														
										</div>
									</center>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								</div>
							  </div>
							