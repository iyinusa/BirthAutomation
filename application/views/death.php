    <div class="rightside">
        <div class="page-head">
            <h1>Death</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li>Registration</li>
                <li class="active">Death</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#demo"><i class="fa fa-minus"></i> Show/Hide New Death</button>
                    <div id="demo" class="collapse in">
						<?php echo form_open_multipart('death'); ?>
                            <div class="box">
                                <div class="box-body">
                                    <?php if(!empty($err_msg)){echo $err_msg;} ?>
                                    
                                    <?php
										$all_centre = '';
										$all_cause = '';
										$all_mstate = '';
										$all_mcountry = '';
										$all_moccupation = '';
										$all_meducation = '';
										$all_relation = '';
										
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
										
										//get all cause of death
										if(!empty($allcause)){
											foreach($allcause as $cause){
												if(!empty($e_cause_id)){
													if($e_cause_id == $cause->id){
														$co_sel = 'selected="selected"';	
													} else {$co_sel = '';}
												} else {$co_sel = '';}
												
												$all_cause .= '<option value="'.$cause->id.'" '.$co_sel.'>'.$cause->name.'</option>';
											}
										}
										
										//get all relationship
										if(!empty($allrelation)){
											foreach($allrelation as $relation){
												if(!empty($e_i_relationship_id)){
													if($e_i_relationship_id == $relation->id){
														$r_sel = 'selected="selected"';	
													} else {$r_sel = '';}
												} else {$r_sel = '';}
												
												$all_relation .= '<option value="'.$relation->id.'" '.$r_sel.'>'.$relation->name.'</option>';
											}
										}
										
										//get all state
										if(!empty($allstate)){
											foreach($allstate as $state){
												//check active mother state
												if(!empty($e_m_state_id)){
													if($e_m_state_id == $state->id){
														$m_sel = 'selected="selected"';	
													} else {$m_sel = '';}
												} else {$m_sel = '';}
												
												$all_mstate .= '<option value="'.$state->id.'" '.$m_sel.'>'.$state->name.'</option>';
											}
										}
										
										//get all state
										if(!empty($allcountry)){
											foreach($allcountry as $country){
												//check active mother state
												if(!empty($e_m_country)){
													if($e_m_country == $country->id){
														$c_sel = 'selected="selected"';	
													} else {$c_sel = '';}
												} else {$c_sel = '';}
												
												$all_mcountry .= '<option value="'.$country->id.'" '.$c_sel.'>'.$country->name.'</option>';
											}
										}
										
										//get all occupation
										if(!empty($alloccupation)){
											foreach($alloccupation as $occupation){
												//check active mother occupation
												if(!empty($e_m_occupation_id)){
													if($e_m_occupation_id == $occupation->id){
														$mo_sel = 'selected="selected"';	
													} else {$mo_sel = '';}
												} else {$mo_sel = '';}
												
												$all_moccupation .= '<option value="'.$occupation->id.'" '.$mo_sel.'>'.$occupation->name.'</option>';
											}
										}
										
										//get all education
										if(!empty($alleducation)){
											foreach($alleducation as $education){
												//check active mother education
												if(!empty($e_m_education_id)){
													if($e_m_education_id == $education->id){
														$me_sel = 'selected="selected"';	
													} else {$me_sel = '';}
												} else {$me_sel = '';}
												
												$all_meducation .= '<option value="'.$education->id.'" '.$me_sel.'>'.$education->name.'</option>';
											}
										}
									?>
                                    
                                    <div class="form-group">
                                        <input type="hidden" name="death_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
                                        
                                        <fieldset>
                                        	<legend>Registration Centre</legend>
                                            <div class="form-inline">
                                            	<div class="form-group">
                                                    <label>Centre Name:</label>
                                                    <select name="centre_id" class="form-control">
                                                        <?php echo $all_centre; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                	<label>Date:</label>
                                                    <input name="rec_date" class="form-control datepicker" value="<?php if(!empty($e_rec_date)){echo $e_rec_date;} ?>" />
                                                </div>
                                            </div>
                                        </fieldset><hr />
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>Deceased Data</legend>
                                                <div class="form-group">
                                                    <label>Full Name:</label>
                                                    <input name="fullname" class="form-control" value="<?php if(!empty($e_fullname)){echo $e_fullname;} ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Sex:</label>
                                                    <select name="sex" class="form-control">
                                                        <option value="<?php if(!empty($e_sex)){echo $e_sex;} ?>" <?php if(!empty($e_sex)){echo 'selected';} ?>><?php if(!empty($e_sex)){echo $e_sex;} ?></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address:</label>
                                                    <textarea name="maddress" class="form-control"><?php if(!empty($e_m_address)){echo $e_m_address;} ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>State:</label>
                                                    <select name="mstate_id" class="form-control">
                                                        <?php echo $all_mstate; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nationality:</label>
                                                    <select name="mcountry" class="form-control">
                                                        <?php echo $all_mcountry; ?>
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>&nbsp;</legend>
                                                <div class="form-group">
                                                    <label>Age:</label>
                                                    <input name="mage" class="form-control" value="<?php if(!empty($e_m_age)){echo $e_m_age;} ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Marital Status:</label>
                                                    <select name="mmarital" class="form-control">
                                                        <option value="<?php if(!empty($e_m_marital)){echo $e_m_marital;} ?>" <?php if(!empty($e_m_marital)){echo 'selected';} ?>><?php if(!empty($e_m_marital)){echo $e_m_marital;} ?></option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Widowed">Widowed</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Education:</label>
                                                    <select name="meducation_id" class="form-control">
                                                        <?php echo $all_meducation; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Occupation:</label>
                                                    <select name="moccupation_id" class="form-control">
                                                        <?php echo $all_moccupation; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Death Cause:</label>
                                                    <select name="cause_id" class="form-control">
                                                        <?php echo $all_cause; ?>
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                        <div class="col-md-3 bg-warning">
                                            <fieldset>
                                                <legend>Informant Data</legend>
                                                <div class="form-group">
                                                    <label>Relationship:</label>
                                                    <select name="relation_id" class="form-control">
                                                        <?php echo $all_relation; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Full name:</label>
                                                    <input name="ifullname" class="form-control" value="<?php if(!empty($e_i_fullname)){echo $e_i_fullname;} ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone:</label>
                                                    <input name="iphone" class="form-control" value="<?php if(!empty($e_i_phone)){echo $e_i_phone;} ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Address:</label>
                                                    <textarea name="iaddress" class="form-control"><?php if(!empty($e_i_address)){echo $e_i_address;} ?></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="box-footer text-center clearfix">
                                    <button type="submit" name="submit" class="pull-left btn btn-success">Update Record <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                
                
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-title">
                            <i class="fa fa-book"></i>
                            <h3>Death Directory</h3>
                            <div class="pull-right box-toolbar">
                                <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                            </div>          
                        </div>
                        <div class="box-body">
                            <?php
								$ins =& get_instance();
								$ins->load->model('mcause');
								$dir_list = '';
								$cause_name = '';
								
								if(!empty($allup)){
									foreach($allup as $up){
										//get cause name
										$getcause = $this->mcause->query_cause_id($up->cause_id);
										if(!empty($getcause)){
											foreach($getcause as $gcause){
												$cause_name = $gcause->name;	
											}
										}
										
										$dir_list .= '
											<tr>
												<td>'.$up->rec_date.'</td>
												<td>'.$up->fullname.'</td>
												<td>'.$cause_name.'</td>
												<td>'.$up->i_fullname.'</td>
												<td>
													<a href="'.base_url().'death?edit='.$up->id.'" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Edit</a>
													<a href="'.base_url().'death?del='.$up->id.'" class="btn btn-danger btn"><i class="fa fa-times"></i> Delete</a>
												</td>
											</tr>
										';	
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Death Date</th>
                                        <th>Full Name</th>
                                        <th>Death Cause</th>
                                        <th>Informant</th>
                                        <th width="150">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Death Date</th>
                                        <th>Full Name</th>
                                        <th>Death Cause</th>
                                        <th>Informant</th>
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