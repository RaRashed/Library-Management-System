<?php
require_once 'header.php';

if(isset($_POST['issue-book'])){
    $student_id= $_POST['student_id'];
    $book_id= $_POST['book_id'];
    $book_issue_date= $_POST['book_issue_date'];
    $result=mysqli_query($con,"INSERT INTO `issue_books`( `student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id','$book_id','$book_issue_date')");

    if($result){
        mysqli_query($con," UPDATE  books SET available_qty=available_qty-1 where id='$book_id' ");
        ?>
        <script type="text/javascript">
            alert(' Book Issued Successfully');
        </script>
        <?php

    }
    else{
        ?>
         <script type="text/javascript">
            alert(' Not Issued Successfully');
        </script>
        <?php

    }
}

?>
               
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                             <li><a href="javascript:avoid(0)">Issue Book</a></li>

                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
               <div class="col-sm-6 col-sm-offset-3">
                   
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="" class="form-inline">
                                       
                                        <div class="form-group">
                                            
                                      
                                           <select class="form-control" name="student_id">
                                               <option value="">Select</option>
                                                       <?php

                                        $result=mysqli_query($con, "select * from students where status = '1'");
                                        while ($row = mysqli_fetch_assoc($result)){
                                            ?>
                                              <option value="<?=$row['id']?>"><?= ucwords($row['fname'].' '.$row['lname']).' - ('.$row['roll'].')'?></option> 

                                            <?php
                                        } 
                                            ?>
                                              
                                           </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                            if(isset($_POST['search'])){
                              
                                $id= $_POST['student_id'];
                                        $result=mysqli_query($con, "select * from students where id ='$id' AND status ='1'");
                                        $row = mysqli_fetch_assoc($result);

                                       ?>
                                       <form method="post" action="">
                                       
                                        <div class="form-group">
                                            <label for="email">Student Name</label>
                                            <input type="text" class="form-control" id="name" value="<?=ucwords($row['fname'].' '.$row['lname'])?>" readonly>
                                            <input type="hidden" name="student_id" value="<?=$row['id']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Book Name</label>
                                                   <select class="form-control" name="book_id">
                                                    
                                               <option value="">Select</option>
                                                       <?php

                                        $result=mysqli_query($con, "select * from books where available_qty > 0");
                                        while ($row = mysqli_fetch_assoc($result)){
                                            ?>
                                              <option value="<?=$row['id']?>"><?= $row['book_name']?></option> 

                                            <?php
                                        } 
                                            ?>
                                              
                                           </select>
                                            
                                        </div>
                                           <div class="form-group">
                                            <label>Book Issue Date</label>

                                            <input type="text" class="form-control" name="book_issue_date" value="<?=date('d-m-Y')?>" readonly>
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="issue-book">Save Issue Book</button>
                                        </div>
                                    </form>
                                       <?php
                                
                            }
                            ?>
                        </div>
                    </div>
                </div>
        
        </div>
        <?php
        require_once 'footer.php';
        ?>
