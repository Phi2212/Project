<?php include('otherpart/menu.php') ?>

<div class="main-content">
    <div class="frame">
    <h1>Manage Staff</h1>
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

                ?>
                <br><br>
    <a href="add-staff.php" class="btn-primary">Add Staff</a>
    <br /><br />
    <table class="tbl-full">
        <thead>
            <tr>
                <th>Seri.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Create Date</th>
                <th>Block</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php 
                        $sql = "SELECT * FROM fod_staff";
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
                                    $staff_name=$rows['staff_name'];
                                    $username=$rows['username'];
                                    $createdate=$rows['createdate'];
                                    $isblock=$rows['isblock'];
                                    
                                    ?>
                                        <tr>
                                            <td><?php echo $stt++; ?></td>
                                            <td><?php echo $staff_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $createdate; ?></td>
                                            <td><?php echo $isblock; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL;  ?>admin/update-staff.php?id=<?php echo $id; ?>" class="btn-secondary">Update Staff</a>
                                                <a href="<?php echo SITEURL;  ?>admin/delete-staff.php?id=<?php echo $id; ?>" class="btn-dangerous">Delete Staff</a>
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