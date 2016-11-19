<?php
/*
 * model untuk hal yang berhubungan dengan skill
 * dibuat oleh: Misbahul Ardani
 * 7 November 2016
 * */

defined('BASEPATH') OR exit('No direct script access allowed');

class Skill_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  /*
   * fungsi untuk mengambil semua skill yang terdaftar pada tabel {skill_lists}
  */
  public function getSkillList()
  {
    $q = $this->input->post('query');

    $sql = "select * from skill_lists where skill_name like '%" . $q ."%'";
    $result = $this->db->query($sql);
    $rows = array();
    while($row = $result->result_array()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
  }

}
