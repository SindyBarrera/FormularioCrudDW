<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
	}

	public function index()
	{
		$this->load->view('user/add');
	}

	public function save(){
		$nombre = $this->input->post("nombre");
		$apellido = $this->input->post("apellido");
		$direccion = $this->input->post("direccion");
		$movil = $this->input->post("movil");
		$email = $this->input->post("email");
		$inactivo = $this->input->post("inactivo");
		$dpi = $this->input->post("dpi");

		
		$this->form_validation->set_rules('nombre', 'Nombre');
		$this->form_validation->set_rules('apellido', 'Apellido');
		$this->form_validation->set_rules('direccion', 'direccion');
		$this->form_validation->set_rules('movil', 'telefono');
		$this->form_validation->set_rules('email', 'Correo eléctronico', 'required|valid_email|is_unique[alumnos.email]');
		$this->form_validation->set_rules('dpi', 'Dpi', 'required|min_length[15]');
		$this->form_validation->set_rules('inactivo', 'Estado');
		

		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/add');
		}else{
			$data = array(
					
				"nombre"=>$nombre,
				"apellido"=>$apellido,
				"direccion"=>$direccion,
				"movil"=>$movil,
				"email"=>$email,
				"inactivo"=>$inactivo,	
				"dpi"=>$dpi,	
				"user"=>1,	
			);
			
			$this->User_model->save($data);
			$this->session->set_flashdata('success', 'El registro se guardó correctamente');
			redirect(base_url()."usuarios");
		}
	}
}
