<?php include('otherpart/menu.php'); ?>
<div class="main-content">
    <div class="frame">
        <h1> Add Staff </h1>
        <form action="add-staff.php?action=add" method="POST">
        <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['empty']))
                    {
                        echo $_SESSION['empty'];
                        unset($_SESSION['empty']);
                    }
        ?> 

            <table class="tbl-1">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="staff_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>

                <tr>
                    <td>Block</td>
                    <td><input type="radio" name="isblock" value="No">No</td>
                    <td><input type="radio" name="isblock" value="Yes">Yes</td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Staff" class="btn-secondary">
                    </td>
                </tr>
            </table>  

        </form>
    </div>
</div>

<?php include('otherpart/footer.php'); ?>

<?php

if(isset($_POST['submit']))
{
    //Test submit//
 $staff_name = $_POST['staff_name'];
 $username = $_POST['username'];
 $password = md5($_POST['password']);
 $createdate = date("Y-m-d h:i:sa");
 if(isset($_POST['isblock']))
 {
     $isblock = $_POST['isblock'];
 }
 else
 {
     $isblock = "Yes";
 }
 if ($staff_name == "" || $password == "" || $username == "") {

    $_SESSION['empty'] = "<div class= 'error'>Fill your information!</div>";
    header("location:".SITEURL.'admin/add-staff.php');
 }
 else{
     if(isset($_GET['action']) && $_GET['action']== 'add'){
         $sql_check = "SELECT * FROM fod_staff WHERE username='$username'";
         $res_check = mysqli_query($conn, $sql_check);
         if (mysqli_num_rows($res_check) > 0 ) { 	               
            //echo "Fail";
            $_SESSION['add'] = "<div class= 'error'>Exist User!Try Again</div>";
            header("location:".SITEURL.'admin/add-staff.php'); 
        } 
        else{

           
            $sql = "INSERT INTO fod_staff SET
            staff_name='$staff_name',
            username='$username',
            password='$password',
            createdate='$createdate',
            isblock='$isblock'
         ";
        
         //echo $sql;
         $res = mysqli_query($conn, $sql) or die(mysqli_query());
        
         if(!$res)
         {
                //Test data insert
                //echo "Fail";
                $_SESSION['add'] = "<div class= 'error'>Error!Try Again</div>";
                header("location:".SITEURL.'admin/add-staff.php');

         }
         
         else
         {
             //echo "Date insert";
             $_SESSION['add'] = "<div class='success'>Staff Added Successfully!</div>";
             header('location:'.SITEURL.'admin/manage-staff.php');
         }
        }
     }

 }

   
 

}

?>