<?php
	function get_zabbixservices(){			
		$api = new ZabbixApi('http://202.6.233.15/zabbix/api_jsonrpc.php', 'puji', 'pujicute2016');
		$graphs = $api->serviceget();
		$out = array();
		//echo "bismillah";
		foreach($graphs as $graphid=>$graph){
			//echo "GRAPHID".$graphid."<br />";
			//$out[$graph["serviceid"]] = $graph["name"];
			$out[$graph->serviceid]=$graph->name;
/*			foreach($graph as $key=>$val){
				echo $key . " and " . $val . "<br />";
			}*/
		}
		return $out;
	}
	function get_zabbixgraphid(){			
		$api = new ZabbixApi('http://202.6.233.15/zabbix/api_jsonrpc.php', 'puji', 'pujicute2016');		
		$graphs = $api->graphGet();
		$out = array();
		foreach($graphs as $items){
			//echo "GRAPHID".$items->graphid . "<br />";
			array_push($out,$items->graphid);
		}
		return $out;
	}
