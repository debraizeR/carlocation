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
        $data["cars"] = $this->Main_model->get_cars();
        $this->load->view("header");
        $this->load->view("carslist", $data);
        $this->load->view("footer");
    }
}