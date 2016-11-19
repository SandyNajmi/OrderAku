<?php
  $mysql = new mysqli('localhost','root','','orderaku');
  $q = isset($_POST['query']) ? $mysql->real_escape_string($_POST['query']) : '';

  $result = $mysql->query("select * from skill_lists where skill_name like '%" . $q ."%'");
  $rows = array();
  while($row = $result->fetch_array(MYSQL_ASSOC)) {
      $rows[] = array_map("utf8_encode", $row);
  }
  echo json_encode($rows);
  $result->close();
?>
