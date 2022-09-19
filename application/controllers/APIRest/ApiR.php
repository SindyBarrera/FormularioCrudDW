<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/* access library REST_Controller, remember is library is a REST Server resource*/
require APPPATH . 'libraries/REST_Controller.php';


class ApiR extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelApi', 'use');  
        $this->load->library('encryption');      
    }


    public function get_token($longitud) 
    {
        $token = "";
        $alphabeth = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for ($i = 0; $i < $longitud; $i++){
            $token .= $alphabeth[mt_rand(0, strlen($alphabeth)-1)];
        }

        return $token;
    }

    public function index_post()
    {

        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $correo = $this->input->post('correo');
        $carrera = $this->input->post('carrera');
        $anio = $this->input->post('anio');
        $correlativo = $this->input->post('correlativo');
        $token = $this->get_token(8);
        $password = $this->encryption->encrypt($this->input->post('password'));


        while(!$this->use->token_exists($token)){
            $token = $this->get_token(8);
        }

        $data = array(

            'nombre' => $nombre,
            'apellido' => $apellido,
            'correo' => $correo,
            'carrera' => $carrera,
            'anio' => $anio,
            'correlativo' => $correlativo,
            'token' => $token,
            'password' => $password
            

        );

        $insert = $this->use->guardar($data);
        $http_codigo = 0; 
        if($insert) {
            $http_codigo = 200;
            $res['error'] = false;
            $res['message'] = 'insert success';
            $res['data'] = $data;
        } else {
            $res['error'] = true;
            $res['message'] = 'insert failed';
            $res['data'] = null;
            $http_codigo = 400;
        }

        $this->response($res, $http_codigo);        
    }

public function login_post()
    {
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');
        
        $val = $this->use->get_pass($usuario);

        $desencrypted_pass = '';
        $data = array('NULL');

        if (!empty($val)){
            $encrypted_pass = $val[0]->password;
            $nombre = $val[0]->nombre;
            $apellido = $val[0]->apellido;
            $desencrypted_pass = $this->encryption->decrypt($encrypted_pass); 
            $data = array(
                'nombre' => $nombre, 
                'apellido' => $apellido, 
            );
        }
        
        $http_code = 200;
        if ($desencrypted_pass != ''){
            if ($desencrypted_pass === $password) 
            {
                $res['error'] = false;
                $res['message'] = 'password correcto';
                $res['data'] = $data;
                $this->load->view('user/bienvenida',$res);
            } else {
                $res['error'] = true;
                $res['message'] = 'password fallido';
                $res['data'] = $data;
                $this->response($res, $http_code); 
            }
        }else{
            $res['error'] = true;
            $res['message'] = 'password fallido';
            $res['data'] = $data;
            $this->response($res, $http_code); 
        }
    }



}