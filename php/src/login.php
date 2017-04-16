<!DOCTYPE html>

<html>
    <head>
        <title>Login form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" type ="text/css" href = "style.css"/>
        <link rel ="stylesheet" type ="text/css" href ="font-awesome.css"/>
    </head>
    <body>
   
       <div class ="container">
           <img src="images/man.png"/>

           <form action="login_process.php" method="post">
               <div class ="form-input">
                   <input type ="text" name ="username"
                          placeholder="Enter username" />
                   </div>
               <div class ="form-input">
                   <input type ="password" name ="password"
                          placeholder="Enter password" />
               </div>
               <input type="submit" name="submit" value="LOGIN" class="btn-login" />
               
               <?php  
      
               
               If(isset($_GET['error']) && $_GET['error'] == 1){ ?>
        <h3>Invalid username or password</h3>    
  <?php } ?>
           </form><br>
           
       </div>
        <footer>
            <p> QUESTION GENERATOR powered by CSE16 </p>
        </footer>


    </body>
    
</html>