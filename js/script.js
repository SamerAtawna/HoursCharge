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
            console.log(result);
            task.innerHTML = result;
        },
        error:function (error){
            console.log(error);
    }
        
        
        
    })
}