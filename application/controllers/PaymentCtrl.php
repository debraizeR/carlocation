<?php

class PaymentCtrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->helper("url_helper");
    }

    public function view()
    {
        if(isset($this->session->id))
        {
            $paymentTest = $this->Main_model->get_payment($this->session->id);
            if(!isset($paymentTest))
            {
                redirect(base_url()."profile");
            }
            else
            {
                $this->load->view("header");
                $this->load->view("payment");
                $this->load->view("footer");
            }
        }
        else
        {
            redirect(base_url()."profile");
        }
    }

    public function form_validation()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("cardnumber", "cardnumber", "required|numeric|exact_length[16]", array("numeric"=>"Format de code non valide.", "exact_length"=> "Numéros insuffisants."));
        $this->form_validation->set_rules("enddate", "enddate", "required");
        $this->form_validation->set_rules("cryptogram", "cryptogram", "required|numeric|exact_length[3]", array("numerci"=>"Format de code non valide.", "exact_length"=>"Numéros insuffisants."));
        if($this->form_validation->run())
        {
            $data = array(
                "p_cardnumber" => $this->input->post("cardnumber"),
                "p_enddate" => $this->input->post("enddate"),
                "p_cryptogram" => $this->input->post("cryptogram"),
                "u_id" => $this->session->id
            );

            if($this->input->post("insert"))
            {
                $this->Main_model->insert_payment($data);
                redirect(base_url()."profile");
            }
        }
    }
}