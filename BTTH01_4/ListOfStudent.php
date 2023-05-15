<?php
class ListOfStudent extends Student {
  private $students;

  public function __construct() {
    $this->students = array();
  }

  public function addStudent($student) {
    array_push($this->students, $student);
  }

  public function removeStudent($index) {
    unset($this->students[$index]);
  }

  public function getStudent($index) {
    return $this->students[$index];
  }

  public function getAllStudents() {
    return $this->students;
  }
  //Hàm đọc file CSV
  public function readCSV($filename) {
    $file = fopen($filename, 'r');
    
      $data = array();
    	while (($row = fgetcsv($file)) !== false) {
    		$data[] = $row;
  		}
  		fclose($file);

    	// Hiển thị nội dung trong bảng trên trang Web
    	foreach ($data as $row) {
    			echo "<tr>";
    			foreach ($row as $cell) {
    				echo "<td>" . htmlspecialchars($cell) . "</td>";
    			}
    			echo "</tr>";
   		}
  }

}

?>