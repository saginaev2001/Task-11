<form action = 'Task 11.4.php' method = 'post'> 
  enter your username: <input type="text" name="username">
  enter your password: <input type="password" name="password">
 <input type="submit" value="submit">


 
<?php
 if(isset($_POST['username']) && isset($_POST['password'])){
  $connect = mysqli_connect('localhost', 'root', '', 'web');
  if(!$connect){
   echo "Failed to connect to the server";
  }
  if(!mysqli_select_db($connect, 'web')){
   echo "Failed to connect to Database";
  }
  $query = 'SELECT * FROM web';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = mysqli_query($connect, $query);
  while($row = mysqli_fetch_array($result)){
    $usr = $row['login'];
    $psw = $row['password'];
    if ($usr == $username && $password == $psw){
     echo "<br>Hello ".$username;
    }
    else{
     echo "<p>There's no such a user</p>";
    }
   
  }
  
 }
?>