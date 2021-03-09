<?php 

class IndexCtrl extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function view()
    {
        $this->load->helper("url");
        $this->load->helper("html");
        $this->load->view("header");
        $this->load->view("index");
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
}