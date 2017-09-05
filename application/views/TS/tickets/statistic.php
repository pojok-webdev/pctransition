<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view("adm/head");?>
<body>
	<?php $this->load->view('adm/header'); ?>    
	<?php $this->load->view('adm/menu'); ?>    
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>                
                <li class="active">Statistic</li>
            </ul>
                        
            <?php
				$this->load->view("adm/buttons");
            ?>
        </div>
        
        <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-graph"></div>
                        <h1>Chart</h1>
                    </div>
                    <div class="block">
                        <div id="padichart1" style="height: 300px; width : 600px;margin-top: 10px;">
                        </div>
                    </div>
                </div>
                
            </div> 
            
            <div class="dr"><span></span></div>
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-graph"></div>
                        <h1>Chart</h1>
                    </div>
                    <div class="block">
                        <div id="chart-1" style="height: 300px; margin-top: 10px;">
                            
                        </div>
                    </div>
                </div>
                
            </div> 
            
            <div class="dr"><span></span></div>
        
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Stacked charts</h1>
                    </div>
                    <div class="block">
                        <div id="chart-2" style="height: 300px; margin-top: 10px;">
                            
                        </div>
                    </div>
                </div>
                
            </div>             

            <div class="dr"><span></span></div>
        
            <div class="row-fluid">
                
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-right_circle"></div>
                        <h1>Pie charts</h1>
                    </div>
                    <div class="block">
                        <div id="chart-3" style="height: 300px;">
                            
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-refresh"></div>
                        <h1>Real-time update</h1>
                    </div>
                    <div class="block">
                        <div id="chart-4" style="height: 300px;">
                            
                        </div>
                    </div>
                </div>                
                
            </div>             
            
        </div>
        
    </div>   
    <script type="text/javascript">
		(function($){
			if($("#chart-1").length > 0){

				/* CHART - 1*/

				var sin1 = [], sin2 = [], cos1 = [], cos2 = [], cmpy = [];

				cmpy = [[0.1,10],[0.2,12],[0.3,10],[0.4,18],[0.5,10],[0.6,10],[0.7,14],[0.8,0.6],[0.9,0.3],[1.0,0.8]];
				cmpn = [[0.1,12],[0.2,16],[0.3,0.6],[0.4,8],[0.5,13],[0.6,11],[0.7,16],[0.8,0.9],[0.9,12],[1.0,8]];
				/*for (var i = 0; i < 14; i += 0.3) {
					sin1.push([i, Math.sin(i)]);
					sin2.push([i, Math.sin(i-1.57)]);
					cos1.push([i, Math.cos(i)]);
					cos2.push([i, Math.cos(i+1.57)]);
				}*/
				

				$.plot($("#padichart1"), [ 
					{ data: sin1, label: "PT Satu DUa Tiga"}, 
					{ data: sin2, label: "CV Lima Eman Utju"}, 
					{ data: cos1, label: "PT edlaPan Selimban"}, 
					{ data: cmpn, label: "PT Selupuh"} ,
					{ data: cmpy, label: "PT Embuh Wis"} 
					], {
						//series: {lines: { show: true }, points: { show: true }},
						//grid: { hoverable: true, clickable: true },
						//yaxis: { min: -1.1, max: 21.1 }
						});

				/* eof CHART - 1*/
			
			}    
            
		}(jQuery))
    </script>
</body>
</html>
