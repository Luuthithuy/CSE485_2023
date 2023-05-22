<?php
// PHP - MySQL Procedural:
// Buoc 1: Ket noi DATABASE SERVER
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'btth02';
$conn = mysqli_connect($server,$user,$pass,$database);

if(!$conn){
    die('Can not connect');
}
// Buoc 2: Dinh nghia va thuc thi truy van
$sql = "SELECT * FROM classes ";
$result = mysqli_query($conn,$sql);

// Buoc 3: Xu ly TAP KET QUA (Select)
if(mysqli_num_rows($result) > 0){
    
    $classes = mysqli_fetch_all($result);
}

// Buoc 4: Dong ket noi
//mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lớp học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
</head>
<body>
    <h2>Danh sách lớp học</h2>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Mã lớp</th>
      <th scope="col">Mã khóa học</th>
      <th scope="col">Giảng viên</th>
      <th scope="col">Khoảng thời gian</th>
      
    </tr>
  </thead>
    <tbody>
    <?php
        foreach($classes as $class){
    ?>
            <tr>
                <th scope="row"> <a href="AttendanceForStudents.php"><?= $class[0]; ?></a> </th>
                <td><?= $class[1]; ?> </td>
                <td><?= $class[2]; ?></td>     
                <td><?= $class[3]; ?></td>         
            </tr>
    <?php
        }
    ?>
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>