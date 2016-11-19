<?php
/*
 * model untuk hal yang berhubungan dengan register
 * dibuat oleh: Misbahul Ardani
 * 7 November 2016
 * */

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_m extends CI_Model{

  public function __construct()
  {
      parent::__construct();
      //Codeigniter : Write Less Do More
  }

  /*
   * fungsi untuk mendapatkan userID dari username tertentu
   * */
  public function getUserID($username)
  {
      $this->db->select('user_id');
      $this->db->where('username', $username);
      $result = $this->db->get('users')->result_array();
      return $result[0]['user_id']; // mendaptkan baris pertama user_id ( karena ya cuma 1 yang ingin didapatkan )
  }

  /*
   * fungsi untuk mendapatkan semua departemen yang terdaftar pada tabel {departments}
  */
  public function getDepartment()
  {
      $result = $this->db->get('departments');
      return $result->result();
  }

  /*
   * fungsi untuk menambahkan user baru dengan @parameter {array $data}
   */
  public function addUser($data)
  {
      $query = "INSERT INTO users (username, password, name, title, phone, gender, birthdate, address, about, photo, department_id)
                VALUES ('$data[username]', '$data[password]', '$data[name]', '$data[title]', '$data[phone]', '$data[gender]', '$data[birthdate]', '$data[address]', '$data[about]', '$data[photo]', '$data[department]')";

      $result = $this->db->query($query);

      $this->addSkills($data['username'], $data);

      if ($result) {
        return true;
      } else {
        return false;
      }
  }

  /*
   * funggsi untuk menambahkan skill yang dipilih pada form dengan dua parameter
   * $username  untuk mendapatkan nama username
   * $data      untuk mendapatkan array skill yang dipillih
  */
  public function addSkills($username, $data)
  {
      $userID = $this->getUserID($username);
      $data_skills = $data['user_skills'];

      $skill_total = count($data_skills);

      for ($i = 0; $i < $skill_total; $i++){
          $query = "INSERT INTO user_skills(user_id, skill_id, skill_name)
                VALUES ('$userID', '$i', '$data_skills[$i]')";

          $this->db->query($query);
      }

  }


}
