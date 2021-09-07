<?php
   //block access if requested directly
   if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
      header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
      die( header( 'location: ../' ) );

   }
   session_start();
   include $document_root. '/web-developer-test-app/app/autoloader.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>pineapple</title>
        <link rel="stylesheet" type="text/css" href="indexstyle.css">
    </head>
<body>
<main id="app">
   <div id="base-left">
      <div id="top-box">
         <div id="top-bar">
            <div id="top-bar-left">
               <img src="images/union.svg" id="logo"></img>
               <img src="images/pineapple.svg" id="pineapple"/>
            </div>
            <div id="top-bar-right">
               <a id="top_links" href="#">Contact</a>
               <a id="top_links" href="#">How it works</a>
               <a id="top_links" href="#">About</a>
            </div>
            <span class=“icon-ic-instagram”></span>
         </div>
      </div>
      <div id="middle-box">
         <div id="middle-box-content">
            <h1 id="header1">Subscribe to newsletter</h1>
            <h2 id="header2">Subscribe to our newsletter and get 10% discount on pineapple glasses.</h2>
            <form action="../app/classes/mail.class.php" method="post">
               <div id="input-field">
                  <div id="blue-line">
                     <input type="text" name="name" id="input-container" style="font-family: inherit;" placeholder="Type your email address here…" onkeyup='validation()'>
                     <button type="submit" id="submitButton">
                     <i class="icon-ic_arrow"></i>
                     </button>
                  </div>
               </div>
               <p id="error-message"> </p>
               <noscript id="demo2">
                  <?php 
                     $error = new EmailView();
                     $error->showError();?>
               </noscript>
               <div id="terms-container">
                  <div class="vehicle3">
                     <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" onclick="validation()" />
                     <label for="vehicle3"></label>
                  </div>
                  <text id="terms-of-service">
                  I agree to <a href="#">terms of service</a> 
                  <text>
               </div>
            </form>
         </div>
         <div id="line"></div>
         <br>   
         <div id="socials-container">
            <a id="facebook-icon-container" href="#" >
               <div class="icon-sub-container">                
                  <i class="icon-ic_facebook"></i>     
               </div>
            </a>
            <a id="instagram-icon-container" href="#" >
               <div class="icon-sub-container">  
                  <i class="icon-ic-instagram"></i>
               </div>
            </a>
            <a id="twitter-icon-container" href="#" >
               <div class="icon-sub-container">  
                  <i class="icon-ic_twitter"></i>
               </div>
            </a>
            <a id="youtube-icon-container" href="#" >
               <div class="icon-sub-container">  
                  <i class="icon-ic-youtube"></i>
               </div>
            </a>
         </div>
      </div>
      <div id="bottom-box">
      </div>
   </div>
   <div id="image-summer-base">
      <div id="image-summer"></div>
   </div>
</main>
<script>document.getElementById("submitButton").disabled = true;</script>
<script src="validation.js"></script>
</body> 
</html>
<?php 
unset($_SESSION["error_code"]);
?>