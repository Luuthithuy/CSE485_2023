<!DOCTYPE html>
<html>
<head>
	<title>Điểm danh</title>
</head>
<body>
	<h1>Khu vực điểm danh</h1>
	<form method="post" action="">
		<label for="student_id">Mã sinh viên:</label>
		<input type="text" id="student_id" name="student_id"><br>

		<label for="attendance_date">Ngày điểm danh:</label>
		<input type="date" id="attendance_date" name="attendance_date"><br>

		<label>
			<input type="radio" name="attendance_status" value="Có mặt">
			Có mặt
		</label>
		<br>
		<label>
			<input type="radio" name="attendance_status" value="Vắng mặt">
			Vắng mặt
		</label>
		<br>

		<button type="submit" name="submit">Lưu trạng thái</button>
	</form>
	<?php
		// Kết nối đến cơ sở dữ liệu
		$server = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'btth02';
        $conn = mysqli_connect($server,$user,$pass,$database);

		// Kiểm tra kết nối
		if ($conn->connect_error) {
			die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
		}

		// Kiểm tra xem nút submit đã được bấm hay chưa
		if (isset($_POST['submit'])) {
			// Lấy giá trị của mã sinh viên, ngày điểm danh và trạng thái điểm danh
			$student_id = $_POST['student_id'];
			$attendance_date = $_POST['attendance_date'];
			$attendance_status = $_POST['attendance_status'];
            $attendance_id = '';
            $course_id = 1;
			// Lưu trạng thái vào cơ sở dữ liệu
			$sql = "INSERT INTO attendance (attendance_id,attendance_date, course_id, student_id, attendance_status) VALUES ('$attendance_id','$attendance_date', '$course_id', '$student_id', '$attendance_status')";

			if ($conn->query($sql) == TRUE) {
				echo "<p>Bạn đã chọn trạng thái: " . $attendance_status . "</p>";
			} else {
				echo "Lỗi: " . $sql . "<br>" . $conn->error;
			}
		}

		// Lấy thông tin điểm danh từ cơ sở dữ liệu
		if (isset($_POST['submit'])) {
			$student_id = $_POST['student_id'];
			$attendance_date = $_POST['attendance_date'];

			$sql = "SELECT * FROM attendance WHERE student_id = '$student_id' AND attendance_date = '$attendance_date'";

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo "<h2>Thông tin điểm danh</h2>";
				echo "<table>";
				echo "<tr><th>Mã sinh viên</th><th> Ngày điểm danh</th><th> Trạng thái</th></tr>";

				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["student_id"] . "</td><td>" . $row["attendance_date"] . "</td><td>" . $row["attendance_status"] . "</td></tr>";
				}

				echo "</table>";
			} else {
				echo "<p>Chưa có thông tin điểm danh.</p>";
			}
		}

		// Đóng kết nối đến cơ sở dữ liệu
		$conn->close();
	?>
</body>
</html>
