<?php
// 데이터베이스 연결
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mycat";
$nm_conn = new mysqli($servername, $username, $password, $dbname);
if ($nm_conn->connect_error) {
  die("Connection failed: " . $nm_conn->connect_error);
}

// 폼 데이터 수집 및 쿼리 작성
$name = $_POST['name'];
$email = $_POST['email'];
$nm_sql_insert = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
$nm_sql_result = "SELECT * FROM users WHERE name='$name' AND email='$email'";

if ($nm_conn->query($nm_sql_insert) === FALSE) {
  echo "등록 중 오류가 발생했습니다.: " . $conn->error;
}

// 쿼리 실행 및 결과 처리
$result = $nm_conn->query($nm_sql_result);
if ($result->num_rows > 0) {
  // 로그인 성공
  echo "Login success!";
} else {
  // 로그인 실패
  echo "Invalid username or password";
}

// 데이터베이스 연결 종료
$nm_conn->close();
?>