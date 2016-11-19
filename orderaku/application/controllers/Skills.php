<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    //$this->load->model('skill_m');
  }

  function getskill()
  {
    $keyword = $this->uri->segment(3);

    $sql = "select * from skill_lists where skill_name like '%$keyword%'";
    $result = $this->db->query($sql);
    $rows = array();

    foreach ($result->result_array() as $row) {
      $rows[] = $row;
    }

    echo json_encode($rows);
  }

}
