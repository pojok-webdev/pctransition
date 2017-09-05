<?php
class Maintenanceschedule extends CI_Model{
    function getschedules(){
        $sql = "select a.id,a.nameofmtype,a.maintenance_type,a.scheduletime,case maintenance_type when 'pelanggan' then b.name when 'datacenter' then c.name when 'bts' then d.name when 'datacenter' then e.name end nm,period_type,ispayable,mdatetime,a.createuser  from maintenances a left outer join clients b on b.id=a.nameofmtype left outer join backbones c on c.id=a.nameofmtype left outer join btstowers d on d.id=a.nameofmtype left outer join datacenters e on e.id=a.nameofmtype;";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        return $que->result();
    }
}