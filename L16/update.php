<?php
// Include config file
require_once "config.php";
$name = $class = $PRN = "";
$name_err = $class_err = $PRN_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    $input_class = trim($_POST["class"]);
    if(empty($input_class)){
        $class_err = "Please enter an class.";     
    } else{
        $class = $input_class;
    }
    $input_PRN = trim($_POST["PRN"]);
    if(empty($input_PRN)){
        $PRN_err = "Please enter the PRN.";     
    } elseif(!ctype_digit($input_PRN)){
        $PRN_err = "Please enter a positive integer value.";
    } else{
        $PRN = $input_PRN;
    }

    if(empty($name_err) && empty($class_err) && empty($PRN_err)){
        $sql = "UPDATE students SET name=?, class=?, PRN=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_class, $param_PRN, $param_id);
            
            $param_name = $name;
            $param_class = $class;
            $param_PRN = $PRN;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        $sql = "SELECT * FROM students WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $name = $row["name"];
                    $class = $row["class"];
                    $PRN = $row["PRN"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($link);
    }  else{
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
                    <p>Please edit the input values and submit to update the students record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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