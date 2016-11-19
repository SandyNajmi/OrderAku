<?php
/*
 * Controller untuk hal yang berhubungan dengan register
 * dibuat oleh: Misbahul Ardani
 * 7 November 2016
 * */

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
      $this->load->model('register_m');
  }

  function index()
  {
      $data['departments'] = $this->register_m->getDepartment();  // Digunakan untuk mengambil list data departemen
      $this->load->view('register', $data);
  }

  /*
   * fungsi untuk menangani proses register user
   * */
  function register_process()
  {

      $data = array(
          'username'    => $this->input->post('username'),
          'password'    => md5($this->input->post('password')),
          'name'        => $this->input->post('name'),
          'title'       => $this->input->post('title'),
          'phone'       => $this->input->post('phone'),
          'gender'      => $this->input->post('gender'),
          'birthdate'   => $this->input->post('birthdate'),
          'address'     => $this->input->post('address'),
          'about'       => $this->input->post('about'),
          'department'  => $this->input->post('department'),
          'user_skills' => $this->input->post('user_skills')
      );

      $data['photo'] = $this->upload_photo($this->input->post('username'));

      $result = $this->register_m->addUser($data);
      if ($result == true) {
          echo "SUKSES";
      } else {
          echo "GAGAL";
      }
  }

  /*
   * fungsi untuk menangani upload foto user
   * */
  function upload_photo($username)
  {
      $config['file_name']           = $username;
      $config['upload_path']         = './assets/img/profile';
      $config['allowed_types']       = 'gif|jpg|jpeg|png';

      $this->upload->initialize($config);
      if ($this->upload->do_upload('photo'))
      {
          return $this->upload->data('file_name');
      }
  }

}
