<?php 


class FormcarCtrl extends CI_Controller
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
        $data["gearbox"] = $this->Main_model->get_gearbox_list();
        $data["fuel"] = $this->Main_model->get_fuel_list();
        $data["manufacter"] = $this->Main_model->get_manufacter();
        if(!isset($this->session->admin) || (isset($this->session->admin) && $this->session->admin != 1))
        {
            redirect(base_url()."profile");
        }

        if(null != $this->uri->segment(2) && intval($this->uri->segment(2)) != 0 )
        {
            $cars = $this->Main_model->get_car_by_id($this->uri->segment(2)); 
            if($cars != null)
            {
                $data["cars"] = $cars;
            }   
        }
        $this->load->view("formcar", $data);

        $this->load->view("footer");
    }



    public function form_validation()
    {
        $this->load->library("form_validation");
        $config['upload_path']          = 'assets/img';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                if(isset($this->session->c_id))
                {
                    $config['file_name'] = "car".$this->session->c_id.".png";
                }
                else{
                    $config['file_name'] = "car_temp.png";
                }
                $config['max_size']             = 100000;
                $config['max_width']            = 102400;
                $config['max_height']           = 768000;
        $this->load->library('upload', $config);

        $this->form_validation->set_rules("model", "model", "required");
        $this->form_validation->set_rules("numberplate", "numberplate", "required");
        $this->form_validation->set_rules("gearbox", "gearbox", "required");
        $this->form_validation->set_rules("kilometer", "kilometer", "required");
        $this->form_validation->set_rules("color", "color", "required");
        $this->form_validation->set_rules("fuel","fuel", "required");
        $this->form_validation->set_rules("year", "year", "required");
        $this->form_validation->set_rules("cost", "cost", "required");
        $this->form_validation->set_rules("manufacter", "manufacter", "required");

        if($this->form_validation->run())
        {
            $manu = $this->Main_model->get_manufacter_by_name($this->input->post("manufacter"));
            $data = array(
                "c_model" => $this->input->post("model"),
                "c_numberPlate" => $this->input->post("numberplate"),
                "c_gearbox" => $this->input->post("gearbox"),
                "c_kilometer" => $this->input->post("kilometer"), 
                "c_color" => $this->input->post("color"),
                "c_fuel" => $this->input->post("fuel"),
                "c_year" => $this->input->post("year"),
                "c_cost" => $this->input->post("cost"),
                "m_id" => $manu[0]->m_id
            );
            

            if ($this->upload->do_upload('carfile') == true)
                {
                    $data["c_filename"] = $this->upload->data('file_name');
                }


            if($this->input->post("insert"))
            {
                $this->Main_model->insert_car($data);
                redirect(base_url()."profile");
            }
            elseif($this->input->post("update"))
            {
                $this->Main_model->update_car($this->session->c_id, $data);
                $this->session->unset_userdata("c_id");
                redirect(base_url()."profile");
            }
            else
            {
                redirect(base_url()."formcar");
            }
        }
    }
}