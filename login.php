<?php require_once './header.php'?>

    <div id="loginCont" class=" loginCard  mx-auto mt-4 p-4 rounded w-75 offset-md-2 container-fluid">
        <div class="row" >
          <div id="imgLog" class="col-md-6">
            <img src="./images/imageLog.png" width="70%" height="100%" alt="">
          </div>
          <div class="col-md-6">
          <form>
            <h2 class="text-center title" >
              L O G I N
            </h2><br>
            <div id="created">

            </div><br>
            <label for="email"> Email :</label><br>
            <input id="email"  class="form-control" type="text" name="email"/>    
            <br>  
            <label for="password"> password :</label><br>
            <input id="password" class="form-control" type="password" name="password"/>  <br>
            <div class="text-center">
            <Button type="button" id="btnlogin" name="btnlogin" class="btn btn-outline-success col-md-12">Login</Button>
          </div> <br>
          <div class="text-center">
          <span> you don't have an account yet <br> <a href="./signup.php" >create one easily!</a></span>
          </div>
          </form>
          </div>
    </div>
    </div>

<?php require_once './footer.php'?>