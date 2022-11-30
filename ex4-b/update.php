<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$ProgrammingLanguage = $Percentage = "";
$ProgrammingLanguage_err = $Percentage_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    
    // Validate ProgrammingLanguage
    $input_ProgrammingLanguage = trim($_POST["ProgrammingLanguage"]);
    if(empty($input_ProgrammingLanguage)){
        $ProgrammingLanguage_err = "Please enter an Programming Language.";     
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
    if(empty($ProgrammingLanguage_err) && empty($Percentage_err)){
        // Prepare an update statement
        $sql = "UPDATE form SET  ProgrammingLanguage=?, Percentage=? WHERE Ranking=?";
        
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi",  $param_ProgrammingLanguage, $param_Percentage, $param_id);
            
            // Set parameters
           
            $param_ProgrammingLanguage = $ProgrammingLanguage;
            $param_Percentage= $Percentage;
            $param_id= $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM form WHERE Ranking = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    
                    $ProgrammingLanguage= $row["ProgrammingLanguage"];
                    $Percentage = $row["Percentage"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        
                    <div class="form-group">
                    <label>Programming Language</label>
                    <textarea name="ProgrammingLanguage" class="form-control <?php echo (!empty($ProgrammingLanguage_err)) ? 'is-invalid' : ''; ?>"><?php echo $ProgrammingLanguage; ?></textarea>
                    <span class="invalid-feedback"><?php echo $ProgrammingLanguage_err;?></span>
                </div>
                <div class="form-group">
                    <label>Percentage</label>
                    <input type="text"  name="Percentage" class="form-control <?php echo (!empty($Percentage_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Percentage; ?>">
                    <span class="invalid-feedback"><?php echo $Percentage_err;?></span>
                </div>
                
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>