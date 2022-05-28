<?php
	if($page_act == 'dashboard'){$dashboard_active = 'active';}else{$dashboard_active = '';}
	if($page_act == 'registration'){$registration_active = 'active';}else{$registration_active = '';}
	if($page_act == 'settings'){$settings_active = 'active';}else{$settings_active = '';}
	if($page_act == 'account'){$account_active = 'active';}else{$account_active = '';}
	if($page_act == 'report'){$report_active = 'active';}else{$report_active = '';}
?>

<!-- wrapper -->
<div class="wrapper">
    <div class="leftside">
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li class="title">Navigation</li>
                <li class="<?php echo $dashboard_active; ?>">
                    <a href="<?php echo base_url(); ?>dashboard">
                        <i class="fa fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="<?php echo $registration_active; ?> sub-nav">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i> <span>Registration</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>livebirth">Live Birth</a></li>
                        <li><a href="<?php echo base_url(); ?>death">Death</a></li>
                        <li><a href="<?php echo base_url(); ?>stillbirth">Still Birth</a></li>
                    </ul>
                </li>
                <li class="<?php echo $settings_active; ?> sub-nav">
                    <a href="javascript:;">
                        <i class="fa fa-gears"></i> <span>Settings</span>
                    </a>
                    <ul class="sub-menu">
                        <?php if($this->session->userdata('itc_user_role') != 'Registrar'){ ?>
                            <li><a href="<?php echo base_url(); ?>country">Nationality</a></li>
                            <li><a href="<?php echo base_url(); ?>state">State</a></li>
                            <li><a href="<?php echo base_url(); ?>lga">LGA/LCDA</a></li>
                        <?php } ?>
                        <li><a href="<?php echo base_url(); ?>centre">Registration Centre</a></li>
                        <?php if($this->session->userdata('itc_user_role') != 'Registrar'){ ?>
                            <li><a href="<?php echo base_url(); ?>occurance">Place of Occurance</a></li>
                            <li><a href="<?php echo base_url(); ?>cause">Cause of Death</a></li>
                            <li><a href="<?php echo base_url(); ?>education">Education</a></li>
                            <li><a href="<?php echo base_url(); ?>occupation">Occupation</a></li>
                            <li><a href="<?php echo base_url(); ?>relationship">Relationship</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php if($this->session->userdata('itc_user_role') != 'Registrar'){ ?>
                    <li class="<?php echo $account_active; ?>">
                        <a href="<?php echo base_url(); ?>account">
                            <i class="fa fa-users"></i> <span>User Accounts</span>
                        </a>
                    </li>
                <?php } ?>
                <li class="<?php echo $report_active; ?> sub-nav">
                    <a href="javascript:;">
                        <i class="fa fa-signal"></i> <span>Report</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>birthreport">Birth Certificate</a></li>
                        <li><a href="<?php echo base_url(); ?>deathreport">Death Certificate</a></li>
                    </ul>
                </li>
            </ul>
         </div>
    </div>