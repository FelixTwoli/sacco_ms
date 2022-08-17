<?php
// Include config file
require_once "./db_connection.php";
 
// Define variables and initialize with empty values
$name = "";
$county = "";
$amount = "";
$name_err = "";
$county_err = "";
$amount_err = "";

// $name = $_POST['name'];
// $county = $_POST['county'];
// $amount = $_POST['amount'];


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
    
    // Validate county
    $input_county = trim($_POST["county"]);
    if(empty($input_county)){
        $county_err = "Please enter an county.";     
    } else{
        $county = $input_county;
    }
    
    // Validate salary
    $input_amount = trim($_POST["amount"]);
    if(empty($input_amount)){
        $amount_err = "Please enter the amount.";     
    } elseif(!ctype_digit($input_amount)){
        $amount_err = "Please enter a positive integer value.";
    } else{
        $amount = $input_amount;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($county_err) && empty($amount_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO `Savings` (`name`, `county`, `amount`) VALUES ('$name', '$county', '$amount')";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_county, $param_amount);
            
            // Set parameters
            $param_name = $name;
            $param_county = $county;
            $param_amount = $amount;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: home.php");
                exit();
            } else{
               echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        //  mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
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
                    <p>Please fill this form and submit to add saving record to the database.</p>
                    <form name="create" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>County</label>
                            <input type="text" name="county" class="form-control <?php echo (!empty($county_err)) ? 'is-invalid' : ''; ?>"><?php echo $county; ?></textarea>
                            <span class="invalid-feedback"><?php echo $county_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control <?php echo (!empty($amount_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $amount; ?>">
                            <span class="invalid-feedback"><?php echo $amount_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="home.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php
include './incl/footer.php';
?>