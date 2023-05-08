<?php
 //Student 
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

 //SdtudenDAO
 class StudentDAO {
    private $students;

    public function __construct() {
        $this->students = array();
    }

    // Create
    public function addStudent($student) {
        $this->students[] = $student;
    }

    // read


    // Update
    public function updateStudent($student) {
        foreach ($this->students as $key => $s) {
            if ($s->getId() == $student->getId()) {
                $this->students[$key] = $student;
                break;
            }
        }
    }

    // Delete
    public function deleteStudent($id) {
        foreach ($this->students as $key => $s) {
            if ($s->getId() == $id) {
                unset($this->students[$key]);
                break;
            }
        }
        $this->students = array_values($this->students);
    }

    // getAll
    public function get_all_students() {
        return $this->students;
    }

}
?>