<?php
	function getclients(){
		$ci = & get_instance();
   		$ci->load->helper("user");
        $id = $ci->session->userdata("user_id");
        $arr = getuserssupervised($id);
        array_push($arr,$id);
		$ids = "(".implode($arr,",").")";

		$sql = "select a.id,a.name,concat(a.npwp,'/',a.siup)npwp,a.business_field,a.fbcomplete,";
		$sql.= "d.username sales,a.address,b.name service,count(c.client_id)fbcount from clients a ";
		$sql.= "left outer join services b on b.id=a.service_id ";
		$sql.= "left outer join fbs c on c.client_id=a.id ";
		$sql.= "left outer join users d on d.id=a.sale_id ";
		$sql.= "where a.active='1' ";
		$sql.= "and d.id in " . $ids . " ";
		$sql.= "group by a.id,a.name,a.fbcomplete,a.address,b.name ";
		$que = $ci->db->query($sql);
		$obj = $que->result();
		return $obj;
	}
	function getpics($clientid){
		$obj = new Client();
		$obj->where('id',$clientid)->get();
		return $obj;
	}
	function getfbs($clientid){
		$ci = & get_instance();
		$sql = "select a.name,";
		$sql.= "case when nofb is null then ";
		$sql.= " case branch_id ";
		$sql.= " when '1' then concat('SBY',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) ";
		$sql.= " when '2' then concat('JKT',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) ";
		$sql.= " when 3 then concat('MLG',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) ";
		$sql.= " when '4' then concat('BLI',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) end ";
		$sql.= " else nofb ";
		$sql.= " end ccc ,";
		$sql.= "";
		$sql.= "b.businesstype,";
		$sql.= "c.username,";
		$sql.= "b.nofb,";
		$sql.= "b.businesstype,";
		$sql.= "b.siup,";
		$sql.= "b.npwp,";
		$sql.= "b.address,";
		$sql.= "b.city,";
		$sql.= "b.telp,";
		$sql.= "b.fax,";
		$sql.= "b.activationdate,";
		$sql.= "b.period1,";
		$sql.= "b.period2,";
		$sql.= "b.services,";
		$sql.= "case b.status ";
		$sql.= " when '0' then 'ignore' ";
		$sql.= " when '1' then 'valid' ";
		$sql.= " when '2' then 'canceled' ";
		$sql.= " when '3' then 'expired' end fbstatus,";
		$sql.= "b.completed ";
		$sql.= "from clients a ";
		$sql.= "right outer join fbs b on b.client_id=a.id ";
		$sql.= "left outer join users c on c.id=a.sale_id where b.client_id=".$clientid;
		$query = $ci->db->query($sql);
		$res = $query->result();
		return $res;
	}
	function getnamebyclientid($clientid){
		$sql = "select b.name,b.address,b.city,concat(phone_area,'-',phone)phone,concat(fax_area,'-',fax)fax,siup,npwp from clients b ";
		$sql.= "where b.id=".$clientid;
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		$res = $que->result();
		if(count($res)>0){
			return $res[0];
		}else{
			return false;
		}
	}
	function generatefb($clientid){
		$sql = "select client_id from fbs where client_id=".$clientid;
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		$numrows = $que->num_rows();
		$sql = "select case branch_id ";
		$sql.= " when '1' then concat('SBY',date_format(now(),'%Y%m%d'),lpad(a.id,6,'0'),lpad(".$numrows.",3,'0')) ";
		$sql.= " when '2' then concat('JKT',date_format(now(),'%Y%m%d'),lpad(a.id,6,'0'),lpad(".$numrows.",3,'0')) ";
		$sql.= " when '4' then concat('BLI',date_format(now(),'%Y%m%d'),lpad(a.id,6,'0'),lpad(".$numrows.",3,'0')) ";
		$sql.= "end genfb ";
		$sql.= "from clients a where id=".$clientid;
		$que = $ci->db->query($sql);
		$res = $que->result();
		return $res[0]->genfb;
	}
	function getfb($clientsiteid){
		$ci = & get_instance();
		$sql = "select a.name,";
		$sql.= "case when nofb is null then ";
		$sql.= " case branch_id ";
		$sql.= " when '1' then concat('SBY',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) ";
		$sql.= " when '2' then concat('JKT',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) ";
		$sql.= " when 3 then concat('MLG',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) ";
		$sql.= " when '4' then concat('BLI',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) end ";
		$sql.= " else nofb ";
		$sql.= " end ccc ,";
		$sql.= "";
		$sql.= "b.businesstype,";
		$sql.= "c.username,";
		$sql.= "b.nofb,";
		$sql.= "b.businesstype,";
		$sql.= "b.siup,";
		$sql.= "b.npwp,";
		$sql.= "b.address,";
		$sql.= "b.city,";
		$sql.= "b.telp,";
		$sql.= "b.fax,";
		$sql.= "b.activationdate,";
		$sql.= "b.period1,";
		$sql.= "b.period2,";
		$sql.= "b.services,";
		$sql.= "b.completed ";
		$sql.= "from clients a ";
		$sql.= "left outer join fbs b on b.client_id=a.id ";
		$sql.= "left outer join users c on c.id=a.sale_id where a.id='".$clientsiteid."' ";
		$query = $ci->db->query($sql);
		$res = $query->result();
		if(count($res)>0){
			return $res[0];
		}
		return false;
	}
	function getfbfb($clientsiteid){
		$ci = & get_instance();
		$sql = "select a.name,";
		$sql.= "case when nofb is null then ";
		$sql.= " case branch_id ";
		$sql.= " when '1' then concat('SBY',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) ";
		$sql.= " when '2' then concat('JKT',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) ";
		$sql.= " when 3 then concat('MLG',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) ";
		$sql.= " when '4' then concat('BLI',date_format(now(),'%Y%m%d'),lpad(a.id,4,'0')) end ";
		$sql.= " else nofb ";
		$sql.= " end ccc ,";
		$sql.= "";
		$sql.= "b.businesstype,";
		$sql.= "c.username,";
		$sql.= "b.nofb,";
		$sql.= "b.businesstype,";
		$sql.= "b.siup,";
		$sql.= "b.npwp,";
		$sql.= "b.address,";
		$sql.= "b.city,";
		$sql.= "b.telp,";
		$sql.= "b.fax,";
		$sql.= "b.activationdate,";
		$sql.= "b.period1,";
		$sql.= "b.period2,";
		$sql.= "b.services,";
		$sql.= "b.completed ";
		$sql.= "from clients a ";
		$sql.= "left outer join fbs b on b.client_id=a.id ";
		$sql.= "left outer join users c on c.id=a.sale_id where nofb='".$clientsiteid."' ";
		$query = $ci->db->query($sql);
		$res = $query->result();
		if(count($res)>0){
			return $res[0];
		}
		return false;
	}
	function getfbpic($nofb){
		$ci = & get_instance();
		$sql = "select client_id,fb_id,name,nofb,role,position,idnum,concat(hp,' ',phone)telp_hp,phone,hp,email ";
		$sql.= "from fbpics ";
		$sql.= "where nofb='".$nofb."' ";
		$query = $ci->db->query($sql);
		return $query->result();
	}
	function getclientinfo($nofb){
		/*$obj = new Client();
		$obj->where('id',$clientsiteid)->get();
		return $obj;*/
		$ci = & get_instance();
		$sql = "select a.name fbname,nofb,a.businesstype,a.siup,a.npwp,a.address,a.city,a.telp,a.telp phone,a.fax,b.name from fbs a ";
		$sql.= "left outer join clients b on b.id=a.client_id ";
		$sql_ = "where b.id = '" . $nofb . "'";;
		$sql.= "where a.nofb = '" . $nofb . "'";
		$que = $ci->db->query($sql);
		if($que->num_rows()>0){
			return $que->result()[0];
		}else{
			return 'empty';
		}
	}
	function getfbfees($clientsiteid,$name=null){
		$ci = & get_instance();
		$sql = "select name,dpp,ppn,(dpp*1.1) total from fbfees where client_id='".$clientsiteid."' ";
		if(!is_null($name)){
			$sql.= "and name='".$name."'";
		}
		$que = $ci->db->query($sql);
		if($que->num_rows()>0){
			$obj = $que->result()[0];
			return array("name"=>$obj->name,"dpp"=>$obj->dpp,"ppn"=>$obj->ppn,"total"=>$obj->total);
		}
		return array("name"=>"","dpp"=>"0","ppn"=>"0","total"=>"0");
	}
	function printfb($nofb){
		$ci = & get_instance();
		$sql = "select ";
		$sql.= "a.name, ";
		$sql.= "a.businesstype,";
		$sql.= "c.username,";
		$sql.= "a.nofb,";
		$sql.= "a.businesstype,";
		$sql.= "a.siup,";
		$sql.= "a.npwp,";
		$sql.= "a.address,";
		$sql.= "a.city,";
		$sql.= "a.telp,";
		$sql.= "a.fax,";
		$sql.= "a.activationdate,";
		$sql.= "a.period1,";
		$sql.= "a.period2,";
		$sql.= "a.services,";
		$sql.= "a.completed ";
		$sql.= "from fbs a left outer join clients b on b.id=a.client_id=b.id ";
		$sql.= "left outer join users c on c.id=b.sale_id ";
		$sql.= "where a.nofb='".$nofb."'";
		$que = $ci->db->query($sql);
		return $que->result()[0];
	}