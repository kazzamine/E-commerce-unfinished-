$(()=>{
    //login
    $("#btnlogin").on("click",()=>{
       let mail= $("#email").val();
       let pass= $("#password").val();
       $.post(
        "./includes/login.php",
        {email:mail,mdp:pass},
         (data)=> {
            if(data=="user"){
                 location.href = "./index.php";
            }else{
                $("#created").html(data);
            }
           
          }
       ).fail(()=>{
        alert("mdp or mail incorrecte");
       })
    })

    //singup
    
    $("#btnsign").on("click",()=>{
        let cin= $("#cin").val();
        let fname= $("#Fname").val();
        let lname= $("#Lname").val();
        let mail= $("#email").val();
        let pass= $("#password").val();
        let dateB= $("#dateB").val();
        if(cin==''||fname==''||lname==''||mail==''||pass==''||dateB==''){
         $("#created").html(" <span class='alert alert-danger'>please fill all the boxes</span>");
        }else{

        $.post(
         "./includes/signup.php",
         {email:mail,mdp:pass,fName:fname,lName:lname,cin:cin,dateB:dateB},
          (data)=> {
            $("#created").html(data);
            $("#cin").val('');
            $("#Fname").val('');
            $("#Lname").val('');
            $("#email").val('');
            $("#password").val('');
            $("#dateB").val('');
           }
        )
      }
     })

     //logout
     $("#logOut").on("click",()=>{
      $.post(
         "./includes/logout.php",
         ()=>{
            location.reload();
           
         }
      )
     })

})