<?php
$COMMENT = "USED BY EOS";
class Maintenancereports extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->common->check_login();
        $this->maintenancereport->get_maintenance_report();
        $data['objs'] = $this->maintenancereport->get_maintenance_report();
        $data['menuFeed'] = 'maintenancereport';
        $this->load->view('EOS/maintenancereport/maintenancereport',$data);
    }
    function add(){
        $this->common->check_login();
        $maintenancereport_id = $this->uri->segment(3);
        $data['menuFeed'] = 'maintenancereport';
        $data['operators'] = $this->operator->get_combo_data();
        $data['usage_periods'] = $this->usage_period->get_combo_data();
        $data['schedules'] = $this->maintenance->get_combo_data();
        $this->load->view('EOS/maintenancereport/add',$data);        
    }
    function clientproblemremove(){
        $params = $this->input->post();
        echo $this->maintenancereport->clientproblemremove($params["id"]);
    }
    function edit(){
        $this->common->check_login();
        $this->maintenancereport->get_maintenance_report();
        $maintenancereport_id = $this->uri->segment(3);
        $data['maintenancereport_id'] = $this->uri->segment(3);
        $data["clientproblems"] = $this->maintenancereport->getclientproblems($maintenancereport_id);
        $data['objs'] = $this->maintenancereport->get_maintenance_report();
        $data['obj'] = $this->maintenancereport->getbyreportmid($maintenancereport_id);
        $data['menuFeed'] = 'maintenancereport';
        $data['operators'] = $this->operator->populate();
        $data["eosteams"]= $this->maintenancereport->getoperators($maintenancereport_id);
        $data["eosarray"]= $this->maintenancereport->geteosarray();
        $data['operatorarray'] = $this->operator->get_combo_data();
        $data['vases'] = $this->vas->populate();
        $data['maintenancereport_vas'] = $this->maintenancereport->getvases($maintenancereport_id);
        $data['applications'] = $this->application->populate();
        $data['images'] = $this->maintenancereport_image->populate($this->uri->segment(3),array('2'));
        $data['topologi'] = $this->maintenancereport_image->populate($this->uri->segment(3));
        $data['documents'] = $this->maintenancereport_image->populate($this->uri->segment(3),array('3'));
        $data['mapplications'] = $this->maintenancereport_application->populate($this->uri->segment(3));
        $data['kompetitors'] = $this->maintenancereport_kompetitor->populate($this->uri->segment(3));
        $data['kompetitors'] = $this->maintenancereport->getcompetitors($this->uri->segment(3));
        $data['usage_periods'] = $this->usage_period->get_combo_data();
        $data['devicetypes']=Devicetype::get_combo_data();
        $data['devices']=Device::get_combo_data();
        $data['ticketcauses'] = $this->ticketcause->get_combo_data2();
        $data["clientdevices"] = $this->maintenancereport->getclientdevices($maintenancereport_id);
        $data["padinetdevices"] = $this->maintenancereport->getpadinetdevices($maintenancereport_id);
        $data["mrstatusarray"] = array("0"=>"Solved","1"=>"Progress","2"=>"Monitoring");
        $this->load->view('EOS/maintenancereport/edit',$data);        
    }
    function saveeos(){
        $params = $this->input->post();
        echo $this->maintenancereport->saveeos($params);
    }
    function saveoperator(){
        $params = $this->input->post();
        echo $this->maintenancereport_kompetitor->saveoperator(
            $params["maintenancereport_id"],
            $params["operator_id"],
            $params["service"],
            $params["description"]
        );
    }
    function remove(){
        $id = $this->uri->segment(3);
        echo $this->maintenancereport->remove($id);
    }
    function removeoperator(){
        $id = $this->uri->segment(3);
        echo $this->maintenancereport_kompetitor->removeoperator($id);
    }
    function saveimage(){
        $params = $this->input->post();
        echo $this
            ->maintenancereport_image
            ->saveimage(
                $params['maintenancereport_id'],
                $params['name'],
                $params['description'],
                $params['image'],
                $params['imagetype']);
    }
    function saveclientproblem(){
        $params = $this->input->post();
        echo $this->maintenancereport->saveclientproblem($params);
    }
    function removeimage(){
        $params = $this->input->post();
        echo $this->maintenancereport_image->removeimage($params['id']);
    }
    function savevas(){
        $params = $this->input->post();
        echo $this
            ->maintenancereport_vas
            ->save($params['maintenancereport_id'],$params['vas_id']);
    }
    function removevas(){
        $params = $this->input->post();
        $id = $params["id"];
        echo $this
            ->maintenancereport
            ->removevas($id);
    }
    function removevas_(){
        $params = $this->input->post();
        echo $this
            ->maintenancereport_vas
            ->remove($params['maintenancereport_id'],$params['vas_id']);
    }    
    function saveapplication(){
        $params = $this->input->post();
        echo $this
            ->maintenancereport_application
            ->save($params['maintenancereport_id'],$params['application_id']);
    }
    function removeapplication(){
        $params = $this->input->post();
        echo $this
            ->maintenancereport_application
            ->remove($params['maintenancereport_id'],$params['application_id']);
    }
    function removeclientdevice(){
        $id = $this->uri->segment(3);
        echo $this
            ->maintenancereport
            ->removeclientdevice($id);
    }
    function removeeos(){
        $id = $this->uri->segment(3);
        echo $this->maintenancereport->removeeos($id);
    }
    function upsertreport(){
        $params = $this->input->post();
        echo $this
            ->maintenancereport->upsert($params);
    }
    function saveclientdevice(){
        $params = $this->input->post();
        echo $this->maintenancereport->insertclientdevice($params);
    }
    function savepadinetdevice(){
        $params = $this->input->post();
        echo $this->maintenancereport->insertpadinetdevice($params);
    }
    function removepadinetdevice(){
        $id = $this->uri->segment(3);
        echo $this
            ->maintenancereport
            ->removepadinetdevice($id);
    }
	function showreport(){
		$installsiteid = $this->uri->segment(3);
		$query = "select c.name,";
        $query.= "concat(day(a.install_date),'-',month(a.install_date),'-',year(a.install_date)) ins_date,";
        $query.= "b.address,";
        $query.= "case a.status ";
        $query.= " when '0' then 'belum selesai' ";
        $query.= " when '1' then 'selesai' ";
        $query.= " else 'belum selesai' end installstatus,";
        $query.= "a.resume,d.srv,e.xcutor,f.pic,g.tipe iwtipe,g.macboard iwmacboard,g.ip_ap iwip_ap,g.essid iwessid,g.ip_ethernet iwip_ethernet,g.freqwency iwfreqwency,g.polarization iwpolarization,g.signal iwsignal,g.quality iwquality,g.throughput_udp iwthroughput_udp,";
        $query.= "g.throughput_tcp iwthroughput_tcp,g.user iwuser,g.password iwpassword from ";
        $query.= "install_sites a ";
		$query.= "left outer join client_sites b on b.id=a.client_site_id ";
		$query.= "left outer join clients c on c.id=b.client_id ";
		$query.= "left outer join (select client_site_id,group_concat(name) srv from clientservices group by client_site_id) d on d.client_site_id=b.id ";
		$query.= "left outer join (select install_site_id,group_concat(name)xcutor from install_installers group by install_site_id) e on e.install_site_id=a.id ";
		$query.= "left outer join (select client_id,group_concat(name)pic from pics group by client_id) f on f.client_id=c.id ";
		$query.= "left outer join install_wireless_radios g on a.id=g.install_site_id ";
		$query.= "left outer join install_resumes h on h.install_site_id=a.id ";
		$query.= " where a.id=".$installsiteid;
		//echo $query;
		$res = $this->db->query($query);
		$obj = $res->result()[0];

		$query = "select a.* from install_resumes a left outer join install_sites b on b.id=a.install_site_id where  b.id=".$installsiteid;
		$res = $this->db->query($query);
		$sr = $res->result();

		$qii = "select a.id,a.img,a.title,a.description from install_images a where a.install_site_id=".$installsiteid. " ";
		$qii.= "order by roworder asc ";
		$res = $this->db->query($qii);
		$ii = $res->result();
        $maintenancereport_id = $this->uri->segment(3);
        $obj = $this->maintenancereport->getbyreportmid($maintenancereport_id);
		$data = array(
			'obj'=>$obj,
			'install_images'=>$ii,
			'sr'=>$sr,
            "topologies"=>$this->maintenancereport->gettopologies($maintenancereport_id),
            "documents"=>$this->maintenancereport->getdocuments($maintenancereport_id),
		);
		$this->load->view("reports/maintenancereport",$data);
	}    
    function viewreport(){
        $maintenancereport_id = $this->uri->segment(3);
        $obj = $this->maintenancereport->getbyreportmid($maintenancereport_id);
        $data = array(
            "opr"=>"Ardi,Alif",
            "operators"=>$this->maintenancereport->getoperators($maintenancereport_id),
            "eosteam"=>$this->maintenancereport->geteos($maintenancereport_id),
            "clientname"=>$obj->name,
            "address"=>$obj->address,
            "install_date"=>$obj->maintenancedate,
            "picname"=>$obj->pic_name,
            "pic_phone_area"=>$obj->pic_phone_area,
            "pic_phone"=>$obj->pic_phone,
            "service"=>$obj->services,
            "topologies"=>$this->maintenancereport->gettopologies($maintenancereport_id),
            "documents"=>$this->maintenancereport->getdocuments($maintenancereport_id),
            "competitors"=>$this->maintenancereport->getcompetitors($maintenancereport_id),
            "distribution"=>$this->maintenancereport->getdistribution($maintenancereport_id),
            "eosactivity"=>$obj->eosactivity,
            "maintenancescheduledescription"=>$this
                ->maintenancereport
                ->getmaintenancescheduledescription($maintenancereport_id),
            "clientdevices"=>$this->maintenancereport->getclientdevices($maintenancereport_id),
            "padinetdevices"=>$this->maintenancereport->getpadinetdevices($maintenancereport_id),
            "vases"=>$this->maintenancereport->getvases($maintenancereport_id),
        );
        $this->load->view("EOS/maintenancereport/viewreport",$data);
    }
}