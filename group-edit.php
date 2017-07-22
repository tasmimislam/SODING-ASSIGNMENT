<?php

include('functions.php'); 
include('connection.php');


    $errorAlert=$name=$des=$cdate="";
    if (isset( $_POST['save'] ) ){

        

        $id = $_POST['id'];
        // $manual_id = $_POST['manual-ida'].$_POST['manual-idb'];
        $name = validateFormData($_POST['name']);
        $des = validateFormData($_POST['des']);   
        $cdate = validateFormData($_POST['cdate']);
        $ppno = validateFormData($_POST['ppno']);
        $father = validateFormData($_POST['father']);
        $mother = validateFormData($_POST['mother']);
        $spouse = validateFormData($_POST['spouse']);
        $address = validateFormData($_POST['address']);
        $contact = validateFormData($_POST['contact']);
        $email = validateFormData($_POST['email']);
        $dob = validateFormData($_POST['dob']);
        $ppissue = validateFormData($_POST['ppissue']);
        $ppexpiry = validateFormData($_POST['ppexpiry']);
        
        $query = "UPDATE `task` SET `name` = '$name', `des` = '$des', `cdate` = '$ddate' WHERE `task`.`id` = '$id'";
	        
        $result = mysqli_query($conn,$query);
        
        if($result == false)
		  echo "Update Not successful"."<br>";
	    else
        {
            // echo "Insert Successful"."<br>";   
            header("Location: group-list.php?edit=success");
                
                // $query="SELECT * FROM group WHERE user_id = '$user_id'";
       
                // $result = mysqli_query($conn,$query);
                    
                // if(mysqli_num_rows($result)>0) {
                // while($row=mysqli_fetch_assoc($result)) {

                    // $gname =$row['gname'];
                    // $glname =$row['glname'];
                    // $nid =$row['nid'];
                    // $ppno =$row['ppno'];
                    // $father =$row['father'];
                    // $mother =$row['mother'];
                    // $spouse =$row['spouse'];
                    // $address =$row['address'];
                    // $contact =$row['contact'];
                    // $email =$row['email'];
                    // $dob =$row['dob'];
                    // $ppissue =$row['ppissue'];
                    // $ppexpiry =$row['ppexpiry'];

                    // echo "<pre>";
                    // print_r($row);
                    // echo "</pre>";
        }
    }

    $id = "0";
    if(isset($_REQUEST['g'])){
        $id = $_REQUEST['g'];
    }

    $readQuery = "SELECT * FROM `test` WHERE `id` = '$id'";
    // die($sql);
    $groupResult = mysqli_query($conn,$readQuery);
    if(mysqli_num_rows($groupResult)>0) {
        while($row = mysqli_fetch_assoc($groupResult)) {
            $id = $row['id'];
            $des = $row['des'];
            $cdate = $row['cdate'];
            $name = $row['name'];
        }
    }
    else{
        $id = "";
        $des = "";
        $name = "";
        $cdate = "";
        
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
</style>
    <div class="container">
        <center><h1 class="page-header">Add Group</h1></center>
        <?php echo $errorAlert; ?>
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            
                <div class="form-group">
                    <label class="control-label col-sm-2">ID</label>
                    <div class="col-sm-5">
                        <b><?php echo $id; ?></b>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="control-label col-sm-2"> Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" placeholder="Group Name" id="name" value="<?php echo $name; ?>" required>
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="control-label col-sm-2">Description</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="des" placeholder="Leader Name" id="des" value="<?php echo $des; ?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2">Date</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="cdate" placeholder="NID No" id="cdate" value="<?php echo $cdate; ?>" >
                    </div>
                </div>
                
               
             
               
                <button class="btn  btn-primary  col-sm-offset-2 " type="submit" name="save">Update</button>
            </form>
    </div>
    <br>

    
        <?php include('footer.php'); ?>