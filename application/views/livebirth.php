    <div class="rightside">
        <div class="page-head">
            <h1>Live Birth</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li>Registration</li>
                <li class="active">Live Birth</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#demo"><i class="fa fa-minus"></i> Show/Hide New Live Birth</button>
                    <div id="demo" class="collapse in">
						<?php echo form_open_multipart('livebirth'); ?>
                            <div class="box">
                                <div class="box-body">
                                    <?php if(!empty($err_msg)){echo $err_msg;} ?>
                                    
                                    <?php
										$all_centre = '';
										$all_occur = '';
										$all_mstate = '';
										$all_fstate = '';
										$all_moccupation = '';
										$all_foccupation = '';
										$all_meducation = '';
										$all_feducation = '';
										$all_relation = '';
										$all_mcountry = '';
										$all_fcountry = '';
										
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
										
										//get all place of occurance
										if(!empty($alloccur)){
											foreach($alloccur as $occur){
												if(!empty($e_occur_id)){
													if($e_occur_id == $occur->id){
														$o_sel = 'selected="selected"';	
													} else {$o_sel = '';}
												} else {$o_sel = '';}
												
												$all_occur .= '<option value="'.$occur->id.'" '.$o_sel.'>'.$occur->name.'</option>';
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
												//check active father state
												if(!empty($e_f_state_id)){
													if($e_f_state_id == $state->id){
														$f_sel = 'selected="selected"';	
													} else {$f_sel = '';}
												} else {$f_sel = '';}
												
												$all_mstate .= '<option value="'.$state->id.'" '.$m_sel.'>'.$state->name.'</option>';
												$all_fstate .= '<option value="'.$state->id.'" '.$f_sel.'>'.$state->name.'</option>';
											}
										}
										
										//get all country
										if(!empty($allcountry)){
											foreach($allcountry as $country){
												//check active mother state
												if(!empty($e_m_country)){
													if($e_m_country == $country->id){
														$mc_sel = 'selected="selected"';	
													} else {$mc_sel = '';}
												} else {$mc_sel = '';}
												//check active father state
												if(!empty($e_f_country)){
													if($e_f_country == $country->id){
														$fc_sel = 'selected="selected"';	
													} else {$fc_sel = '';}
												} else {$fc_sel = '';}
												
												$all_mcountry .= '<option value="'.$country->id.'" '.$mc_sel.'>'.$country->name.'</option>';
												$all_fcountry .= '<option value="'.$country->id.'" '.$fc_sel.'>'.$country->name.'</option>';
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
												//check active father occupation
												if(!empty($e_f_occupation_id)){
													if($e_f_occupation_id == $occupation->id){
														$fo_sel = 'selected="selected"';	
													} else {$fo_sel = '';}
												} else {$fo_sel = '';}
												
												$all_moccupation .= '<option value="'.$occupation->id.'" '.$mo_sel.'>'.$occupation->name.'</option>';
												$all_foccupation .= '<option value="'.$occupation->id.'" '.$fo_sel.'>'.$occupation->name.'</option>';
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
												//check active father education
												if(!empty($e_f_education_id)){
													if($e_f_education_id == $education->id){
														$fe_sel = 'selected="selected"';	
													} else {$fe_sel = '';}
												} else {$fe_sel = '';}
												
												$all_meducation .= '<option value="'.$education->id.'" '.$me_sel.'>'.$education->name.'</option>';
												$all_feducation .= '<option value="'.$education->id.'" '.$fe_sel.'>'.$education->name.'</option>';
											}
										}
									?>
                                    
                                    <div class="form-group">
                                        <input type="hidden" name="livebirth_id" value="<?php if(!empty($e_id)){echo $e_id;} ?>" />
                                        
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
                                                <legend>Child Data</legend>
                                                <div class="form-group">
                                                    <label>Full Name:</label>
                                                    <input name="fullname" class="form-control" value="<?php if(!empty($e_fullname)){echo $e_fullname;} ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Date of Birth:</label>
                                                    <div class="form-inline">
                                                    	<div class="form-group">
                                                            <select name="day" class="form-control">
                                                              <option value="<?php if(!empty($e_day)){echo $e_day;} ?>" <?php if(!empty($e_day)){echo 'selected';} ?>><?php if(!empty($e_day)){echo $e_day;} ?></option>
                                                              <option value="1">1</option>
                                                              <option value="2">2</option>
                                                              <option value="3">3</option>
                                                              <option value="4">4</option>
                                                              <option value="5">5</option>
                                                              <option value="6">6</option>
                                                              <option value="7">7</option>
                                                              <option value="8">8</option>
                                                              <option value="9">9</option>
                                                              <option value="10">10</option>
                                                              <option value="11">11</option>
                                                              <option value="12">12</option>
                                                              <option value="13">13</option>
                                                              <option value="14">14</option>
                                                              <option value="15">15</option>
                                                              <option value="16">16</option>
                                                              <option value="17">17</option>
                                                              <option value="18">18</option>
                                                              <option value="19">19</option>
                                                              <option value="20">20</option>
                                                              <option value="21">21</option>
                                                              <option value="22">22</option>
                                                              <option value="23">23</option>
                                                              <option value="24">24</option>
                                                              <option value="25">25</option>
                                                              <option value="26">26</option>
                                                              <option value="27">27</option>
                                                              <option value="28">28</option>
                                                              <option value="29">29</option>
                                                              <option value="30">30</option>
                                                              <option value="31">31</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="month" class="form-control">
                                                                <option value="<?php if(!empty($e_month)){echo $e_month;} ?>" <?php if(!empty($e_month)){echo 'selected';} ?>><?php if(!empty($e_month)){echo $e_month;} ?></option>
                                                                <option value="January">January</option>
                                                                <option value="February">February</option>
                                                                <option value="March">March</option>
                                                                <option value="April">April</option>
                                                                <option value="May">May</option>
                                                                <option value="June">June</option>
                                                                <option value="July">July</option>
                                                                <option value="August">August</option>
                                                                <option value="September">September</option>
                                                                <option value="October">October</option>
                                                                <option value="November">November</option>
                                                                <option value="December">December</option>
                                                              </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="year" class="form-control">
                                                                <option value="<?php if(!empty($e_year)){echo $e_year;} ?>" <?php if(!empty($e_year)){echo 'selected';} ?>><?php if(!empty($e_year)){echo $e_year;} ?></option>
                                                                <option value="2016">2016</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2008">2008</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Place of Occurance:</label>
                                                    <select name="occur_id" class="form-control">
                                                        <?php echo $all_occur; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Village/Town:</label>
                                                    <select name="town" class="form-control">
                                                        <option value="<?php if(!empty($e_town)){echo $e_town;} ?>" <?php if(!empty($e_town)){echo 'selected';} ?>><?php if(!empty($e_town)){echo $e_town;} ?></option>
                                                        <option value="Village">Village</option>
                                                        <option value="Town">Town</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Type of Birth:</label>
                                                    <select name="type" class="form-control">
                                                        <option value="<?php if(!empty($e_type)){echo $e_type;} ?>" <?php if(!empty($e_type)){echo 'selected';} ?>><?php if(!empty($e_type)){echo $e_type;} ?></option>
                                                        <option value="Single">Single</option>
                                                        <option value="Multiple">Multiple</option>
                                                    </select>
                                                </div>
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label>Sex:</label>
                                                        <select name="sex" class="form-control">
                                                            <option value="<?php if(!empty($e_sex)){echo $e_sex;} ?>" <?php if(!empty($e_sex)){echo 'selected';} ?>><?php if(!empty($e_sex)){echo $e_sex;} ?></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Birth Order:</label>
                                                        <select name="order" class="form-control">
                                                            <option value="<?php if(!empty($e_birth_order)){echo $e_birth_order;} ?>" <?php if(!empty($e_birth_order)){echo 'selected';} ?>><?php if(!empty($e_birth_order)){echo $e_birth_order;} ?></option>
                                                            <option value="1">1</option>
                                                              <option value="2">2</option>
                                                              <option value="3">3</option>
                                                              <option value="4">4</option>
                                                              <option value="5">5</option>
                                                              <option value="6">6</option>
                                                              <option value="7">7</option>
                                                              <option value="8">8</option>
                                                              <option value="9">9</option>
                                                              <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                        <div class="col-md-4 bg-success">
                                            <fieldset>
                                                <legend>Mother Data</legend>
                                                <div class="form-group">
                                                    <label>Full Name:</label>
                                                    <input name="mfullname" class="form-control" value="<?php if(!empty($e_m_fullname)){echo $e_m_fullname;} ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Address:</label>
                                                    <textarea name="maddress" class="form-control"><?php if(!empty($e_m_address)){echo $e_m_address;} ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Age:</label>
                                                    <input name="mage" class="form-control" value="<?php if(!empty($e_m_age)){echo $e_m_age;} ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone:</label>
                                                    <input name="mphone" class="form-control" value="<?php if(!empty($e_m_phone)){echo $e_m_phone;} ?>" />
                                                </div>
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label>State:</label>
                                                        <select name="mstate_id" class="form-control">
                                                            <?php echo $all_mstate; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Occupation:</label>
                                                        <select name="moccupation_id" class="form-control">
                                                            <?php echo $all_moccupation; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Education:</label>
                                                    <select name="meducation_id" class="form-control">
                                                        <?php echo $all_meducation; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nationality:</label>
                                                    <select name="mcountry" class="form-control">
                                                        <?php echo $all_mcountry; ?>
                                                    </select>
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
                                            </fieldset>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <fieldset>
                                                <legend>Father Data</legend>
                                             	<div class="form-group">
                                                    <label>Full Name:</label>
                                                    <input name="ffullname" class="form-control" value="<?php if(!empty($e_f_fullname)){echo $e_f_fullname;} ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Address:</label>
                                                    <textarea name="faddress" class="form-control"><?php if(!empty($e_f_address)){echo $e_f_address;} ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Age:</label>
                                                    <input name="fage" class="form-control" value="<?php if(!empty($e_f_age)){echo $e_f_age;} ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone:</label>
                                                    <input name="fphone" class="form-control" value="<?php if(!empty($e_f_phone)){echo $e_f_phone;} ?>" />
                                                </div>
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label>State:</label>
                                                        <select name="fstate_id" class="form-control">
                                                            <?php echo $all_fstate; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Occupation:</label>
                                                        <select name="foccupation_id" class="form-control">
                                                            <?php echo $all_foccupation; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Education:</label>
                                                    <select name="feducation_id" class="form-control">
                                                        <?php echo $all_feducation; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nationality:</label>
                                                    <select name="fcountry" class="form-control">
                                                        <?php echo $all_fcountry; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Marital Status:</label>
                                                    <select name="fmarital" class="form-control">
                                                        <option value="<?php if(!empty($e_f_marital)){echo $e_f_marital;} ?>" <?php if(!empty($e_f_marital)){echo 'selected';} ?>><?php if(!empty($e_f_marital)){echo $e_f_marital;} ?></option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Separated">Separated</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Widowed">Widowed</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    
                                    <hr />
                                    
                                    <div class="row">
                						<div class="col-lg-12">
                                        	<div class="form-group">
                                                <fieldset>
                                                    <legend>Informant Data</legend>
                                                    <div class="form-inline">
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
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address:</label>
                                                        <textarea name="iaddress" class="form-control"><?php if(!empty($e_i_address)){echo $e_i_address;} ?></textarea>
                                                    </div>
                                                </fieldset>
                                            </div>
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
                            <h3>Live Birth Directory</h3>
                            <div class="pull-right box-toolbar">
                                <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                            </div>          
                        </div>
                        <div class="box-body">
                            <?php
								$dir_list = '';
								if(!empty($allup)){
									foreach($allup as $up){
										$dir_list .= '
											<tr>
												<td>'.$up->dob_day.' '.$up->dob_month.' '.$up->dob_year.'</td>
												<td>'.$up->fullname.'</td>
												<td>'.$up->m_fullname.'</td>
												<td>'.$up->f_fullname.'</td>
												<td>'.$up->i_fullname.'</td>
												<td>
													<a href="'.base_url().'livebirth?edit='.$up->id.'" class="btn btn-primary btn"><i class="fa fa-pencil"></i> Edit</a>
													<a href="'.base_url().'livebirth?del='.$up->id.'" class="btn btn-danger btn"><i class="fa fa-times"></i> Delete</a>
												</td>
											</tr>
										';	
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Birth Date</th>
                                        <th>Full Name</th>
                                        <th>Mother</th>
                                        <th>Father</th>
                                        <th>Informant</th>
                                        <th width="150">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Birth Date</th>
                                        <th>Full Name</th>
                                        <th>Mother</th>
                                        <th>Father</th>
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