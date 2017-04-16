

<html>
    <head>
        <title>REGISTRATION form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type ="text/css" href = "style1.css"/>
        <link rel ="stylesheet" type ="text/css" href ="font-awesome.css"/>
        
        
    </head>
    <body>
     
         <div class ="container">
           <img src="images1/man.jpg"/>
           <h2> REGISTER PLEASE </h2>
           <form action="registration_process.php" method="post">
               <div class ="form-input">

                <input type ="text" name ="fname"
                          placeholder="Enter Full name" />
                   <input type ="text" name ="username"
                          placeholder="Enter username" />
                   </div>
               <div class ="form-input">
                   <input type ="text" name ="email"
                          placeholder="Enter email" />
                    </div>
               <div class ="form-input">
                   <input type ="password" name ="password"
                          placeholder="Enter password" />
               </div>
               <div class ="form-input">
                   <input type ="password" name ="password1"
                          placeholder="Re-Enter password" />
               </div>
               <input type="submit" name="Register" value="REGISTER" class="btn-login" />
           </form><br>
           
       </div>
        
        <footer>
            <p> QUESTION GENERATOR powered by CSE16 </p>
        </footer>

    </body>
</html>