<?php require_once './header.php'?>
<div id="loginCont" class=" loginCard mx-auto mt-4 p-4 rounded w-75 offset-md-2 container-fluid">
        <div class="row" >
          <div id="imgLog" class="col-md-5">
            <img src="./images/imageLog.png" width="70%" height="100%" alt="">
          </div>
          <div class="col-md-7">
          <form>
            <h2 class="text-center title" >
              S I G N U P
            </h2><br>
            <div id="created">

            </div>
            <br>
           
            <input id="cin"  class="form-control" type="text" placeholder="identity number" required name="cin"/>    
            <br>
           
            <input id="Fname"  class="form-control" type="text" placeholder="first name" required name="Fname"/>    
            <br>  
           
            <input id="Lname"  class="form-control" type="text" placeholder="last name" required name="Lname"/>    
            <br>  
           
            <input id="dateB"  class="form-control" type="date"  placeholder="birthdate" required name="dateB"/>    
            <br>  
            
            <input id="email"  class="form-control" type="email" placeholder="Email" required name="email"/>    
            <br>  
           
            <input id="password" class="form-control" type="password" placeholder="password" required name="password"/>  <br>
            <div class="text-center">
            <Button type="button" id="btnsign" name="btnsign" class="btn btn-outline-primary col-md-12">Create Account</Button>
          </div> <br>
          <div class="text-center">
          <span> already have an account<br> <a href="./login.php" >Login NOW!</a></span>
          </div>
          </form>
          </div>
    </div>
    </div>
<?php require_once './footer.php'?>