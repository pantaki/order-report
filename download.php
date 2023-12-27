<?php


$filename = 'orders.csv';
//$export_data = unserialize($_POST['export_order_data']);
$orders = $_POST['export_order_data'];
$orders = json_decode($orders, JSON_PRETTY_PRINT);
$start = ($_POST['daterange_start']) ? $_POST['daterange_start'] : date('Y-m-d');
$end = ($_POST['daterange_end']) ? $_POST['daterange_end'] : date('Y-m-d');
// file creation
$file = fopen($filename,"w");
$date_start = strtotime($start);
$date_end = strtotime($end);
$list_character = array('Super Hero', 'Princess Fairy Tale', 'Adult / Senior', 'Allergy / Medical', 'Animals', 'Emojis', 'Food', 'Kids', 'Monsters', 'Nature', 'Peace & Love', 'Space', 'Sports', 'Transportation', 'Tween');
$export_name = array('product', 'line1', 'line2', 'line3', 'line4', 'line5', 'background', 'font', 'character', 'fontColor', 'zoom1', 'zoom2', 'zoom3', 'zoom4', 'zoom5', 'line1_1', 'line2_1', 'line3_1', 'line4_1', 'line5_1', 'background_1', 'font_1', 'character_1', 'fontColor_1', 'zoom1_1', 'zoom2_1', 'zoom3_1', 'zoom4_1', 'zoom5_1', 'leather_case', 'sheet');
fputcsv($file, $export_name);
foreach ($orders as $order) {
//        echo '<pre>';
//        print_r($order);
//        echo '</pre>';
    foreach ($order as $key => $value) {
        $date_order = strtotime($value['created_at']);
        $date_order_ex = date('Y-m-d', $date_order);
        $date_order1 = strtotime($date_order_ex);

        if ($date_order1 >= $date_start && $date_order1 <= $date_end) {
//            echo '---v yes ok v----';
            foreach ($value['line_items'] as $key1 => $value1) {
                $product_id = '';
            $data_sku = $data_line1 = $data_line2 = $data_line3 = $data_line4 = $data_line5 = $data_background = $data_font_style = $data_character = $data_font_color = $data_zoom1 = $data_zoom2 = $data_zoom3 = $data_zoom4 = $data_zoom5 = '';
            $data_line1_1 = $data_line2_1 = $data_line3_1 = $data_line4_1 = $data_line5_1 = $data_background_1 = $data_font_1 = $data_character_1 = $data_font_color_1 = $data_zoom1_1 = $data_zoom2_1 = $data_zoom3_1 = $data_zoom4_1 = $data_zoom5_1 = '';
            $data_leather_case = $data_sheet = '';
                $product_id = $value1['product_id'];
                foreach ($value1['properties'] as $value2) {


//                    $data_sku = $data_line1 = $data_line2 = $data_line3 = $data_line4 = $data_line5 = $data_background = $data_font_style = $data_character = $data_font_color = $data_zoom1 = $data_zoom2 = $data_zoom3 = $data_zoom4 = $data_zoom5 = '';
//                    $data_line1_1 = $data_line2_1 = $data_line3_1 = $data_line4_1 = $data_line5_1 = $data_background_1 = $data_font_1 = $data_character_1 = $data_font_color_1 = $data_zoom1_1 = $data_zoom2_1 = $data_zoom3_1 = $data_zoom4_1 = $data_zoom5_1 = '';
//                    $data_leather_case = $data_sheet ='';

                    if ($value2['name'] == 'SKU') $data_sku = $value2['value'];
                    if (($value2['name'] == 'Line 1') || ($value2['name'] == 'Text - Line 1')) $data_line1 = $value2['value'];
                    if (($value2['name'] == 'Line 2') || ($value2['name'] == 'Text - Line 2')) $data_line2 = $value2['value'];
                    if (($value2['name'] == 'Line 3') || ($value2['name'] == 'Text - Line 3')) $data_line3 = $value2['value'];
                    if (($value2['name'] == 'Line 4') || ($value2['name'] == 'Text - Line 4')) $data_line4 = $value2['value'];
                    if (($value2['name'] == 'Line 5') || ($value2['name'] == 'Text - Line 5')) $data_line5 = $value2['value'];
                    if (($value2['name'] == 'Background') || ($value2['name'] == 'Color - Color')|| ($value2['name'] == 'Color')) $data_background = $value2['value'];
                    if (($value2['name'] == 'Font Style') || ($value2['name'] == 'Font & Font Color - Font') || ($value2['name'] == 'Font')) $data_font_style = $value2['value'];
                    if (($value2['name'] == 'Character') || (strpos($value2['name'], 'Character -') !== false) || in_array($value2['name'], $list_character)) $data_character = $value2['value'];
                    if (($value2['name'] == 'Font Color') || ($value2['name'] == 'Font & Font Color - Font Color')) $data_font_color = $value2['value'];
                    if ($value2['name'] == 'Zoom 1') $data_zoom1 = $value2['value'];
                    if ($value2['name'] == 'Zoom 2') $data_zoom2 = $value2['value'];
                    if ($value2['name'] == 'Zoom 3') $data_zoom3 = $value2['value'];
                    if ($value2['name'] == 'Zoom 4') $data_zoom4 = $value2['value'];
                    if ($value2['name'] == 'Zoom 5') $data_zoom5 = $value2['value'];
                    if ($value2['name'] == 'Line 1_1') $data_line1_1 = $value2['value'];
                    if ($value2['name'] == 'Line 2_1') $data_line2_1 = $value2['value'];
                    if ($value2['name'] == 'Line 3_1') $data_line3_1 = $value2['value'];
                    if ($value2['name'] == 'Line 4_1') $data_line4_1 = $value2['value'];
                    if ($value2['name'] == 'Line 5_1') $data_line5_1 = $value2['value'];
                    if ($value2['name'] == 'Background_1') $data_background_1 = $value2['value'];
                    if ($value2['name'] == 'Font_1') $data_font_1 = $value2['value'];
                    if ($value2['name'] == 'Character_1') $data_character_1 = $value2['value'];
                    if ($value2['name'] == 'Font Color_1') $data_font_color_1 = $value2['value'];
                    if ($value2['name'] == 'Zoom 1_1') $data_zoom1_1 = $value2['value'];
                    if ($value2['name'] == 'Zoom 2_1') $data_zoom2_1 = $value2['value'];
                    if ($value2['name'] == 'Zoom 3_1') $data_zoom3_1 = $value2['value'];
                    if ($value2['name'] == 'Zoom 4_1') $data_zoom4_1 = $value2['value'];
                    if ($value2['name'] == 'Zoom 5_1') $data_zoom5_1 = $value2['value'];
                    if ($value2['name'] == 'Leather Case') $data_leather_case = $value2['value'];
                    if ($value2['name'] == 'Package' || (strpos($value2['name'], 'Package') !== false)) $data_sheets = $value2['value'];

                }
                if ($data_sku != '' && $data_background != '') {
                    if ($data_zoom1 == '') $data_zoom1 = 1.2;

                    if($data_sheets == 'Extreme value package') {
                        $data_sheets = 4;
                    }
                    if (is_numeric($data_sheets)) {
                        $data_sheet = $data_sheets;
                    } else {
                        if (strpos($data_sheets, 'Sheets') !== false) {
                            preg_match('/(\d) Sheets/', $data_sheets, $matches);
                            $data_sheet = $matches[1];
                        }
                    }


                    $data_item = array($data_sku, $data_line1, $data_line2, $data_line3, $data_line4, $data_line5, $data_background, $data_font_style, $data_character, $data_font_color, $data_zoom1, $data_zoom2, $data_zoom3, $data_zoom4, $data_zoom5, $data_line1_1, $data_line2_1, $data_line3_1, $data_line4_1, $data_line5_1, $data_background_1, $data_font_1, $data_character_1, $data_font_color_1, $data_zoom1_1, $data_zoom2_1, $data_zoom3_1, $data_zoom4_1, $data_zoom5_1, $data_leather_case, $data_sheet);

                    fputcsv($file, $data_item);

                }

            }
        }
    }
}



fclose($file);

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; ");

readfile($filename);

// deleting file
unlink($filename);
exit();
