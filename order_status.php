<?php
include './dbconfigur.php';
if (!empty($user_id)) {
    ?>
    <html>
        <head>
            <title>Booking Status - Easy Cab</title>
            <?php include './title.php'; ?>
        </head>
        <body>            
            <?php include './header.php'; ?>
            <?php include './leftmenu.php'; ?>
            <div class="gallery">
                <div class="about" style="min-height: 450px;">
                    <h4>Booking History</h4>
                 <form class="form-light mt-20" role="form" method="post" action="">
                    <table class="table_list" cellspacing="2" cellpadding="2" width="100%">
                        <?php
                        if (isset($_GET['status']) && $_GET['status'] == "success") {
                            echo '<div class="indv_fields " style="color:red"> Fare  has been successfully deleted </div>';
                        } elseif (isset($_GET['updatestatus']) && $_GET['updatestatus'] == "success") {
                            echo '<div class="indv_fields " style="color:red">Property has been approved.</div>';
                        }
                        if (!empty($error)) {
                            echo '<tr><td>' . $error . '</td></tr>';
                        }
                        ?>
                        <div class="clear"></div>
                        <tr>
                            <td class="grid_heading">S.No</td>
                            <td class="grid_heading">Name</td>
                            <td class="grid_heading">From</td>
                            <td class="grid_heading">To</td>
                            <td class="grid_heading">Total KM</td>
                            <td class="grid_heading">Total Cost</td>
                            
                         
                        </tr>
                        <?php
                        $i = 0;
                        $sql = "";
                        if ($user_type == "user") {
                            $sql = "SELECT b.id,r.fname,b.froms,b.too,b.total_km,b.total_fare  FROM register r, book b WHERE r.id = b.userid and b.userid='$user_id' ORDER BY r.id ASC";
                        } 

                        $result = mysql_query($sql);
                        if (mysql_num_rows($result) > 0) {
                            while ($row = mysql_fetch_array($result)) {
                                $i++;
                                ?>

                                <tr>
                                    
                                    <td class="grid_label" align="center"><?php echo $i; ?></td>
                                    <td class="grid_label"><?php echo $row['fname'] ?></td>
  
                                    <td class="grid_label"><?php echo $row['froms'] ?></td>
                                    <td class="grid_label"><?php echo $row['too'] ?></td>
                                    <td class="grid_label"><?php echo $row['total_km'] ?></td>
                                    <td class="grid_label"> <?php echo ($row['total_fare']) ?></td>      

                                  
                                    </td>                            

                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </form>

                </div>
                <div class="clear"> </div>
            </div>                        
            <div class="clear"></div>
            <?php include './footer.php'; ?>
        </body>
    </html>
    <?php
} else {
    header("location:login.php?msg=login");
}
?>