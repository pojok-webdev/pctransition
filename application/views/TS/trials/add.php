<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
	<script type='text/javascript'>
/*	prospectclick = function(){
		$.getJSON('<?php echo base_url();?>index.php/adm/get_prospects/'+$('#client_id').val(),function(data){
			$('#pic_name').val(data['pic_name']);
		});
	}
	$('.removesurveyor').click(function(){
		$(this).parent().parent().fadeOut(200);
		});*/
	</script>
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET Internal App" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

	<?php $this->load->view('adm/menu');?>
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>
                <li><a href="#">Edit user</a> <span class="divider">></span></li>
                <li class="active">Aqvatarius</li>
            </ul>
                        
            <ul class="buttons">
                <li>
                    <a href="#" class="link_bcPopupList"><span class="icon-user"></span><span class="text">Users list</span></a>

                    <div id="bcPopupList" class="popup">
                        <div class="head">
                            <div class="arrow"></div>
                            <span class="isw-users"></span>
                            <span class="name">List users</span>
                            <div class="clear"></div>
                        </div>
                        <div class="body-fluid users">

                            <div class="item">
                                <div class="image"><a href="#"><img src="<?php echo base_url();?>img/aquarius/users/aqvatarius_s.jpg" width="32"/></a></div>
                                <div class="info">
                                    <a href="#" class="name">Aqvatarius</a>                                    
                                    <span>online</span>
                                </div>
                                <div class="clear"></div>
                            </div>


                        </div>
                        <div class="footer">
                            <button class="btn" type="button">Add new</button>
                            <button class="btn btn-danger link_bcPopupList" type="button">Close</button>
                        </div>
                    </div>                    
                    
                </li>                
                <li>
                    <a href="#" class="link_bcPopupSearch"><span class="icon-search"></span><span class="text">Search</span></a>
                    
                    <div id="bcPopupSearch" class="popup">
                        <div class="head">
                            <div class="arrow"></div>
                            <span class="isw-zoom"></span>
                            <span class="name">Search</span>
                            <div class="clear"></div>
                        </div>
                        <div class="body search">
                            <input type="text" placeholder="Some text for search..." name="search"/>
                        </div>
                        <div class="footer">
                            <button class="btn" type="button">Search</button>
                            <button class="btn btn-danger link_bcPopupSearch" type="button">Close</button>
                        </div>
                    </div>                
                </li>
            </ul>
            
        </div>
        <div class="workplace">
            
            <div class="row-fluid">                
                <div class="span12">                                        
                    <div class="block-fluid without-head">                        
                        <div class="toolbar clearfix">
                            <div class="right">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-small btn-warning tip" title="Quick save" id='trial_save' value='<?php echo $obj->id;?>'><span class="icon-ok icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn-danger tip" title="Delete user"><span class="icon-remove icon-white"></span></button>
                                </div>
                            </div>
                        </div>
                        <!-- tempat form -->
						<form action='<?php echo base_url();?>index.php/adm/handler' method='POST' id='xyx'>
						<input type='hidden' name='client_site_id' class="inp_trial" value='<?php echo $obj->id;?>' />

                        <div class="row-form clearfix">
                            <div class="span3">Nama</div>
                            <div class="span9">
								<?php echo $obj->client->name;?>
								</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Dari tanggal</div>
                            <div class="span9"><input type="text" name="startdate" class="datepicker inp_trial" id='startdate' value="<?php echo $dates->today?>" /></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Hingga tanggal</div>
                            <div class="span9"><input type="text" name="enddate" class="datepicker inp_trial" id='enddate'  value="<?php echo $dates->weeklater?>"/></div>
                        </div>
                        
            
                        
						</form>
						<!-- end of tempat form -->
                    </div>                    
                </div>
            </div>            
            
            <div class="row-fluid">
                <div class="span6">
                

<!-- batas bawah -->                
            </div>            
            
            
            
        </div>
        <!-- </form> -->
    </div>   
    
</body>
<script type="text/javascript" src="<?php echo base_url()?>js/aquarius/radu.js"></script>
<script>
	(function($){
		$("#trial_save").click(function(){
			$('.inp_trial').makekeyvalparam();
			console.log("ok padiNET",thisdomain,$('.inp_trial').attr('keyval'));
			$.ajax({
				url:thisdomain+'trials/save',
				data:JSON.parse('{'+$('.inp_trial').attr('keyval')+'}'),
				type:'post',
			}).
			done(function(data){
				console.log("Res",data);
				window.location.href = thisdomain+"trials";
				/*$.each($("#trialpic tbody tr .addpic"),function(x,y){
					username = $(this).html();
					$.ajax({
						url:thisdomain+'trials/addpic',
						data:{"username":username,trial_id:data},
						type:"post"				
					});
				})*/
			})
			.fail(function(err){
				console.log("Error",err);
			});
		});
	}(jQuery))
</script>
</html>

