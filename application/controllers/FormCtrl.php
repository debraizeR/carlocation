<?php 

class FormCtrl extends CI_Controller
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
        if(null !== $this->uri->segment(2) && $this->uri->segment(2) === "update")
        {
            if(isset($this->session->id))
            {
                $data["user"] = $this->Main_model->get_profile($this->session->id); //get_profile($this->session->id)
                $this->load->view("form", $data);
            }
            else
            {
                redirect(base_url()."form");
            }
        }
        else
        {
            $this->load->view("form");
        }
        $this->load->view("footer");
    }

    public function form_validation()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("login", "login", "required");
        $this->form_validation->set_rules("password", "password", "required");
        $this->form_validation->set_rules("lastname", "lastname", "required");
        $this->form_validation->set_rules("firstname", "firstname", "required");
        $this->form_validation->set_rules("birthdate", "birthdate", "required");
        $this->form_validation->set_rules("yearlicence", "yearLicence", "required");
        $this->form_validation->set_rules("address", "address", "required");
        $this->form_validation->set_rules("zipcode", "zipcode", "required");
        $this->form_validation->set_rules("city", "city", "required");
        $this->form_validation->set_rules("phone", "phone", "required");
        $this->form_validation->set_rules("mail", "mail", "required");
        if($this->form_validation->run())
        {
            $data = array(
                "u_login" =>$this->input->post("login"),
                "u_password" =>$this->input->post("password"),
                "u_lastname" =>$this->input->post("lastname"),
                "u_firstname" =>$this->input->post("firstname"),
                "u_birthdate" =>$this->input->post("birthdate"),
                "u_yearLicence" =>$this->input->post("yearlicence"),
                "u_address" =>$this->input->post("address"),
                "u_zipcode" =>$this->input->post("zipcode"),
                "u_city" =>$this->input->post("city"),
                "u_phone" =>$this->input->post("phone"),
                "u_mail" =>$this->input->post("mail"),
            );

            if($this->input->post("insert"))
            {
                $this->Main_model->insert_user($data);
                $login = array("login"=> $this->input->post("login"));
                $password = array("password"=>$this->input->post("password"));
                $this->session->set_userdata($login);
                $this->session->set_userdata($password);
                redirect(base_url()."profile");
            }
            elseif($this->input->post("update"))
            {
                $this->Main_model->update_user($data);
                $login = array("login"=> $this->input->post("login"));
                $password = array("password"=>$this->input->post("password"));
                $this->session->set_userdata($login);
                $this->session->set_userdata($password);
                redirect(base_url()."profile");

            }
            else{
                redirect(base_url());
            }
        }
        else
        {
            $this->view();
        }
    }
}