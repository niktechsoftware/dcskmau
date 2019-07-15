

	
							<form action="<?php echo base_url();?>index.php/libraryCard/libraryCardReport"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
													<div class="row">
														<div class="col-md-12">
															<!-- start: RESPONSIVE TABLE PANEL -->
															<div class="panel panel-white">
																<div class="panel-heading">
																	<i class="fa fa-external-link-square"></i>
																	Download Library Card : 
																	<div class="panel-tools">										
																		<div class="dropdown">
																		<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
																			<i class="fa fa-cog"></i>
																		</a>
																		<ul class="dropdown-menu dropdown-light pull-right" role="menu">
																			<li>
																				<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
																			</li>
																			<li>
																				<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
																			</li>
																			<li>
																				<a class="panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> <span>Configurations</span></a>
																			</li>
																			<li>
																				<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
																			</li>										
																		</ul>
																		</div>
																	</div>
																</div>
																<div class="panel-body">
																	<div class="alert alert-info">
																		<h4 class="center"><b> Download Library Card </b></h4>
																	</div>
																	<div id="msg"></div>
																	<div class="col-md-12">
																		<div class="panel">
																			<div class="panel-heading panel-red border-light">
																				<h4 class="panel-title">Library Card</h4>
																			</div>
																			<div class="panel-body">
																				<div class="row space15">
																					<div class="col-md-3">&nbsp;&nbsp;&nbsp;&nbsp;Enter Student ID </div>
																					<div class="col-sm-4">
																						<input type="text" class="form-control" id="student_id" name="student_id" placeholder="Text Field">
																					</div>
																					<div class="col-md-4">
																						<button type="submit"  id = "b1" class="btn btn-red">
																							Get Library Card <i class="fa fa-report"></i>
																						</button>
																					</div>
																				</div>
																				
																				<div class="row space15">
																					<div class="col-md-7">
																						<div id = "validId"></div>
																					</div>
																					
																				</div>
																			</div>
																		</div>
																		
																	</div>
																
																</div>
															</div>
														</div>
													</div>
										</form>
								