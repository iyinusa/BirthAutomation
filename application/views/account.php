    <div class="rightside">
        <div class="page-head">
            <h1>User Accounts</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">User Accounts</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-lg-4">
                    <?php echo form_open_multipart('account'); ?>
                        <div class="box">
                            <div class="box-title">
                                <i class="fa fa-upload"></i>
                                <h3>New User</h3>
                                <div class="pull-right box-toolbar">
                                    <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                                </div>          
                            </div>
                            <div class="box-body">
                                <?php if(!empty($err_msg)){echo $err_msg;} ?>
                                <input type="hidden" name="acc_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
								<?php
									$ins =& get_instance();
									$ins->load->model('mcentre');
									$all_centre = '';
									//get all centres
									if(!empty($allcentre)){
										foreach($allcentre as $centre){
											if(!empty($e_centre_id)){
												if($e_centre_id == $centre->id){
													$c_sel = 'selected="selected"';	
												} else {$c_sel = '';}
											} else {$c_sel = '';}
											
											$all_centre .= '<option value="'.$centre->id.'" '.$c_sel.'>'.$centre->name.'</option>';
										}
									}
								?>
                                
                                <div class="form-group">
                                    <label>Access Role</label>
                                    <?php
										if(!empty($e_role)){
											if($e_role == 'Registrar'){$r1='selected';} else {$r1='';}	
											if($e_role == 'Deputy Chief Registrar'){$r2='selected';} else {$r2='';}
											if($e_role == 'Chief Registrar'){$r3='selected';} else {$r3='';}
											if($e_role == 'Registrar General'){$r4='selected';} else {$r4='';}
											if($e_role == 'Admin'){$r5='selected';} else {$r5='';}
										} else {$r1='';$r2='';$r3='';$r4='';$r5='';}
									?>
                                    <select name="role" class="form-control" placeholder="Access Role" required>
										<option class="">Access Role</option>
                                        <option class="Registrar" <?php echo $r1; ?>>Registrar</option>
                                        <option class="Deputy Chief Registrar" <?php echo $r2; ?>>Deputy Chief Registrar</option>
                                        <option class="Chief Registrar" <?php echo $r3; ?>>Chief Registrar</option>
                                        <option class="Registrar General" <?php echo $r4; ?>>Registrar General</option>
                                        <option class="Admin" <?php echo $r5; ?>>Administrator</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" placeholder="First Name" class="form-control" value="<?php if(!empty($e_firstname)){echo $e_firstname;} ?>" required="required" />
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" placeholder="Last Name" class="form-control" value="<?php if(!empty($e_lastname)){echo $e_lastname;} ?>" required="required" />
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" placeholder="Username" class="form-control" value="<?php if(!empty($e_username)){echo $e_username;} ?>" required="required" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control" <?php if(empty($e_id)){echo 'required="required"';}?> />
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" placeholder="Phone Number" class="form-control" value="<?php if(!empty($e_phone)){echo $e_phone;} ?>" required="required" />
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Email Address" class="form-control" value="<?php if(!empty($e_email)){echo $e_email;} ?>" required="required" />
                                </div>
                                <div class="form-group">
                                    <label>Assign To Centre <i class="small text-muted">(Only Registrar Role)</i></label>
                                    <select name="centre_id" class="form-control" placeholder="Assign To Centre">
										<option value="0">All</option>
										<?php echo $all_centre; ?>
                                    </select>
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
                            <h3>User Account Directory</h3>
                            <div class="pull-right box-toolbar">
                                <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                            </div>          
                        </div>
                        <div class="box-body">
                            <?php
								$dir_list = '';
								
								if(!empty($alluser)){
									foreach($alluser as $up){
										//get centre name
										$centre_name = '';
										$getcentre = $this->mcentre->query_centre_id($up->centre_id);
										if(!empty($getcentre)){
											foreach($getcentre as $gcentre){
												$centre_name = $gcentre->name;	
											}
										}
										
										$dir_list .= '
											<tr>
												<td>'.$up->firstname.' '.$up->lastname.'</td>
												<td>'.$up->username.'</td>
												<td>'.$up->role.'</td>
												<td>'.$centre_name.'</td>
												<td>
													<a href="'.base_url().'account?edit='.$up->user_id.'" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Edit</a>
													<a href="'.base_url().'account?del='.$up->user_id.'" class="btn btn-danger btn"><i class="fa fa-times"></i> Delete</a>
												</td>
											</tr>
										';	
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Centre</th>
                                        <th width="150">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Role</th>
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