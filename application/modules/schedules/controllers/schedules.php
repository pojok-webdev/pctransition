<?php
class Schedules extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper("user");
		$this->common->check_login();
	}
	function index(){
		$data["menuFeed"]="schedules";
		$this->load->view("schedules/schedules",$data);
	}
	function schedule(){
		$data["menuFeed"]="schedules";
		$this->load->view("schedules/schedule",$data); 
	}
	function show(){
		$data["menuFeed"]="schedules";
		$this->load->view("schedules/schedule",$data);
	}
	function xxx(){
		$userbranch = getuserbranches();
		echo implode(",",$userbranch);
	}
	function getJson(){
		$userbranch = getuserbranches();
		$branches =  implode(",",$userbranch);
		$query = "select distinct 'yellow' as color,d.username,a.id,c.name, case  when (a.execution_date is null or date(a.execution_date)='0000-00-00') then concat(date_format(a.survey_date,'%Y-%m-%d'),'T',date_format(a.survey_date,'%H:%m:%s')) else concat(date_format(a.execution_date,'%Y-%m-%d'),'T',date_format(a.execution_date,'%H:%m:%s')) end execution_date , case  when (a.execution_date is null or date(a.execution_date)='0000-00-00') then date_format(a.survey_date,'%Y-%m-%d %H:%i:%s') else date_format(a.execution_date,'%Y-%m-%d %H:%i:%s') end execution_date_154 ,'2015-04-04' x from survey_sites a left outer join survey_requests b on b.id=a.survey_request_id left outer join clients c on c.id=b.client_id left outer join users d on d.id=c.sale_id left outer join client_sites e on e.client_id=c.id left outer join branches_client_sites f on f.client_site_id=e.id where a.active='1' and b.active='1'  and f.branch_id in (".$branches.")";
		$query.= "union  all ";
		$query.= "select distinct 'green' color,d.username,a.id,c.name,concat(date_format(a.install_date,'%Y-%m-%d'),'T',date_format(a.install_date,'%H:%m:%s')) execution_date,a.install_date,a.install_date x from install_sites a left outer join client_sites b on b.id=a.client_site_id left outer join clients c on c.id=b.client_id left outer join users d on d.id=c.user_id  left outer join branches_client_sites f on f.client_site_id=b.id where f.branch_id in (".$branches.") ";
		$query.= "union  all ";
		$query.= "select distinct 'red' color,d.username,a.id,nameofmtype name,case  when a.troubleshoot_date is null then concat(date_format(a.request_date1,'%Y-%m-%d'),'T',date_format(a.request_date1,'%H:%m:%s')) else concat(date_format(a.troubleshoot_date,'%Y-%m-%d'),'T',date_format(a.troubleshoot_date,'%H:%m:%s')) end  execution_date,case  when a.troubleshoot_date is null then concat(date_format(a.request_date1,'%Y-%m-%d'),'T',date_format(a.request_date1,'%H:%m:%s')) else concat(date_format(a.troubleshoot_date,'%Y-%m-%d'),'T',date_format(a.troubleshoot_date,'%H:%m:%s')) end troubleshoot_date,a.troubleshoot_date x from troubleshoot_requests a left outer join client_sites b on b.id=a.client_site_id left outer join clients c on c.id=b.client_id left outer join users d on d.id=c.user_id  left outer join branches_client_sites f on f.client_site_id=b.id where f.branch_id in (".$branches.") ";
		
		$query.= "union all ";
		$query.= "select distinct 'blue' color,g.username,a.id,";
		$query.= "case maintenance_type when 'pelanggan' then c.name ";
		$query.= "when 'backbone' then d.name ";
		$query.= "when 'datacenter' then e.name ";
		$query.= "when 'bts' then f.name end name, ";
		$query.= "a.mdatetime execution_date,a.mdatetime maintenancedate,now() x ";
		$query.= "from maintenances a ";
		$query.= "left outer join client_sites b on b.id=a.client_site_id ";
		$query.= "left outer join clients c on c.id=b.client_id ";
		$query.= "left outer join backbones d on d.id=a.backbone_id ";
		$query.= "left outer join datacenters e on e.id=a.datacenter_id ";
		$query.= "left outer join btstowers f on f.id=a.bts_id ";
		$query.= "left outer join users g on g.id=c.user_id ";
		
		$obj = new Survey_site();
		$obj->query($query);
		$arr = array();
		foreach ($obj  as $result){
			switch($result->color){
				case "yellow":
				$surveyors = " ";
				$qsurveyors = "select name from survey_surveyors a right outer join survey_requests b on b.id=a.survey_request_id right outer join survey_sites c on c.survey_request_id=b.id where c.id=".$result->id;
				$svy = new Survey_surveyor();
				$svy->query($qsurveyors);
				if($svy->result_count()>0){
					$arrsvy = array();
					foreach($svy as $surveyor){
						array_push($arrsvy,humanize($surveyor->name));
					}
					$surveyors = ", pelaksana survey : " . implode(",",$arrsvy);
				}else{
					$surveyors="";
				}
				$urichunk="surveys/edit/";
				break;
				case "green":
				$surveyors = " ";
				$qinstallers = "select name from install_installers a right outer join install_sites b on b.id=a.install_site_id  where b.id=".$result->id;
				$svy = new Install_installer();
				$svy->query($qinstallers);
				if($svy->result_count()>0){
					$arrsvy = array();
					foreach($svy as $installer){
						array_push($arrsvy,humanize($installer->name));
					}
					$surveyors = ", pelaksana Instalasi : " . implode(",",$arrsvy);
				}else{
					$surveyors="";
				}
				$urichunk="install_requests/install_edit/";
				break;
				case "red":
				$surveyors = " ";
				$qinstallers = "select name from troubleshoot_officers a right outer join troubleshoot_requests b on b.id=a.troubleshoot_request_id  where b.id=".$result->id;
				$svy = new Troubleshoot_officer();
				$svy->query($qinstallers);
				if($svy->result_count()>0){
					$arrsvy = array();
					foreach($svy as $installer){
						array_push($arrsvy,humanize($installer->name));
					}
					$surveyors = ", pelaksana Troubleshoot : " . implode(",",$arrsvy);
				}else{
					$surveyors="";
				}
				//$urichunk="troubleshoots/entry_report/";
				$urichunk="troubleshoots/edit/";
				break;
				case "blue":
				$surveyors = " ";
				$qmaintenance = "select name from maintenance_operators a right outer join maintenances b on b.id=a.maintenance_request_id  where b.id=".$result->id;
				$que = $this->db->query($qmaintenance);
				if($que->num_rows()>0){
					$arrmaintenance = array();
					foreach($que->result() as $maintenance){
						array_push($arrmaintenance,humanize($maintenance->name));
					}
					$surveyors = ", pelaksana Maintenance : " . implode(",",$arrmaintenance);
				}else{
					$surveyors="";
				}
				//$urichunk="troubleshoots/entry_report/";
				$urichunk="pmaintenances/edit/";
				break;
			}
			array_push($arr,'{"backgroundColor":"'.$result->color.'","textColor":"black","title":"'.$result->name.', AM:'.humanize($result->username).' '.$surveyors.'","start":"'.$result->execution_date_154.'","end":"'.$result->execution_date_154.'","url":"'.base_url().$urichunk.$result->id.'"}');
		}
		$str = "[".implode(",",$arr) . "]";
		echo $str;
	}
	function maintenances(){
		$sql = "select mdatetime from maintenances ";
		$sql.= "where ";
	}
}
