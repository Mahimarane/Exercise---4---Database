<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
 $ProgrammingLanguage = $Percentage = "";
$ProgrammingLanguage_err = $Percentage_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    
    // Validate ProgrammingLanguage
    $input_ProgrammingLanguage = trim($_POST["ProgrammingLanguage"]);
    if(empty($input_ProgrammingLanguage)){
        $ProgrammingLanguage_err = "Please enter an ProgrammingLanguage.";     
    } else{
        $ProgrammingLanguage = $input_ProgrammingLanguage;
    }
    
    // Validate Percentage
    $input_Percentage = trim($_POST["Percentage"]);
    if(empty($input_Percentage)){
        $Percentage_err = "Please enter the Percentage.";     
    
    } else{
        $Percentage= $input_Percentage;
    }
    
    // Check input errors before inserting in database
    if( empty($ProgrammingLanguage_err) && empty($Percentage_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO form ( ProgrammingLanguage, Percentage) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_ProgrammingLanguage, $param_Percentage);
            
            // Set parameters
           
            $param_ProgrammingLanguage = $ProgrammingLanguage;
            $param_Percentage = $Percentage;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form .</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       
                        <div class="form-group">
                            <label>Programming Language</label>
                            <textarea name="ProgrammingLanguage" class="form-control <?php echo (!empty($ProgrammingLanguage_err)) ? 'is-invalid' : ''; ?>"><?php echo $ProgrammingLanguage; ?></textarea>
                            <span class="invalid-feedback"><?php echo $ProgrammingLanguage_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Percentage</label>
                            <textarea  name="Percentage" class="form-control <?php echo (!empty($Percentage_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Percentage; ?>"></textarea>
                            <span class="invalid-feedback"><?php echo $Percentage_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>