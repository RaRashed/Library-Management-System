


<?php require_once 'header.php'; ?>

           <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="test.php">Test</a></li>
                            
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                <div class="col-sm-4">
                    <?php

  if(isset($_GET['id'])){
                $id=$_GET['id'];
$result = mysqli_query($con,"SELECT * FROM students where id='$id'");
if ($row =mysqli_fetch_assoc($result)) {
    ?>
<div class="box">
           
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?=$row['fname']?>" required>
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="hidden" class="form-control" placeholder="First Name" name="id" value="<?=$row['id']?>" >
                        
                        </div>
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?=$row['lname']?>" required>
                                <i class="fa fa-user"></i>
                            </span>

                           
                        </div>
                          <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Roll" value="<?=$row['roll']?>" readonly>
                                <i class="fa fa-user"></i>
                            </span>

                     
                        </div>
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Reg. No." name="reg" pattern="[0-9]{6}" value="<?=$row['reg']?>" readonly>
                                <i class="fa fa-user"></i>
                            </span>

                     
                        </div>
                           <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" value="<?=$row['department']?>" readonly>
                                <i class="fa fa-user"></i>
                            </span>

                        </div>




                    








                        
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?=$row['email']?>">
                                <i class="fa fa-envelope"></i>
                            </span>

                           
                        </div>
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="User Name" name="username" value="<?=$row['username']?>" required>
                                <i class="fa fa-user"></i>
                            </span>

                           
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                                <i class="fa fa-key"></i>
                            </span>

                            
                        </div>
                     
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" value="<?=$row['phone']?>" name="phone" pattern="01[3|4|5|6|7|8|9][0-9]{8}">
                                <i class="fa fa-user"></i>
                            </span>

                      
                        </div>
                      
                        <div class="form-group">
                        
                        <input class="btn btn-primary btn-block" type="submit" name="student_update" value="Update Student Info">
                        
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php
  
}
}

                                     

                                        if (isset($_POST['student_update'])) {
    $id =$_POST['id'];                                    
    $fname = $_POST['fname'];
     $lname = $_POST['lname'];
      $email = $_POST['email'];
       $username = $_POST['username'];
        $password = $_POST['password'];
         $phone = $_POST['phone'];
    


          

          $result=mysqli_query($con,"UPDATE `students` SET `fname`='$fname',`lname`='$lname',`email`='$email',`username`='$username',`password`='$password',`phone`='$phone' WHERE `id`='$id'");
          if($result){
        ?>
        <script type="text/javascript">
            alert(' Book Updated Successfully');
            javascript:history.go(-1);
        </script>
        <?php

    }
    else{
        ?>
         <script type="text/javascript">
            alert(' Not not Updated');
        </script>
        <?php

    }

        
       


}




?>





                                            

                                    
                
                </div>
        
        </div>
<?php require_once 'footer.php'; ?>
