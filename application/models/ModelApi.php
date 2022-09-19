<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelApi extends CI_Model {
    
    public function guardar($dato){
        return $this->db->insert("tb_api", $dato);
    }

    public function token_exists($token){
        $this->db->select("*");
        $this->db->from("tb_api");
        $this->db->where("token", $token);
        $results=$this->db->get();
        return empty($results->result());
    }

    public function get_pass($usuario)
    {
        $this->db->select("u.password, u.nombre, u.apellido");
        $this->db->from("tb_api u");
        $this->db->where("u.correo",$usuario);
        $result=$this->db->get();
        return $result->result();
    }
    
}