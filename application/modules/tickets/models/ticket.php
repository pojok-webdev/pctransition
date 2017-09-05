<?php
class Ticket extends DataMapper{
	var $has_many = array('troubleshoot_request','ticket_followup');
	var $has_one = array('client_site');
	function __construct(){
		parent::__construct();
	}
	function differ($date1,$date2){
		return $this->func('datediff','@requeststart','@requestend');
	}
	function duration(){
		$dtq = "select now() nau";
		$dtr = $this->db->query($dtq);
		$dt = $dtr->result();
		//echo $dt[0]->nau;
		//$curdate = 	$dt[0]->nau;
		$curdate = new DateTime($dt[0]->nau);
		$now = date('Y-m-d H:m:s');
		if($this->ticketend ==='0000-00-00 00:00:00'){
			$ticketend = $curdate;
		}else{
			$ticketend = $this->ticketend;
		}
		if($now < $this->ticketstart){
			return '0';
		}
		if($this->status==="0"){
			$ticketend = "-";
			$diff = date_diff(date_create($this->ticketstart),$curdate);
			$status = "Open";
		}else{
			$ticketend = $this->ticketend;
			$diff = date_diff(date_create($this->ticketstart),date_create($this->ticketend));
			//$diff = date_diff(date_create($this->ticketstart),date_create($ticketend));
			$status = "Close";
		}
		$duration = "";
		$duration.=($diff->format("%d")>0)?$diff->format("%m") . " bulan ":"";
		$duration.=($diff->format("%d")>0)?$diff->format("%d") . " hari ":"";
		$duration.=(($diff->format("%H")-1)>0)?($diff->format("%H")-1) . " jam ":"";
		$duration.=($diff->format("%I")>0)?$diff->format("%I") . " menit ":"";
		$duration.=($diff->format("%s")>0)?$diff->format("%s") . " detik ":"";		
		return $duration;
	}
	function duration3(){
		$sql = 'select concat(case when ticketend is null then datediff(now(),ticketstart) when ticketend="0000-00-00 00:00:00" then datediff(now(),ticketstart) else datediff(ticketend,ticketstart) end," hari ",';

		$sql.= 'time_format(case when ticketend is null then timediff(now(),ticketstart) when ticketend="0000-00-00 00:00:00" then timediff(now(),ticketstart) else timediff(ticketend,ticketstart) end,"%H") % 24, ';

		$sql.= 'time_format(case when ticketend is null then timediff(now(),ticketstart) when ticketend="0000-00-00 00:00:00" then timediff(now(),ticketstart) else timediff(ticketend,ticketstart) end,"  jam %i menit %s detik")) output from tickets where id='.$this->id.';';

		$diffquery = $this->db->query($sql);
		$diffrow = $diffquery->result();
		$diffresult = $diffrow[0]->output;
		return $diffresult;
	}
	function ticketEnd(){
		if($this->status==="0"){
			$ticketend = "-";
		}else{
			$ticketend = $this->ticketend;
		}		
		return $ticketend;
	}
	function ticketStatus(){
		if($this->status==="0"){
			$status = "Open";
		}else{
			$status = "Close";
		}		
		return $status;
	}
	function hastroubleshoot($ticket_id){
/*		$obj = new Troubleshoot_request();
		$obj->where('ticket_id',$ticket_id)->get();
		if($obj->result_count()>0){
			return true;
		}*/
		return $this->troubleshoot_request->count();
	}
	function alltroubleshootaccomplished($ticket_id){
		return $this->where('id',$ticket_id)->where_related_troubleshoot_request('status !=','1')->count();
		//echo $obj->result_count();
	}
	function currentdatetime(){
		$sql = "select now() output;";
		$qry = $this->db->query($sql);
		$row = $qry->result();
		return $row[0]->output;
	}
}
