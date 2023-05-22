-- Tạo bảng Người dùng
CREATE TABLE Users (
  user_id INT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(100),
  role VARCHAR(20),
  FOREIGN KEY (user_id) REFERENCES Students(student_id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES Lecturers(lecturer_id) ON DELETE CASCADE
);

-- Tạo bảng Vai trò
CREATE TABLE Roles (
  role_id INT PRIMARY KEY,
  role_name VARCHAR(20)
);

-- Tạo bảng Phân quyền
CREATE TABLE Permissions (
  permission_id INT PRIMARY KEY,
  permission_name VARCHAR(50)
);

-- Tạo bảng Phân quyền cho từng vai trò
CREATE TABLE RolePermissions (
  role_id INT,
  permission_id INT,
  PRIMARY KEY (role_id, permission_id),
  FOREIGN KEY (role_id) REFERENCES Roles(role_id) ON DELETE CASCADE,
  FOREIGN KEY (permission_id) REFERENCES Permissions(permission_id) ON DELETE CASCADE
);
