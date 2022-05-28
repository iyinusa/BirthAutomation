    <div class="rightside">
        <div class="page-head">
            <h1>Death Certificate Report</h1>
            <ol class="breadcrumb">
                <li>You are here:</li>
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li>Report</li>
                <li class="active">Death Report</li>
            </ol>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-title">
                            <i class="fa fa-book"></i>
                            <h3>Death Report Directory</h3>
                            <div class="pull-right box-toolbar">
                                <a href="#" class="btn btn-link btn-xs remove-box"><i class="fa fa-times"></i></a>
                            </div>          
                        </div>
                        <div class="box-body">
                            <?php
								$ins =& get_instance();
								$ins->load->model('mcentre');
								$dir_list = '';
								$centre_name = '';
								if(!empty($allup)){
									foreach($allup as $up){
										//get centre
										$getcentre = $this->mcentre->query_centre_id($up->centre_id);
										if(!empty($getcentre)){
											foreach($getcentre as $gcentre){
												$centre_name = $gcentre->name;	
											}
										}
										
										$dir_list .= '
											<tr>
												<td>'.$up->id.'</td>
												<td>'.$up->rec_date.'</td>
												<td>'.$up->fullname.'</td>
												<td>'.$up->sex.'</td>
												<td>'.$centre_name.'</td>
												<td>
													<a href="'.base_url().'deathreport?cert='.$up->id.'" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-search"></i> Certificate</a>
												</td>
											</tr>
										';	
									}
								}
							?>	
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Death Date</th>
                                        <th>Full Name</th>
                                        <th>Sex</th>
                                        <th>Reg. Centre</th>
                                        <th width="100">Manage</th>
                                    </tr>
                                </thead>
                                <tbody class="small">
                                	<?php echo $dir_list; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Death Date</th>
                                        <th>Full Name</th>
                                        <th>Sex</th>
                                        <th>Reg. Centre</th>
                                        <th width="100">Manage</th>
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