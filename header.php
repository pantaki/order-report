<?php
$shopify = $_GET;
$sql = "SELECT * FROM shops WHERE shop_url='".$shopify['shop']."' LIMIT 1";
$result = $conn->query($sql);

if($result->num_rows < 1) {
    header("Location: install.php?shop=".$shopify['shop']);
    exit();
} else {
    $shop_row = mysqli_fetch_assoc($result);
    $shop = $shopify['shop'];
    $token = $shop_row['access_token'];

//    echo $shop . '<br>';
//    echo $token . '<br>';
}
?>