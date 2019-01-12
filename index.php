<?php 
require 'connection.php';
require 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hours Charger</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" type="text/css" href="style/reponsive.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<div class="header">
    <div class="title">Hours Report</div>
    </div>
      
    <div class="container">
      <div class="spinner">Saving...</div>
                <div class="name">Name
                    <select id="name" onchange="getRequests(this.value)">
                           <option value=""></option>
                           <?php
                              getOptions("Employees");
              
                                ?>
                    
                    
                    </select>
                                    </div>
                 <div class="project">project
            <select id="projects" onchange="updateTasks()">
                <option value=""></option>
                           <?php
                              getOptions("Projects");
              
                                ?>
                    
                    
                    </select>
                </div>
                 <div  id=tsk class="task">Tasks
         <select id="tasks">
                       <option value=""></option>
                    
                    
                    </select>
        
        </div>
                 <div class="date">date
            <input type=date id="date1">
        </div>
                 <div class="hours">hours
                     <input type=number min=1 step=0.1 id="hours">
        
        
        </div>
                 <div class="comments"><div class="commentHead"><i class="far fa-comment"></i>Comments</div>
                     <textarea id=comment></textarea>
                     </div>
                <input type=button class="btn btn-primary" value="SAVE" onclick="saveData()">
        <div class="dttable">
            <div class="dtHeader">My Reports</div>
            <div class="filters">
             <i class="fas fa-filter"></i>   <select id="projectsFilter" onchange="orderProject()">
                <option value=""></option>
                           <?php
                              getOptions("Projects");
              
                                ?>
                    
                    
                    </select>
                <input type=date id="dateFilter" onchange="orderDate()">
            
            
            
            
            </div>
    <div id=tbl1>
     <table class='table' id=tbl>
         <h2>Employee reports will show here</h2>
        </table>
            </div>
        
        </div>
                 
        
        
              
    </div>
    <script>
     
    /*  var table =    $('#tbl').DataTable({
          "dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">',
       searching:false
    });*/
        

    </script>
</body>
</html>
