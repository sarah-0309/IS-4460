    <?php
    $delivery = 0;
    $productId = 0;
    if (isset($_POST['delivery']))
        $delivery = (int)$_POST['delivery'];
    if (isset($_POST['productId']))
        $productId = (int)$_POST['productId'];

    if ( $delivery > 0 && $productId > 0 && isset($_COOKIE['product' . $productId . '_quantity'.$delivery])) {
        setcookie('product' . $productId . '_quantity'.$delivery);
        echo "<script>alert('Deleted successfully.')</script>";
        echo "<script>self.location='cart.php'</script>";
        exit;
    } else {
        echo "<script>alert('Delete failed.')</script>";
        echo "<script>self.location='fishfood.html'</script>";
        exit;
    }

    ?>

