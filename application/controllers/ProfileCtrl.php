<?php 

class ProfileCtrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->helper("url_helper");
    }

    public function view()
    {
        $profileSession = array("u_login"=>$this->session->login, "u_password"=>$this->session->password);
        $data["profiles"] = $this->Main_model->get_profile_login($profileSession);
        
        $this->load->view("header");
        if(isset($this->session->login) && isset($this->session->password))
        {
            if($data["profiles"][0]->u_admin == 0)
            {
                $data["locations"] = $this->Main_model->get_location_by_user($this->session->login);//get_location_by_user($data["profiles"][0]->u_id);
                $this->load->view("profile", $data);
            }
            elseif($data["profiles"][0]->u_admin == 1)
            {
                $data["locations"] = $this->Main_model->get_location_non_valid();
                $data["locationsReturn"] = $this->Main_model->get_location_non_return();
                $this->load->view("profileAdmin", $data);
            }
            else
            {
                redirect(base_url());
            }
        }
        else
        {
            redirect(base_url()."login");
        }
        
        
        $this->load->view("footer");
    }

    public function delete_location()
    {
        $this->db->delete("location", array("l_id" => $this->uri->segment(2)));
        redirect(base_url()."profile");
    }


}