    <?php
    $quantity = 0;
    $delivery = 0;
    $productId = 0;
    if (isset($_POST['quantity']))
        $quantity = (int)$_POST['quantity'];
    if (isset($_POST['delivery']))
        $delivery = (int)$_POST['delivery'];
    if (isset($_POST['productId']))
        $productId = (int)$_POST['productId'];

    if ($quantity > 0 && $delivery > 0 && $productId > 0) {
        if (isset($_COOKIE[$productId . '_' . $delivery]))
            setcookie($productId . '_' . $delivery, $_COOKIE[$productId . '_' . $delivery] + $quantity);
        else
            setcookie($productId . '_' . $delivery, $quantity);

        if (isset($_COOKIE['total'])) {
            $currentIndex = $_COOKIE['total'];
            setcookie("item$currentIndex", $productId . '_' . $delivery);
            setcookie('total',$_COOKIE['total'] + 1);
        } else {
            setcookie('total', 1);
            setcookie("item0", $productId . '_' . $delivery);
        }


        echo "<script>alert('Added successfully.')</script>";
        echo "<script>self.location='home.php'</script>";
        exit;
    } else {
        echo "<script>alert('Added failed.')</script>";
        echo "<script>self.location='fishfood.html'</script>";
        exit;
    }

    ?>

