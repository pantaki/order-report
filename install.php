<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "f725a2b0f04922ff794632b712428bc2";
//$scopes = "read_orders,write_orders,read_all_orders, write_fulfillments, read_fulfillments, write_assigned_fulfillment_orders, read_assigned_fulfillment_orders";
$scopes = "read_all_orders, read_analytics, read_customers, write_files, read_files, write_discounts, read_discounts, write_customers, write_assigned_fulfillment_orders, read_assigned_fulfillment_orders, write_inventory, read_inventory, write_gift_cards, read_gift_cards, write_fulfillments, read_fulfillments, write_orders, read_orders, write_payment_terms, read_payment_terms, write_price_rules, read_price_rules, write_product_listings, read_product_listings, write_products, read_products, write_reports, read_reports, write_script_tags, read_script_tags, write_locales, read_locales";
$redirect_uri = "https://tuankiet.phan.life/app/export_order/token.php";

// Build install/approval URL to redirect to
$install_url ="https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();

?>