
<?php include('otherpart/menu.php') ?>

        <!-- Main content-->
        <div class="main-content">
            <div class="frame">
                <h1>Manage Admin</h1>
                <br /><br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                        
                    if(isset($_SESSION['password-not-match']))
                    {
                        echo $_SESSION['password-not-match'];
                        unset($_SESSION['password-not-match']);
                    }

                    if(isset($_SESSION['change-password']))
                    {
                        echo $_SESSION['change-password'];
                        unset($_SESSION['change-password']);
                    }

                ?>

                <br /><br />

                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br /><br />

                <table class="tbl-full">
                    <thead>

                    
                    <tr>
                        <th>Seri.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Create Date</th>
                        <th>Permission</th>
                        <th>Block</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                        <?php 
                        $sql = "SELECT * FROM fod_admin";
                        $res = mysqli_query($conn, $sql);

                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);
                            $stt=1;

                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {

                                    $id=$rows['id'];
                                    $admin_name=$rows['admin_name'];
                                    $username=$rows['username'];
                                    $createdate=$rows['createdate'];
                                    $isblock=$rows['isblock'];
                                    $permission=$rows['permission'];


                                    ?>
                                        <tr>
                                            <td><?php echo $stt++; ?></td>
                                            <td><?php echo $admin_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $createdate; ?></td>
                                            <td>
                                                <?php 
                                                    if($permission==0)
                                                    {
                                                        echo "Manage Account";
                                                    }
                                                    if($permission==1)
                                                    {
                                                        echo "Warehouse Manager";
                                                    }
                                                    if($permission==2)
                                                    {
                                                        echo "Manage Message";
                                                    }
                                                    if($permission==3)
                                                    {
                                                        echo "Manage Order";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $isblock; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL;  ?>admin/change-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                                <a href="<?php echo SITEURL;  ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                <a href="<?php echo SITEURL;  ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-dangerous">Delete Admin</a>
                                            </td>
                                         </tr>                                       
                                    <?php
                                }
                                
                            }
                            else
                            {

                            }
                        }
                        ?>
                </table>
            </div>
        </div>
                    
<?php include('otherpart/footer.php') ?>
        