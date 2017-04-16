<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>index</title>
        <style type="text/css">
            * 
            {
                margin: 0;
                padding: 0;
                
            }

            body{
                background-color: black;
            }
            .fly-in-text{
                list-style: none;
                position:absolute;
                left: 40%;
                top: 30%;
                transform: translateX(-30%) translateY(50%);
            }
          
             .fly-in-text li {
                display: inline-block;
                
                font-family: Open Sans, Arial;
        
            font-size: 2.2em;
            font-weight: 300;
                color: #fff;
                opacity: 1;
                transition: all 2.5s ease;
            }
            fly-in-text li:last-child {
            margin-right: 0;
            }
            .fly-in-text.hidden li {
                opacity: 0;
            }
                .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 400px 594px;
  position:fixed;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}   

            .fly-in-text.hidden li:nth-child(1) { transform: translateX(-200px) translateY(-200px); }
            .fly-in-text.hidden li:nth-child(2) { transform: translateX(20px) translateY(100px); }
            .fly-in-text.hidden li:nth-child(3) { transform: translateX(-150px) translateY(-80px); }
            .fly-in-text.hidden li:nth-child(4) { transform: translateX(10px) translateY(-200px); }
            .fly-in-text.hidden li:nth-child(5) { transform: translateX(-300px) translateY(200px); }
            .fly-in-text.hidden li:nth-child(6) { transform: translateX(20px) translateY(-20px); }
            .fly-in-text.hidden li:nth-child(7) { transform: translateX(30px) translateY(200px); }
            .fly-in-text.hidden li:nth-child(8) { transform: translateX(-200px) translateY(-200px); }
            .fly-in-text.hidden li:nth-child(9) { transform: translateX(20px) translateY(100px); }
            .fly-in-text.hidden li:nth-child(10) { transform: translateX(-150px) translateY(-80px); }
            .fly-in-text.hidden li:nth-child(11) { transform: translateX(10px) translateY(-200px); }
            .fly-in-text.hidden li:nth-child(12) { transform: translateX(-300px) translateY(200px); }
            .fly-in-text.hidden li:nth-child(13) { transform: translateX(20px) translateY(-20px); }
            .fly-in-text.hidden li:nth-child(14) { transform: translateX(30px) translateY(200px); }
            .fly-in-text.hidden li:nth-child(15) { transform: translateX(-200px) translateY(-200px); }
            .fly-in-text.hidden li:nth-child(16) { transform: translateX(20px) translateY(100px); }
            .fly-in-text.hidden li:nth-child(17) { transform: translateX(-150px) translateY(-80px); }
            .fly-in-text.hidden li:nth-child(18) { transform: translateX(10px) translateY(-200px); }
            .fly-in-text.hidden li:nth-child(19) { transform: translateX(-300px) translateY(200px); }
            .fly-in-text.hidden li:nth-child(20) { transform: translateX(20px) translateY(-20px); }
            .fly-in-text.hidden li:nth-child(21) { transform: translateX(30px) translateY(200px); }
            
              .fly-in-text.hidden li:nth-child(22) { transform: translateX(20px) translateY(100px); }
            .fly-in-text.hidden li:nth-child(23) { transform: translateX(-150px) translateY(-80px); }
            .fly-in-text.hidden li:nth-child(24) { transform: translateX(10px) translateY(-200px); }
            .fly-in-text.hidden li:nth-child(25) { transform: translateX(-300px) translateY(200px); }
            .fly-in-text.hidden li:nth-child(26) { transform: translateX(20px) translateY(-20px); }
   .button1 {
        border-radius: 4px;
  background-color: blueviolet;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
    position:absolute;
    transition: .5s ease;
    top: 77%;
    left: 43.6%;
}
.button1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button1 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button1:hover span {
  padding-right: 25px;
}

.button1:hover span:after {
  opacity: 1;
  right: 0;
}  



        </style>
    </head>
    

        <ul class="fly-in-text hidden">
            <li>W</li>
            <li>E</li>
            <li>L</li>
            <li>C</li>
            <li>O</li>
            <li>M</li>
            <li>E</li> 
         <tr> ... </tr>
            <li>T</li>
            <li>O</li>
           <tr> ... </tr>
            <li>Q</li>
            <li>U</li>
            <li>E</li>
            <li>S</li>
            <li>T</li> 
            <li>I</li>
            <li>O</li>
            <li>N</li>
         <tr> ... </tr>
            <li>G</li>
            <li>E</li>
            <li>N</li>
            <li>E</li> 
            <li>R</li>
            <li>A</li>
            <li>T</li>
            <li>O</li>
            <li>R</li> 
        </ul>

<button class="button" onclick="location.href='registration.php'" style="vertical-align:middle"><span>Register Here</span></button>

<button class="button1" onclick="location.href='index.php'" style="vertical-align:middle"><span>LOGIN</span></button>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
        <script type="text/javascript">
 $(function() {
                
                setTimeout(function() {
                    $('.fly-in-text').removeClass('hidden');}, 100);
                
            })();
            
       </script>
    
</html>

 