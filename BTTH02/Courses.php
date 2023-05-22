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
$sql = "SELECT * FROM courses ";
$result = mysqli_query($conn,$sql);

// Buoc 3: Xu ly TAP KET QUA (Select)
if(mysqli_num_rows($result) > 0){
    
    $courses = mysqli_fetch_all($result);
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
    <title>Các khóa học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
</head>
<body>
    <h2>Các khóa học của tôi</h2>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Mã khóa học</th>
      <th scope="col">Tiêu đề</th>
      <th scope="col">Mô tả</th>
      
    </tr>
  </thead>
    <tbody>
    <?php
        foreach($courses as $course){
    ?>
            <tr>
                <th scope="row"> <?= $course[0]; ?> </th>
                <td><a href="Classes.php"><?= $course[1]; ?></a> </td>
                <td><?= $course[2]; ?></td>             
            </tr>
    <?php
        }
    ?>
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>