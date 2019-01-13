<?php
//FUNCTIONS LISTED HERE//
function getOptions($option){
    require 'connection.php';
    
    if($option=="Employees"){
        
          $query="select * from Employees";
            $result=$connect->query($query);
                                
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()) {
                 echo "<option value=".$row["Emp_Number"].">".$row["Emp_Name"]."</option>";
                      }
                }else{
            echo "<option value=''>No Workers</option>";
                                }
                        }     
else if($option=="Projects"){
       $query="select * from Projects";
            $result=$connect->query($query);
                                
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()) {
                 echo "<option value=".$row["Project_ID"].">".$row["Project_Name"]."</option>";
                      }
                }else{
            echo "<option value=''>No Workers</option>";
                                }
                        }
    
}


//Handling AJAX request//
if(isset($_POST['project'])){//Update tasks dropdownlist according to project 
    if(empty($_POST['project'])){
            echo "Tasks<br><br>";
        echo "Choose Project";
        return false;
    }
     require 'connection.php';
    $selProj=$_POST["project"];
     $query="select * from tasks where Project_ID=".$selProj;
    echo "Tasks";
      $result=$connect->query($query);
                                
            if($result->num_rows>0){
                echo "<select id=tasks>";
                while($row = $result->fetch_assoc()) {
                 echo "<option value=".$row["Task_Number"].">".$row["Task_Name"]."</option>";
                      }
                }else{
            echo "<option value=''>No Tasks</option>";
            }
    echo "</select>";
}
if(isset($_POST['frm'])){//Insert data to the main table 
  
     require 'connection.php';
    $newDt=$_POST['frm'];
    $dt=json_decode($newDt, true);

   $query="INSERT INTO main (Emp_Name, Project_Name, Project_ID, Task_Name, Task_Number, Task_ID, Date, Hours, Comments) VALUES ('".$dt['name']."', '".$dt['project']."', '".$dt['projval']."', '".$dt['task']."', '1', '".$dt['taskval']."', '".$dt['date']."', '".$dt['hour']."', '".$dt['cmnt']."')";
 $connect->query($query);                  
}

if(isset($_POST['emp'])){//Get employee requests
        require 'connection.php';
    
       if(empty($_POST['emp'])){
       
         echo"  <h2 id=ttl><i class='fas fa-exclamation-circle'></i>Employee reports will show here</h2>";
        return false;
    }
    
        $usr=$_POST['emp'];
        $query="select main.Emp_Name, Project_Name, Task_Name, Hours, Date from main join Employees on main.Emp_Name = Employees.Emp_Name where Emp_Number=".$usr;
     $result=$connect->query($query);
   if($result->num_rows>0){
       echo "<table class='table' id=tbl>";
       echo "<thead>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Project Name</th>";
            echo "<th>Task Name</th>";
            echo "<th>Hours</th>";
            echo "<th>Date</th>";
      echo "</thead>";
       echo "<tbody>    ";
             while($row = $result->fetch_assoc()) {
                 echo "<tr>";
                 echo "<td>".$row["Emp_Name"]."</td>";
                     echo "<td>".$row["Project_Name"]."</td>";
                     echo "<td>".$row["Task_Name"]."</td>";
                     echo "<td>".$row["Hours"]."</td>";
                     echo "<td>".$row["Date"]."</td>";
                 echo "</tr>";
   }
       echo "</tbody>";
       echo "</table>";
    
}
    else{
        echo"<h2>No reports found</h2>";
    }

}


if(isset($_POST['orderByProj'])){//Insert data to the main table 
  
     require 'connection.php';
    $proj=$_POST['orderByProj'];
    $usr= $_POST['name'];
 
$sum=0;
  $query="select main.Emp_Name, Project_Name, Task_Name, Hours, Date from main join Employees on main.Emp_Name = Employees.Emp_Name where Emp_Number=".$usr." and Project_ID=".$proj;
     $result=$connect->query($query);
   if($result->num_rows>0){
       echo "<table class='table' id=tbl>";
       echo "<thead>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Project Name</th>";
            echo "<th>Task Name</th>";
            echo "<th>Hours</th>";
            echo "<th>Date</th>";
      echo "</thead>";
       echo "<tbody>    ";
             while($row = $result->fetch_assoc()) {
                 echo "<tr>";
                 echo "<td>".$row["Emp_Name"]."</td>";
                     echo "<td>".$row["Project_Name"]."</td>";
                     echo "<td>".$row["Task_Name"]."</td>";
                     echo "<td>".$row["Hours"]."</td>";
                     echo "<td>".$row["Date"]."</td>";
                 echo "</tr>";
                 $sum=$sum+$row["Hours"];
   }
       echo "</tbody>";
       echo "</table>";
       echo "<span class='badge badge-info'>Total ".$sum." Hours</span>";
    
}
    else{
        echo"<h2>No reports found</h2>";
    }

}
          


if(isset($_POST['odate'])){//Insert data to the main table 
  
     require 'connection.php';
    $date1=$_POST['odate'];
    $usr= $_POST['name'];
 
$sum=0;
$newDate = date("Y-m-d", strtotime($date1));
  

    
  $query="select main.Emp_Name, Project_Name, Task_Name, Hours, Date from main join Employees on main.Emp_Name = Employees.Emp_Name where Emp_Number=".$usr." and Date='".$newDate."'";
     $result=$connect->query($query);
   if($result->num_rows>0){
       echo "<table class='table' id=tbl>";
       echo "<thead>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Project Name</th>";
            echo "<th>Task Name</th>";
            echo "<th>Hours</th>";
            echo "<th>Date</th>";
      echo "</thead>";
       echo "<tbody>    ";
             while($row = $result->fetch_assoc()) {
                 echo "<tr>";
                 echo "<td>".$row["Emp_Name"]."</td>";
                     echo "<td>".$row["Project_Name"]."</td>";
                     echo "<td>".$row["Task_Name"]."</td>";
                     echo "<td>".$row["Hours"]."</td>";
                     echo "<td>".$row["Date"]."</td>";
                 echo "</tr>";
                         $sum=$sum+$row["Hours"];
   }
       echo "</tbody>";
       echo "</table>";
        echo "<span class='badge badge-info'>Total ".$sum." Hours</span>";
    
}
    else{
        echo"<h2>No reports found</h2>";
    }

}

function getMainReport(){
//Insert data to the main table 
  
     require 'connection.php';
  
 
$sum=0;

  

    
  $query="select Emp_Name, Project_Name, tasks.Project_ID, Tasks.Task_Name, Tasks.Task_Number, Tasks.Task_ID, Date, Hours, Comments  from main  join Tasks on main.Task_Name = Tasks.Task_Name";
     $result=$connect->query($query);
   if($result->num_rows>0){
       echo "<table id=mainTbl>";
       echo "<thead>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Project Name</th>";
            echo "<th>Project ID</th>";
            echo "<th>Task Name</th>";
         echo "<th>Task Number</th>";
                echo "<th>Task ID</th>";
          echo "<th>Date</th>";
            echo "<th>Hours</th>";
         
                  echo "<th>Comments</th>";
      echo "</thead>";
       echo "<tbody>    ";
             while($row = $result->fetch_assoc()) {
                 echo "<tr>";
                 echo "<td>".$row["Emp_Name"]."</td>";
                 echo "<td>".$row["Project_Name"]."</td>";
                 echo "<td>".$row["Project_ID"]."</td>";
                echo "<td>".$row["Task_Name"]."</td>";
                    echo "<td>".$row["Task_Number"]."</td>";
                 echo "<td>".$row["Task_ID"]."</td>";
                 echo "<td>".$row["Hours"]."</td>";
                 echo "<td>".$row["Date"]."</td>";
              echo "<td>".$row["Comments"]."</td>";
               echo "</tr>";
                         $sum=$sum+$row["Hours"];
   }
       echo "</tbody>";
       echo "</table>";
       echo"<br><input type=button value='Go Back' class='btn btn-primary' onclick='goBack()'>";
     
    
}
    else{
        echo"<h2>No reports found</h2>";
    }


         
}

?>











































