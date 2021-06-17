<?php
require('Database/DBController.php');
include('header.php');

if (isset($_POST['delete'])) {
    $user_id = $_SESSION['userID'];
    $item_id = $_POST['item_id'];
    $sql = "delete from cart where user_id = '$user_id' and item_id = '$item_id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "deleted";
    }
}
?>

<?php
include('Templates/_carrt.php');
?>

<?php
include('footer-column.php');
?>




<?php
include('footer.php');
?>



