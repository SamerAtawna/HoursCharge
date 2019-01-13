function updateTasks(){
    
    $("#tsk").html("<i class='fas fa-spinner'></i>Loading...");
    
    var selectedProject = document.getElementById("projects").value;
    var task = document.getElementById("tsk");
    
    
    $.ajax({
        url:"functions.php",
        method:"POST",
        dataType:"html",
        data:{'project':selectedProject},
        success:function(result){
            task.innerHTML = result;
        },
        error:function (error){
            console.log(error);
    }
        
        
        
    })
}
function getRequests(user){
       
    $(".filters").slideDown();
    var dtTable=document.getElementById("tbl1");
    var fltr = document.getElementsByClassName("filters");
   $.ajax({
       url:"functions.php",
       dataType:"html",
       method:"POST",
       data:{'emp':user},
       success:function(result){
           dtTable.innerHTML=result;
       }


       
   })
 
}
function orderProject(){
       
   var proj=document.getElementById("projectsFilter").value; 
   var name1=document.getElementById("name").value;
   var dtTable=document.getElementById("tbl1");
        if(name1==""){return false;}
    
   $.ajax({
       url:"functions.php",
       dataType:"html",
       method:"POST",
       data:{'orderByProj':proj, 'name':name1},
       success:function(result){
           dtTable.innerHTML=result;
       }
       
       
   })
 
}

function orderDate(){
       
   var date1=document.getElementById("dateFilter").value; 
   var name1=document.getElementById("name").value;
   var dtTable=document.getElementById("tbl1");
    if(name1==""){return false;}
   $.ajax({
       url:"functions.php",
       dataType:"html",
       method:"POST",
       data:{'odate':date1, 'name':name1},
       success:function(result){
           dtTable.innerHTML=result;
           console.log(result);
       }
       
       
   })
 
}
function showReport(){
   $(".cntr1").slideUp();
       $(".cntr2").slideDown();
}

function goBack(){
   $(".cntr1").slideDown();
       $(".cntr2").slideUp();
}

function showSuccess(){
    $(".saved").css("display","flex");
 setTimeout(function(){ 
       $(".saved").css("display","none");
 }, 3000);
}


function saveData(){ 
    $(".spinner").show();
    
    var name1=$("#name  option:selected").text();
    var project1=$("#projects  option:selected").text();
    var project1val=$("#projects").val();
    var task1=$("#tasks  option:selected").text();
    var task1val=$("#tasks").val();
    var date1=$("#date1").val();
    var hour1=$("#hours").val();
    var comment1=$("#comment").val();
    
    var hourForm={name:name1,project:project1,task:task1,date:date1,hour:hour1,projval:project1val,taskval:task1val,cmnt:comment1};
    var dt=JSON.stringify(hourForm);
    
  
    $.ajax({
        url:"functions.php",
        method:"POST",
        data:{'frm':dt},
        success:function(result){
            console.log(result);
            $(".spinner").hide();
            showSuccess();
        },
        error:function(){
            
        }
    })
    
    
} 