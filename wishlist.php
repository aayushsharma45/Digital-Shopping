<?php
require('Database/DBController.php');
include('header.php');

if (isset($_POST['remove'])) {
    $user_id = $_SESSION['userID'];
    $item_id = $_POST['item_id'];
    $sql = "delete from wishlist where user_id = '$user_id' and item_id = '$item_id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "removed";
    }
}
?>

<?php
include('Templates/__wishlist.php');
?>

<?php
include('footer-column.php');
?>


<?php
include('footer.php');
?>