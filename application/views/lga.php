    <div class="rightside">
        <div class="page-head">
            <h1>LGA/LCDA</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li>Settings</li>
                <li class="active">LGA/LCDA</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-lg-4">
                    <?php echo form_open_multipart('lga'); ?>
                        <div class="box">
                            <div class="box-title">
                                <i class="fa fa-upload"></i>
                                <h3>New LGA/LCDA</h3>
                                <div class="pull-right box-toolbar">
                                    <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                </div>          
                            </div>
                            <div class="box-body">
                                <?php if(!empty($err_msg)){echo $err_msg;} ?>
                                <input type="hidden" name="lga_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
								<?php
									$state_list = '';
									if(!empty($allstate)){
										foreach($allstate as $state){
											if(!empty($e_state_id)){
												if($e_state_id == $state->id){
													$s_sel = 'selected="selected"';
												} else {$s_sel = '';}
											} else {$s_sel = '';}
											$state_list .= '<option value="'.$state->id.'" '.$s_sel.'>'.$state->name.'</option>';
										}
									}
								?>
                                <div class="form-group">
                                    <label>State</label>
                                    <select name="state_id" class="form-control" placeholder="State" required>
										<?php echo $state_list; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>LGA</label>
                                    <input type="text" name="name" placeholder="LGA" class="form-control" value="<?php if(!empty($e_name)){echo $e_name;} ?>" required="required" />
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
                            <h3>LGA/LCDA Directory</h3>
                            <div class="pull-right box-toolbar">
                                <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                            </div>          
                        </div>
                        <div class="box-body">
                            <?php
								$ins =& get_instance();
								$ins->load->model('mstate');
								$dir_list = '';
								$state_name = '';
								if(!empty($allup)){
									foreach($allup as $up){
										//get state name
										$getstate = $this->mstate->query_state_id($up->state_id);
										if(!empty($getstate)){
											foreach($getstate as $gstate){
												$state_name = $gstate->name;	
											}
										}
										
										$dir_list .= '
											<tr>
												<td>'.$state_name.'</td>
												<td>'.$up->name.'</td>
												<td>
													<a href="'.base_url().'lga?edit='.$up->id.'" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Edit</a>
													<a href="'.base_url().'lga?del='.$up->id.'" class="btn btn-danger btn"><i class="fa fa-times"></i> Delete</a>
												</td>
											</tr>
										';	
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>State</th>
                                        <th>LGA</th>
                                        <th width="150">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>State</th>
                                        <th>LGA</th>
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