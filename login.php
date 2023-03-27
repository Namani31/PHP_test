<?php
// 데이터베이스 연결
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mycat";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 폼 데이터 수집 및 쿼리 작성
$name = $_POST['name'];
$email = $_POST['email'];
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
$sql = "SELECT * FROM users WHERE name='$name' AND email='$email'";


// 쿼리 실행 및 결과 처리 (select문 확인용 쿼리)
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // 로그인 성공
  echo "Login success!";
} else {
  // 로그인 실패
  echo "Invalid username or password";
}

/* (insert 문 확인용 쿼리)
if ($conn->query($sql) === TRUE) {
  echo "사용자가 성공적으로 등록되었습니다.";
} else {
  echo "등록 중 오류가 발생했습니다.: " . $conn->error;
} */

// 데이터베이스 연결 종료
$conn->close();
?>