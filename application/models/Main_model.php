<?php 

class Main_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    //SECTION CARS 

    public function get_cars()
    {
        $cars = $this->db->get("car");
        return $cars->result();
    }

    public function get_car_by_id($id)
    {
        $car = $this->db->get_where("car", array("c_id" =>$id));
        return $car->result();
    }

    public function get_cars_by_date($startdate, $enddate)
    {
        $query = "SELECT * FROM car WHERE c_id NOT IN (
            SELECT DISTINCT(car.c_id) FROM car 
            INNER JOIN location on car.c_id = location.c_id
            WHERE (('".$startdate."'  BETWEEN l_startdate AND l_enddate)
            OR ('".$enddate."' BETWEEN l_startdate AND l_enddate)
            OR (l_startdate BETWEEN '".$startdate."' AND '".$enddate."')
            OR (l_enddate  BETWEEN '".$startdate."' AND '".$enddate."')) AND l_isReturn = 0
            )";
        $cars = $this->db->query($query);
        return $cars->result();
    }

    public function get_gearbox_list()
    {
        $this->db->distinct();
        $this->db->select("c_gearbox");
        $gearbox = $this->db->get("car");
        return $gearbox->result();
    }

    public function get_fuel_list()
    {
        $this->db->distinct();
        $this->db->select("c_fuel");
        $fuel = $this->db->get("car");
        return $fuel->result();
    }

    public function insert_car($data)
    {
        $this->db->insert("car", $data);
    }

    public function update_car($id, $data)
    {
        $this->db->where(array("c_id"=>$id));
        $this->db->update("car", $data);
    }

    public function get_manufacter()
    {
        $manufacter = $this->db->get("manufacter");
        return $manufacter->result();
    }

    public function get_manufacter_by_name($name)
    {
        $manufacter = $this->db->get_where("manufacter", array("m_name" => $name));
        return $manufacter->result();
    }

    public function delete_car($id)
    {
        $this->db->delete("car", array("c_id" => $id));
    }

    //SECTION PROFILE/USER

    public function get_all_profiles()
    {
        $profiles = $this->db->get_where("userloc", array("u_admin" => 0));
        return $profiles->result();
    }

    public function get_profile_by_login($login)
    {
        $profile = $this->db->get_where("userloc", array("u_login"=>$login));
        return $profile->result();
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

    public function insert_user($data)
    {
        $this->db->insert("userloc", $data);
    }

    public function update_user($data)
    {
        $this->db->where("u_id", $this->session->id);
        $this->db->update("userloc", $data);
    }

    public function delete_user($id)
    {
        $this->db->where(array("u_id"=>$id, "u_admin" => 0));
        $this->db->delete("userloc");
    }

    //SECTION LOCATION

    public function get_all_locations()
    {
        $this->db->join("car","location.c_id = car.c_id", "inner");
        $this->db->join("userloc", "location.u_id = userloc.u_id", "inner");
        $locations = $this->db->get_where("location", array("l_isValid" => 1, "l_isReturn" => 1));
        return $locations->result();
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

    public function get_current_location($login)
    {
        $today = date("Y-m-d");

        $this->db->join("car", "location.c_id = car.c_id", "inner");
        $this->db->join("userloc", "location.u_id = userloc.u_id", "inner" );
        $this->db->where("u_login", $login);
        $this->db->where("l_startdate <", $today);
        $this->db->where("l_enddate >", $today);
        $location = $this->db->get("location");
        return $location->result();
    }

    public function get_past_location($login)
    {
        $today = date("Y-m-d");
        $this->db->join("car", "location.c_id = car.c_id", "inner");
        $this->db->join("userloc", "location.u_id = userloc.u_id", "inner" );
        $this->db->where("u_login", $login);
        $this->db->where("l_enddate <", $today);
        $location = $this->db->get("location");
        return $location->result();
    }

    public function get_next_location($login)
    {
        $today = date("Y-m-d");
        $this->db->join("car", "location.c_id = car.c_id", "inner");
        $this->db->join("userloc", "location.u_id = userloc.u_id", "inner" );
        $this->db->where("u_login", $login);
        $this->db->where("l_startdate >", $today);
        $location = $this->db->get("location");
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

    public function valid_loc($id)
    {
        $this->db->where(array("l_id" =>$id));
        $this->db->update("location", array("l_isValid" => 1));
    }

    public function return_loc($id)
    {
        $this->db->where(array("l_id" => $id));
        $this->db->update("location", array("l_isReturn" => 1));
    }

    public function delete_location($id)
    {
        $this->db->delete("location", array("l_id" => $id));
    }

    public function insert_location()
    {
        $data = array("l_startdate" =>$this->session->startdate, "l_enddate" => $this->session->enddate, "l_addkilometer" => NULL, 
        "l_isValid" => 0, "l_isReturn" => 0, "u_id" => $this->session->id, "c_id" => $this->session->car_id);
        $this->db->insert("location", $data);
    }

    //SECTION PAYMENT

    public function get_payment($id)
    {
        $payment = $this->db->get_where("payment", array("u_id" => $id));
        return $payment->result();
    }

    public function get_payment_by_cardnumber($cardnumber, $id)
    {
        $payment = $this->db->get_where("payment", array("p_cardnumber"=>$cardnumber,"u_id"=>$id));
        return $payment->result();
    }

    public function insert_payment($data)
    {
        $this->db->insert("payment", $data);
    }
    
}