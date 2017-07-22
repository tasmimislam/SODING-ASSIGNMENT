
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php
  include('functions.php'); 
include('connection.php');
   $errorAlert=$name=$des=$cdate="";
    if (isset( $_POST['save'] ) ){
     
        $actn = $_POST['save'];
        $name = validateFormData($_POST['name']);   
        $des = validateFormData($_POST['des']);   
        $cdate = validateFormData($_POST['cdate']);
        
        
        $query = "INSERT INTO `task` (`name`, `des`, `cdate`) VALUES ('$name', '$des', '$cdate')";
            
        $result = mysqli_query($conn,$query);
        
        if($result == false)
          echo "Insert Not successful"."<br>";
        else
        {
            $npkid = $conn->insert_id;
            // printf("Last inserted record has id %d\n", $conn->insert_id);
            // echo "Insert Successful"."<br>";   
            if ($actn == "save") {
                header("Location: viewtask.php?alert=success");                   
            }
            else{
                header("location: viewtask.php?p=$npkid");                   
            }
        }
    }

?>
<style>
   body {
    background-color: #fff;
	font-size:14px;
	font-weight: bold;
	font-family:verdana;
        }

h1 {
    background-color: #34495E;
	color: white;
    }
input[type=text] {
    background-color: #4cffe1;
    color: black;
	font-size:16px;
	font-weight: bold;
	font-family:verdana;
                 }
                         .form-control {
 background-color: #4cffe1;}
</style>
 <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Soding</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="createtask.php">Create Task</a></li>
            <li><a href="viewtask.php">View Task</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br><br>
    <div class="container">
        <center><h1 class="page-header">Create a Task</h1></center>
        <?php echo $errorAlert; ?>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            

            
                <div class="form-group">
                    <label class="control-label col-sm-2">Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" placeholder="Name" id="name" value="<?php echo $name; ?>" required>
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="control-label col-sm-2">Description</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="des" placeholder="Description" id="des" value="<?php echo $des; ?>" required>
                    </div>
                </div>

                   <div class="form-group">
                    <label class="control-label col-sm-2">Date</label>
                    <div class="col-sm-5">
                       <input type="text" name="cdate"
 id="cdate"   value="<?php echo date('m/d/y');?>" / >
                    </div>
                </div>
                
               
               
                <button class="btn  btn-primary  col-sm-offset-2 " type="submit" name="save">Save</button>
            </form>
    </div>
    <br>

