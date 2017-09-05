(function($){
	var doc = new jsPDF('p', 'pt', 'letter');
	newline = function(l,space){
		if((l+space)>600){
			doc.addPage();
			return 80;
		}
		return l+space;
	}
	makerow = function(startx,starty,_width,_length,contents=[]){
		startyplus = starty+13;
		doc.rect(startx,starty,_width,_length);
		$.each(contents,function(key,val){
			if(val.bold){
				doc.setFontType("bold");
				doc.text(startx+val.xpos,startyplus,val.text);
				doc.setFontType("normal");
			}else{
				doc.text(startx+val.xpos,startyplus,val.text);
			}
		});
		return starty+20;
	}
	makepdf = function(options){
		var settings = $.extend({
			source:"x",
			filename:"padiNET2",
			initx:40,
			header:16,
			subheader1:13,
			normaltext:11,
			normalspacing:15
		},options),ypos=80,xvaluepos = 170;
		console.log("padiNET pdf creator",surveysiteid);
		$.ajax({
			url:"/surveys/reportdata",
            data:{survey_site_id:surveysiteid},
			type:"post",
			dataType:"json"
		})
		.done(function(res){
			status = res.status;
			clientname = (res.name).split().join("-");
			doc.setPage();
			doc.text(settings.initx,40,"Survey Report");
			doc.setFontSize(settings.normaltext);
			doc.setFontType("bold");
			doc.text(settings.initx,ypos,"Laporan Hasil Survey Database Teknis");
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontType("normal");
			doc.text(settings.initx,ypos,"Lokasi");
			doc.text(xvaluepos, ypos, ": "+res.city);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx,ypos,"Jenis");
			doc.text(xvaluepos, ypos, ": Survey");
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx,ypos,"Kebutuhan");
			ypos = newline(ypos,settings.normalspacing);
			doc.line(settings.initx, ypos, 600, ypos);
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontSize(settings.subheader1);
			doc.setFontType("bold");
			doc.text(settings.initx, ypos, "1. Data Calon Pelanggan");
			doc.setFontType("normal");
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontSize(settings.normaltext);
			doc.text(settings.initx, ypos, "Nama Calon Customer");
			doc.text(xvaluepos, ypos, ": "+res.name);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Tipe Bisnis");
			doc.text(xvaluepos, ypos, ": "+res.business_field);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Kontak Teknis");
			doc.text(xvaluepos, ypos, ": "+res.pic);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Alamat");
			doc.text(xvaluepos,ypos,": "+res.address);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Tanggal Pelaksanaan");
			doc.text(xvaluepos, ypos, ": "+res.execution_date);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Pelaksana");
			doc.text(xvaluepos, ypos, ": "+res.surveyors);
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontSize(settings.subheader1);
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontType("bold");
			doc.text(settings.initx, ypos, "2. Data Teknis");
			doc.setFontType("normal");
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontSize(settings.normaltext);
			doc.text(settings.initx, ypos, "Location S ");
			doc.text(xvaluepos, ypos, ": "+res.location_s_d+" "+res.location_s_m+" "+res.location_s_s);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Location E ");
			doc.text(xvaluepos, ypos, ": "+res.location_e_d+" "+res.location_e_m+" "+res.location_e_s);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Elevation");
			doc.text(xvaluepos, ypos, ": "+res.amsl+" (AMSL) "+res.agl+" (AGL)");
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontSize(settings.subheader1);
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontType("bold");
			doc.text(settings.initx, ypos, "3. Data Jarak");
			doc.setFontType("normal");
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontSize(settings.normaltext);
			$.ajax({
				url:'/surveys/reportbtses',
				data:{survey_site_id:surveysiteid},
				type:'post',
				dataType:'json'
			})
			.done(function(res){
				doc.setFontSize(8);
				x1 = ypos;
				ypos = makerow(settings.initx,ypos,500,40,[{xpos:20,text:"BTS/Site",bold:true},{xpos:100,text:"Jarak",bold:true},{xpos:160,text:"NLOS/LOS",bold:true},{xpos:250,text:"AP",bold:true},{xpos:360,text:"Penghalang",bold:true},{xpos:420,text:"Keterangan",bold:true}])
				$.each(res.data,function(key,val){
					x2 = ypos;
					ypos = makerow(settings.initx,ypos,500,40,[{xpos:20,text:val.name},{xpos:100,text:val.distance},{xpos:160,text:val.los},{xpos:250,text:val.ap},{xpos:360,text:val.obstacle},{xpos:420,text:val.description}])
				});
				ypos = newline(ypos,settings.normalspacing);
				ypos = newline(ypos,settings.normalspacing);
				ypos = newline(ypos,settings.normalspacing);
				doc.setFontSize(settings.subheader1);
				doc.setFontType("bold");
				doc.text(settings.initx, ypos, "4. Gambar Survey");
				doc.setFontType("normal");
				ypos = newline(ypos,settings.normalspacing);
				doc.setFontSize(settings.normaltext);
				ypos = newline(ypos,settings.normalspacing);
				$.ajax({
					url:'/surveys/reportimages',
					data:{survey_site_id:surveysiteid},
					type:'post',
					dataType:'json'
				})
				.done(function(res){
					console.log("images invoked");
					$.each(res.data,function(key,val){
						doc.addImage(val.img, 'JPEG', 15, ypos, 400, 300);
						doc.setFontSize(settings.subheader1);
						ypos = newline(ypos,315);
						doc.setFontSize(settings.normaltext);
					});
					ypos = newline(ypos,settings.normalspacing);
					doc.setFontSize(settings.subheader1);
					doc.setFontType("bold");
					doc.text(settings.initx, ypos, "5. Kebutuhan Instalasi");
					doc.setFontType("normal");
					doc.setFontSize(settings.normaltext);
					ypos = newline(ypos,settings.normalspacing);
					$.ajax({
						url:'/surveys/reportmaterials',
						data:{survey_site_id:surveysiteid},
						type:'post',
						dataType:'json'
					})
					.done(function(res){
						console.log("Result Materials",res);	
						c=1;
						ypos = makerow(settings.initx,ypos,500,40,[{xpos:20,text:"No.",bold:true,center:true},{xpos:100,text:"Nama",bold:true,center:true},{xpos:160,text:"Keterangan",bold:true,center:true}])
						console.log("Start material loop");
						$.each(res.data,function(key,val){
							ypos = makerow(settings.initx,ypos,500,40,[{xpos:20,text:c.toString()},{xpos:100,text:val.name},{xpos:160,text:val.material_type}])
							c+=1;
						});
						ypos = newline(ypos,settings.normalspacing);
						console.log("start resume ajax");
						$.ajax({
							url:'/surveys/reportresumes',
							data:{survey_site_id:surveysiteid},
							type:'post',
							dataType:'json'
						})
						.done(function(res){
							console.log("result resume",res);
							doc.setFontSize(settings.subheader1);
							ypos = newline(ypos,30);
							doc.setFontType("bold");
							doc.text(settings.initx, ypos, "6. Kesimpulan");
							doc.setFontType("normal");
							ypos = newline(ypos,settings.normalspacing);
							doc.setFontSize(settings.normaltext);						
							c = 1;
							$.each(res.data,function(key,val){
								console.log("resume detail : ",val.name);
								doc.text(settings.initx, ypos, c.toString()+" "+val.name);
								c += 1;
								ypos = newline(ypos,settings.normalspacing);
							});
							doc.setFontSize(settings.subheader1);
							ypos = newline(ypos,settings.normalspacing);
							doc.setFontType("bold");
							doc.text(settings.initx,ypos,"7. Status");
							doc.setFontType("normal");
							ypos = newline(ypos,settings.normalspacing);
							doc.text(settings.initx, ypos, "status : "+status);
							outp = 'pdf';
							switch (outp){
								case 'datauri':
									doc.output('datauri');
								break;
								case 'pdf':
									doc.save(settings.filename+clientname+'.pdf');
								break;
								case 'none':
								
								break;
							}		
						})
						.fail(function(err){
							console.log("Err",err);
						});
					})
					.fail(function(err){
						console.log("Error materials",err);
					});
				})
				.fail(function(err){
					console.log("Err Images",err);
				});
			})
			.fail(function(err){
				console.log("Error bts",err);
			});
		})
		.fail(function(err){
			console.log("Error Data",err);
		});
	}
	$('#downloadPDF2').click(function(){
		makepdf({
			filename:'survey-report',
		});
	});
}(jQuery));
