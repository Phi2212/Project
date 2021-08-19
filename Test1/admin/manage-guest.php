<?php include('otherpart/menu.php') ?>

<div class="main-content">
    <div class="frame">
        <h1>Manage Customer</h1>
        <br>

        <table class="tbl-full">
            <thead>

            
            <tr>
                <th>Seri.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            </thead>
            <?php 
                        $sql = "SELECT * FROM fod_guest";
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
                                    $name=$rows['name'];
                                    $username=$rows['username'];


                                    ?>
                                        <tr>
                                            <td><?php echo $stt++; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>Ban</td>
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