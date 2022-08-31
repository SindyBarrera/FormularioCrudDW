<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function save($data){
        $this->db->query("ALTER TABLE alumnos AUTO_INCREMENT 1");
        $this->db->insert("alumnos",$data);
    }

    public function getUsers(){
        $this->db->select("*");
        $this->db->from("alumnos");
        $results=$this->db->get();
        return $results->result();
    }

    public function getUser($id){
        $this->db->select("u.alumno, u.email, u.direccion, u.movil, u.dpi, u.nombre, u.apellido, u.inactivo, u.user");
        $this->db->from("alumnos u");
        $this->db->where("u.alumno",$id);
        $result=$this->db->get();
        return $result->row();
    }

    public function update($data,$id){
        $this->db->where("alumno",$id);
        $this->db->update("alumnos",$data);
    }

    public function delete($id){
        $this->db->where("alumno",$id);
        $this->db->delete("alumnos");
    }
    
}
