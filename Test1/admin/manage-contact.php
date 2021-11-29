<?php include('otherpart/menu.php') ?>
<div class="main-content">
    <div class="frame">
        <h1>Manage Contact</h1>
        <br>
<table class="tbl-full">
                    <thead>
                    <tr>
                        <th>Seri.N</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Content</th>
                        <th>Create Date</th>
                    </tr>
                    </thead>
                        <?php 
                        $sql = "SELECT * FROM fod_contact";
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
                                    $phone=$rows['phone'];
                                    $createdate=$rows['date'];
                                    $content=$rows['content'];
                                    ?>
                                        <tr>
                                            <td><?php echo $stt++; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo $content; ?></td>
                                            <td><?php echo $createdate; ?></td>
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