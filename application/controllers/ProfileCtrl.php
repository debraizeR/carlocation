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
            $this->session->set_userdata("id", $data["profiles"][0]->u_id);
            if($data["profiles"][0]->u_admin == 0)
            {
                $data["locations"] = $this->Main_model->get_location_by_user($this->session->login);//get_location_by_user($data["profiles"][0]->u_id);
                $this->load->view("profile", $data);
            }
            elseif($data["profiles"][0]->u_admin == 1)
            {
                $data["all_profiles"] = $this->Main_model->get_all_profiles();
                $data["all_locations"] = $this->Main_model->get_all_locations();
                $data["cars"] = $this->Main_model->get_cars();
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
        $this->Main_model->delete_location($this->uri->segment(2));
        redirect(base_url()."profile");
    }

    public function admin_valid_loc()
    {
        $this->Main_model->valid_loc($this->uri->segment(2));
        redirect(base_url()."profile");
    }

    public function admin_return_loc()
    {
        $this->Main_model->return_loc($this->uri->segment(2));
        redirect(base_url()."profile");
    }

    public function admin_delete_car()
    {
        $this->Main_model->delete_car($this->uri->segment(2));
        redirect(base_url()."profile");
    }

    public function admin_delete_user()
    {
        $this->Main_model->delete_user($this->uri->segment(2));
        redirect(base_url()."profile");
    }
}