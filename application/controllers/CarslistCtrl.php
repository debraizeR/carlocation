<?php 

class CarslistCtrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->helper("url_helper");
    }

    public function view()
    {
        if(isset($this->session->startdate) && isset($this->session->enddate))
        {
            $data["cars"] = $this->Main_model->get_cars_by_date($this->session->startdate, $this->session->enddate);
        }
        else
        {
            $today = date("Y-m-d");
            $tomorrow = strtotime($today."+ 1 days");
            $tomorrow = date("Y-m-d", $tomorrow);
            $data["cars"] = $this->Main_model->get_cars_by_date(date("Y-m-d"), date("Y-m-d"));
        }
        
        $this->load->view("header");
        $this->load->view("carslist", $data);
        $this->load->view("footer");
    }

    public function form_validation()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("startDate", "startDate", "required");
        $this->form_validation->set_rules("endDate", "endDate", "required");

        if($this->form_validation->run())
        {
            $data = array(
                "l_startdate" => $this->input->post("startDate"),
                "l_enddate" =>$this->input->post("endDate")
            );
            if($this->input->post("confirmDate"))
            {
                $startdate = array("startdate"=> $this->input->post("startDate"));
                $enddate = array("enddate" =>$this->input->post("endDate"));
                $this->session->set_userdata($startdate);
                $this->session->set_userdata($enddate);
                redirect(base_url()."carslist");
            }

        }
    }

    public function choose_car()
    {
        if(isset($this->session->startdate) && isset($this->session->enddate))
        {
            $this->session->set_userdata("car_id", $this->uri->segment(2));
        }
        redirect(base_url()."location");
    }
}