<?php
require_once "config.php";
 
$name = $class = $PRN = "";
$name_err = $class_err = $PRN_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate class
    $input_class = trim($_POST["class"]);
    if(empty($input_class)){
        $class_err = "Please enter an class.";     
    } else{
        $class = $input_class;
    }
    
    // Validate PRN
    $input_PRN = trim($_POST["PRN"]);
    if(empty($input_PRN)){
        $PRN_err = "Please enter the PRN amount.";     
    } elseif(!ctype_digit($input_PRN)){
        $PRN_err = "Please enter a positive integer value.";
    } else{
        $PRN = $input_PRN;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($class_err) && empty($PRN_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO students (name, class, PRN) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_class, $param_PRN);
            
            // Set parameters
            $param_name = $name;
            $param_class = $class;
            $param_PRN = $PRN;
            
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
                    <p>Please fill this form and submit to add student record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Class</label>
                            <textarea name="class" class="form-control <?php echo (!empty($class_err)) ? 'is-invalid' : ''; ?>"><?php echo $class; ?></textarea>
                            <span class="invalid-feedback"><?php echo $class_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>PRN</label>
                            <input type="text" name="PRN" class="form-control <?php echo (!empty($PRN_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $PRN; ?>">
                            <span class="invalid-feedback"><?php echo $PRN_err;?></span>
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