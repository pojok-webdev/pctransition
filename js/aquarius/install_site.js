$(document).ready(function(){
	initimageupload();
	initbaupload();
	update_rowcount($("#total_installer"),$("#officer tbody tr"));
	


	/*START ROUTER*/
	$(".btn_addrouter").click(function(){
		$(".updaterouter").hide();
		$(".saverouter").show();
		$("#dAddRouter").modal("show");
	});

	switch($("#pemilik_router").val()){
		case "0"://Pelanggan
			$("#router_pelanggan").show();
			$("#router_padinet").hide();
		break;
		case "1"://Padinet
			$("#router_pelanggan").hide();
			$("#router_padinet").show();
		break;
	}

	$(".edit_router").click(function(){
		id = $(this).attr('id');
		$(".saverouter").hide();
		$(".updaterouter").show();
		$(".updaterouter").attr("id",id);
		$.getJSON(thisdomain+'install_routers/getjsonrouter/'+id,function(data){
			$("#pemilik_router").val(data['milikpadinet']);
			switch($("#pemilik_router").val()){
				case "0"://Pelanggan
					$("#router_pelanggan").show();
					$("#router_padinet").hide();
				break;
				case "1"://Padinet
					$("#router_pelanggan").hide();
					$("#router_padinet").show();
				break;
			}

			$.each($("#tipe_router option"),function(x,y){
				if(data['tipe']==$(this).text()){
					$(this).attr("selected","selected");
				}
			})
			$("#tipe_router_pelanggan").val(data['tipe']);
			$("#macboard_router").val(data['macboard']);
			$("#ip_public_router").val(data['ip_public']);
			$("#ip_private_router").val(data['ip_private']);
			$("#user_router").val(data['user']);
			$("password_router").val(data['password']);
			$("location_router").val(data['location']);
		});
		$("#dAddRouter").modal();
	});
	
	$(".remove_router").click(function(){
		$.post(thisdomain+'adm/routerremove',{id:$(this).attr("router_id")}).done(function(data){
			
		}).fail(function(){
			alert("Gagal bisa menghapus router, hubungi Developer");
		});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_router',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_router").html('Total : '+count);	
		});	
	});
	
	$(".saverouter").click(function(){
		$.post(thisdomain+'adm/routeradd',{install_site_id:$('#workplace').attr('install_site_id'),tipe:($("#pemilik_router").val()=='1')?$('#tipe_router :selected').text():$("#tipe_router_pelanggan").val(),macboard:$("#macboard_router").val(),ip_public:$('#ip_public_router').val(),ip_private:$('#ip_private_router').val(),user:$('#user_router').val(),password:$('#password_router').val(),location:$('#location_router').val(),milikpadinet:$("#pemilik_router").val()}).done(function(data){
			$.post(thisdomain+"adm/get_rowcount",{modelname:'install_router',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
				$("#total_router").html('Total : '+count);	
			});
			
			$("#router").appendrouter(data);
		}).fail(function(){alert('tidak bisa menyimpan router, hubungi Developer');});
		
	});
	
	$(".updaterouter").click(function(){
		$.post(thisdomain+'install_routers/update/',{id:$(this).attr('id'),tipe:$("#tipe_router :selected").text(),macboard:$("#macboard_router").val(),ip_public:$("#ip_public_router").val(),ip_private:$("#ip_private_router").val(),user:$("#user_router").val(),password:$("#password_router").val(),location:$("#location_router").val()}).done(function(data){
		}).fail(function(){
			alert("Tidak dapat mengupdate router, hubungi Developer");
		});
	});
	/*END ROUTER*/

	/*START OF AP WIFI*/
	$(".btn_addapwifi").click(function(){
		$('.updatewifi').hide();
		$("#dAddAPWifi").modal("show");
	});
	
	$(".remove_wifi").click(function(){
		$.post(thisdomain+'adm/wifiremove',{id:$(this).attr("wifi_id")});
	});

	$("#savewifi").click(function(){
		$.post(thisdomain+'adm/wifiadd',{install_site_id:$("#workplace").attr("install_site_id"),tipe:$("#tipe_apwifi :selected").text(),macboard:$("#macboard_apwifi").val(),ip_address:$("#ip_address_apwifi").val(),essid:$("#essid_apwifi").val(),security_key:$("#security_key_apwifi").val(),user:$("#user_apwifi").val(),password:$("#password_apwifi").val(),location:$("#location_apwifi").val(),owner:$("#owner_apwifi").val(),user_name:$("#workplace").attr("user_name")}).done(function(data){
			$("#ap_wifi").appendwifi(data);
			}).fail(function(){
				alert("Tidak dapat menyimpan AP WIFI, hubungi Developer");
				});
	});
	
	$(".update_wifi").click(function(){
		$(".savewifi").hide();
		$(".updatewifi").show();
		$(".updatewifi").attr("id",$(this).attr('id'));
		$.getJSON(thisdomain+'install_ap_wifis/getjsonapwifi/'+$(this).attr('id'),function(data){
			$("#tipe_apwifi").val(data['tipe']);
			$("#macboard_apwifi").val(data['macboard']);
			$("#ip_address_apwifi").val(data['ip_address']);
			$("#essid_apwifi").val(data['essid']);
			$("#security_key_apwifi").val(data['security_key']);
			$("#owner_apwifi").val(data['owner']);
			$("#user_apwifi").val(data['user']);
			$("#password_apwifi").val(data['password']);
			$("#location_apwifi").val(data['location']);
		});
		$("#dAddAPWifi").modal();
	});
	
	$(".updatewifi").click(function(){
		thisid = $(this).attr('id');
		
		$.post(thisdomain+'install_ap_wifis/update',{id:thisid,install_site_id:$("#workplace").attr("install_site_id"),tipe:$("#tipe_apwifi :selected").text(),macboard:$("#macboard_apwifi").val(),ip_address:$("#ip_address_apwifi").val(),essid:$("#essid_apwifi").val(),security_key:$("#security_key_apwifi").val(),user:$("#user_apwifi").val(),password:$("#password_apwifi").val(),location:$("#location_apwifi").val(),owner:$("#owner_apwifi").val(),user_name:$("#workplace").attr("user_name")}).done(function(data){
			
		}).fail(function(){
			alert('Tidak dapat mengupdate AP Wifi, silakan hubungi Developer');
		});
		
	});
	
	/*END OF AP WIFI*/
	
	/*START OF MATERIAL USED*/
	
	$(".btn_addmaterial").click(function(){
		$('.updateusedmaterial').hide();
		$("#dUsedMaterial").modal();
	});
	
	$("#materialtype").change(function(){
		$("#usedmaterial").fill_material($(this).val());
	});
	
	/*END OF MATERIAL USED*/
	/* START OF WIRELESS RADIO*/
	$("#ip_ap_wireless_radio").fill_ap($("#bts_wireless_radio :selected").val(),null);
	
	$(".btn_addwirelessradio").click(function(){
		$(".savewr").show();
		$(".updatewr").hide();
		$("#dAddWirelessRadio").modal("show");
	});
	
	$("#bts_wireless_radio").change(function(){
		$("#ip_ap_wireless_radio").fill_ap($(this).val(),null);
		//alert($(this).find("option:selected").val());
	});

	$(".edit_wireless_radio").click(function(){
		id = ($(this).attr('id'));
		$(".savewr").hide();
		$(".updatewr").show();
		$(".updatewr").attr("id",id);
		$.getJSON(thisdomain+'install_wireless_radios/getjsonwirelessradio/'+$(this).attr('id'),function(data){
			$("#tipe_wireless_radio").val(data['tipe']);
			$("#macboard_wireless_radio").val(data['macboard']);
			$("#ip_radio_wireless_radio").val(data['ip_radio']);
			$("#essid_wireless_radio").val(data['essid']);
			$("#freqwency_wireless_radio").val(data['freqwency']);
			$("#polarization_wireless_radio").val(data['polarization']);
			$("#user_wireless_radio").val(data['user']);
			$("#password_wireless_radio").val(data['password']);
			$("#signal_wireless_radio").val(data['signal']);
			$("#quality_wireless_radio").val(data['quality']);
			$("#throughput_udp_wireless_radio").val(data['throughput_udp']);
			$("#throughput_tcp_wireless_radio").val(data['throughput_tcp']);
		});
		$("#dAddWirelessRadio").modal();
	});

	$(".remove_wireless_radio").click(function(){
		$.post(thisdomain+'adm/wirelessradioremove',{id:$(this).attr("wireless_radio_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_wireless_radio',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_wireless_radio").html('Total : '+count);	
		});	
		
	});

	$("#savewirelessradio").click(function(){
		$.post(thisdomain+'adm/wirelessradioadd',{install_site_id:$("#workplace").attr("install_site_id"),tipe:$("#tipe_wireless_radio :selected").text(),macboard:$("#macboard_wireless_radio").val(),ip_radio:$("#ip_radio_wireless_radio").val(),ap_id:$("#ap_id_wireless_radio").val(),ip_ap:$("#ip_ap_wireless_radio").val(),polarization:$("#polarization_wireless_radio").val(),signal:$("#signal_wireless_radio").val(),quality:$("#quality_wireless_radio").val(),freqwency:$("#freqwency_wireless_radio").val(),throughput_udp:$("#troughput_udp_wireless_radio").val(),throughput_tcp:$("#troughput_tcp_wireless_radio").val(),essid:$("#essid_wireless_radio").val(),user:$("#user_wireless_radio").val(),password:$("#password_wireless_radio").val(),ip_ethernet:$("#ip_ethernet_wireless_radio").val()}).done(function(data){
			$("#wirelessradio").appendwirelessradio(data);
		}).fail(function(){
			alert("tidak bisa menambah wireless radio, hubungi Developer");
		});
	});
	
	$(".updatewr").click(function(){
		$.post(thisdomain+'install_wireless_radios/edit',{id:$(this).attr('id'),install_site_id:$("#workplace").attr("install_site_id"),tipe:$("#tipe_wireless_radio").val(),macboard:$("#macboard_wireless_radio").val(),ip_radio:$("#ip_radio_wireless_radio").val(),ap_id:$("#ap_id_wireless_radio").val(),ip_ap:$("#ip_ap_wireless_radio").val(),polarization:$("#polarization_wireless_radio").val(),signal:$("#signal_wireless_radio").val(),quality:$("#quality_wireless_radio").val(),freqwency:$("#freqwency_wireless_radio").val(),throughput_udp:$("#troughput_udp_wireless_radio").val(),throughput_tcp:$("#troughput_tcp_wireless_radio").val(),essid:$("#essid_wireless_radio").val(),user:$("#user_wireless_radio").val(),password:$("#password_wireless_radio").val(),ip_ethernet:$("#ip_ethernet_wireless_radio").val()}).done(function(data){
			
		}).fail(function(){
			alert("Tidak dapat mengupdate Wireless Radio, silakan hubungi Developer");
		});
	});
	/* END OF WIRELESS RADIO */

	/* START OF BERITA ACARA */
	$(".btn_addba").click(function(){
		$("#dAddBeritaAcara").modal("show");
	});
	
	
	$(".remove_ba").click(function(){
		$.post(thisdomain+'adm/baremove',{id:$(this).attr("ba_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ba',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_ba").html('Total : '+count);	
		});	
		
	});

	$("#saveba").click(function(){
		$.post(thisdomain+'adm/baadd',{install_site_id:$("#workplace").attr("install_site_id"),createuser:$("#workplace").attr("user_name"),name:$("#nameba").val(),path:$("#pathba").val(),description:$("#descriptionba").val()}).done(function(data){
			$("#ba").appendba(data)
		}).fail(function(){
			alert("tidak dapat menambah Berita Acara, hubungi Developer");
		});
	});
	

	/* END OF BERITA ACARA */

	/* START OF IMAGE */
	$(".btn_addinstallimage").click(function(){
		$("#dAddInstallImage").modal("show");
	});
	
	$(".removeinstallimage").click(function(){
		$.post(thisdomain+'adm/installimageremove',{id:$(this).parent().parent().parent().attr("image_id")});
		$(this).parent().parent().parent().fadeOut();
	});
	
	$("#saveimage").click(function(){
		$.post(thisdomain+'adm/installimageadd',{install_site_id:$("#workplace").attr("install_site_id"),user_name:$("#workplace").attr("user_name"),name:$("#name_image").val(),path:$("#path_image").val(),description:$("#description_image").val()}).done(function(data){
			$("#install_image").appendimage(data);
		});
	});
	

	/* END OF IMAGE */
	
	/* START OF OFFICER */
		
	$(".userpic").click(function(){
		oname = $(this).attr("officer_name");
		$.post(thisdomain+'install_sites/add_officer/',{officer_name:oname,site_id:urlsegment(5)}).done(function(data){
			$("#officer").append('<tr><td><a class="fancybox" rel="group" href="'+thisdomain+'media/users/'+oname+'.jpg"><img src="'+thisdomain+'media/users/'+oname+'.jpg" class="img-polaroid" width=20 height=20 /></a></td><td class="info"><a>'+oname+'</a></td><td><a><span class="icon-trash pointer row_remove remove_installer" officer="'+oname+'" ></span></a></td></tr>');
			update_rowcount($("#total_installer"),$("#officer tbody tr"));
			$(".remove_installer").bind("click",function(){
				$.post(thisdomain+'install_sites/delete_officer',{officer_name:$(this).attr("officer"),site_id:urlsegment(5)}).done(function(data){
				}).fail(function(){
					alert("Tidak dapat menghapus petugas, silakan hubungi Developer");
				});
				$(this).parent().parent().parent().fadeOut(200);
				update_rowcount($("#total_installer"),$("#officer tbody tr"));
			});
			$("#dAddOfficer").modal("hide");
		}).fail(function(){
			alert("Tidak dapat menyimpan petugas, silakan hubungi Developer");
		});
		
	});
	
	$(".remove_installer").click(function(){
		$.post(thisdomain+'install_sites/delete_officer',{officer_name:$(this).attr("installer_name"),site_id:urlsegment(5)}).done(function(data){
			update_rowcount($("#total_installer"),$("#officer tbody tr"));
		}).fail(function(){
			alert("Tidak dapat menghapus petugas, silakan hubungi Developer");
		});
	});

	/* END OF OFFICER */
	
	
	/* Start of PCCard*/
	$(".btn_addpccard").click(function(){
		$('.updatepccard').hide();
		$("#dPCCard").modal();
	});

	$(".remove_pccard").click(function(){
		$.post(thisdomain+"install_sites/delete_pccard",{id:$(this).attr("pccard_id")}).done(function(data){
			$("#total_pccard").html($("#tblpccards").rowcount());
		}).fail(function(){
			alert("Tidak dapat menghapus PC Card, silakan hubungi Developer");
		});
	});
	
	$("#savepccard").click(function(){
		$.post(thisdomain+'install_sites/add_pccard',{install_site_id:urlsegment(5),name:$("#pccards :selected").text(),macaddress:$("#pccard_macaddress").val()}).fail(function(){
			alert("Tidak dapat menyimpan PC Card, silakan hubungi Developer");
		}).done(function(data){
			
			$('#tblpccards').append('<tr><td>'+$('#pccards :selected').text()+'</td><td class="info"><a>Macboard: '+$('#pccard_macaddress').val()+'</a> <span></td><td><a><span class="icon-trash pointer row_remove remove_pccard" pccard_id='+data+' ></span></a><a><span class="icon-edit pointer edit_pccard" id='+data+' ></span></a></td></tr>');
			
			$("#total_pccard").html($("#tblpccards").rowcount());
			
			$(".remove_pccard").bind("click",function(){
				thisrow = $(this).parent().parent().parent();
				$.post(thisdomain+"install_sites/delete_pccard",{id:$(this).attr("pccard_id")}).done(function(data){
					thisrow.fadeOut(200);
					$("#total_pccard").html($("#tblpccards").rowcount());
				}).fail(function(){
					alert("Tidak dapat menghapus PC Card, silakan hubungi Developer");
				});
			});
			
		});
		$("#dPCCard").modal("hide");
	});
	/* End of PCCard*/
	
	/* begin of Antenna*/
	$(".btn_addantenna").click(function(){
		$('.updateantenna').hide();
		$("#dAntenna").modal();
	});

	$(".remove_antenna").click(function(){
		$.post(thisdomain+"install_sites/delete_antenna",{id:$(this).attr("antenna_id")}).done(function(data){
			$("#total_antenna").html($("#tblantennas").rowcount());
		}).fail(function(){
			alert("Tidak dapat menghapus Antenna, silakan hubungi Developer");
		});
	});
	
	$("#saveantenna").click(function(){
		$.post(thisdomain+'install_sites/add_antenna',{install_site_id:urlsegment(5),name:$("#tipe_antenna :selected").text(),location:$("#antenna_location").val()}).fail(function(){
			alert("Tidak dapat menyimpan Antenna, silakan hubungi Developer");
		}).done(function(data){
			
			$('#tblantennas').append('<tr><td>'+$('#tipe_antenna :selected').text()+'</td><td class="info"><a>Lokasi: '+$('#antenna_location').val()+'</a> <span></td><td><a><span class="icon-trash pointer row_remove remove_antenna" antenna_id='+data+' ></span></a><a><span class="icon-edit pointer edit_antenna" id='+data+' ></span></a></td></tr>');
			
			$("#total_antenna").html($("#tblantennas").rowcount());
			
			$(".remove_antenna").bind("click",function(){
				thisrow = $(this).parent().parent().parent();
				$.post(thisdomain+"install_sites/delete_antenna",{id:$(this).attr("antenna_id")}).done(function(data){
					thisrow.fadeOut(200);
					$("#total_antenna").html($("#tblantennas").rowcount());
				}).fail(function(){
					alert("Tidak dapat menghapus Antenna, silakan hubungi Developer");
				});
			});
			
		});
		$("#dAntenna").modal("hide");
	});	
	/* end of Antenna*/
	$(".installsite_save").click(function(){
		$.post(thisdomain+'adm/install_updatesite',{id:$("#workplace").attr("install_site_id"),address:$('#address').val(),city:$('#city').val(),pic:$('#pic').val(),pic_position:$('#pic_position').val(),phone_area:$('#phone_area').val(),phone:$('#phone').val(),pic_email:$('#pic_email').val(),description:$('#description').val(),user_name:$("#workplace").attr("user_name")}).done(function(data){}).fail(function(){alert("Tidak dapat mengupdate site instalasi, hubungi Developer");});
		$("#dModal").modal("show");
		setTimeout(function(){
			$("#dModal").modal("hide");
			},1000);
	});
	
	
	$(".closemodal").click(function(){
		$(this).parent().parent().parent().parent().parent().parent().modal("hide");
	});
	
	$(".closemodalparent2").click(function(){
		$(this).parent().parent().parent().modal("hide");
	});
	
	$(".row_remove").click(function(){
		$(this).parent().parent().parent().fadeOut(200);
	});

	$(".btn_addofficer").click(function(){
		$('.updateoficer').hide();
		$("#dAddOfficer").modal();
	});
	
	$("#pemilik_router").change(function(){
		switch($(this).val()){
			case "0"://Pelanggan
				$("#router_pelanggan").show();
				$("#router_padinet").hide();
			break;
			case "1"://Padinet
				$("#router_pelanggan").hide();
				$("#router_padinet").show();
			break;
		}
	});
});

$.fn.appendwirelessradio = function(data){
	$(this).append('<tr><td>'+$("#tipe_wireless_radio").val()+'</td><td class="info"><a>Macboard: '+$("#macboard_wireless_radio").val()+'</a> <span>IP Radio : '+$("#ip_radio_wireless_radio").val()+'</span> <span>'+$("#freqwency_wireless_radio").val()+'</span></td><td>'+$("#essid_wireless_radio").val()+'</td><td><a><span class="icon-trash pointer remove_wireless_radio" wireless_radio_id='+data+' ></span></a><a><span class="icon-edit pointer update_wireless_radio" id='+data+' ></span></a></td></tr>');
	
	$.post(thisdomain+"adm/get_rowcount",{modelname:'install_wireless_radio',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
		$("#total_wireless_radio").html('Total : '+count);	
	});	

	$(".remove_wireless_radio").bind("click",function(){
		$.post(thisdomain+'adm/wirelessradioremove',{id:$(this).attr("wireless_radio_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_wireless_radio',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_wireless_radio").html('Total : '+count);	
		});
		$(this).parent().parent().parent().fadeOut(200);
	});
}

$.fn.appendba = function(data){
	$(this).append('<tr><td><a class="fancybox" rel="group" href="'+baseurl+'media/installs/'+$("#pathba").val()+'"><img src="'+baseurl+'media/installs/'+$("#pathba").val()+'" class="img-polaroid" width=50 height=38 /></a></td><td>'+$("#nameba").val()+'</td><td class="info"><a>'+$("#pathba").val()+'</a> <span></span> <span></span></td><td>'+$("#descriptionba").val()+'</td><td><a><span class="icon-trash row_remove remove_ba" ba_id='+data+'></span></a></td></tr>');
	
	$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ba',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
		$("#total_ba").html('Total : '+count);	
	});	
	$(".remove_ba").bind("click",function(){
		$.post(thisdomain+'adm/baremove',{id:$(this).attr("ba_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ba',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_ba").html('Total : '+count);	
		});
		$(this).parent().parent().parent().fadeOut(200);
		});
}

$.fn.appendrouter = function(data){
	tipe = ($("#pemilik_router").val()=='1')?$('#tipe_router :selected').text():$("#tipe_router_pelanggan").val();
	$(this).append('<tr><td>'+tipe+'</td><td class="info"><a>'+$("#macboard_router").val()+'</a> <span>'+$("#ip_public_router").val()+'</span> <span>'+$("#ip_private_router").val()+'</span></td><td>'+$("#location_router").val()+'</td><td><a><span class="icon-trash row_remove remove_router" router_id='+data+'></span></a></td></tr>');
	
	$(".remove_router").bind("click",function(){
		$.post(thisdomain+'adm/routerremove',{id:$(this).attr("router_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_router',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_router").html('Total : '+count);	
		});
		$(this).parent().parent().parent().fadeOut(200);
	});
}

$.fn.appendwifi = function(data){
	$(this).append('<tr><td>'+$("#tipe_apwifi :selected").text()+'</td><td class="info"><a>'+$("#macboard_apwifi").val()+'</a> <span>'+$("#ip_address_apwifi").val()+'</span> <span>'+$("#essid_apwifi").val()+'</span></td><td>'+$("#location_apwifi").val()+'</td><td><a><span class="icon-trash row_remove remove_wifi" wifi_id="+data+" ></span></a><a><span class="icon-edit update_wifi" wifi_id="+data+" ></span></a></td></tr>');
	$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ap_wifi',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
		$("#total_wifi").html('Total : '+count);
	});	
	$(".remove_wifi").bind("click",function(){
		$.post(thisdomain+'adm/wifiremove',{id:$(this).attr("wifi_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ap_wifi',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_wifi").html('Total : '+count);	
		});
		$(this).parent().parent().parent().fadeOut(200);
		});
	$(".update_wifi").bind("click",function(){
		$(".updatewifi").show();
		$(".savewifi").hide();
		$("#dAddAPWifi").modal();
	});
}

$.fn.appendimage = function(data){
	$(this).append('<tr image_id='+data+' image_path='+$('#path_image').val()+'><td><a class="fancybox" rel="group" href="'+baseurl+'media/installs/'+$('#path_image').val()+'"><img src="'+thisdomain+'media/installs/'+$('#path_image').val()+'" class="img-polaroid" width=50 height=38 /></a></td><td class="info"><a>'+$('#name_image').val()+'</a> <span>'+$('#path_image').val()+'</span> <span>'+$('#path_description').val()+'</span></td><td>'+$('#description_image').val()+'</td><td><a><span class="icon-trash removeinstallimage" ></span></a></td></tr>');
	$.post(thisdomain+"adm/get_rowcount",{modelname:'install_image',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
		$("#total_wifi").html('Total : '+count);	
	});	

	$(".removeinstallimage").bind('click',function(){
		$.post(thisdomain+'adm/installimageremove',{id:data});
		$(this).parent().parent().parent().fadeOut();
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_image',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_wifi").html('Total : '+count);	
		});	

	});
}

	$.fn.fill_ap = function(btsid,selected){
		$(this).html("");
		thisap = $(this);
		thisap.append('<option value="Belum ada AP" selected=selected>Belum ada AP</option>');
		$.getJSON('/paps/get_name_by_bts/'+btsid,function(data){
			$.each(data,function(x,y){
				if(selected==y){
					thisap.append('<option value='+y+' selected=selected>'+y+'</option>');
				}else{
					thisap.append('<option value='+y+'>'+y+'</option>');
				}
			});
		});
	}

	$.fn.fill_material = function(materialtype,selected){
		$(this).html("");
		thisap = $(this);
		$.getJSON(thisdomain+'materials/get_name_by_parent/'+materialtype,function(data){
			$.each(data,function(x,y){
				if(selected==y){
					thisap.append('<option value='+y+' selected=selected>'+y+'</option>');
				}else{
					thisap.append('<option value='+y+'>'+y+'</option>');
				}
			});
		});
	}

initimageupload = function(){
	var btnUpload=$('#uploadinstallimage');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: thisdomain+'adm/upload_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
			// extension is not allowed 
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				$('#path_image').val(file);
			}
		}

	});



}


initbaupload = function(){
	var btnUpload=$('#uploadinstallba');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: thisdomain+'adm/upload_tmp',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
			// extension is not allowed 
			status.text('Only JPG, PNG or GIF files are allowed');
			return false;
		}
		status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			//Add uploaded file to list
			if(response==="success"){
				$('#pathba').val(file);
			}
		}

	});



}


