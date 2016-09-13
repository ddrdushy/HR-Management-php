<?php

$link = mysqli_connect('localhost','root','','hr'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

//$qry=mysqli_query($link,"SELECT MAX(`id`) as id FROM `department`") or die (mysqli_error($link));
$qry=mysqli_query($link,"SELECT * FROM `employee`") or die (mysqli_error($link));

//while($row = mysqli_fetch_array($qry, MYSQL_ASSOC)) {
  //    $id=$row['eid'];
   //}
?>
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
              <li><a href="#">Admin</a></li>
              <li><a href="department.php">Department</a></li>
              <li  class="active"><a href="employee.php">Employee</a></li>
              <li><a href="attedance.php">Attendence</a></li>
              <li><a href="leave.php">Leave</a></li>
              <li><a href="transfer.php">Transfer</a></li>
            </ul>
          </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Employee Details</h1>
                </div>
            </div>
            <div class="row well">
                <div class="col-lg-12">
                    <form action="employee.php" method="POST">
                        <div class="form-group" >
                            <label for="empid" class="control-label col-lg-2">Employee Id: </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="id" name="eid">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="empname" class="control-label col-lg-2">Employee Name:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="name" name="ename" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label col-lg-2">User Name:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="uname" name="uname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="control-label col-lg-2">Password:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="pwd" name="pwd" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dept" class="control-label col-lg-2">Department Name:</label>
                            <div class="col-lg-10">
                                <label class="control-label col-lg-2">
                                  <?php
                                  $link = mysqli_connect('localhost','root','','hr'); 
                                  if (!$link) { 
	                                die('Could not connect to MySQL: ' . mysql_error()); 
                                  } 
                                  $record="<select name=\"combo\" id=\"cid\">";
                                  $qry2="SELECT deptname FROM department";
                                  //echo "<select name='loads' id='loads'>";
                                   //while($ri = mysql_fetch_array($qry2)) 
                                   if($result=$link->query($qry2))
                                   {
                                     if($result->num_rows)
                                     {
                                        while($row = $result->fetch_object()) 
                                        {
                                        $record.= "<option>".$row->deptname."</option>";
                                        } 
                                        $result->free();
                                     }
                                    }
                                    $record.="</select>"; 
                                    echo $record;
                                  ?>
                            	  </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qualification" class="control-label col-lg-2">Qualification:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="quali" name="quali" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dob" class="control-label col-lg-2">DOB:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="dob" name="dob" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label col-lg-2">Address:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="add" name="add" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-lg-2">Email Id:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="resign" class="control-label col-lg-2">Resigned :</label>
                            <div class="col-lg-10">
                                  <input type="radio" name="resign" id=rad value="yes" checked> yes</input>
                                  <input type="radio" name="resign" id=rad value="no" checked> no</input>
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <label for="rdate" class="control-label col-lg-2">Resignation Date:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="rdate" name="rdate" >
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
                            <th>Emp Id</th>
                            <th>Emp Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Department Name</th>
                            <th>Qualification</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>Email Id</th>
                            <th>Resigned</th>
                            <th>RDate</th>
                        </tr>
                        <?php
                          while($row = mysqli_fetch_array($qry, MYSQL_ASSOC)) {
                                $id=$row['eid'];
                                $ename=$row['ename'];
                                $username=$row['uname'];
                                $password=$row['pwd'];
                                $deptname=$row['deptname'];
                                $qualification=$row['qualification'];
                                $dob=$row['dob'];
                                $address=$row['address'];
                                $email=$row['email'];
                                $resigned=$row['resign'];
                                $rdate=$row['rdate'];
                                echo "<tr>
                                        <td>".$id."</td>
                                        <td>".$ename."</td>
                                        <td>".$username."</td>
                                        <td>".$password."</td>
                                        <td>".$deptname."</td>
                                        <td>".$qualification."</td>
                                        <td>".$dob."</td>
                                        <td>".$address."</td>
                                        <td>".$email."</td>
                                        <td>".$resigned."</td>
                                        <td>".$rdate."</td>
                                        <td><a href='#' onclick=\"Selec('".$id."','".$ename."','".$username."','".$password."','".$deptname."','".$qualification."',,'".$dob."',,'".$address."',,'".$email."','".$resigned."','".$rdate."')\">Update</a></td>
                                    </tr>";
                            }  
                        ?>
                    </table>
 <script>
    function Selec(eid,ename,uname,pwd,combo,quali,dob,add,email,resign,rdate){
        //alert(id+"\n"+dept);
        document.getElementById("id").value = id;
        document.getElementById("name").value = ename;
        document.getElementById("uname").value = username;
        document.getElementById("pwd").value = password;
        document.getElementById("cid").value = deptname;
        document.getElementById("quali").value = qualification;
        document.getElementById("dob").value = dob;
        document.getElementById("add").value = address;
        document.getElementById("email").value = email;
        document.getElementById("rad").value = resigned;
        document.getElementById("rdate").value = rdate;
    }

    function update(){

    }
</script>
                    
                </div>
            </div>
        </div>

      </body>
</html>


<?php
$link = mysqli_connect('localhost','root','','hr'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

    if(isset( $_POST["ename"]) || isset($_POST["uname"]) || isset($_POST["pwd"]) || isset($_POST["combo"]) || isset($_POST["quali"]) || isset($_POST["dob"]) || isset($_POST["add"]) || isset($_POST["email"]) || isset($_POST["resign"]) || isset($_POST["rdate"]) ) {
     $ename=$_POST["ename"];
	 $uname=$_POST["uname"];
	 $pwd=$_POST["pwd"];
	 $combo=$_POST["combo"];
     $quali=$_POST["quali"];
     $dob=$_POST["dob"];
     $add=$_POST["add"];
     $email=$_POST["email"];
     $resign=$_POST["resign"];
     $rdate=$_POST["rdate"];
     //echo $ename;
     //echo $combo;
     //echo "INSERT INTO `employee`(`ename`,`uname`,`pwd`,`combo`,`quali`,`dob`,`add`,`email`,`resign`,`rdate`) VALUES('".$ename."','".$uname."','".$pwd."','".$combo."','".$quali."','".$dob."','".$add."','".$email."','".$resign."','".$rdate."')";
     if($resign=="yes")
     {
         $qry=mysqli_query($link,"INSERT INTO `employee`(`ename`,`uname`,`pwd`,`deptname`,`qualification`,`dob`,`address`,`email`,`resign`,`rdate`) VALUES('".$ename."','".$uname."','".$pwd."','".$combo."','".$quali."','".$dob."','".$add."','".$email."','".$resign."','".$rdate."')") or die (mysqli_error($link));
     }
     else{
         $qry=mysqli_query($link,"INSERT INTO `employee`(`ename`,`uname`,`pwd`,`deptname`,`qualification`,`dob`,`address`,`email`,`resign`,`rdate`) VALUES('".$ename."','".$uname."','".$pwd."','".$combo."','".$quali."','".$dob."','".$add."','".$email."','".$resign."','NULL')") or die (mysqli_error($link));
     }
   }
   
?>

