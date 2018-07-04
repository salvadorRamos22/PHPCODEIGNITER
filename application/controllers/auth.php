<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
public function __construct(){
     parent::__construct();
     $this->load->model("usuarios_model");
}

public function index()
{
     if($this->session->userdata("login")){
          redirect(base_url()."dashboard");
     }else{
          $this->load->view('admin/login');
     }
         
}
public function logout(){
     $this->session->sess_destroy();
     redirect(base_url());
}
public function login(){
     $email = $this->input->post("email");
     $password = $this->input->post("password");
     $pass = hash("sha256",$password,FALSE);
     $res=$this->usuarios_model->login($email,$pass);

     if(!$res){
          $this->session->set_flashdata("error"," email y/o password incorrecto");
          redirect(base_url());
     }
     else{
          $data= array(
               'id'=>$res->id,
               'nombre'=>$res->nombres,
               'rol'=>$res->rol_id,
               'login'=>TRUE
          );
          $this->session->set_userdata($data);
          redirect(base_url()."dashboard");
     }
}

public function registrar(){
     $this->load->view('admin/register');
}

public function addRegistrar(){
     $nombre = $this->input->post("nombre");
     $apellido = $this->input->post("apellido");
     $telefono = $this->input->post("telefono");
     $email = $this->input->post("email");
    /* $username = $this->input->post("username");*/
     $password = $this->input->post("password");
     $repetPassword = $this->input->post("repPassword");

     if($password != $repetPassword){
          redirect(base_url()."auth/registrar");
     }
     $username = $nombre.$email;
     $pass = hash("sha256",$password,FALSE);
     $data = array(
          'nombres'=>$nombre,
          'apellidos'=>$apellido,
          'telefonos'=>$telefono,
          'email'=>$email,
          'username'=>$username,
          'password'=>$pass,
     );

     if($this->usuarios_model->validarUsuario($email)){
          $this->session->set_flashdata("error","Este email ya esta en uso, utilice otro");
          redirect(base_url()."auth/registrar");
     }

     if($this->usuarios_model->registrarSave($data))
     {
          redirect(base_url()."auth");
     }else{
          $this->session->set_flashdata("error","No se pudo crear la cuenta,Vuelva a intentarlo");
          redirect(base_url()."auth/registrar");
     } 
     
     $loguear = $this->usuarios_model->login($email,$pass);
     if(!$loguear){
          $this->session->set_flashdata("error"," email y/o password incorrecto");
          redirect(base_url());
     }
     else{
          $data= array(
               'id'=>$res->id,
               'nombre'=>$res->nombres,
               'rol'=>$res->rol_id,
               'login'=>TRUE
          );
          $this->session->set_userdata($data);
          redirect(base_url()."dashboard");
     }

}

}