<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("adm/head");?>
<body>

		<?php $this->load->view('adm/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/teknis.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/autocomplete/styles.css"/>
    <script type="text/javascript" src="<?php echo base_url();?>js/autocomplete/jquery.autocomplete.js"></script>    
    <script type="text/javascript" src="<?php echo base_url();?>js/padilibs/padi.autocomplete.js"></script>    

		<?php $this->load->view('adm/menu'); ?>
    <div class="content">


        <div class="breadLine">

            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>
                <li class="active">Forms stuff</li>
            </ul>
		<?php $this->load->view('adm/buttons'); ?>
        </div>

        <div class="workplace">
			<input type="hidden" id="userbranches" value="<?php echo $userbranches;?>" />
            <div class="row-fluid">

                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Filter</h1>
                    </div>
                    <div class="block-fluid">
						<?php if(($this->session->userdata["role"]=="TS")||($this->session->userdata["role"]=="EOS")){?>
                        <div class="row-form clearfix">
                            <div class="span3">Rekap Bulan:</div>
                            <div class="span2"><input type="text" class="monthdatepicker" id="reportdate" value ="<?php echo date("F - Y");?>"></div>

                            <div class="span1"><button class="btn" type="button" id="viewmonthlyreport">View</button></div>
                            <div class="span6"></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Laporan Tiket Harian:</div>
                            <div class="span2"><input type="text" class="datepicker" id="shiftdate" value="<?php echo date("d/m/Y");?>"></div>

                            <div class="span1"><button class="btn" type="button" id="viewshiftreport">View</button></div>
                            <div class="span6"></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Nama Pelanggan:</div>
                            <div class="span6">
								<input type="text" id="autocomplete-pelanggan">
								<input type="text" id="client_id" style="display:none">
                            </div>

                            <div class="span1"><button class="btn" type="button" id="viewtickethistory">View</button></div>
                            <div class="span2"></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Laporan Downtime:</div>
                            <div class="span6">
								<input type="text" class="datepicker" id="downtimedate1" value="<?php echo date("d/m/Y");?>">
								<input type="text" class="datepicker" id="downtimedate2" value="<?php echo date("d/m/Y");?>">
                            </div>

                            <div class="span1"><button class="btn" type="button" id="viewdowntimereport">View</button></div>
                            <div class="span2"></div>
                        </div>	
                        <div class="row-form clearfix">
                            <div class="span3">Laporan Ticket Terselesaikan:</div>
                            <div class="span6">
                            <div class="span6">
								<input type="text" class="datepicker" id="solveddate1" value="<?php echo date("d/m/Y");?>">
								<input type="text" class="datepicker" id="solveddate2" value="<?php echo date("d/m/Y");?>">
                            </div>
								
                            </div>

                            <div class="span1"><button class="btn" type="button" id="viewsolvedreport">View</button></div>
                            <div class="span2"></div>
                        </div>
                        
						<!--
						<div class="row-form clearfix">
                            <div class="span3">Laporan Ticket Belum Terselesaikan:</div>
                            <div class="span6">
								<div class="span6">
									<input type="text" class="datepicker" id="unsolveddate1" value="<?php echo date("d/m/Y");?>">
									<input type="text" class="datepicker" id="unsolveddate2" value="<?php echo date("d/m/Y");?>">
								</div>
                            </div>
                            <div class="span1"><button class="btn" type="button" id="viewunsolvedreport">View</button></div>
                            <div class="span2"></div>
                        </div>
						
						-->
						
						
						
						
                        <div class="row-form clearfix">
                            <div class="span3">Laporan Ticket Open:</div>
                            <div class="span1"><button class="btn" type="button" id="viewopenticket">View</button></div>
                            <div class="span2"></div>
                        </div>
						
						
						
						
						
						
												
						<?php } ?>					
						<?php if($this->session->userdata["role"]=="Sales"){?>
                        <?php if(has_right_access(1,$this->session->userdata["user_id"])){?>
                        <div class="row-form clearfix">
                            <div class="span3">Rekap Bulanan Sales:</div>
                            <div class="span2"><input type="text" class="monthdatepicker" id="reportdatefarmer" value ="<?php echo date("F - Y");?>"></div>

                            <div class="span1"><button class="btn" type="button" id="viewmonthlyreportfarmer">View</button></div>
                            <div class="span6"></div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Laporan Leads:</div>
                            <div class="span6">
								<input type="text" class="datepicker" id="suspectdate1" value="<?php echo date("d/m/Y");?>">
								<input type="text" class="datepicker" id="suspectdate2" value="<?php echo date("d/m/Y");?>">
                            </div>

                            <div class="span1"><button class="btn" type="button" id="viewsuspectreport">View</button></div>
                            <div class="span2"></div>
                        </div>
						
                        <div class="row-form clearfix">
                            <div class="span3">Laporan Prospect:</div>
                            <div class="span6">
								<input type="text" class="datepicker" id="prospectdate1" value="<?php echo date("d/m/Y");?>">
								<input type="text" class="datepicker" id="prospectdate2" value="<?php echo date("d/m/Y");?>">
                            </div>

                            <div class="span1"><button class="btn" type="button" id="viewprospectreport">View</button></div>
                            <div class="span2"></div>
                        </div>
						
                        <div class="row-form clearfix">
                            <div class="span3">Laporan Survey:</div>
                            <div class="span6">
								<input type="text" class="datepicker" id="surveydate1" value="<?php echo date("d/m/Y");?>">
								<input type="text" class="datepicker" id="surveydate2" value="<?php echo date("d/m/Y");?>">
                            </div>

                            <div class="span1"><button class="btn" type="button" id="viewsurveyreport">View</button></div>
                            <div class="span2"></div>
                        </div>
						
                        <div class="row-form clearfix">
                            <div class="span3">Laporan Install:</div>
                            <div class="span6">
								<input type="text" class="datepicker" id="installdate1" value="<?php echo date("d/m/Y");?>">
								<input type="text" class="datepicker" id="installdate2" value="<?php echo date("d/m/Y");?>">
                            </div>

                            <div class="span1"><button class="btn" type="button" id="viewinstallreport">View</button></div>
                            <div class="span2"></div>
                        </div>
						
						<?php }?>
						<?php }?>
                    </div>
                </div>

            </div>


        </div>

    </div>
    <script type="text/javascript">
		var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
		$("#viewmonthlyreport").click(function(){
			console.log($("#reportdate").val());
			if($("#reportdate").val().trim()!==""){
				var dat = $("#reportdate").val(),
					sp = dat.split(" - "),
					mn = sp[0],yr = sp[1];
				console.log(mn,yr);
				month = months.indexOf(mn)+1;
				window.location.href = "<?php echo base_url()?>rpt/layout/"+month+"/"+yr+"/"+$("#userbranches").val();
			}
		});
		$("#viewmonthlyreportfarmer").click(function(){
			console.log($("#reportdatefarmer").val());
			if($("#reportdatefarmer").val().trim()!==""){
				var dat = $("#reportdatefarmer").val(),
					sp = dat.split(" - "),
					mn = sp[0],yr = sp[1];
				console.log(mn,yr);
				month = months.indexOf(mn)+1;
				window.location.href = "<?php echo base_url()?>rpt/farmer/"+month+"/"+yr+"/"+$("#userbranches").val()+"/0";
			}
		});		
		$("#viewshiftreport").click(function(){
			console.log($("#reportdate").val());
			if($("#shiftdate").val().trim()!==""){
				var dat = $("#shiftdate").val(),
					sp = dat.split("/"),
					dt = sp[0],mn = sp[1],yr = sp[2];
					mn = mn-0;
				console.log("mn,yr",mn,yr);
				window.location.href = "<?php echo base_url()?>rpt/shiftreport/"+dt+"/"+mn+"/"+yr+"/"+$("#userbranches").val();
			}
		});
		$("#viewsolvedreport").click(function(){
			console.log($("#reportdate").val());
			$("#solveddate1").getdate();$("#solveddate2").getdate();
			if($("#shiftdate").val().trim()!==""){
				var dat = $("#shiftdate").val(),
					sp = dat.split("/"),
					dt = sp[0],mn = sp[1],yr = sp[2];
					mn = mn-0;
				console.log("mn,yr",mn,yr);
				window.location.href = "<?php echo base_url()?>rpt/solvedreport/clientname/asc/14/4/"+$("#solveddate1").attr("datetime")+"/"+$("#solveddate2").attr("datetime");;
			}
		});		
		$("#viewunsolvedreport").click(function(){
			$("#unsolveddate1").getdate();
			$("#unsolveddate2").getdate();
			console.log($("#reportdate").val());
			if($("#shiftdate").val().trim()!==""){
				var dat = $("#shiftdate").val(),
					sp = dat.split("/"),
					dt = sp[0],mn = sp[1],yr = sp[2];
					mn = mn-0;
				console.log("mn,yr",mn,yr);
				window.location.href = "<?php echo base_url()?>rpt/unsolvedreport/clientname/asc/14/4/"+$("#unsolveddate1").attr("datetime")+"/"+$("#unsolveddate2").attr("datetime");
			}
		});	
		//	
		$("#viewopenticket").click(function(){
			$("#unsolveddate1").getdate();
			$("#unsolveddate2").getdate();
			console.log($("#reportdate").val());
			if($("#shiftdate").val().trim()!==""){
				var dat = $("#shiftdate").val(),
					sp = dat.split("/"),
					dt = sp[0],mn = sp[1],yr = sp[2];
					mn = mn-0;
				console.log("mn,yr",mn,yr);
				window.location.href = "<?php echo base_url()?>rpt/showOpenTicket/clientname/asc/14/4/"+padicurdate()+"/"+padicurdate();
			}
		});	

		$("#viewzabbix").click(function(){
			window.location.href = "<?php echo base_url();?>rpt/zabbix2";
		});
		$("#viewsla").click(function(){
			console.log($("#slamonth").val());
			if($("#slamonth").val().trim()!==""){
				var dat = $("#slamonth").val(),
					sp = dat.split(" - "),
					mn = sp[0],yr = sp[1];
				console.log(mn,yr);
				month = months.indexOf(mn)+1;
				window.location.href = "<?php echo base_url()?>rpt/sla/"+$("#services").val()+"/"+month+"/"+yr;
			}
//			window.location.href = "<?php echo base_url();?>rpt/sla/"+$("#services").val()+"/"+$("#slamonth").val();
		});
    
    </script>
    

    <script>
			'use strict';
			var pelanggan = [{"value":"Djamoe Iboe","data":1},{"value":"Djamoe Ayah","data":2},{"value":"Resto Nine","data":3}];
			$.ajax({
				url:thisdomain+'tickets/listtest',
				dataType:'json',
				success:function(clnts){
					pelanggan = clnts.out;
					console.log('out',clnts.out);

					$('#autocomplete-pelanggan').autocomplete({
						lookup: clnts.out,
						onSelect: function(suggestion) {
							$('#client_id').val(suggestion.data);
							$.ajax({
								url:thisdomain+'clients/get_sites',
								type:'post',
								data:{id:suggestion.data},
								dataType:'json',
								success:function(sites){
									$('#csites').empty();
									$.each(sites,function(x,y){
										$('#csites').append('<option value='+x+'>'+y.alamat+'</option>');
										$.ajax({
											url:thisdomain+'clients/get_services',
											type:'post',
											data:{id:x},
											dataType:'json',
											success:function(services){
												var myservices = '';
												$.each(services,function(x,y){
													myservices += y.name+' Tgl Aktivasi '+sql2idformatnotime(y.activation_date)+"<br />" ;
													console.log('myservices',myservices);
													//$('#autocomplete-pelanggan-x').html(y.name+' Tgl Aktivasi '+sql2idformat(y.activation_date));
												$('#autocomplete-pelanggan-x').html(myservices);
												});
												
											},
											error:function(err){
												alert(err);
											}
										});
									});
								},
								error:function(err){
									console.log('err',err);
								}
							});
						},
						onHint: function (hint) {
							console.log('hint',hint);
							$('#autocomplete-pelanggan-x').val(hint);
						},
						onInvalidateSelection: function() {
							//$('#selction-client').html('You selected: none');
						}
					});
				}
			});
    </script>
	<script>
		$("#viewtickethistory").click(function(){
			if($("#autocomplete-pelanggan").val().trim()===""){
				alert("Nama Pelanggan tidak boleh kosong")
			}else{
				console.log($('#client_id').val());
				window.location.href = "<?php echo base_url()?>rpt/ticketbyname/asc/"+$('#client_id').val();
			}
		});
		$("#viewsuspectreport").click(function(){
			
			$("#suspectdate1").getdate();
			$("#suspectdate2").getdate();
			console.log($("#suspectdate1").attr("datetime"));
			window.location.href = "<?php echo base_url()?>rpt/suspectreport/create_date/asc/"+$("#suspectdate1").attr("datetime")+"/"+$("#suspectdate2").attr("datetime")+"/"+$("#userbranches").val()+"/<?php echo $struser;?>";
		});
		$("#viewprospectreport").click(function(){
			
			$("#prospectdate1").getdate();
			$("#prospectdate2").getdate();
			console.log($("#prospectdate1").attr("datetime"));
			window.location.href = "<?php echo base_url()?>rpt/prospectreport/create_date/asc/"+$("#prospectdate1").attr("datetime")+"/"+$("#prospectdate2").attr("datetime")+"/"+$("#userbranches").val()+"/<?php echo $struser;?>";
		});
		$("#viewsurveyreport").click(function(){
			
			$("#surveydate1").getdate();
			$("#surveydate2").getdate();
			console.log($("#surveydate1").attr("datetime"));
			window.location.href = "<?php echo base_url()?>rpt/surveyreport/create_date/asc/"+$("#surveydate1").attr("datetime")+"/"+$("#surveydate2").attr("datetime")+"/"+$("#userbranches").val()+"/<?php echo $struser;?>";
		});
		$("#viewinstallreport").click(function(){
			
			$("#installdate1").getdate();
			$("#installdate2").getdate();
			console.log($("#installdate1").attr("datetime"));
			window.location.href = "<?php echo base_url()?>rpt/installreport/create_date/asc/"+$("#installdate1").attr("datetime")+"/"+$("#installdate2").attr("datetime")+"/"+$("#userbranches").val()+"/<?php echo $struser;?>";
		});
		
		//viewdowntimereport
		$("#viewdowntimereport").click(function(){
			
			$("#downtimedate1").getdate();
			$("#downtimedate2").getdate();
			console.log($("#downtimedate1").attr("datetime"));
			window.location.href = "<?php echo base_url()?>rpt/downtimereport/clientname/asc/"+$("#downtimedate1").attr("datetime")+"/"+$("#downtimedate2").attr("datetime")+"/"+$("#userbranches").val();
		});
	</script>
</body>
</html>
