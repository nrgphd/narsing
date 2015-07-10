<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">0
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title txt-center" id="myModalLabel">Total Gold Sold</h4>
								  </div>
								  <div class="modal-body" style="height:500px; overflow:auto;">
									<center>
										
										<div style="font-size: 11px;margin: 10px;">
							
											<table cellpadding="0" cellspacing="0"  class="table table-bordered table-striped" style="font-size: 12px;">
												<thead>
													<tr>
														<th><?php echo $this->Paginator->sort('Id'); ?></th>
														<th><?php echo $this->Paginator->sort('dateOfPresent', 'Date'); ?></th>
														<th><?php echo $this->Paginator->sort('goldGramsSold', 'Gold Sold'); ?></th>
														<th><?php echo $this->Paginator->sort('rateOfGramGold', 'Gold Rate'); ?></th>
														<th><?php echo $this->Paginator->sort('earningsOfTheDay', 'Day Earnings'); ?></th>
														
														
													</tr>
												</thead>
												<tbody>
												<?php for ($j=0; $j<count($sellers[$i]['SellerCalculation']); $j++) {?>
													<tr>
														<td class="capitalize"><?php echo h($sellers[$i]['Seller']['id']); ?>
														</td>
													
														<td class="capitalize"><?php echo h($sellers[$i]['SellerCalculation'][$j]['dateOfPresent']); ?>
														</td>
															<td class="capitalize"><?php echo h($sellers[$i]['SellerCalculation'][$j]['goldGramsSold']). " grams"; ?>
														</td>
														<td class="capitalize"><?php echo h($sellers[$i]['SellerCalculation'][$j]['rateOfGramGold']); ?>
														</td>
														<td class="capitalize"><?php echo h($sellers[$i]['SellerCalculation'][$j]['earningsOfTheDay']); ?>
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
							</div>