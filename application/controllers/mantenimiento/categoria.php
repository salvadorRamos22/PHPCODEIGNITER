<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

     public function __construct(){
          parent::__construct();
          $this->load->model("categorias_model");
     }

	public function index()
	{
          $data = array(
               'categorias' => $this->categorias_model->getCategoria(),
          );
          $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/list',$data);
		$this->load->view('layouts/footer');
     }
     
     public function agregar(){

          $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/agregar');
		$this->load->view('layouts/footer');
     }

     public function store(){
          $nombre = $this->input->post("nombre");
          $descripcion = $this->input->post("descripcion");
          
          $data = array(
               'nombre'=>$nombre,
               'descripcion'=>$descripcion,
               'estado'=>'1'
          );

          if($this->categorias_model->save($data)){
               redirect(base_url()."mantenimiento/categoria");
          }else{
               $this->session->set_flashdata("error","No se pudo guardar la informacion");
               redirect(base_url()."mantenimiento/categoria/agregar");
          }
     }

     public function editar($id){

          $data = array(
               'categoria'=>$this->categorias_model->getCat($id),
          );

          $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/editar',$data);
		$this->load->view('layouts/footer');
     }

     public function update(){
          $idcategoria = $this->input->post("idcategoria");
          $nombre = $this->input->post("nombre");
          $descripcion = $this->input->post("descripcion");

          $data = array(
               'nombre'=>$nombre,
               'descripcion'=>$descripcion,
          );

          if($this->categorias_model->update($idcategoria,$data)){
               redirect(base_url()."mantenimiento/categoria");
          }else{
               $this->session->set_flashdata("error","No se pudo actualizar el registro");
               redirect(base_url()."mantenimiento/categoria/editar".$idcategoria);
          }
     }

}