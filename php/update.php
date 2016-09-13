<?php
    $qry=$_GET["qry"];
    $loc=$_GET["loc"];
    
    $link = mysqli_connect('localhost','root','','hr'); 
    if (!$link) { 
        die('Could not connect to MySQL: ' . mysql_error()); 
    } 

//echo 'Connection OK'.$id; //

    $qry2=mysqli_query($link,$qry) or die (mysqli_error($link));
    mysqli_close($link); 
    echo "<script>
            window.location='".$loc."';
            </script>";
?>