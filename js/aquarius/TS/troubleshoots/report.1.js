(function($){
	$('#btnHome').click(function(){
		window.location.href = thisdomain+'troubleshoots';
	});
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
			smalltext:8,
			normaltext:11,
			normalspacing:15
		},options),ypos=80,xvaluepos = 170;
		console.log("padiNET pdf creator ",troubleshootid);
		$.ajax({
			url:"/troubleshoots/getdata/"+troubleshootid,
			type:"get",
			dataType:"json"
		})
		.done(function(res){
			console.log(res);
			status = res.status;
			description = res.description;
			resume = res.resume;
			console.log("status",status);
			clientname = (res.nameofmtype).split().join("-");
			console.log("nameofmtype",clientname);
			doc.setPage();
			doc.text(settings.initx,40,"Troubleshoot Report");
			doc.setFontSize(settings.normaltext);
			doc.setFontType("bold");
			doc.text(settings.initx,ypos,"Laporan Hasil Troubleshoot Database Teknis");
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontType("normal");
			doc.text(settings.initx,ypos,"Lokasi");
			doc.text(xvaluepos, ypos, ": "+res.address);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Nama Pelanggan");
			doc.text(xvaluepos, ypos, ": "+res.nameofmtype);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Tipe Bisnis");
			doc.text(xvaluepos, ypos, ": "+res.business_field);
			console.log("business_field",res.business_field);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Kontak Teknis");
			doc.text(xvaluepos, ypos, ": "+res.pic);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Alamat");
			doc.text(xvaluepos,ypos,": "+res.address);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Keluhan");
			doc.text(xvaluepos,ypos,": "+res.description);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Tanggal Pelaksanaan");
			doc.text(xvaluepos, ypos, ": "+res.troubleshoot_date);
			ypos = newline(ypos,settings.normalspacing);
			doc.text(settings.initx, ypos, "Pelaksana");
			doc.text(xvaluepos, ypos, ": "+res.surveyors);
			ypos = newline(ypos,settings.normalspacing);
			
			doc.setFontSize(settings.subheader1);
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontType("bold");
			doc.text(settings.initx, ypos, "1. Router");
			doc.setFontType("normal");
			ypos = newline(ypos,settings.normalspacing);
			doc.setFontSize(settings.normaltext);
			console.log("surveyors",res.surveyors);
			$.ajax({
				url:'/troubleshoots/reportrouters',
				data:{troubleshoot_request_id:troubleshootid},
				type:'post',
				dataType:'json'
			})
			.done(function(res){
				doc.setFontSize(8);
				x1 = ypos;
				ypos = makerow(settings.initx,ypos,500,40,[
					{xpos:20,text:"BTS/Site",bold:true},
					{xpos:100,text:"Jarak",bold:true},
					{xpos:160,text:"NLOS/LOS",bold:true},
					{xpos:250,text:"AP",bold:true},
					{xpos:360,text:"Penghalang",bold:true},
					{xpos:420,text:"Keterangan",bold:true}
					])
				$.each(res.data,function(key,val){
					x2 = ypos;
					ypos = makerow(settings.initx,ypos,500,40,[
						{xpos:20,text:val.name},
						{xpos:100,text:val.distance},
						{xpos:160,text:val.los},
						{xpos:250,text:val.ap},
						{xpos:360,text:val.obstacle},
						{xpos:420,text:val.description}
						])
				});
				ypos = newline(ypos,settings.normalspacing);
				ypos = newline(ypos,settings.normalspacing);
				ypos = newline(ypos,settings.normalspacing);
				doc.setFontSize(settings.subheader1);
				doc.setFontType("bold");
				doc.text(settings.initx, ypos, "2. AP Wifi");
				$.ajax({
					url:'/troubleshoots/reportapwifis',
					data:{troubleshoot_request_id:troubleshootid},
					type:'post',
					dataType:'json'
				})
				.done(function(apwifis){
					console.log("Res",apwifis)
					doc.setFontSize(8);
					ypos = newline(ypos,settings.normalspacing);
					x1 = ypos;
					ypos = makerow(settings.initx,ypos,500,40,[
						{xpos:20,text:"Tipe",bold:true},
						{xpos:100,text:"Macboard",bold:true},
						{xpos:160,text:"IP Address",bold:true},
						{xpos:250,text:"No Seri",bold:true},
						{xpos:360,text:"Essid",bold:true},
						{xpos:420,text:"Location",bold:true}
						])
					$.each(res.data,function(key,val){
						x2 = ypos;
						ypos = makerow(settings.initx,ypos,500,40,[
							{xpos:20,text:val.tipe},
							{xpos:100,text:val.macboard},
							{xpos:160,text:val.ipaddress},
							{xpos:250,text:val.serialno},
							{xpos:360,text:val.essid},
							{xpos:420,text:val.location}])
					});

					ypos = newline(ypos,settings.normalspacing);
					ypos = newline(ypos,settings.normalspacing);
					ypos = newline(ypos,settings.normalspacing);
					doc.setFontSize(settings.subheader1);
					doc.setFontType("bold");
					doc.text(settings.initx, ypos, "3. Wireless Boards");
					$.ajax({
						url:'/troubleshoots/reportwirelessboards',
						data:{troubleshoot_request_id:troubleshootid},
						type:'post',
						dataType:'json'
					})
					.done(function(wboards){
						console.log("Wirelessboards",wboards);

						doc.setFontSize(8);
						x1 = ypos;
						ypos = newline(ypos,settings.normalspacing);
						ypos = makerow(settings.initx,ypos,500,40,[
							{xpos:20,text:"BTS/Site",bold:true},
							{xpos:100,text:"Jarak",bold:true},
							{xpos:160,text:"NLOS/LOS",bold:true},
							{xpos:250,text:"AP",bold:true},
							{xpos:360,text:"Penghalang",bold:true},
							{xpos:420,text:"Keterangan",bold:true}
							])
						$.each(res.data,function(key,val){
							x2 = ypos;
							ypos = makerow(settings.initx,ypos,500,40,[
								{xpos:20,text:val.name},
								{xpos:100,text:val.distance},
								{xpos:160,text:val.los},
								{xpos:250,text:val.ap},
								{xpos:360,text:val.obstacle},
								{xpos:420,text:val.description}
								])
						});
						ypos = newline(ypos,settings.normalspacing);
						ypos = newline(ypos,settings.normalspacing);
						ypos = newline(ypos,settings.normalspacing);
						doc.setFontSize(settings.subheader1);
						doc.setFontType("bold");
						doc.text(settings.initx, ypos, "4. Switches");

						$.ajax({
							url:'/troubleshoots/reportswitches',
							data:{troubleshoot_request_id:troubleshootid},
							type:'post',
							dataType:'json'
						})
						.done(function(res){
							console.log("Res",res);
							doc.setFontSize(8);
							x1 = ypos;
							ypos = newline(ypos,settings.normalspacing);
							ypos = makerow(settings.initx,ypos,500,40,[
								{xpos:20,text:"Nama",bold:true},
								{xpos:100,text:"Mac",bold:true},
								{xpos:160,text:"No Seri",bold:true},
								{xpos:250,text:"Barcode",bold:true},
								{xpos:360,text:"Keadaan",bold:true},
								{xpos:420,text:"Keterangan",bold:true}
								]
							)
							$.each(res.data,function(key,val){
								x2 = ypos;
								ypos = makerow(
									settings.initx,ypos,500,40,[
										{xpos:20,text:val.name},
										{xpos:100,text:val.mac},
										{xpos:160,text:val.serialno},
										{xpos:250,text:val.barcode},
										{xpos:360,text:val.status},
										{xpos:420,text:val.description}
										]
									)
							});

							ypos = newline(ypos,settings.normalspacing);
							ypos = newline(ypos,settings.normalspacing);
							ypos = newline(ypos,settings.normalspacing);
							doc.setFontSize(settings.subheader1);
							doc.setFontType("bold");
							doc.text(settings.initx, ypos, "5. Mini PCI");
							$.ajax({
								url:'/troubleshoots/reportpccards',
								data:{troubleshoot_request_id:troubleshootid},
								type:'post',
								dataType:'json'
							})
							.done(function(res){
								console.log("Res",res);
								doc.setFontSize(8);
								x1 = ypos;
								ypos = newline(ypos,settings.normalspacing);
								ypos = makerow(settings.initx,ypos,500,40,[
									{xpos:20,text:"Nama",bold:true},
									{xpos:100,text:"Mac",bold:true},
									{xpos:160,text:"Barcode",bold:true},
									{xpos:250,text:"No Seri",bold:true},
									{xpos:360,text:"Status",bold:true},
									{xpos:420,text:"Keterangan",bold:true}
									]
								)
								$.each(res.data,function(key,val){
									x2 = ypos;
									ypos = makerow(settings.initx,ypos,500,40,[
										{xpos:20,text:val.name},
										{xpos:100,text:val.macaddress},
										{xpos:160,text:val.barcode},
										{xpos:250,text:val.serialno},
										{xpos:360,text:val.status},
										{xpos:420,text:val.description}
									])
								});
								
								ypos = newline(ypos,settings.normalspacing);
								ypos = newline(ypos,settings.normalspacing);
								ypos = newline(ypos,settings.normalspacing);
								doc.setFontSize(settings.subheader1);
								doc.setFontType("bold");
								doc.text(settings.initx, ypos, "6. Perangkat Lain");

								$.ajax({
									url:'/troubleshoots/reportdevices',
									data:{troubleshoot_request_id:troubleshootid},
									type:'post',
									dataType:'json'
								})
								.done(function(res){
									console.log("Res",res);
									doc.setFontSize(8);
									x1 = ypos;
									ypos = newline(ypos,settings.normalspacing);
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
									doc.text(settings.initx, ypos, "7. Aktifitas di Lokasi");
									$.ajax({
										url:'/troubleshoots/getactivities/'+troubleshootid,
										type:'get'
									})
									.done(function(activities){
										console.log("Res",activities);
										activities = activities
										.replace(/<ol><li>/g,"");
										activities = activities
										.replace(/<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">/g,"");
										activities = activities
										.replace(/<\/font>/g,"");
										activities = activities
										.replace(/<span>/g,"");
										activities = activities
										.replace(/<\/span>/g,"");
										activities = activities
										.replace(/<\/li><li>/g,"\n");
										activities = activities
										.replace(/<\/li>/g,"\n");
										activities = activities
										.replace(/<\/ol>/g,"\n");
										doc.setFontSize(settings.smalltext);
										ypos = newline(ypos,settings.normalspacing);

										chunk = activities.split("\n");
										for(x=0;x<chunk.length;x++){
											item = chunk[x];
											itm = "";
											addcrlf = false;
											extension = false;
											for(y=0;y<item.length;y++){
												itm+=item[y];
												if((y>0) && (y%100==0)){
													addcrlf = true;
												}
												if(addcrlf && (item[y]==" ")){
													addcrlf = false;
													ypos = newline(ypos,settings.normalspacing);
													doc.text(settings.initx, ypos, (x+1).toString()+'. '+itm);
													itm="    ";
													extension = true;
												}
											}
											if(!extension){
												numberi = (x+1).toString()+'. ';
											}else{
												numberi = '';
											}
											if(itm.trim()!==''){
												ypos = newline(ypos,settings.normalspacing);
												doc.text(settings.initx, ypos, numberi+itm);
											}
										}
										/*mulai*/
/*										ypos = newline(ypos,settings.normalspacing);
										ypos = newline(ypos,settings.normalspacing);
										ypos = newline(ypos,settings.normalspacing);*/
										doc.setFontSize(settings.subheader1);
										doc.setFontType("bold");
										c = 0;
										doc.addPage();
										doc.text(settings.initx, 50, "8. Gambar Survey");
										doc.setFontType("normal");
										//ypos = newline(ypos,settings.normalspacing);
										doc.setFontSize(settings.normaltext);
										//ypos = newline(ypos,settings.normalspacing);
										$.ajax({
											url:'/troubleshoots/reportimages',
											data:{troubleshoot_request_id:troubleshootid},
											type:'post',
											dataType:'json'
										})
										.done(function(res){
											console.log("images invoked");
											$.each(res.data,function(key,val){
												console.log("Val",val);
												if(c==0){
													doc.setFontSize(settings.smalltext);
													doc.text(settings.initx,70,(c+1).toString()+'. '+val.name);
													doc.addImage(val.img, 'JPEG', 50, 80, 500, 300);
													console.log("image",val.img)
												}else{
													doc.setFontSize(settings.smalltext);
													doc.text(settings.initx,50,(c+1).toString()+'. '+val.name);
													doc.addImage(val.img, 'JPEG', 50, 60, 500, 300);
													console.log("image",val.img)
												}
												doc.setFontType("normal");
												ypos = newline(ypos,settings.normalspacing);
												c++;
												doc.addPage();
											});
											ypos = 50;
											ypos = newline(ypos,settings.normalspacing);
											doc.setFontSize(settings.subheader1);
											doc.setFontType("bold");
											doc.text(settings.initx, ypos, "9. Kesimpulan");
											$.ajax({
												url:'/troubleshoots/getresume/'+troubleshootid,
												type:'get',
											})
											.done(function(res){
												console.log("Resume adalah",res);
												doc.setFontType("normal");
												doc.setFontSize(settings.normaltext);
												ypos = newline(ypos,settings.normalspacing);
												ypos = newline(ypos,settings.normalspacing);
												doc.text(settings.initx, ypos,res);
												console.log("Why");
												console.log("result resume",res);
												doc.setFontSize(settings.subheader1);
												ypos = newline(ypos,settings.normalspacing);
												ypos = newline(ypos,settings.normalspacing);
												doc.setFontType("bold");
												doc.text(settings.initx,ypos,"10. Status");
												doc.setFontType("normal");
												ypos = newline(ypos,settings.normalspacing);
												ypos = newline(ypos,settings.normalspacing);
												doc.text(settings.initx, ypos, status);
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
											})
										})
										.fail(function(err){
											console.log("Err Images",err);
										});
								/*berakhir*/

									})
									.fail(function(err){
										console.log("Err",err);
									})
								})
								.fail(function(err){
									console.log("Err",err);
								});
							})
							.fail(function(err){
								console.log("ErrMiniPCI",err);
							})							
						})
						.fail(function(err){
							console.log("Switch error",err);
						});
					})
					.fail(function(err){
						console.log("Error",err);
					});
				})
				.fail(function(err){
					console.log("Err",err);
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
		console.log("anc");
		makepdf({
			filename:'troubleshoot-report',
		});

	});
}(jQuery));
