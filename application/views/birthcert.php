 <!DOCTYPE html style="width:100%; margin:auto;">
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">
<!--<![endif]-->
<head>
  	<meta charset="utf-8">
    <title><?php echo $title; ?></title>
    
    <style>
    	.e_header {
			overflow:auto;
		}
		table.sheader {
			width:100%;
			color:#fff;	
		}
		table.sheader .text-up {
			font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
			font-weight:bold;
			font-size:xx-large;
		}
		table.sheader .text-down {
			font-family: "Lucida Console", Monaco, monospace;
			font-size:small;
		}
		table.ssheader{
			width:100%;
			font-family:Tahoma, Geneva, sans-serif;
			font-size:x-small;
			color:#666;
		}
		.e_sub_header {
			padding:10px; margin-bottom:10px; border-bottom:1px solid #0CF;
		}
		.rpt_title {
			padding:10px 0px;
			text-align:center;
			font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
			font-size:large;
		}
		.e_body {
			padding:10px;	
		}
		table.rpt{
			width:100%;
			font-size:small;
			border:1px solid #eee;
			font-family:Tahoma, Geneva, sans-serif;
		}
		table.rpt thead td {
			padding:5px;
			font-weight:bold;
		}
		table.rpt tbody td {
			padding:5px;
		}
		table.rpt tfoot td {
			padding:5px;
			background-color:#eee;
			margin-top:5px;
			text-align:center;
		}
		table.rpt tfoot td div {
			font-weight:bolder;
			text-align:center;
		}
		table.rpt tfoot td:first-child {
			font-weight:bolder;
		}
		.e_footer {
			color:#333;
			text-align:center;
		}
		.email_btn {
			text-decoration:none;
			padding:10px 35px;
			background-color:#06C;
			text-align:center;
			font-weight:bold;
			color:#fff;
		}
		@media print{@page {size: landscape}}
    </style>
    
</head>
<body>
	<div style="background-color:#eee; width:70%; margin:auto; padding:10px;">
        <div style="margin:auto; background-image:url(<?php echo base_url(); ?>img/cert_back.jpg)">
            <div class="e_header">
                
            </div>
            <div class="e_sub_header">
                <table width="100%">
                	<tr>
                    	<td width="33%">
                        	<img alt="" src="<?php echo base_url(); ?>img/logo.gif" height="100" />
                        </td>
                        <td width="33%">
                        	<img alt="" src="<?php echo base_url(); ?>img/ng-coat.png" height="100" />
                        </td>
                        <td>
                        	<div style="font-size:24px; font-weight:bold; text-align:right;">
                                Form B2
                            </div>
                            <div style="border:double 3px #000; height:50px; padding:5px;">
                                <div style="font-size:12px; font-weight:bold;">
                                	<b>CAUTION:</b> Any person who (1) Falsifies any of the particulars on this certificate or (2) uses a falsified certificate as true, knowing it to be false is liable to prosecution
                                </div>
                            </div>
                            <div style="font-size:36px; font-weight:bold; text-align:right;">
                                ORIGINAL
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                	<tr>
                    	<td width="33%" align="center">
                        	<div style="font-size:34px; font-weight:bold;">FEDERAL REPUBLIC OF NIGERIA</div>
                            <div style="font-size:24px; font-weight:bold;">NATIONAL POPULATION COMMISSION</div><br />
                            <div style="font-size:20px; font-weight:bold;">CERTIFICATE OF BIRTH     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;A13.......</div><br />
                            <div><i>Issued under the Births and Deaths Etc (Compulsory Registration) Degree 69 of 1992.</i></div>
                        </td>
                  	</tr>
                </table>
            </div>
            
            <div class="e_body">
                <table width="100%">
                	<tr>
                    	<td>
                        	<b>Registration Centre:</b> <?php echo $e_centre_name; ?>
                            <br />
                            <b>Town/Village:</b> <?php echo $e_town; ?>
                            <br />
                            <!--<b>LGEA:</b> <?php echo $e_lga_name; ?>
                            <br />-->
                            <b>State:</b> <?php echo $e_state_name; ?>
                        </td>
                        <td>
                        
                        </td>
                    </tr>
                </table>
                <br />
                <h2 style="text-align:center;">
                This is to certify that the birth, details of which are recorded herein, has been registered on
                <br /><br />
                <b><?php echo date('d F Y',strtotime($e_rec_date)); ?></b> at the <b><?php echo $e_centre_name; ?></b> Registration Centre
                </h2><br />
                <table width="100%" class="rpt">
                	<tr>
                    	<td colspan="2">
                        	<b>1. Full Name:</b> <?php echo $e_fullname; ?> 
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<b>2. Sex:</b> <?php echo $e_sex; ?> 
                        </td>
                        <td>
                        	<b>3. Date of Birth:</b> <?php echo $e_day.' '.$e_month.' '.$e_year; ?> 
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<b>4. Place of Birth:</b> <?php echo $e_occur; ?> 
                        </td>
                        <td>
                        	<b>Town/Village:</b> <?php echo $e_town; ?> 
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<b>5. Full Name of Father:</b> <?php echo $e_f_fullname; ?> 
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<b>6. Full Name of Mother:</b> <?php echo $e_m_fullname; ?> 
                        </td>
                    </tr>
                </table>
                
                <br /><br />
                
                <table width="100%">
                	<tr>
                    	<td>
                        	<b>Place of Issue:</b> <?php echo $e_centre_name; ?><br /><br />
                            <b>Date:</b> <?php echo $e_rec_date; ?>
                        </td>
                        <td>
                        	<b>Name of Registrar:</b>..............................<br /><br />
                            <b>Signature of Registrar:</b>..............................
                        </td>
                    </tr>
                </table>
            </div>
            
            <br /><br />
            
            <div class="e_footer">
                NATIONAL REGISTRATION PROGRAMME<br /><br />
                <i><a href="javascript:;" onClick="printdoc();"><b>Print Report</a>
            </div>
            
            
            
            <script>
				function printdoc() {
					window.print();
				}
			</script>
        </div>
    </div>
</body>
</html>