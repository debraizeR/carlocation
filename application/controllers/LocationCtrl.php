<?php 

class LocationCtrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->helper("url_helper");
    }

    public function view()
    {
        $this->load->view("header");

        if(isset($this->session->startdate) && isset($this->session->enddate) && isset($this->session->car_id))
        {
            $data["cars"] = $this->Main_model->get_car_by_id($this->session->car_id);

            if(isset($this->session->login) && isset($this->session->password))
            {
                $profile = array("u_login" => $this->session->login, "u_password" => $this->session->password);
                $data["profiles"] = $this->Main_model->get_profile_login($profile);
            }

            $this->load->view("location", $data);
        }
        else
        {
            redirect(base_url()."carslist");
            
        }
        $this->load->view("footer");
    }

    public function viewConfirm()
    {
        if(isset($this->session->startdate) && isset($this->session->enddate) && isset($this->session->car_id))
        {
            $this->session->unset_userdata("startdate");
            $this->session->unset_userdata("enddate");
            $this->session->unset_userdata("car_id");
            $this->load->view("header");
            $this->load->view("confirmLocation");
            $this->load->view("footer");
        }
        else
        {
            redirect(base_url()."carslist");
        }
        
    }

    public function cancer_location()
    {
        $this->session->unset_userdata("startdate");
        $this->session->unset_userdata("enddate");
        $this->session->unset_userdata("loc_url");
        $this->session->unset_userdata("car_id");
        redirect(base_url()."carslist");
    }

    public function confirm()
    {
        if(isset($this->session->startdate) && isset($this->session->enddate) && isset($this->session->id) && isset($this->session->car_id))
        {
            $this->Main_model->insert_location();
            $this->session->unset_userdata("loc_url");            
            redirect(base_url()."viewConfirm");
        }
        else
        {
            echo "echec";
        }
        
    }
}