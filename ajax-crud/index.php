<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
    Name : <input type="text" id="name">
    Email : <input type="text" id="email">
    
    <input type="submit" onclick="submit()" id="">
    <br>
    
    <div id="error"></div>
    <div id="success"></div>
    <br>
    <hr>

    <button id="showData">Show User Data</button>
    <div id="table-container"></div>

    <script>
    $(document).ready(function(){
        getData();
});
function getData(){
    $.ajax({    
        type: "GET",
        url: "backend-script.php",             
        dataType: "html",                  
        success: function(data){                    
            $("#table-container").html(data); 
           
        }
    });
}
getData();

        function submit(){
            let name = $('#name').val();
            let email = $('#email').val();
if(name=="" || email==""){
$('#error').html("All field Required");
}else{

            $.ajax({
                url : 'back-end.php',
                type : 'POST',
                data : {
                    name : name,
                    email : email


                },
                success : function(data){
            
                    if(data==1){
                        alert("data insert success");
                        getData();
                    }else{
                        alert("Can't insert");
                    }
                }


            })
        }
        }

        // Delete user
        function deleteData(deleteId){
            let conf = confirm("Are you Sure You want to Delete Data");
            if(conf==true){
                $.ajax({
                    url : "back-end.php",
                    type : "POST",
                    data :{
                        deleteId : deleteId
                    },
                    success : (data)=>{
                        console.error(data);
                        // if(data==1){
                        //     alert("Delete Successfully");
                        // }else{
                        //     alert("Not Delete");
                        // }
                        console.log("done");
                    }
                })
            }

        }
    </script>
</body>
</html>