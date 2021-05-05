<?php 
      if(isset($_POST['email']) && $_POST['password'])
      {
          $email=$_POST['email'];
          $password=$_POST['password'];

          try{
              $conn=new PDO("mysql:host=localhost:3306;dbname=project_erp","root","");
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }
          catch(PDOException $ex){
            echo"<script>location.assign('login.html');</script>";
          }

          $mysqlcode=" SELECT* FROM admin WHERE Email='$email' and Password='$password' ";

          $result=$conn->query($mysqlcode);
          if($result->rowCount()==1)
          {
              echo"<script>location.assign('home.php');</script>";
          }
          else
          {
              echo"<script>location.assign('login.html');</script>";
          }
      }
      else
      {
          echo"<script>location.assign('login.html');</script>";
      }
?>