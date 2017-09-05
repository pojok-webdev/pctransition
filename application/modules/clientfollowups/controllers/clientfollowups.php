<?php
class Clientfollowups extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function remove(){
        $params = $this->input->post();
        $sql = "delete from clientfollowups where id=".$params['id'];
        $this->db->query($sql);
    }
    function save(){
        $params = $this->input->post();
        $sql = "insert into clientfollowups (client_id,followupdate,description) ";
        $sql.= "values ";
        $sql.= "('".$params['client_id']."','".$params["followupdate"]."','".$params['description']."')";
        $this->db->query($sql);
        echo $this->db->insert_id();
    }
}