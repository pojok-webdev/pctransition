<?php
class Rpt extends CI_Controller{
	var $ionuser;
	function __construct(){
		parent::__construct();
		$this->load->helper("user");
		$this->load->helper("report");
		$this->load->library("ZabbixApi");
		$this->load->library("common");
		$this->load->helper("zabbix");
		$this->load->helper("branches");
		$this->load->helper("suspect");
		$this->load->model("rptmodel");
		if ($this->ion_auth->logged_in()) {
			$this->ionuser = $this->ion_auth->user()->row();
		}
	}
	function pji(){
		$arrbranches = getuserbranches();
		echo implode(",",$arrbranches);
	}
	function downtimereport(){
		$this->check_login();
		$orderfield = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$dt1 = $this->uri->segment(5) . " 00:00:00";
		$dt2 = $this->uri->segment(6) . " 23:59:59";
		$brns = explode(",",$this->uri->segment(7));
		$arr = array();
		$str = $this->uri->segment(7);
			for($x=0;$x<strlen($str);$x++){
				array_push($arr,substr($str,$x,1));
			}		
		$branches = implode("','",$arr);
		$sql = "select a.id, a.create_date,";
		$sql.= "clientname,date(downtimestart) downtimestart,case downtimeend when '0000-00-00 00:00:00' then '~' else date(downtimeend) end downtimeend,";
		$sql.= "case when downtimestart='0000-00-00 00:00:00' then '~' when downtimeend='0000-00-00 00:00:00' then '~' else datediff(downtimeend,downtimestart) end downtimetotal ";
		$sql.= "from tickets a ";
		$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
		$sql.= "left outer join branches_client_sites c on c.client_site_id=b.id ";
		$sql.= "where downtimestart<>'0000-00-00 00:00:00' ";
		$sql.= "and (downtimeend>'$dt2' and downtimestart<='$dt1') ";
		$sql.= "and c.branch_id in ('".$branches."')";
		//echo $sql;
		$rorder = ($order ==='desc')?'asc':'desc';
		$query = $this->db->query($sql);
		$result = $query->result();
		$data["clientname"] = "test";
		$data["order"] = $rorder;
		$data["monthchecked"] = "2016-1-1";
		$data["dt1"] = $this->uri->segment(5);
		$data["dt2"] = $this->uri->segment(6);
		$data["orderby"] = $orderfield;
		$data["allchecked"] = true;
		$data["suspects"] = $result;
		$this->load->view("TS/reports/downtime",$data);
	}
	function index(){
		$this->check_login();
		$data["months"] = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember",);
		$usrarr = array();
		$arrbranches = getuserbranches();
		$users = getsubordinates($this->ionuser->id,$usrarr,$arrbranches);
		$struser = implode("-",$users);
		$data['struser'] = $struser;
		$data['users'] = $users;
		$data["userbranches"] = implode("",$arrbranches);
		$data["menuFeed"] = "reportfilter";
		$this->load->view("TS/reports/filter",$data);
	}
	function jabrix(){
		$this->check_login();
		$api = new ZabbixApi('http://202.6.233.15/zabbix/api_jsonrpc.php', 'puji', 'pujicute2016');
		$graphs = $api->serviceget();
		$services = array();
		// print all graph IDs
		foreach($graphs as $graph){
			$id = $graph->name;
			$services[$graph->serviceid] = $graph->name;
		}
		$data["months"] = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember",);
		$data["services"] = $services;
		$data["menuFeed"] = "reportfilter";
		$this->load->view("TS/reports/jabrix",$data);
	}
	function check_login() {
		if (!$this->ion_auth->logged_in()) {
			redirect(base_url() . 'adm/login');
		}
	}	
	function monthly_installation(){
		$this->check_login();
		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$arr = install_per_month($month,$year);
		echo "installation report for month ".$month." ".$year;
		foreach($arr as $key=>$val){
			echo $key . " - " . $val . "<br />";
		}
	}
	function surveyperday(){
		$this->check_login();
		$res = surveyclientperday("2016-3-22");
		foreach($res as $r){
			echo $r["name"]."<br />";
		}
	}
	function layout(){
		$this->check_login();
		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$branchselected = $this->uri->segment(5);
		$usrarr = array();
		$amsstr = $this->uri->segment(6);
		$ams = explode("-",$amsstr);
		$arrbranchselected = array();
		for($c=0;$c<strlen($this->uri->segment(5));$c++){
			array_push($arrbranchselected,substr($this->uri->segment(5),$c,1));
		}
		$data["userbranch"] = implode(",",getuserbranches());
		$data["arrbranchselected"] = $arrbranchselected;
		$arrbranches = getuserbranches();
		$data["userbranches"] = implode("",$arrbranches);
		$data["arrbranch"] = getuserbranches();
		$data["month"] = $month;
		$data["year"] = $year;
		$data["branchselected"] = $branchselected;
		$data["day_in_month"] = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$data["install"] = install_per_month($month,$year);
		$data["survey"] = survey_per_month($month,$year);
		$data["troubleshoot"] = troubleshoot_per_month($month,$year);
		$data["maintenance"] = maintenance_per_month($month,$year);
		$this->load->view("TS/reports/rpt",$data);
	}
	function farmer(){
		$this->check_login();
		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$branchselected = $this->uri->segment(5);
		$usrarr = array();
		$amsstr = $this->uri->segment(6);
		$ams = explode("-",$amsstr);
		$arrbranchselected = array();
		for($c=0;$c<strlen($this->uri->segment(5));$c++){
			array_push($arrbranchselected,substr($this->uri->segment(5),$c,1));
		}
		$users = getsubordinates($this->ionuser->id,$usrarr,$arrbranchselected);
		$data["userbranch"] = implode(",",getuserbranches());
		$data["arrbranchselected"] = $arrbranchselected;
		$arrbranches = getuserbranches();
		$data["userbranches"] = implode("",$arrbranches);
		$data["arrbranch"] = getuserbranches();
		$data["month"] = $month;
		$data["year"] = $year;
		$data["branchselected"] = $branchselected;
		$data["day_in_month"] = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$data["suspect"] = suspect_per_month($month,$year,$arrbranchselected,$ams);
		$data["prospect"] = prospect_per_month($month,$year,$arrbranchselected,$ams);
		$data["install"] = install_per_month($month,$year,$arrbranchselected,$ams);
		$data["survey"] = survey_per_month($month,$year,$arrbranchselected,$ams);
		$data["troubleshoot"] = troubleshoot_per_month($month,$year,$arrbranchselected,$ams);
		$data["users"] = $users;
		$data['ams'] = $ams;
		$data['amsstr'] = $amsstr;
		$this->load->view("Sales/reports/farmer",$data);		
	}
	function excel(){
		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$branchselected = $this->uri->segment(5);
		$arrbranchselected = array();
		for($c=0;$c<strlen($this->uri->segment(5));$c++){
			array_push($arrbranchselected,substr($this->uri->segment(5),$c,1));
		}
		$data["userbranch"] = implode(",",getuserbranches());
		$data["arrbranchselected"] = $arrbranchselected;
		$arrbranches = getuserbranches();
		$data["userbranches"] = implode("",$arrbranches);
		$data["arrbranch"] = getuserbranches();
		$data["month"] = $month;
		$data["year"] = $year;
		$data["branchselected"] = $branchselected;
		$data["day_in_month"] = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$data["suspect"] = suspect_per_month($month,$year,$arrbranchselected);
		$data["prospect"] = prospect_per_month($month,$year,$arrbranchselected);

		$data["install"] = install_per_month($month,$year,$arrbranchselected);
		$data["survey"] = survey_per_month($month,$year,$arrbranchselected);
		$data["troubleshoot"] = troubleshoot_per_month($month,$year,$arrbranchselected);
		$this->load->view("TS/reports/excel-monthly",$data);
	}
	function excelhunter(){
		$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);
		$branchselected = $this->uri->segment(5);
		$str = $this->uri->segment(6);
		$ams = explode("-",$str);		
		$arrbranchselected = array();
		for($c=0;$c<strlen($this->uri->segment(5));$c++){
			array_push($arrbranchselected,substr($this->uri->segment(5),$c,1));
		}
		$data["userbranch"] = implode(",",getuserbranches());
		$data["arrbranchselected"] = $arrbranchselected;
		$arrbranches = getuserbranches();
		$data["userbranches"] = implode("",$arrbranches);
		$data["arrbranch"] = getuserbranches();
		$data["month"] = $month;
		$data["year"] = $year;
		$data["branchselected"] = $branchselected;
		$data["day_in_month"] = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$data["suspect"] = suspect_per_month($month,$year,$arrbranchselected,$ams);
		$data["prospect"] = prospect_per_month($month,$year,$arrbranchselected,$ams);

		$data["install"] = install_per_month($month,$year,$arrbranchselected,$ams);
		$data["survey"] = survey_per_month($month,$year,$arrbranchselected,$ams);
		$data["troubleshoot"] = troubleshoot_per_month($month,$year,$arrbranchselected,$ams);
		$this->load->view("TS/reports/excel-monthly-hunter",$data);
	}
	function shiftreport(){
		$this->check_login();
		$ticketstart = $this->uri->segment(5)."-".$this->uri->segment(4)."-".$this->uri->segment(3);
		$mydate = date_create($ticketstart);
		$myday = date_format($mydate,"D");
		$months = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
		$days = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis","Fri"=>"Jumat","Sat"=>"Sabtu","Sun"=>"Minggu",);
		$data["userbranch"] = implode(",",getuserbranches());
		$arrbranches = getuserbranches();
		$data["userbranches"] = implode("",$arrbranches);
		$data["arrbranch"] = getuserbranches();
		$arrbranchselected = array();
		for($c=0;$c<strlen($this->uri->segment(6));$c++){
			array_push($arrbranchselected,substr($this->uri->segment(6),$c,1));
		}
		$branchselected = "'".implode("','",$arrbranchselected)."'";		
		$query = "select a.id,a.kdticket,a.clientname,a.reporter,date_format(ticketstart,'%H:%i:%s')ticketstart,a.complaint,status from tickets a left outer join branches_client_sites b on b.client_site_id=a.client_site_id  where date(a.ticketstart)='$ticketstart' and b.branch_id in (".$branchselected."); ";
		$res = $this->db->query($query);
		$tickets = $res->result();
		$data["tickets"] = $tickets;
		$data["date"] = $days[$myday]." ".$this->uri->segment(3)." ".$months[$this->uri->segment(4)-1]." ".$this->uri->segment(5);
		$this->load->view("TS/reports/ticketdaily",$data);
	}
	function solvedreport(){
		$this->check_login();
		$orderfield = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$brns = explode(",",$this->uri->segment(5));
		$arr = array();
		$str = $this->uri->segment(5);
			for($x=0;$x<strlen($str);$x++){
				array_push($arr,substr($str,$x,1));
			}
		
		$branches = implode(",",$arr);
		$uridt1 = $this->uri->segment(7);
		$uridt2 = $this->uri->segment(8);
		$timerange = "";
		$data['timerange'] = 'Cabang belum dipilih';
		switch($this->uri->segment(6)){
			case '1':
				$timerange = "and q.hari<=1";		
				$data['timerange']="x <= 1";
			break;
			case '2':
				$timerange = "and q.hari<=2";
				$data['timerange']="<= 3";		
			break;
			case '3':
				$timerange = "and q.hari <=6";
				$data['timerange']="<= 7";		
			break;
			case '4':
				$timerange = "and q.hari>7";
				$data['timerange']="x > 7";		
			break;
		}
	$userbranches = '"1","2","3","4"';
	$sql = "select * from (";
	$sql.= "select a.id,a.kdticket,a.create_date,a.ticketstart,a.ticketend,a.createuser,a.status,a.cause, ";
	$sql.= "case a.status when '0' then 'open' when '1' then 'close' end ticketStatus,";
	$sql.= "case a.status when '0' then '-' when '1' then ticketend end ticket_End,";
	$sql.= "a.clientname,a.reporterphone,a.requesttype,a.parentid,b.id cid,c.id backboneid,";
	$sql.= "d.id btsid,e.id dcid,f.id ptpid,reporter,i.trid,j.hastroubleshoot,";

	$sql.= "case ";
	$sql.= "when b.id is not null then b.brnid ";
	$sql.= "when c.id is not null then c.brnid ";
	$sql.= "when d.id is not null then d.brnid ";
	$sql.= "when e.id is not null then e.brnid ";
	$sql.= "when f.id is not null then f.brnid ";
	$sql.= "when g.id is not null then g.brnid ";
	$sql.= "when h.id is not null then h.brnid ";
	$sql.= "else '-' ";
	$sql.= "end brnid, ";
	
	$sql.= "case ";
	$sql.= "when b.id is not null then b.brn ";
	$sql.= "when c.id is not null then c.brn ";
	$sql.= "when d.id is not null then d.brn ";
	$sql.= "when e.id is not null then e.brn ";
	$sql.= "when f.id is not null then f.brn ";
	$sql.= "when g.id is not null then g.brn ";
	$sql.= "when h.id is not null then h.brn ";
	$sql.= "else '-' ";
	$sql.= "end brn, ";
	
	$sql .= "case ";
	$sql.= "when ticketend is null then datediff(now(),ticketstart) ";
	$sql.= "when ticketend='0000-00-00 00:00:00' then datediff(now(),ticketstart) ";
	$sql.= "else datediff(ticketend,ticketstart) end  hari ,";

	$sql .= "concat(case ";
	$sql.= "when ticketend is null then datediff(now(),ticketstart) ";
	$sql.= "when ticketend='0000-00-00 00:00:00' then datediff(now(),ticketstart) ";
	$sql.= "else datediff(ticketend,ticketstart) end,' hari ',";

	$sql.= "time_format(case ";
	$sql.= "when ticketend is null then timediff(now(),ticketstart) ";
	$sql.= "when ticketend='0000-00-00 00:00:00' then timediff(now(),ticketstart) ";
	$sql.= "else timediff(ticketend,ticketstart) end,'%H') % 24, ";

	$sql.= "time_format(case ";
	$sql.= "when ticketend is null then timediff(now(),ticketstart) ";
	$sql.= "when ticketend='0000-00-00 00:00:00' then timediff(now(),ticketstart) ";
	$sql.= "else timediff(ticketend,ticketstart) end,'  jam %i menit %s detik')) duration3 ";
	
	$sql.= " from (select * from tickets where status='1' and ticketend>'".$uridt1."' and ticketend<'".$uridt2."') a ";
	
	$sql.= "left outer join (select distinct a.id,c.id brnid,c.name brn from client_sites a left outer join branches_client_sites b on b.client_site_id=a.id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) b on b.id=a.client_site_id ";
	
	$sql.= "left outer join (select distinct a.id,c.id brnid,c.name brn from backbones a left outer join backbones_branches b on b.backbone_id=a.id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) c on c.id=a.backbone_id ";
	
	$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from btstowers a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) d on d.id=a.btstower_id ";
	
	$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from datacenters a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) e on e.id=a.datacenter_id ";
	
	$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from ptps a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) f on f.id=a.ptp_id ";
	
	$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from cores a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) g on g.id=a.core_id ";
	
	$sql.= "left outer join (select distinct a.id,c.id brnid,c.name brn from aps a left outer join btstowers b on b.id=a.btstower_id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) h on h.id=a.ap_id ";
	
	$sql.= "left outer join (select id trid,ticket_id from troubleshoot_requests where status='0') i on i.ticket_id=a.id ";
	
	$sql.= "left outer join (select id hastroubleshoot,ticket_id from troubleshoot_requests) j on j.ticket_id=a.id ";
	
	$sql.= "where b.id is not null or c.id is not null or d.id is not null or e.id is not null or f.id is not null or g.id is not null or h.id is not null ";
	
	$sql.= ")q where brnid in (".$branches.")  ".$timerange."  ";
		$rorder = ($order ==='desc')?'asc':'desc';
	$sql.= "order by ".$orderfield." ".$rorder.";";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data["clientname"] = "test";
		$data["order"] = $rorder;
		$data["monthchecked"] = "2016-1-1";
		$data["orderby"] = $orderfield;
		$data["allchecked"] = true;
		$data["suspects"] = $result;
		$data["uridate1"] = $this->common->sql_to_human_date($uridt1);
		$data["uridate2"] = $this->common->sql_to_human_date($uridt2);
		$this->load->view("TS/reports/solvedreport",$data);
	}
	function suspectreport(){
		$this->check_login();
		$usrarr = array();
		$users = getsubordinates($this->ionuser->id,$usrarr);
		$userbranches = getuserbranches();
		$orderfield = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$dt1 = $this->uri->segment(5) . " 00:00:00";
		$dt2 = $this->uri->segment(6) . " 23:59:59";
		$brns = explode(",",$this->uri->segment(7));
		$brancharray = array();
		$str = $this->uri->segment(7);
			for($x=0;$x<strlen($str);$x++){
				array_push($brancharray,substr($str,$x,1));
			}		
		$branches = implode(",",$brns);
		$str = $this->uri->segment(8);
		$ams = explode("-",$str);
		$amsstr = implode("','",$ams);
		$sql = "select distinct d.id,d.name,d.address,c.name brn,e.username hunter,d.createdate create_date from ";
		$sql.= " suspects d  ";
		$sql.= "left outer join users e on e.id=d.user_id ";
		$sql.= "left outer join (select * from branches_users where defbranch='1' ) b on b.user_id=e.id ";
		$sql.= "left outer join branches c on c.id=b.branch_id ";
		$sql.= "where d.createdate>='".$dt1."' and d.createdate<='".$dt2."'";
		$sql.= "and c.id in ('".implode("','",$brancharray)."') ";
		$sql.= "and hide='0' ";
		$sql.= "and e.id in ('".$amsstr."') ";
		$sql.= "order by ".$orderfield." " . $order;
		$rorder = ($order ==='desc')?'asc':'desc';
		$query = $this->db->query($sql);
		$result = $query->result();
		$data["clientname"] = "test";
		$data["order"] = $rorder;
		$data["monthchecked"] = "2016-1-1";
		$data["dt1"] = $this->uri->segment(5);
		$data["dt2"] = $this->uri->segment(6);
		$data["orderby"] = $orderfield;
		$data["allchecked"] = true;
		$data["suspects"] = $result;
		$data["ams"] = $ams;
		$data["userbranches"] = $userbranches;
		//$data["users"] = $users;
		$data["users"] = array_intersect($users,getuserbybranch($brancharray));
		$data["branches"] = "'".implode("','",$brancharray)."'";
		
		$this->load->view("Sales/reports/suspectreport",$data);
	}
	function prospectreport(){
		$this->check_login();
		$usrarr = array();
		$users = getsubordinates($this->ionuser->id,$usrarr);
		$userbranches = getuserbranches();
		$orderfield = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$dt1 = $this->uri->segment(5) . " 00:00:00";
		$dt2 = $this->uri->segment(6) . " 23:59:59";
		$brns = explode(",",$this->uri->segment(7));
		$brancharray = array();
		$str = $this->uri->segment(7);
			for($x=0;$x<strlen($str);$x++){
				array_push($brancharray,substr($str,$x,1));
			}		
		$branches = implode(",",$brns);
		$str = $this->uri->segment(8);
		$ams = explode("-",$str);
		$amsstr = implode("','",$ams);
		/*$sql = "select distinct d.id,d.name,d.address,c.name brn,e.username hunter,d.prospectdate create_date from ";
		$sql.= " clients d  ";
		$sql.= "left outer join users e on e.id=d.user_id ";
		$sql.= "left outer join (select * from branches_users where defbranch='1' ) b on b.user_id=e.id ";
		$sql.= "left outer join branches c on c.id=b.branch_id ";
		$sql.= "where d.prospectdate>='".$dt1."' and d.prospectdate<='".$dt2."'";
		$sql.= "and c.id in ('".implode("','",$arr)."') ";
		$sql.= "and hide='0' ";
		$sql.= "and e.id in ('".$amsstr."') ";
		$sql.= "order by ".$orderfield." " . $order;*/
		$rorder = ($order ==='desc')?'asc':'desc';
		//$query = $this->db->query($sql);
		//$result = $query->result();
		$result = $this->rptmodel->getProspectReport($dt1,$dt2,$brancharray,$amsstr,$order,$orderfield);
		$data["clientname"] = "test";
		$data["order"] = $rorder;
		$data["monthchecked"] = "2016-1-1";
		$data["dt1"] = $this->uri->segment(5);
		$data["dt2"] = $this->uri->segment(6);
		$data["orderby"] = $orderfield;
		$data["allchecked"] = true;
		$data["suspects"] = $result;
		$data["ams"] = $ams;
		$data["userbranches"] = $userbranches;
		//$data["users"] = $users;
		$data["users"] = array_intersect($users,getuserbybranch($brancharray));
		$data["branches"] = "'".implode("','",$brancharray)."'";
		
		$this->load->view("Sales/reports/prospectreport",$data);
	}
	function surveyreport(){
		$this->check_login();
		$usrarr = array();
		$users = getsubordinates($this->ionuser->id,$usrarr);
		$userbranches = getuserbranches();
		//echo "USER BRANCHES " . implode(",",$userbranches);
		$orderfield = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$dt1 = $this->uri->segment(5) . " 00:00:00";
		$dt2 = $this->uri->segment(6) . " 23:59:59";
		$brns = explode(",",$this->uri->segment(7));
		$brancharray = array();
		$str = $this->uri->segment(7);
			for($x=0;$x<strlen($str);$x++){
				array_push($brancharray,substr($str,$x,1));
			}		
		$branches = implode(",",$brancharray);
		$str = $this->uri->segment(8);
		$ams = explode("-",$str);
		$amsstr = implode("','",$ams);
		$rorder = ($order ==='desc')?'asc':'desc';
		$result = $this->rptmodel->getSurveyReport($dt1,$dt2,$branches,$amsstr,$order,$orderfield);
		$data["clientname"] = "test";
		$data["order"] = $rorder;
		$data["monthchecked"] = "2016-1-1";
		$data["dt1"] = $this->uri->segment(5);
		$data["dt2"] = $this->uri->segment(6);
		$data["orderby"] = $orderfield;
		$data["allchecked"] = true;
		$data["surveys"] = $result;
		$data["ams"] = $ams;
		$data["userbranches"] = $userbranches;
		$data["users"] = array_intersect($users,getuserbybranch($brancharray));
		$data["branches"] = "'".implode("','",$brancharray)."'";
		
		$this->load->view("Sales/reports/surveyreport",$data);
	}	
	function installreport(){
		$this->check_login();
		$usrarr = array();
		$users = getsubordinates($this->ionuser->id,$usrarr);
		$userbranches = getuserbranches();
		$orderfield = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$dt1 = $this->uri->segment(5) . " 00:00:00";
		$dt2 = $this->uri->segment(6) . " 23:59:59";
		$brns = explode(",",$this->uri->segment(7));
		$brancharray = array();
		$str = $this->uri->segment(7);
			for($x=0;$x<strlen($str);$x++){
				array_push($brancharray,substr($str,$x,1));
			}		
		$branches = implode(",",$brancharray);
		$str = $this->uri->segment(8);
		$ams = explode("-",$str);
		$amsstr = implode("','",$ams);
		$rorder = ($order ==='desc')?'asc':'desc';
		$result = $this->rptmodel->getInstallReport($dt1,$dt2,$branches,$amsstr,$orderfield,$order);
		$data["clientname"] = "test";
		$data["order"] = $rorder;
		$data["monthchecked"] = "2016-1-1";
		$data["dt1"] = $this->uri->segment(5);
		$data["dt2"] = $this->uri->segment(6);
		$data["orderby"] = $orderfield;
		$data["allchecked"] = true;
		$data["surveys"] = $result;
		$data["ams"] = $ams;
		$data["userbranches"] = $userbranches;
		//$data["users"] = $users;
		$data["users"] = array_intersect($users,getuserbybranch($brancharray));
		$data["branches"] = "'".implode("','",$brancharray)."'";
		
		$this->load->view("Sales/reports/installreport",$data);
	}	
	function ticketbyname(){
		$this->check_login();
		$client_id = $this->uri->segment(4);
		$ordertype = $this->uri->segment(3);
		$months = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
		$days = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis","Fri"=>"Jumat","Sat"=>"Sabtu","Sun"=>"Minggu",);
		$query = "select a.id,a.kdticket,a.clientname,a.reporter,";
		$query.= "date_format(ticketstart,'%d %b %Y')ticketdatestart,date_format(ticketstart,'%H:%i:%s')tickettimestart,";
		$query.= "a.complaint,a.status,case a.status when '1' then 'selesai' when '0' then 'belum selesai' end textstatus, b.description ";
		$query.= "from tickets a left outer join ticket_followups b on b.ticket_id=a.id ";
		$query.= "where client_id='$client_id' order by ticketstart ".$ordertype."; ";
		$query = "select a.id,a.kdticket,a.clientname,a.reporter,";
		$query.= "date_format(ticketstart,'%d %b %Y')ticketdatestart,date_format(ticketstart,'%H:%i:%s')tickettimestart,";
		$query.= "a.complaint,a.status,case a.status when '1' then 'selesai' when '0' then 'belum selesai' end textstatusx, b.description ";
		$query.= ",case  when c.status is null then case a.status when  '0' then 'belum selesai' when '1' then 'selesai' end  else case c.status when '0'  then 'Progress' when '1' then 'Solved' when '2' then 'Monitoring'  end  end textstatus , ";
		$query.= "case when (a.downtimestart = '0000-00-00 00:00:00' or a.downtimeend = '0000-00-00 00:00:00') then '0' else datediff(downtimeend,downtimestart) end downtimeday,case when (a.downtimestart = '0000-00-00 00:00:00' or a.downtimeend = '0000-00-00 00:00:00') then '0' else date_format(timediff(downtimeend,downtimestart),'%i') end  downtimetime,solution,b.confirmationresult ";
		$query.= "from tickets a left outer join ticket_followups b on b.ticket_id=a.id ";
		$query.= " left outer join troubleshoot_requests c on c.ticket_id=a.id  ";
		$query.= "where client_id='$client_id' ";
		$data['extendsegment'] = "";
		$data['dt1'] = "";
		$data['dt2'] = "";
		$data['monthchecked'] = "";
		$data['allchecked'] = 'checked="checked"';
		if($this->uri->total_segments()===6){
			$query.= "and ticketstart>'".getticketdate($this->uri->segment(5)). "' ";
			$query.= "and ticketstart<'".getticketdate($this->uri->segment(6)). "' ";
			$data['extendsegment'] = $this->uri->segment(5).'/'.$this->uri->segment(6);
			$data['dt1'] = $this->common->sql_to_human_date(getticketdate($this->uri->segment(5)));
			$data['dt2'] = $this->common->sql_to_human_date(getticketdate($this->uri->segment(6)));
			$data['monthchecked'] = 'checked="checked"';
			$data['allchecked'] = "";
		};
		$query.="order by ticketstart ".$ordertype."; ";
		$res = $this->db->query($query);
		$tickets = $res->result();
		$data["tickets"] = $tickets;
		$data["client_id"] = $client_id;
		if($this->uri->segment(3)==='asc'){
			$data['order'] = 'desc';
			$data['ordertext'] = 'Urutkan dari yang paling baru';
		}else{
			$data['order'] = 'asc';
			$data['ordertext'] = 'Urutkan dari yang paling lama';
		}
		if($res->num_rows()>0){
			$data["clientname"] = "(".$tickets[0]->clientname.")";
		}else{
			$data["clientname"] = "(0 ticket)";
		}
		$this->load->view("TS/reports/ticketbynametable",$data);
	}
	function ticketbynameexcel(){
		$this->check_login();
		$client_id = $this->uri->segment(4);
		$ordertype = $this->uri->segment(3);
		$months = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
		$days = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis","Fri"=>"Jumat","Sat"=>"Sabtu","Sun"=>"Minggu",);
		$query = "select a.id,a.kdticket,a.clientname,a.reporter,";
		$query.= "date_format(ticketstart,'%d %b %Y')ticketdatestart,date_format(ticketstart,'%H:%i:%s')tickettimestart,";
		$query.= "a.complaint,a.status,case a.status when '1' then 'selesai' when '0' then 'belum selesai' end textstatus, b.description ";
		$query.= "from tickets a left outer join ticket_followups b on b.ticket_id=a.id ";
		$query.= "where client_id='$client_id' order by ticketstart ".$ordertype."; ";
		$query = "select a.id,a.kdticket,a.clientname,a.reporter,";
		$query.= "date_format(ticketstart,'%d %b %Y')ticketdatestart,date_format(ticketstart,'%H:%i:%s')tickettimestart,";
		$query.= "a.complaint,a.status,case a.status when '1' then 'selesai' when '0' then 'belum selesai' end textstatusx, b.description ";
		$query.= ",case  when c.status is null then case a.status when  '0' then 'belum selesai' when '1' then 'selesai' end  else case c.status when '0'  then 'Progress' when '1' then 'Solved' when '2' then 'Monitoring'  end  end textstatus,  ";
		$query.= "case when (a.downtimestart = '0000-00-00 00:00:00' or a.downtimeend = '0000-00-00 00:00:00') then '0' else datediff(downtimeend,downtimestart) end downtimeday,case when (a.downtimestart = '0000-00-00 00:00:00' or a.downtimeend = '0000-00-00 00:00:00') then '0' else date_format(timediff(downtimeend,downtimestart),'%i') end  downtimetime,solution,b.confirmationresult ";
		$query.= "from tickets a left outer join ticket_followups b on b.ticket_id=a.id ";
		$query.= " left outer join troubleshoot_requests c on c.ticket_id=a.id  ";
		$query.= "where client_id='$client_id' ";
		$data['extendsegment'] = "";
		$data['dt1'] = "";
		$data['dt2'] = "";
		$data['monthchecked'] = "";
		$data['allchecked'] = 'checked="checked"';
		if($this->uri->total_segments()===6){
			$query.= "and ticketstart>'".getticketdate($this->uri->segment(5)). "' ";
			$query.= "and ticketstart<'".getticketdate($this->uri->segment(6)). "' ";
			$data['extendsegment'] = $this->uri->segment(5).'/'.$this->uri->segment(6);
			$data['dt1'] = $this->common->sql_to_human_date(getticketdate($this->uri->segment(5)));
			$data['dt2'] = $this->common->sql_to_human_date(getticketdate($this->uri->segment(6)));
			$data['monthchecked'] = 'checked="checked"';
			$data['allchecked'] = "";
		};
		$query.="order by ticketstart ".$ordertype."; ";
		$res = $this->db->query($query);
		$tickets = $res->result();
		$data["tickets"] = $tickets;
		$data["client_id"] = $client_id;
		if($this->uri->segment(3)==='asc'){
			$data['order'] = 'desc';
			$data['ordertext'] = 'Urutkan dari yang paling baru';
		}else{
			$data['order'] = 'asc';
			$data['ordertext'] = 'Urutkan dari yang paling lama';
		}
		//echo "Num Rows ".$res->num_rows();
		if($res->num_rows()>0){
			$data["clientname"] = "(".$tickets[0]->clientname.")";
		}else{
			$data["clientname"] = "(0 ticket)";
		}
		$this->load->view('TS/reports/ticketbynameexcel',$data);
	}
	function unsolvedreport(){
		$this->check_login();
		$orderfield = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$brns = explode(",",$this->uri->segment(5));
		$arr = array();
		$str = $this->uri->segment(5);
			for($x=0;$x<strlen($str);$x++){
				array_push($arr,substr($str,$x,1));
			}
		$uridt1 = $this->uri->segment(7);
		$uridt2 = $this->uri->segment(8);
		
		$branches = implode(",",$arr);
		switch($this->uri->segment(6)){
			case '1':
				$timerange = "q.hari<=3";		
				$data['timerange']="x <= 3";
			break;
			case '2':
				$timerange = "q.hari>3 and q.hari<=6";
				$data['timerange']="3 < x <= 7";		
			break;
			case '3':
				$timerange = "q.hari>5 and q.hari<=6";
				$data['timerange']="5 < x <= 7";		
			break;
			case '4':
				$timerange = "q.hari>7";
				$data['timerange']="x > 7";		
			break;
		}
		$userbranches = '"1","2","3","4"';
		$sql = "select * from (";
		$sql.= "select a.id,a.kdticket,a.create_date,a.ticketstart,a.ticketend,a.createuser,a.status,a.cause, ";
		$sql.= "case a.status when '0' then 'open' when '1' then 'close' end ticketStatus,";
		$sql.= "case a.status when '0' then '-' when '1' then ticketend end ticket_End,";
		$sql.= "a.clientname,a.reporterphone,a.requesttype,a.parentid,b.id cid,c.id backboneid,";
		$sql.= "d.id btsid,e.id dcid,f.id ptpid,reporter,i.trid,j.hastroubleshoot,";

		$sql.= "case ";
		$sql.= "when b.id is not null then b.brnid ";
		$sql.= "when c.id is not null then c.brnid ";
		$sql.= "when d.id is not null then d.brnid ";
		$sql.= "when e.id is not null then e.brnid ";
		$sql.= "when f.id is not null then f.brnid ";
		$sql.= "when g.id is not null then g.brnid ";
		$sql.= "when h.id is not null then h.brnid ";
		$sql.= "else '-' ";
		$sql.= "end brnid, ";
		
		$sql.= "case ";
		$sql.= "when b.id is not null then b.brn ";
		$sql.= "when c.id is not null then c.brn ";
		$sql.= "when d.id is not null then d.brn ";
		$sql.= "when e.id is not null then e.brn ";
		$sql.= "when f.id is not null then f.brn ";
		$sql.= "when g.id is not null then g.brn ";
		$sql.= "when h.id is not null then h.brn ";
		$sql.= "else '-' ";
		$sql.= "end brn, ";
		
		$sql .= "case ";
		$sql.= "when ticketend is null then datediff(now(),ticketstart) ";
		$sql.= "when ticketend='0000-00-00 00:00:00' then datediff(now(),ticketstart) ";
		$sql.= "else datediff(ticketend,ticketstart) end  hari ,";

		$sql .= "concat(case ";
		$sql.= "when ticketend is null then datediff(now(),ticketstart) ";
		$sql.= "when ticketend='0000-00-00 00:00:00' then datediff(now(),ticketstart) ";
		$sql.= "else datediff(ticketend,ticketstart) end,' hari ',";

		$sql.= "time_format(case ";
		$sql.= "when ticketend is null then timediff(now(),ticketstart) ";
		$sql.= "when ticketend='0000-00-00 00:00:00' then timediff(now(),ticketstart) ";
		$sql.= "else timediff(ticketend,ticketstart) end,'%H') % 24, ";

		$sql.= "time_format(case ";
		$sql.= "when ticketend is null then timediff(now(),ticketstart) ";
		$sql.= "when ticketend='0000-00-00 00:00:00' then timediff(now(),ticketstart) ";
		$sql.= "else timediff(ticketend,ticketstart) end,'  jam %i menit %s detik')) duration3 ";
		
		$sql.= " from (select * from tickets ";
		$sql.= " where ";
		//$sql.= "status='0' and ";
		$sql.= "( ticketstart<'".$uridt1."' and ticketend>'".$uridt2."' )";
		$sql.= ") a ";
		
		$sql.= "left outer join (select distinct a.id,c.id brnid,c.name brn from client_sites a left outer join branches_client_sites b on b.client_site_id=a.id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) b on b.id=a.client_site_id ";
		
		$sql.= "left outer join (select distinct a.id,c.id brnid,c.name brn from backbones a left outer join backbones_branches b on b.backbone_id=a.id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) c on c.id=a.backbone_id ";
		
		$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from btstowers a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) d on d.id=a.btstower_id ";
		
		$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from datacenters a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) e on e.id=a.datacenter_id ";
		
		$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from ptps a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) f on f.id=a.ptp_id ";
		
		$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from cores a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) g on g.id=a.core_id ";
		
		$sql.= "left outer join (select distinct a.id,c.id brnid,c.name brn from aps a left outer join btstowers b on b.id=a.btstower_id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) h on h.id=a.ap_id ";
		
		$sql.= "left outer join (select id trid,ticket_id from troubleshoot_requests where status='0') i on i.ticket_id=a.id ";
		
		$sql.= "left outer join (select id hastroubleshoot,ticket_id from troubleshoot_requests) j on j.ticket_id=a.id ";
		
		$sql.= "where b.id is not null or c.id is not null or d.id is not null or e.id is not null or f.id is not null or g.id is not null or h.id is not null ";
		
		$sql.= ")q ";
		$sql.= "where ".$timerange." and brnid in (".$branches.") ";
		$rorder = ($order ==='desc')?'asc':'desc';
		$sql.= "order by ".$orderfield." ".$rorder.";";
		//echo $sql;
		$query = $this->db->query($sql);
		$result = $query->result();
		$data["clientname"] = "test";
		$data["order"] = $rorder;
		$data["monthchecked"] = "2016-1-1";
		$data["orderby"] = $orderfield;
		$data["allchecked"] = true;
		$data["suspects"] = $result;
		$data["uridate1"] = $this->common->sql_to_human_date($uridt1);
		$data["uridate2"] = $this->common->sql_to_human_date($uridt2);
		$this->load->view("TS/reports/unsolvedtickets",$data);
	}	
	function excelshiftreport(){
		$this->check_login();
		$ticketstart = $this->uri->segment(5)."-".$this->uri->segment(4)."-".$this->uri->segment(3);
		$mydate = date_create($ticketstart);
		$myday = date_format($mydate,"D");
		$arrbranchselected = array();
		for($c=0;$c<strlen($this->uri->segment(6));$c++){
			array_push($arrbranchselected,substr($this->uri->segment(6),$c,1));
		}		
		$branchselected = "'".implode("','",$arrbranchselected)."'";	
		$months = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
		$days = array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis","Fri"=>"Jumat","Sat"=>"Sabtu","Sun"=>"Minggu",);
		$query = "select a.id,a.kdticket,a.clientname,a.reporter,date_format(ticketstart,'%H:%i:%s')ticketstart,a.complaint,b.description from tickets a left outer join ticket_followups b on b.ticket_id=a.id where date_format(a.ticketstart,'%d/%c/%Y')='$ticketstart'; ";
		$query = "select a.id,a.kdticket,a.clientname,a.reporter,date_format(ticketstart,'%H:%i:%s')ticketstart,a.complaint,status from tickets a  left outer join branches_client_sites b on b.client_site_id=a.client_site_id  where date(a.ticketstart)='$ticketstart'  and b.branch_id in (".$branchselected."); ";
		$res = $this->db->query($query);
		$tickets = $res->result();
		$data["tickets"] = $tickets;
		$data["date"] = $days[$myday]." ".$this->uri->segment(3)." ".$months[$this->uri->segment(4)-1]." ".$this->uri->segment(5);
		$data["datenospace"] = $days[$myday]."-".$this->uri->segment(3)."-".$months[$this->uri->segment(4)-1]."-".$this->uri->segment(5);
		$this->load->view("TS/reports/excel-shiftreport",$data);
	}
	function zabbix(){
		$this->check_login();
		$this->load->view("zabbix/zabbix");
	}
	function zabbix2(){
		$this->check_login();
		$data["menuFeed"] = "zabbix";
		$this->load->view("zabbix/index",$data);
	}
	function zabbixm(){
		$this->check_login();
				
		$api = new ZabbixApi('http://202.6.233.15/zabbix/api_jsonrpc.php', 'puji', 'pujicute2016');
		echo "PadiNET Zabbix sample<br />";
		
			$graphs = $api->serviceget();

		// print all graph IDs
		foreach($graphs as $graph){
			foreach($graph as $key=>$val){
				if($key==="problems"){
					echo "has problem ".count($val)." <br />";
					foreach($val as $k=>$v){
						echo $k." =>".$v."<br />";
					}
				}
				echo $key . " and " . $val . "<br />";
			}
		}
	}
	function sla(){
		$this->check_login();
		$data["menuFeed"] = "zabbix";
		$api = new ZabbixApi('http://202.6.233.15/zabbix/api_jsonrpc.php', 'puji', 'pujicute2016');
		$graphs = $api->serviceGetsla(array("serviceids"=>array("1","2"),"intervals"=>array(
							"from"=>1152452201,
							"to"=>1461645184004 
						)));
		$data["services"] = get_zabbixservices();
		$data["graphs"] = $graphs;
		$this->load->view("zabbix/sla",$data);
	}
	function graph(){
		$this->check_login();
		$data["menuFeed"] = "zabbix";
		$api = new ZabbixApi('http://202.6.233.15/zabbix/api_jsonrpc.php', 'puji', 'pujicute2016');
		$graphs = $api->graphGet(array("serviceids"=>array("1","2"),"intervals"=>array(
							"from"=>1152452201,
							"to"=>1461645184004 
						)));
		$data["services"] = get_zabbixservices();
		$data["graphs"] = $graphs;
		$this->load->view("zabbix/sla",$data);
	}
	function testhelper(){
		$this->check_login();
		echo "test";
		$zabbix = get_zabbixservices();
		foreach($zabbix as $key=>$val){
			echo $key . " and " . $val . "<br />";
		}
	}
	function chart2(){
		$this->check_login();
		$data["graphid"] = $this->uri->segment(3);
		$data["menuFeed"] = "zabbix";
		$data["graphs"] = get_zabbixgraphid();
		$this->load->view("zabbix/chart",$data);
		//http://202.6.233.15/zabbix/chart2.php?graphid=436
	}
	function testTelegram(){
		$this->load->view("telegram");
	}
	function showOpenTicket(){
		$this->check_login();
		$orderfield = $this->uri->segment(3);
		$order = $this->uri->segment(4);
		$brns = explode(",",$this->uri->segment(5));
		$arr = array();
		$str = $this->uri->segment(5);
			for($x=0;$x<strlen($str);$x++){
				array_push($arr,substr($str,$x,1));
			}
		$uridt1 = $this->uri->segment(7);
		$uridt2 = $this->uri->segment(8);
		
		$branches = implode(",",$arr);
		switch($this->uri->segment(6)){
			case '1':
				$timerange = "q.hari<=2";		
				$data['timerange']="x <= 3";
			break;
			case '2':
				$timerange = "q.hari>3 and q.hari<=6";
				$data['timerange']="3 < x <= 7";		
			break;
			case '3':
				$timerange = "q.hari>5 and q.hari<=6";
				$data['timerange']="5 < x <= 7";		
			break;
			case '4':
				$timerange = "q.hari>7";
				$data['timerange']="x > 7";		
			break;
		}
		$userbranches = '"1","2","3","4"';
		$sql = "select * from (";
		$sql.= "select a.id,a.kdticket,a.create_date,a.ticketstart,a.ticketend,a.createuser,a.status,a.cause, ";
		$sql.= "case a.status when '0' then 'open' when '1' then 'close' end ticketStatus,";
		$sql.= "case a.status when '0' then '-' when '1' then ticketend end ticket_End,";
		$sql.= "a.clientname,a.reporterphone,a.requesttype,a.parentid,b.id cid,c.id backboneid,";
		$sql.= "d.id btsid,e.id dcid,f.id ptpid,reporter,i.trid,j.hastroubleshoot,";

		$sql.= "case ";
		$sql.= "when b.id is not null then b.brnid ";
		$sql.= "when c.id is not null then c.brnid ";
		$sql.= "when d.id is not null then d.brnid ";
		$sql.= "when e.id is not null then e.brnid ";
		$sql.= "when f.id is not null then f.brnid ";
		$sql.= "when g.id is not null then g.brnid ";
		$sql.= "when h.id is not null then h.brnid ";
		$sql.= "else '-' ";
		$sql.= "end brnid, ";
		
		$sql.= "case ";
		$sql.= "when b.id is not null then b.brn ";
		$sql.= "when c.id is not null then c.brn ";
		$sql.= "when d.id is not null then d.brn ";
		$sql.= "when e.id is not null then e.brn ";
		$sql.= "when f.id is not null then f.brn ";
		$sql.= "when g.id is not null then g.brn ";
		$sql.= "when h.id is not null then h.brn ";
		$sql.= "else '-' ";
		$sql.= "end brn, ";
		
		$sql .= "case ";
		$sql.= "when ticketend is null then datediff(now(),ticketstart) ";
		$sql.= "when ticketend='0000-00-00 00:00:00' then datediff(now(),ticketstart) ";
		$sql.= "else datediff(ticketend,ticketstart) end  hari ,";

		$sql .= "concat(case ";
		$sql.= "when ticketend is null then datediff(now(),ticketstart) ";
		$sql.= "when ticketend='0000-00-00 00:00:00' then datediff(now(),ticketstart) ";
		$sql.= "else datediff(ticketend,ticketstart) end,' hari ',";

		$sql.= "time_format(case ";
		$sql.= "when ticketend is null then timediff(now(),ticketstart) ";
		$sql.= "when ticketend='0000-00-00 00:00:00' then timediff(now(),ticketstart) ";
		$sql.= "else timediff(ticketend,ticketstart) end,'%H') % 24, ";

		$sql.= "time_format(case ";
		$sql.= "when ticketend is null then timediff(now(),ticketstart) ";
		$sql.= "when ticketend='0000-00-00 00:00:00' then timediff(now(),ticketstart) ";
		$sql.= "else timediff(ticketend,ticketstart) end,'  jam %i menit %s detik')) duration3 ";
		
		$sql.= " from (select * from tickets ";
		$sql.= " where ";
		$sql.= "status='0' ";
		//$sql.= " and ";
		//$sql.= "( ticketstart<'".$uridt1."' and ticketend>'".$uridt2."' )";
		$sql.= ") a ";
		
		$sql.= "left outer join (select distinct a.id,c.id brnid,c.name brn from client_sites a left outer join branches_client_sites b on b.client_site_id=a.id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) b on b.id=a.client_site_id ";
		
		$sql.= "left outer join (select distinct a.id,c.id brnid,c.name brn from backbones a left outer join backbones_branches b on b.backbone_id=a.id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) c on c.id=a.backbone_id ";
		
		$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from btstowers a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) d on d.id=a.btstower_id ";
		
		$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from datacenters a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) e on e.id=a.datacenter_id ";
		
		$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from ptps a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) f on f.id=a.ptp_id ";
		
		$sql.= "left outer join (select distinct a.id,b.id brnid,b.name brn from cores a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) g on g.id=a.core_id ";
		
		$sql.= "left outer join (select distinct a.id,c.id brnid,c.name brn from aps a left outer join btstowers b on b.id=a.btstower_id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) h on h.id=a.ap_id ";
		
		$sql.= "left outer join (select id trid,ticket_id from troubleshoot_requests where status='0') i on i.ticket_id=a.id ";
		
		$sql.= "left outer join (select id hastroubleshoot,ticket_id from troubleshoot_requests) j on j.ticket_id=a.id ";
		
		$sql.= "where b.id is not null or c.id is not null or d.id is not null or e.id is not null or f.id is not null or g.id is not null or h.id is not null ";
		
		$sql.= ")q ";
		$sql.= "where ".$timerange." and brnid in (".$branches.") ";
		$rorder = ($order ==='desc')?'asc':'desc';
		$sql.= "order by ".$orderfield." ".$rorder.";";
		//echo $sql;
		$query = $this->db->query($sql);
		$result = $query->result();
		$data["clientname"] = "test";
		$data["order"] = $rorder;
		$data["monthchecked"] = "2016-1-1";
		$data["orderby"] = $orderfield;
		$data["allchecked"] = true;
		$data["suspects"] = $result;
		$data["uridate1"] = date("Y-m-d");//$this->common->sql_to_human_date($uridt1);
		$data["uridate2"] = date("Y-m-d");//$this->common->sql_to_human_date($uridt2);
		$this->load->view("TS/reports/showOpenTicket",$data);
		
	}
}
