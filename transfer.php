<?php

$link = mysqli_connect('localhost','root','','hr'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 

//$qry=mysqli_query($link,"SELECT MAX(`id`) as id FROM `department`") or die (mysqli_error($link));
$qry=mysqli_query($link,"SELECT `eid`,`ename`,`deptname` FROM `employee`") or die (mysqli_error($link));

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
              <li><a href="employee.php">Employee</a></li>
              <li><a href="attedance.php">Attendence</a></li>
              <li><a href="leave.php">Leave</a></li>
              <li class="active"><a href="transfer.php">Transfer</a></li>
            </ul>
          </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Transfer</h1>
                </div>
            </div>
            <div class="row well">
                <div class="col-lg-12">
                    <form action="transfer.php" method="POST">
                        <div class="form-group" >
                            <label for="department" class="control-label col-lg-2">EmpId: </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="id" name="eid">
                            </div>
                                 <!--<label class="control-label col-lg-2">-->
                                 <!-- <?php
                                  /*$link = mysqli_connect('localhost','root','','hr'); 
                                  if (!$link) { 
	                                die('Could not connect to MySQL: ' . mysql_error()); 
                                  } 
                                  $record="<select name=\"combo1\">";
                                  $qry2="SELECT eid FROM employee";
                                  //echo "<select name='loads' id='loads'>";
                                   //while($ri = mysql_fetch_array($qry2)) 
                                   if($result=$link->query($qry2))
                                   {
                                     if($result->num_rows)
                                     {
                                        while($row = $result->fetch_object()) 
                                        {
                                        $record.= "<option>".$row->eid."</option>";
                                        } 
                                        $result->free();
                                     }
                                    }
                                    $record.="</select>"; 
                                    echo $record;*/
                                  ?>-->
                            	 <!-- </label>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departmentname" class="control-label col-lg-2">Employee Name:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="en" name="ename">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="control-label col-lg-2">Old Department:</label>
                            <div class="col-lg-10">
                             <input type="text" class="form-control" id="old" name="deptname">
                            <!--<label class="control-label col-lg-2">-->
                                  <!--<?php
                                 /* $link = mysqli_connect('localhost','root','','hr'); 
                                  if (!$link) { 
	                                die('Could not connect to MySQL: ' . mysql_error()); 
                                  } 
                                  $abc="<input type=\"text\" class=\"form-control\" id=\"pwd\" name=\"pwd\">";
                                  $qry2=mysqli_query($link,"SELECT deptname FROM employee WHERE eid=combo1") or die (mysqli_error($link));
                                  $abc=$qry2;
                                  echo $abc;*/
                                  ?>-->
                            	  <!--</label>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ndept" class="control-label col-lg-2">New Department:</label>
                            <div class="col-lg-10">
                                <label class="control-label col-lg-2">
                                  <?php
                                  $link = mysqli_connect('localhost','root','','hr'); 
                                  if (!$link) { 
	                                die('Could not connect to MySQL: ' . mysql_error()); 
                                  } 
                                  $record1="<select name=\"combo\">";
                                  $qry2="SELECT deptname FROM department";
                                  //echo "<select name='loads' id='loads'>";
                                   //while($ri = mysql_fetch_array($qry2)) 
                                   if($result=$link->query($qry2))
                                   {
                                     if($result->num_rows)
                                     {
                                        while($row = $result->fetch_object()) 
                                        {
                                        $record1.= "<option>".$row->deptname."</option>";
                                        } 
                                        $result->free();
                                     }
                                    }
                                    $record1.="</select>"; 
                                    echo $record1;
                                  ?>
                            	  </label>
                            </div>
                        </div>
                        <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <tr>
                            <th>Employee id</th>
                            <th>Employee Name</th>
                            <th>Old department</th>
                        </tr>

                        <?php
                          while($row = mysqli_fetch_array($qry, MYSQL_ASSOC)) {
                                $id=$row['eid'];
                                $ename=$row['ename'];
                                $deptname=$row['deptname'];
                                echo "<tr>
                                        <td>".$id."</td>
                                        <td>".$ename."</td>
                                        <td>".$deptname."</td>
                                        <td><a href='#' onclick=\"Selec('".$id."','".$ename."','".$deptname."')\">Update</a></td>
                                    </tr>";
                            }  
                        ?>
                    </table>
                    <script>
    function Selec(id,ename,deptname){
        //alert(id+"\n"+dept);
        document.getElementById("id").value = id;
        document.getElementById("en").value = ename;
        document.getElementById("old").value = deptname;
    }

    function update(){

    }
</script>
</div>
                    </div>
                    </div>
      </body>
</html>
