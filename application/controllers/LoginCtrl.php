<?php 

class LoginCtrl extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->helper("url_helper");
    }

    public function view()
    {
        $this->load->view("header");
        $this->load->view("login");
        $this->load->view("footer");
    }

    public function form_validation()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("login", "login", "required");
        $this->form_validation->set_rules("password", "password", "required");
        if($this->form_validation->run())
        {
            $data = array(
                "u_login" => $this->input->post("login"),
                "u_password" => $this->input->post("password"),
            );
            if($this->input->post("loginConfirm"))
            {
                $profile = $this->Main_model->get_profile_login($data);
                if(isset($profile[0]))
                {
                    $idProfile = array("id"=>$profile[0]->u_id);
                    $logProfile = array("login"=>$profile[0]->u_login);
                    $passwordProfile = array("password"=>$profile[0]->u_password);
                    $this->session->set_userdata($idProfile);
                    $this->session->set_userdata($logProfile);
                    $this->session->set_userdata($passwordProfile);
                    if(isset($this->session->loc_url))
                    {
                        redirect($this->session->loc_url);
                    }
                    else
                    {
                        redirect(base_url()."profile");
                    }
                }
                else
                {
                    $testLogin = $this->Main_model->get_profile_by_login($this->input->post("login"));
                    if(isset($testLogin[0]))
                    {
                        $this->session->set_userdata("error_password", "Mot de passe incorrect");
                    }
                    else
                    {
                        $this->session->set_userdata("error_login", "Identifiant incorrect");
                    }
                    
                    redirect(base_url()."login");
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }
}