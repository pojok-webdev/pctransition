delimiter //
create trigger insertsuspect
after insert
on clients for each row
begin
	insert into suspects (client_id,user_id,branch_id,branches,category_id,tanggal_kontrak,npwp,siup,kode_pelanggan,random_identifier,createdate,name,alias,business_field,billaddress,address,city,phone_area,phone,fax_area,fax,has_internet_connection,media,speed,ratio,duration,usage_period,user_amount,fee,operator,end_of_contract,problems,internet_demand,known_us,known_from,interested,reason2not_interested,service_id,service_interested_to,budget,implementation_target,follow_up,followed_up,prospect,sale_id,status,active,hide,fbcomplete,activedate,period1,period2,dataorigin) values (new.id,new.user_id,new.branch_id,new.branches,new.category_id,new.tanggal_kontrak,new.npwp,new.siup,new.kode_pelanggan,new.random_identifier,new.createdate,new.name,new.alias,new.business_field,new.billaddress,new.address,new.city,new.phone_area,new.phone,new.fax_area,new.fax,new.has_internet_connection,new.media,new.speed,new.ratio,new.duration,new.usage_period,new.user_amount,new.fee,new.operator,new.end_of_contract,new.problems,new.internet_demand,new.known_us,new.known_from,new.interested,new.reason2not_interested,new.service_id,new.service_interested_to,new.budget,new.implementation_target,new.follow_up,new.followed_up,new.prospect,new.sale_id,new.status,new.active,new.hide,new.fbcomplete,new.activedate,new.period1,new.period2,new.dataorigin	);
end; //
delimiter ;
