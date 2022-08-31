<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
	}

	public function index($id)
	{   
        $data=$this->User_model->getUser($id);
		$this->load->view('user/edit',$data);
	}

	public function update($id){
		$nombre = $this->input->post("nombre");
		$apellido = $this->input->post("apellido");
		$direccion = $this->input->post("direccion");
		$movil = $this->input->post("movil");
		$email = $this->input->post("email");
		$fecha_creacion = $this->input->post("fecha_creacion");
		$dpi = $this->input->post("dpi");
		$user = $this->input->post("user");
		$inactivo = $this->input->post("inactivo");
		
        
        $data=$this->User_model->getUser($id);

        $validateEMail="";
        
        if($email!=$data->email){
            $validateEMail="|is_unique[alumno.email]";
        }
	
		$this->form_validation->set_rules('nombre', 'Nombre');
		$this->form_validation->set_rules('apellido', 'Apellido');
		$this->form_validation->set_rules('direccion', 'Direccion');
		$this->form_validation->set_rules('movil', 'telefono');
		$this->form_validation->set_rules('email', 'Correo eléctronico', 'required|valid_email'.$validateEMail);
		$this->form_validation->set_rules('inactivo', 'Estado');
		$this->form_validation->set_rules('dpi', 'Dpi', 'required|min_length[15]');
		
		if ($this->form_validation->run() == FALSE){
			$this->index($id);
		}else{
			$data = array(
				
				
				"nombre"=>$nombre,
				"apellido"=>$apellido,
				"direccion"=>$direccion,
				"movil"=>$movil,
				"email"=>$email,
				"user"=>$user,
				"inactivo"=>$inactivo,
				"dpi"=>$dpi,
                
			);
			
			$this->User_model->update($data,$id);
			$this->session->set_flashdata('success', 'El registro se actualizó correctamente');
			redirect(base_url()."usuarios");
		}
	}
}
