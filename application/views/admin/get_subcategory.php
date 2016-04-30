<?php

require 'connect_db.php';


if ($_POST['id']) {
    $id = $_POST['id'];


    $query = "SELECT * FROM subcategory WHERE cid=$id";
    $sql = mysqli_query($conn, $query);


    ?>


    <option value="" selected="selected">Select Sub Category</option>

    <?php
    while ($row = mysqli_fetch_assoc($sql)) {


        ?>

        <option value="<?php echo $row['scid']; ?>"><?php echo $row['scname']; ?></option>


        <?php
    }
}
?>