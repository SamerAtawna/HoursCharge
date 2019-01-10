<?php


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


?>