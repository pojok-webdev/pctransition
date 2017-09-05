<?php
class Tests extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array(
		));
	}
	function index(){
		$this->load->view('common/header');
		$this->load->view('test/index');
		$this->load->view('common/footer');
	}
	function editor(){
		$this->load->view('ckeditor/_samples');
	}
	function teat(){
		echo '{"satu":"apel","dua":"rambutan","tiga":"salak","empat":"nangka","tujuh":"pisang","delapan":"jambu","sembilan":"leci","sepuluh":"durian"}';
//		echo '{"a":"satoe"}';
	}
	function teatcaller(){
		$this->load->view('teatcaller');
	}
	function get_events(){
		$url = $this->uri->uri_to_assoc();
		$year = $url['year'];
		$month = $url['month'];
		$day = $url['day'];
		$query = 'select id,name,time(follow_up)tm from clients where ';
		$query.= 'year(follow_up)=' . $year . ' and ';
		$query.= 'month(follow_up)=' . $month . ' and ';
		$query.= 'day(follow_up)=' . $day;
		$result = $this->db->query($query);
		$string_array = array();
		$out = '{';
		$c=0;
		foreach ($result->result() as $row){
			array_push($string_array,'"' . $c . '":"' . $row->name . '(' . $row->tm . ')"');
			$c++;
		}
		$out.=implode(',',$string_array);
		$out.='}';
		echo $out;
	}
	function get_jenis_bisnis(){
		echo '{"arr":["Badan Usaha","Perorangan","Institusi","Wargame"]}';
	}
	function get_operators(){
		$operators = new Operator();
		$operators->get();
		$out_array = array();
		foreach ($operators as $operator){
			array_push($out_array, $operator->name);
		}
		$out_string = implode('","', $out_array);
		$output = '{"arr":["' . $out_string . '"]}';
		echo $output;
	}
	function get_internet_problems(){
		$internet_problems = new Internet_problem();
		$internet_problems->get();
		$out_array = array();
		foreach ($internet_problems as $internet_problem){
			array_push($out_array, $internet_problem->name);
		}
		$out_string = implode('","', $out_array);
		$output = '{"arr":["' . $out_string . '"]}';
		echo $output;
	}
	function get_positions(){
		$positions = new Position();
		$positions->get();
		$out_array = array();
		foreach ($positions as $position){
			array_push($out_array, $position->name);
		}
		$out_string = implode('","', $out_array);
		$output = '{"arr":["' . $out_string . '"]}';
		echo $output;
	}
	function get_medias(){
		$medias = new Media();
		$medias->get();
		$out_array = array();
		foreach ($medias as $media){
			array_push($out_array, $media->name);
		}
		$out_string = implode('","', $out_array);
		$output = '{"arr":["' . $out_string . '"]}';
		echo $output;
	}
	
	function plupload(){
		$this->load->view('plupload');
	}
	
	function pluploadhandler(){
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		// Settings
		//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
//		$targetDir = '../files';
		$targetDir = base_url() . 'img';

		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds

		// 5 minutes execution time
		@set_time_limit(5 * 60);

		// Uncomment this one to fake upload time
		// usleep(5000);

		// Get parameters
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
		$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

		// Clean the fileName for security reasons
		$fileName = preg_replace('/[^\w\._]+/', '_', $fileName);

		// Make sure the fileName is unique but only if chunking is disabled
		if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
			$ext = strrpos($fileName, '.');
			$fileName_a = substr($fileName, 0, $ext);
			$fileName_b = substr($fileName, $ext);

			$count = 1;
			while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
				$count++;

			$fileName = $fileName_a . '_' . $count . $fileName_b;
		}

		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

		// Create target dir
		if (!file_exists($targetDir))
			@mkdir($targetDir);

		// Remove old temp files	
		if ($cleanupTargetDir && is_dir($targetDir) && ($dir = opendir($targetDir))) {
			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
					@unlink($tmpfilePath);
				}
			}

			closedir($dir);
		} else
			die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			

		// Look for the content type header
		if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
			$contentType = $_SERVER["HTTP_CONTENT_TYPE"];

		if (isset($_SERVER["CONTENT_TYPE"]))
			$contentType = $_SERVER["CONTENT_TYPE"];

		// Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
		if (strpos($contentType, "multipart") !== false) {
			if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
				// Open temp file
				$out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
				if ($out) {
					// Read binary input stream and append it to temp file
					$in = fopen($_FILES['file']['tmp_name'], "rb");

					if ($in) {
						while ($buff = fread($in, 4096))
							fwrite($out, $buff);
					} else
						die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
					fclose($in);
					fclose($out);
					@unlink($_FILES['file']['tmp_name']);
				} else
					die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
		} else {
			// Open temp file
			$out = fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
			if ($out) {
				// Read binary input stream and append it to temp file
				$in = fopen("php://input", "rb");

				if ($in) {
					while ($buff = fread($in, 4096))
						fwrite($out, $buff);
				} else
					die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

				fclose($in);
				fclose($out);
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}

		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off 
			rename("{$filePath}.part", $filePath);
		}


		// Return JSON-RPC response
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
	}
	
	function testt(){
		$this->load->view('common/header');
		$this->load->view('common/common');
		$this->load->view('test/testt');
	}
	
	function CheckAuthentication(){    
			return isset($_SESSION['IsAuthorized']) && $_SESSION['IsAuthorized'];
	}

	
	function ckedit(){
		session_start();
		$_SESSION['IsAuthorized'] = TRUE;
		if($this->CheckAuthentication()){
			echo 'authenticated';
			
		}
		$this->load->view('common/ckedit');
	}
	
	function jsonmaker(){
		echo '{"satu":"kucing","dua":"kambing"}';
	}
	
	function test(){
		$this->load->view('test');
	}
	
	function jsonmaker2(){
		echo '{
		"one": "Singular sensation",
		"two": "Beady little eyes",
		"three": "Little birds pitch by my doorstep"
		}';
	}
	
	function jsonsrc(){
		echo '{"satu":"vitara","dua":"mercedes"}';
	}
	
	function testjson(){
		$this->load->view('teatcaller');
	}
	
	function test_pdf(){
		include './asset/MPDF54/mpdf.php';
		$this->load->view('testpdf');
	}
	
	function test_pdf_email(){
		include './asset/MPDF54/mpdf.php';
		$this->load->view('testpdfemail');
	}

    function testdate() {
        echo "\nHari :\n";
        echo "D (day): " . date('D') . "\n";
        echo "l (day): " . date('l') . "\n";
        echo "w (weekday): " . date('w') . "\n";
        echo "\nTanggal :\n";
        echo "j (tanggal): " . date('j') . "\n";
        echo "d (date): " . date('d') . "\n";
        echo "z (day of year): " . date('z') . "\n";

        echo "\nMenit :\n";
        echo "i (menit): " . date('i') . "\n";

        echo "\nDetik :\n";
        echo "s (detik): " . date('s') . "\n";

        echo "\nBulan :\n";
        echo "m (month): " . date('m') . "\n";
        echo "n (month): " . date('n') . "\n";
        echo "M (month): " . date('M') . "\n";
        echo "F (month): " . date('F') . "\n";
        echo "t (amount of day in month): " . date('t') . "\n";

        echo "\nJam :\n";
        echo "h (Jam [12]): " . date('h') . "\n";
        echo "H (Jam [24]): " . date('H') . "\n";
        echo "g (Jam [12]): " . date('g') . "\n";
        echo "G (Jam [24]): " . date('G') . "\n";
        echo "t (amount of day on given month): " . date('t') . "\n";

        echo "\nTahun :\n";
        echo "Y (year): " . date('Y') . "\n";
        echo "y (year): " . date('y') . "\n";
        echo "L (Leap if '1' not Leap if '0'): " . date('L') . "\n";

        echo "AM/PM";
        echo "a (meridiem): " . date('a') . "\n";
        echo "A (meridiem): " . date('A') . "\n";

        echo "test purpose : ";
        echo date('Y') . '-' . date('m') . '-' . date('d') . ' ' . (date('H') - 1) . ':' . date('i');
        echo "\n";
    }
    function testdate2() {
        $objs = new Maintenance();
        $objs->get();
        $c = 0;
        foreach ($objs as $obj) {
            echo $c++;
            $mdatetime = Common::longsql_to_datepart($obj->mdatetime);
            echo " Year:" . $mdatetime['year'] . ", ";
            echo "Month:" . $mdatetime['month'] . ", ";
            echo "Date:" . $mdatetime['day'] . " \n";
            echo "\n";
        }
    }
	function testfunction($usrid){
		$this->load->helper("user");
		foreach(getuserbybranch() as $x){
			echo $x . "  \n";
		}
		echo "\n";
	}
	function testgetsubordinates(){
		$description = "class User_helper\n";
		$description.= "status:ok\n";
		$description.= "dipergunakana oleh :\n";
		$description.= "install_helper,modules/controllers/surveys,modules/controllers/suspects,";
		$description.= "modules/controllers/install_requests,modules/controllers/prospects,models/survey_request,";
		$description.= "modules/controllers/users,modules/controllers/preclients,modules/controllers/rpt\n";
		$arr = array();
		$this->load->helper("user");
		foreach(getsubordinates(62,$arr) as $x){
			echo $x."\n";
		}
	}
	function testgetusernamebyid($id){
		$description = "class User_helper\n";
		$description.= "menghasilkan nama user dengan parameter id user \n";
		$description.= "status:ok\n";
		$description.= "dipergunakana oleh :\n";
		$description.= "views/sales_reports farmer , suspectreport , surveyreport , installreport\n";
		$this->load->helper("user");
		echo getusernamebyid($id)."\n";
	}
	function testgetuserchildren($z){
		$description = "class User_helper\n";
		$description.= "menghasilkan direct children dengan parameter id user \n";
		$description.= "status:ok\n";
		$description.= "dipergunakana oleh :\n";
		$description.= "suspect_helper \n";
		$this->load->helper("user");
		foreach(getuserchildren($z) as $x){
			echo $x."\n";
		}
	}
	function testgetfieldbyusername(){
		$description = "class User_helper\n";
		$description.= "menghasilkan nilai dari field pada table users dengan parameter id user dan field \n";
		$description.= "status:ok\n";
		$description.= "dipergunakana oleh :\n";
		$description.= "views/TS/troubleshoots/entry_report,views/TS/surveys/edit,views/TS/installs/edit,";
		$description.= "views/CRO/troubleshoots/entry_report \n";
		$this->load->helper("user");
		foreach($this->db->list_fields("users") as $field){
			if($field!=="pic"){
				echo "\n" . $field . " : " . getfieldbyusername("puji",$field)."\n";
			}
		}
	}
	function testgetuserbranches(){
		$description = "class User_helper\n";
		$description.= "menghasilkan id dari cabang-cabang yang terasosiasi dengan user dengan parameter id user \n";
		$description.= "TEST PADA BROWSER";
		$description.= "status:ok\n";
		$description.= "dipergunakana oleh :\n";
		$description.= "client_helper,survey_helper,ticket_helper,report_helper,install_helper,troubleshoot_helper,";
		$description.= "modules/controllers/surveys,modules/controllers/tickets,modules/controllers/survey_requests,";
		$description.= "modules/controllers/schedules,modules/controllers/clients,modules/controllers/rpt \n";		
		$this->load->helper("user");
		foreach(getuserbranches() as $x){
			echo $x . "\n";
		}
	}
	function testgetbranches(){
		$description = "class User_helper\n";
		$description.= "menghasilkan nama cabang-cabang \n";
		$description.= "status:ok\n";
		$description.= "dipergunakana oleh :\n";
		$description.= "client_helper,modules/controllers/users,modules/controllers/clients,modules/controllers/client_sites";
		$this->load->helper("user");
		foreach(getbranches() as $x){
			echo $x."\n";
		}
	}
	function testgetgroups(){
		$description = "class User_helper\n";
		$description.= "menghasilkan nama group-group \n";
		$description.= "status:ok\n";
		$description.= "dipergunakana oleh :\n";
		$description.= "modules/controllers/users";
		$this->load->helper("user");
		foreach(getgroups() as $group){
			echo $group."\n";
		}
	}
	function testgetfb($clientsiteid){
		$this->load->helper("subscription");
		echo getfb($clientsiteid);
	}
	function testgetfbfees($clientsiteid){
		$this->load->helper("subscription");
		echo "MONTHLY\n";
		foreach(getfbfees($clientsiteid,"monthly") as $key=>$val){
			echo $key . " => " . $val . "\n";
		}
		echo "DEVICE\n";
		foreach(getfbfees($clientsiteid,"device") as $key=>$val){
			echo $key . " => " . $val . "\n";
		}
		echo "SETUP\n";
		foreach(getfbfees($clientsiteid,"setup") as $key=>$val){
			echo $key . " => " . $val . "\n";
		}
		echo "DEPOSIT\n";
		foreach(getfbfees($clientsiteid,"deposit") as $key=>$val){
			echo $key . " => " . $val . "\n";
		}
	}
	function testgetfbs($clientid){
		$this->load->helper("subscription");
		$ci = & get_instance();
		echo "\n";
		foreach(getfbs($clientid) as $fb){
			foreach($ci->db->list_fields("fbs") as $field){
				echo $fb->name . "\n";
			}
		}
	}
	function testgetnamebyclientid($clientid){
		$this->load->helper("subscription");
		$ci = & get_instance();
		echo "\n";
		echo getnamebyclientid($clientid)."\n";
	}
	function testgeneratefb($clientid){
		$this->load->helper("subscription");
		echo "Jumlah FB : ".generatefb($clientid)."\n";
	}
	function trialneedapproval(){
		$this->load->helper("otp");
		$otp = getotp();
		$params = array(
			"otp"=>$otp,
			"expiredate"=>"2017-5-20",
			"sale_id"=>1,
			"createuser"=>"booo",
			"createdate"=>"2017-5-17"
		);
		saveotp($params);
		sendotp($params);
	}
	function testrecotp($otp){
		$this->load->helper("otp");
		recotp($otp);
	}
	function testisexpired($otp){
		$this->load->helper("otp");
		isexpired($otp);
	}
	function testgetuserssupervised($id){
		$this->load->helper("user");
		foreach(getuserssupervised($id) as $key=>$val){
			echo $key . " and " . $val . "\n";
		};
	}
	function testgettrials(){
		$this->load->model("ptrial");
		$result = $this->ptrial->gettrials();
		foreach($result as $res){
			echo $res->name . "<br />";
		}
	}
	function testmaintenanceremove(){
		$this->load->model("pmaintenanceschedule");
		echo $this->pmaintenanceschedule->removemaintenanceschedule(1);
	}
}
