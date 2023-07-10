<?php

// Check if quntity cookies isset
// pull it out
$quantity = 0;
if (isset($_COOKIE['quantity'])) {
	// Pull quantity out of cookies
	$quantity = $_COOKIE['quantity'];
}
?>

<html>

<head>
	<link rel="stylesheet" href="styles.css">

</head>

<body>
	<header align='center'>
		<img src='image1.png' height='200' width='200' />
	</header>
	<br>
	<table class='table-border' align='center'>
		<tr>
			<td>
			</td>
			<td>Item</td>
			<td>Quantity</td>
			<td>Unit Price</td>
			<td>Total</td>
			<td>Delivery</td>
			<td>Option</td>
		</tr>

		<?php
		require 'Mysql_Login.php';

		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);

		$total_price = 0;
		$total = 0;
		if (isset($_COOKIE['total'])) {
			$total = (int) $_COOKIE['total'];
		}

		for ($k = 0; $k < $total; $k++) {
			$itemID = $_COOKIE["item$k"];
			$quantity = $_COOKIE[$itemID];
			$item_arr = explode('_', $itemID);
			$i = $item_arr[0];
			$j = $item_arr[1];

			$query = 'SELECT * FROM inventory WHERE ProductID=' . $i;
			$result = $conn->query($query);
			if (!$result) die($conn->error);
			$row = $result->fetch_array(MYSQLI_ASSOC);

			$name = $row['Name'];
			$price = $row['Price'];


			$query = 'SELECT * FROM delivery WHERE delivery_id=' . $j;
			$result = $conn->query($query);
			if (!$result) die($conn->error);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$delivery = $row['method'];

			echo "<tr align='center'>";
			echo "<td align='center' >";
			echo "<img src='productImg/" . $i . ".png' height='50' width='50' />";
			echo "</td>";
			echo "<td>" . $name . "</td>";
			echo "<td>" . $quantity . "</td>";
			echo "<td>" . $price . "</td>";
			echo "<td>" . (float)$price * (int)$quantity . "</td>";
			echo "<td>" . $delivery . "</td>";
			echo "<td><form action='deleteItem.php' method='post'>";
			echo "<input type='submit';' value='DELETE'/>";
			echo "<input name='productId' value=" . $i . " hidden>";
			echo "<input name='delivery' value=" . $j . " hidden>";
			echo "</form></td>";
			echo "</tr>";
			$total_price += (float)$price * (int)$quantity;
		}
		// require 'itemsInformation.php';
		// for ($i = 1; $i <= $totalItems; $i++) {
		// 	$query = 'SELECT * FROM inventory WHERE ProductID=' . $i;
		// 	$result = $conn->query($query);
		// 	if (!$result) die($conn->error);
		// 	$row = $result->fetch_array(MYSQLI_ASSOC);

		// 	$name = $row['Name'];
		// 	$price = $row['Price'];


		// 	for ($j = 1; $j <= $totalDM; $j++) {
		// 		if (isset($_COOKIE['product' . $i . '_quantity' . $j]) && $_COOKIE['product' . $i . '_quantity' . $j] > 0) {
		// 			$quantity = $_COOKIE['product' . $i . '_quantity' . $j];
		// 			// echo "<script>console.log('quantity:".$quantity."')</script>";
		// 			$query = 'SELECT * FROM delivery WHERE delivery_id=' . $j;
		// 			$result = $conn->query($query);
		// 			if (!$result) die($conn->error);
		// 			$row = $result->fetch_array(MYSQLI_ASSOC);
		// 			$delivery = $row['method'];


		// 			echo "<tr align='center'>";
		// 			echo "<td align='center' >";
		// 			echo "<img src='productImg/" . $i . ".png' height='50' width='50' />";
		// 			echo "</td>";
		// 			echo "<td>" . $name . "</td>";
		// 			echo "<td>" . $quantity . "</td>";
		// 			echo "<td>" . $price . "</td>";
		// 			echo "<td>" . (float)$price * (int)$quantity . "</td>";
		// 			echo "<td>" . $delivery . "</td>";
		// 			echo "<td><form action='deleteItem.php' method='post'>";
		// 			echo "<input type='submit';' value='DELETE'/>";
		// 			echo "<input name='productId' value=" . $i . " hidden>";
		// 			echo "<input name='delivery' value=" . $j . " hidden>";
		// 			echo "</form></td>";
		// 			echo "</tr>";
		// 			$total += (float)$price * (int)$quantity;
		// 		}
		// 	}
		// }
		echo "<tr align='center'>";
		echo "<td colspan='4' align='left'>TOTAL</td>";
		echo "<td>" . $total_price . "</td>";
		echo "</tr>";
		$conn->close();


		?>
		<tr>
			<td colspan='1' align='left' valign='center'>
				<button onclick="window.history.back()">Back</button>
			</td>

			<td colspan='6' align='right' valign='center'>
				<form action="checkout.php" method="POST">
					<input type='submit' value='Proceed to Checkout' />
				</form>
			</td>
		</tr>
	</table>
</body>

</html>