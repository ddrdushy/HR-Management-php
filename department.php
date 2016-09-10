<?php

$link = mysqli_connect('localhost','root','','hr'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

$qry=mysqli_query($link,"SELECT MAX(`id`) as id FROM `department`") or die (mysqli_error($link));
$qry2=mysqli_query($link,"SELECT * FROM `department`") or die (mysqli_error($link));

while($row = mysqli_fetch_array($qry, MYSQL_ASSOC)) {
      $id=$row['id'];
   }


//echo 'Connection OK'.$id; //mysqli_close($link); 

    if(isset( $_POST["id"]) || isset($_POST["dept"]) ) {
     $dept=$_POST["dept"];
     $qry=mysqli_query($link,"INSERT INTO `department`(`deptname`) VALUES ('".$dept."')") or die (mysqli_error($link));
   }
   
?>

<html>
      <head>
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>   
    </head>


      <body>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">HR Management</a>
            </div>
            <ul class="nav navbar-nav">
              <li><a href="#">Admin</a></li>
              <li class="active"><a href="department.php">Department</a></li>
              <li><a href="employee.php">Employee</a></li>
              <li><a href="attedance.php">Attendence</a></li>
              <li><a href="leave.php">Leave</a></li>
              <li><a href="transfer.php">Transfer</a></li>
            </ul>
          </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Department</h1>
                </div>
            </div>
            <div class="row well">
                <div class="col-lg-12">
                    <form action="department.php" method="POST">
                        <div class="form-group" >
                            <label for="department" class="control-label col-lg-2">Department Id: </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="id" name="id" required value="<?php echo htmlentities($id+1); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departmentname" class="control-label col-lg-2">Department Name:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="pwd" name="dept" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info col-lg-4">Add</button>
                        <button type="update" class="btn btn-primary col-lg-4" onclick="update()">Update</button>
                        <button type="delete" class="btn btn-danger col-lg-4" onclick="delete()">Delete</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <tr>
                            <th>Department Id</th>
                            <th>Department Name</th>
                            <th>Selection</th>
                        </tr>
                        <?php
                          while($row = mysqli_fetch_array($qry2, MYSQL_ASSOC)) {
                                $id=$row['id'];
                                $dept=$row['deptname'];
                                echo "<tr>
                                        <th>".$id."</th>
                                        <th>".$dept."</th>
                                        <th><button type=\"button\" class=\"btn btn-primary\" onclick=\"Selection()\">Update</button></th>
                                    </tr>";
                            }  
                        ?>
                    </table>

                    
                </div>
            </div>
        </div>
                    <script>
                            function Selection(){
                                alert (id+"\n"+dept);
                            }
                    </script>
      </body>
</html>


