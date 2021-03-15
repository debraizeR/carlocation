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

        $this->form_validation->set_rules("login", "login", "required|alpha_numeric", array("alpha_numeric" => "Format d'identifiant non valide"));
        $this->form_validation->set_rules("password", "password", "required|regex_match[/^[\w\'\-\ ]*$/]", array("regex_match" => "Format de mot de passe non valide"));
        $this->form_validation->set_rules("lastname", "lastname", "required|regex_match[/^[\w]{1}[\w\'\-\ ]*[\w]$/]", array("regex_match"=> "Format de nom non valide"));
        $this->form_validation->set_rules("firstname", "firstname", "required|alpha_dash", array("alpha_dash" => "Format de prénom non valide."));
        $this->form_validation->set_rules("birthdate", "birthdate", "required");
        $this->form_validation->set_rules("yearlicence", "yearLicence", "required|regex_match[/^[\d]{1,2}$/]", array("regex_match" => "Format non valide"));
        $this->form_validation->set_rules("address", "address", "required|regex_match[/^[\d]+[\w\'\-\ ]+[\w]{1}$/]", array("regex_match"=>"Format d'adresse non valide"));
        $this->form_validation->set_rules("zipcode", "zipcode", "required|regex_match[/^\d{5}$/]", array("regex_match"=> "Format de code postal non valide" ));
        $this->form_validation->set_rules("city", "city", "required|regex_match[/^[\w]{1}[\w\'\-\ ]*[\w]$/]", array("regex_match"=>"Format de nom de ville non valide"));
        $this->form_validation->set_rules("phone", "phone", "required|regex_match[/^0{1}[\d]{9}$/]", array("regex_match" => "Format de numero de telephone non valide"));
        $this->form_validation->set_rules("mail", "mail", "required|valid_email", array("valid_email"=>"Format d'adresse mail non valide" ));
        if($this->form_validation->run())
        {
            $data = array(
                "u_login" =>htmlspecialchars($this->input->post("login"), ENT_NOQUOTES),
                "u_password" =>htmlspecialchars($this->input->post("password"), ENT_NOQUOTES),
                "u_lastname" =>htmlspecialchars($this->input->post("lastname"),ENT_NOQUOTES),
                "u_firstname" =>htmlspecialchars($this->input->post("firstname"),ENT_NOQUOTES),
                "u_birthdate" =>htmlspecialchars($this->input->post("birthdate"),ENT_NOQUOTES),
                "u_yearLicence" =>htmlspecialchars($this->input->post("yearlicence"),ENT_NOQUOTES),
                "u_address" =>htmlspecialchars($this->input->post("address"),ENT_NOQUOTES),
                "u_zipcode" =>htmlspecialchars($this->input->post("zipcode"),ENT_NOQUOTES),
                "u_city" =>htmlspecialchars($this->input->post("city"),ENT_NOQUOTES),
                "u_phone" =>htmlspecialchars($this->input->post("phone"),ENT_NOQUOTES),
                "u_mail" =>htmlspecialchars($this->input->post("mail"),ENT_NOQUOTES),
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