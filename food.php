<?php
require('Database/DBController.php');
include('header.php');

if (isset($_POST['cartsubmit'])) {
    if (!isset($_SESSION['userID'])) {
        echo "First Login then Add into cart";
    } else {
        $user_id = $_SESSION['userID'];
        $item_id = $_POST['item_id'];
        $sql = "select * from cart where item_id = '$item_id' and user_id = '$user_id'";
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);
        if ($num >= 1) {
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $quantity = $row['quantity'];
            $quantity = $quantity + 1;
            $query = "update cart set quantity = '$quantity' where item_id = '$item_id' and user_id = '$user_id'";
            mysqli_query($con, $query);
        } else {
            $query = "insert into cart(user_id, item_id, quantity) values ('$user_id','$item_id', '1')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "Inserted";
            }
        }
    }
}

if (isset($_POST['wishlistsubmit'])) {
    if (!isset($_SESSION['userID'])) {
        echo "First Login then Add into cart";
    } else {
        $user_id = $_SESSION['userID'];
        $item_id = $_POST['item_id'];
        $sql = "select * from wishlist where item_id = '$item_id' and user_id = '$user_id'";
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);
        if ($num >= 1) {
            $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $quantity = $row['quantity'];
            $quantity = $quantity + 1;
            $query = "update wishlist set quantity = '$quantity' where item_id = '$item_id' and user_id = '$user_id'";
            mysqli_query($con, $query);
        } else {
            $query = "insert into wishlist(user_id, item_id, quantity) values ('$user_id','$item_id', '1')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "Inserted";
            }
        }
    }
}
?>

<?php
include('Templates/_foood.php');
?>

<?php
include('footer-column.php');
?>


<!---Swiper js--->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="js/food.js"></script>

<?php
include('footer.php');
?>