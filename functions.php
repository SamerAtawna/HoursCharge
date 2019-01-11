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


if(isset($_POST['project'])){
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
                echo "<select name=tasks>";
                while($row = $result->fetch_assoc()) {
                 echo "<option value=".$row["Task_Number"].">".$row["Task_Name"]."</option>";
                      }
                }else{
            echo "<option value=''>No Tasks</option>";
            }
    echo "</select>";
 
}

?>