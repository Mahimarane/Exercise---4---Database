<?php
// Initialize the session
session_start();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="Stylesheet" href="site.css">
    <style>
        body{ font: 14px sans-serif; 
            text-align: center; 
        background-color:rgb(161, 30, 52);
    color:white;
background-image: url(data:image/jpeg;base64,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);}
    </style>
</head>
<body>
   
        
    <h1 class="my-5">Hi, Welcome to our site.</h1>
    

    <h1>Proven Industry <br><span>Experts</span></br></h1>
                     <p class="para">NineStack is a boutique technology consulting firm that provides startup</p>
                     <p class="para">solutions and dedicated offshore IT resources so businesses can enhance</p>
                     <p class="para">their technology delivery capabilities. We are a trusted global technolog</p>
                     <p class="para">partner that builds cloud-based apps, develops scalable enterprise solutions</p>
                     <p class="para">and provides strategic guidance to our clients. We can develop on or across</p>
                     <p class="para">multiple modern frameworks based on diverse technologies like .NET/Core,</p>
                     <p class="para">Node, React, and almost any other framework stack.</p>



        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        

</body>

</html>