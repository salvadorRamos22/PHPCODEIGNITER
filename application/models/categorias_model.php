<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	
	public function getCategoria()
	{
          $this->db->where("estado","1");
          $resultados = $this->db->get("categoria");
          return $resultados->result();
     } 
     
     public function save($data){
          return $this->db->insert("categoria",$data);
     }

     public function getCat($id){
          $this->db->where("id",$id);
          $resultado = $this->db->get("categoria");
          return $resultado->row();
     }

     public function update($id,$data){
          $this->db->where("id",$id);
          return $this->db->update("categoria",$data);
     }
}