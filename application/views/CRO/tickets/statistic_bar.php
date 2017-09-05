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
            

            <div class="dr"><span></span></div>
        
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Statistik</h1>
                    </div>
                    <div class="block">
                        <div id="barchart" style="height: 300px; margin-top: 10px;">
                            
                        </div>
                    </div>
                </div>
                
            </div>             

            <div class="dr"><span></span></div>
        
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-right_circle"></div>
                        <h1>Pie charts</h1>
                    </div>
                    <div class="block">
                        <div id="chart-3" style="height: 300px;">
                            
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
				$.plot($("#padichart1"), [ 
					{ data: cmpn, label: "PT Selupuh"} ,
					{ data: cmpy, label: "PT Embuh Wis"} 
					], {
						//series: {lines: { show: true }, points: { show: true }},
						//grid: { hoverable: true, clickable: true },
						//yaxis: { min: -1.1, max: 21.1 }
						});

				/* eof CHART - 1*/
			
			}    
			
			
			if($("#barchart").length > 0){
				var d1 = [];
				d1 = [[1,18],[2,19],[3,20],[4,16],[5,14],[6,12],[7,23],[8,17],[9,21],[10,22]];
				var d2 = [];
				d2 = [[1,15],[2,18],[3,19],[4,16],[5,12],[6,14],[7,17],[8,16],[9,20],[10,12]];
				var d3 = [];
				d3 = [[1,12],[2,15],[3,17],[4,16],[5,18],[6,14],[7,15],[8,13],[9,16],[10,14]];
				var stack = 0, bars = true, lines = false, steps = false;
				$.plot($("#barchart"), [ 
					{ data: d1, label: "PT Maju Terus" }, 
					{ data: d2, label: "PT Semangat Jaya" }, 
					{ data: d3, label: "PT Ayo Kerja" } 
				], {
					series: {
						stack: stack,
						lines: { show: lines, fill: true, steps: steps },
						bars: { show: bars, barWidth: 0.6 }
					}
				});
				
				
			}

    if($("#chart-3").length > 0){
        
        var data = [];
        	        
	for( var i = 0; i < 5; i++)	
		data[i] = { label: "Series"+(i+1), data: Math.floor(Math.random()*100)+1 };
	

        $.plot($("#chart-3"), data, 
	{
            series: {
                pie: { show: true }
            },
            legend: { show: false }
	});

    }			
            
		}(jQuery))
    </script>
</body>
</html>
