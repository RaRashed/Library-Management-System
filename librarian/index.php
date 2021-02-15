<?php
require_once 'header.php';

?>
               
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>

                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                <div class="col-sm-12">
                    <div class="row">
                         <?php
                        $books=mysqli_query($con,"SELECT * FROM books");
                        $total_books=mysqli_num_rows($books);

                        $books_qty=mysqli_query($con,"SELECT SUM(`book_qty`) as total FROM books");
                        $qty = mysqli_fetch_assoc($books_qty);

                        $books_a_qty=mysqli_query($con,"SELECT SUM(`available_qty`) as total FROM books");
                        $qty_a = mysqli_fetch_assoc($books_a_qty);

                       

                        ?>
                    <!--BOX Style 1-->
               
                    <!--BOX Style 1-->
                 
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="manage-books.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-book"></i><?=$total_books . ' ('.$qty['total'].' - '. $qty_a['total'].')';?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>






                        <?php
                        $students=mysqli_query($con,"SELECT * FROM students");
                        $total_students=mysqli_num_rows($students);
                       

                        ?>
                    <!--BOX Style 1-->
               
                    <!--BOX Style 1-->
                 
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users  "></i><?=$total_students;?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Students</h4>
                                </div>
                            </a>
                        </div>
                    </div>

         
         
                        <?php
                        $librarians=mysqli_query($con,"SELECT * FROM librarian");
                        $total_librarians=mysqli_num_rows($librarians);
                       

                        ?>
                    <!--BOX Style 1-->
               
                    <!--BOX Style 1-->
                 
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users  "></i><?=$total_librarians;?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Librarian</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 1-->
             
              
                </div>
                 
                </div>
        
        </div>
        <?php
        require_once 'footer.php';
        ?>
