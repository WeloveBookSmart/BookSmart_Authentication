<?php  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:home.php");  
 }  
 ?>  
 <html>  
      <head>  
           <meta name="viewport" content="initial-scale=1.0, user-scalable=no">  
           <meta charset="utf-8">  
           <title>Webslesson Tutorial</title>  
           <script src="http://code.jquery.com/jquery-2.1.1.js"></script>  
           <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>  
           <script src="js/bootstrap.js"></script>  
           <link href="css/bootstrap.css" rel="stylesheet" />  
           <style>  
           #box  
           {  
                width:100%;  
                max-width:500px;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin:0 auto;  
                padding:0 20px;  
                box-sizing:border-box;  
                height:270px;  
           }  
           </style>  
      </head>  
      <body>  
           <div class="container">  
                <h2 align="center">How to Use Ajax with PHP for Login with Shake Effect</h2><br /><br />  
                <div id="box">  
                     <br />  
                     <form method="post">  
                          <div class="form-group">  
                               <label>Username</label>  
                               <input type="text" name="username" id="username" class="form-control" />  
                          </div>  
                          <div class="form-group">  
                               <label>Password</label>  
                               <input type="password" name="password" id="password" class="form-control" />  
                          </div>  
                          <div class="form-group">  
                               <input type="button" name="login" id="login" class="btn btn-success" value="Login" />  
                          </div>  
                          <div id="error"></div>  
                     </form>  
                     <br />  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#login').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val();  
           if($.trim(username).length > 0 && $.trim(password).length > 0)  
           {  
                $.ajax({  
                     url:"login.php",  
                     method:"POST",  
                     data:{username:username, password:password},  
                     cache: false,  
                     beforeSend:function()  
                     {  
                          $('#login').val("connecting...");  
                     },  
                     success:function(data)  
                     {  
                          if(data)  
                          {  
                               $("body").load("home.php").hide().fadeIn(1500);  
                          }  
                          else  
                          {  
                               //shake animation effect.  
                               var options = {  
                                    distance: '40',  
                                    direction:'left',  
                                    times:'3'  
                               }  
                               $("#box").effect("shake", options, 800);  
                               $('#login').val("Login");  
                               $('#error').html("<span class='text-danger'>Invalid username or Password</span>");  
                          }  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
 });  
 </script>  