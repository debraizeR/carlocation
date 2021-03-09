<?php 

class Main_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_cars()
    {
        $cars = $this->db->get("car");
        return $cars->result();
    }

    public function get_profile($id)
    {
        $profile = $this->db->get_where("userloc", array("u_id" => $id));
        return $profile->result();
    }

    public function get_profile_login($data)
    {
        $profile = $this->db->get_where("userloc", $data);
        return $profile->result();
    }


    public function get_location_by_id($id) // non utilisé
    {
        $locations = $this->db->get_where("location", array("l_id" => $id));
        return $locations->result();
    }

    public function get_location_by_user($login)
    {
        $this->db->join("car", "location.c_id = car.c_id", "inner");
        $this->db->join("userloc", "location.u_id = userloc.u_id", "inner" );
        $location = $this->db->get_where("location", array("u_login" => $login));
        return $location->result();
    }

    public function get_location_non_valid()
    {
        $this->db->join("car", "location.c_id = car.c_id", "inner");
        $this->db->join("userloc", "location.u_id = userloc.u_id", "inner");
        $location = $this->db->get_where("location", array("l_isValid" =>0));
        return $location->result();
    }

    public function get_location_non_return()
    {
        $this->db->join("car", "location.c_id = car.c_id", "inner");
        $this->db->join("userloc", "location.u_id = userloc.u_id", "inner");
        $location = $this->db->get_where("location", array("l_isValid" =>1, "l_isReturn"=>0));
        return $location->result();
    }

    public function insert_user($data)
    {
        $this->db->insert("userloc", $data);
    }
}