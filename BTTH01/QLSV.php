<?php
 //Lớp Sinh viên (Student) 
 class Student {
    private $id;
    private $name;
    private $age;

    public function __construct($id, $name, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    // getter and setter methods

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}

 //Lớp Danh sách Sinh viên (SdtudenDAO)
 class StudentDAO {
    private $students;

    public function __construct() {
        $this->students = array();
    }

    // thêm sinh viên
    public function addStudent($student) {
        $this->students[] = $student;
    }

    // cập nhật thông tin sinh viên
    public function updateStudent($student) {
        foreach ($this->students as $key => $s) {
            if ($s->getId() == $student->getId()) {
                $this->students[$key] = $student;
                break;
            }
        }
    }

    // xoá sinh viên
    public function deleteStudent($id) {
        foreach ($this->students as $key => $s) {
            if ($s->getId() == $id) {
                unset($this->students[$key]);
                break;
            }
        }
        $this->students = array_values($this->students);
    }

    // lấy danh sách sinh viên
    public function getAllStudents() {
        return $this->students;
    }
}

?>