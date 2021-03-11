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

}