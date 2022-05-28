    <div class="rightside">
        <div class="page-head">
            <h1>Registration Centre</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li>Settings</li>
                <li class="active">Registration Centre</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-lg-4">
                    <?php echo form_open_multipart('centre'); ?>
                        <div class="box">
                            <div class="box-title">
                                <i class="fa fa-upload"></i>
                                <h3>New Registration Centre</h3>
                                <div class="pull-right box-toolbar">
                                    <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                </div>          
                            </div>
                            <div class="box-body">
                                <?php if(!empty($err_msg)){echo $err_msg;} ?>
                                <input type="hidden" name="centre_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
								<?php
									$ins =& get_instance();
									$ins->load->model('mstate');
									$ins->load->model('mlga');
									$ins->load->model('mlivebirth');
									$ins->load->model('mstillbirth');
									$ins->load->model('mdeath');
									$lga_list = '';
									$l_state = '';
									if(!empty($alllga)){
										foreach($alllga as $lga){
											if(!empty($e_lga_id)){
												if($e_lga_id == $lga->id){
													$s_sel = 'selected="selected"';
												} else {$s_sel = '';}
											} else {$s_sel = '';}
											
											//get state
											$lstate = $this->mstate->query_state_id($lga->state_id);
											if(!empty($lstate)){
												foreach($lstate as $ls){
													$l_state = $ls->name;	
												}
											}
											
											$lga_list .= '<option value="'.$lga->id.'" '.$s_sel.'>'.$l_state.'/'.$lga->name.'</option>';
										}
									}
								?>
                                <div class="form-group">
                                    <label>State/LGA</label>
                                    <select name="lga_id" class="form-control" placeholder="State/LGA" required>
										<?php echo $lga_list; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Registration Centre</label>
                                    <input type="text" name="name" placeholder="Registration Centre" class="form-control" value="<?php if(!empty($e_name)){echo $e_name;} ?>" required="required" />
                                </div>
                            </div>
                            <div class="box-footer clearfix">
                                <button type="submit" name="submit" class="pull-left btn btn-success">Update Record <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                
                
                <div class="col-lg-8">
                    <div class="box">
                        <div class="box-title">
                            <i class="fa fa-book"></i>
                            <h3>Registration Centre Directory</h3>
                            <div class="pull-right box-toolbar">
                                <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                            </div>          
                        </div>
                        <div class="box-body">
                            <?php
								$dir_list = '';
								$state_name = '';
								$lga_name = '';
								if(!empty($allup)){
									foreach($allup as $up){
										$lb_count = 0;
										$sb_count = 0;
										$d_count = 0;
										
										//get lga name
										$getlga = $this->mlga->query_lga_id($up->lga_id);
										if(!empty($getlga)){
											foreach($getlga as $glga){
												//get state
												$getstate = $this->mstate->query_state_id($glga->state_id);
												if(!empty($getstate)){
													foreach($getstate as $state){
														$state_name = $state->name;	
													}
												}
												
												$lga_name = $glga->name;	
											}
										}
										
										//get records count
										$lb_count = $this->mlivebirth->count_livebirth_centre($up->id);
										$sb_count = $this->mstillbirth->count_stillbirth_centre($up->id);
										$d_count = $this->mdeath->count_death_centre($up->id);
										
										$dir_list .= '
											<tr>
												<td>
													'.$state_name.'/'.$lga_name.'<br />
													<span>
														<span class="label label-success">LB: '.$lb_count.'</span>
														<span class="label label-primary">SB: '.$sb_count.'</span>
														<span class="label label-danger">D: '.$d_count.'</span>
													</span>
												</td>
												<td>'.$up->name.'</td>
												<td>
													<a href="'.base_url().'centre?edit='.$up->id.'" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Edit</a>
													<a href="'.base_url().'centre?del='.$up->id.'" class="btn btn-danger btn"><i class="fa fa-times"></i> Delete</a>
												</td>
											</tr>
										';	
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>State/LGA</th>
                                        <th>Centre</th>
                                        <th width="150">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>State/LGA</th>
                                        <th>Centre</th>
                                        <th width="150">Manage</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>