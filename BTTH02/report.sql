-- Tạo CSDL
CREATE DATABASE university;

-- Sử dụng CSDL
USE university;

-- Tạo bảng Sinh viên
CREATE TABLE Students (
  student_id INT PRIMARY KEY,
  student_name VARCHAR(100),
  date_of_birth DATE,
  email VARCHAR(100),
  contact_info VARCHAR(100)
);

-- Tạo bảng Khóa học
CREATE TABLE Courses (
  course_id INT PRIMARY KEY,
  course_code VARCHAR(20),
  course_title VARCHAR(100),
  course_description VARCHAR(200)
);

-- Tạo bảng Điểm danh
CREATE TABLE Attendance (
  attendance_id INT PRIMARY KEY,
  course_id INT,
  student_id INT,
  attendance_date DATE,
  attendance_status VARCHAR(20),
  FOREIGN KEY (course_id) REFERENCES Courses(course_id),
  FOREIGN KEY (student_id) REFERENCES Students(student_id)
);
