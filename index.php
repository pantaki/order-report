<?php
//


//header("Location: install.php?shop=" . $_GET['shop']);
//exit();
//

//require_once("inc/ShopifyClient.php");

//$requests = $_GET;
//$shop = $requests['shop'];
//$requests = serialize($requests);
//$params = array_diff_key($params, array('hmac' => ''));
//ksort($params);
//$hmac = $_GET['hmac'];
//echo 'testet 123123';
//
////$access_token = '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';
//$access_token = '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';
//$orders = shopify_call($access_token, $shop, "/admin/api/2022-01/orders.json?status=any", array(), 'GET');
//$orders = json_decode($orders['response'], JSON_PRETTY_PRINT);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Redesign</title>
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>
<body>
<?php
include_once("inc/function.php");
include_once("inc/mysql_connect.php");
include_once("header.php");
include_once("orders.php");


?>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            showDropdowns: true,
            // minYear: 2005,
            // maxYear: parseInt(moment().format('YYYY'), 10)

        }, cb);

        function cb(start, end) {
            // alert(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('input[name="daterange_start"]').val(start.format('YYYY-MM-DD'));
            $('input[name="daterange_end"]').val(end.format('YYYY-MM-DD'));

            // $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    })
    </script>
</body>
</html>

