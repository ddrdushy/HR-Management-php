<html>
      <head>
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="jquery/jquery-1.8.3.min.js"></script> 
      </head>      

      <body>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">HR Management</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
            </ul>
          </div>
        </nav>

        <div class="container">

          <form action="index.php" method="post">
            <div class="form-group" >
              <label for="username">User Name:</label>
              <input type="text" class="form-control" id="uname" name="uname" required>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" name="pwd" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </body>
</html>


<?php
    if(isset( $_POST["uname"]) || isset($_POST["pwd"]) ) {
     $uname=$_POST["uname"];
     $pwd=$_POST["pwd"];
     
     if($uname=="admin" && $pwd=="admin")
      header("Location:admin.php");
     else
      header("Location:user.php");
    
   }
?>
