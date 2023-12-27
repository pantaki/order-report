<?php

//$orders = shopify_call($token, $shop, "/admin/api/2022-10/orders.json?status=any", array(), 'GET');
//$orders = shopify_call($token, $shop, "/admin/orders.json?status=any", array(), 'GET');
//$orders = shopify_call($token, $shop, "/admin/orders.json?status=any&fulfillment_status=unshipped", array(), 'GET');
$orders = shopify_call($token, $shop, "/admin/api/2022-10/orders.json", array("status" => "any" , "fulfillment_status" => 'any'), 'GET');
//$orders = json_decode($orders['response'], JSON_PRETTY_PRINT);

//echo '<pre>';
//print_r($orders);
//echo '</pre>';

//if (isset($_POST["submit_convert"])) {

//    var_dump($_FILES["file"]);
//
//    if (isset($_FILES["file"])) {
//
//        //if there was an error uploading the file
//        if ($_FILES["file"]["error"] > 0) {
//            echo "Upload Error, Please try again! <br />";
//        } else {
//            $csv = array();
//            $name = $_FILES['file']['name'];
//            $file_array = explode('.', $name);
//            $ext = strtolower(end($file_array));
//            $type = $_FILES['file']['type'];
//            $tmpName = $_FILES['file']['tmp_name'];
//            // check the file is a csv
//            if ($ext === 'csv') {
//                if (($handle = fopen($tmpName, 'r')) !== FALSE) {
//                    // necessary if a large csv file
//                    error_reporting(E_ALL);
//                    ini_set('display_errors', 1);
//                    set_time_limit(0);
//                    $copies = 1;
//                    $title = 'product' . ',' . 'line1' . ',' . 'line2' . ',' . 'line3' . ',' . 'line4' . ',' . 'line5' . ',';
//                    $title .= 'background' . ',' . 'font' . ',' . 'character' . ',' . 'fontColor' . ',';
//                    $title .= 'zoom1' . ',' . 'zoom2' . ',' . 'zoom3' . ',' . 'zoom4' . ',' . 'zoom5' . ',';
//                    $title .= 'line1_1' . ',' . 'line2_1' . ',' . 'line3_1' . ',' . 'line4_1' . ',' . 'line5_1' . ',';
//                    $title .= 'background_1' . ',' . 'font_1' . ',' . 'character_1' . ',' . 'fontColor_1' . ',';
//                    $title .= 'zoom1_1' . ',' . 'zoom2_1' . ',' . 'zoom3_1' . ',' . 'zoom4_1' . ',' . 'zoom5_1' . ',' . 'leather_case' . ',' . 'sheet' . ',';
//                    $title .= "\r\n";
//                    $i = 0;
//                    $row = '';
//                    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
//                        if ($i++ == 0) continue;
//                        // get the values from the csv
//                        $sku = $data[4];
//                        if($sku != '') {
//                            if ($sku == 'pab' || $sku == 'storagebin xl kiddo tags') continue;
//                            $options = explode(", ", $data[3]);
//                            $background = $fontcolor = $font = $character = $line1 = $line2 = $copies = '';
//                            if ($sku == 'daycare-temptags') {
//                                $zoom1 = '1.3';
//                            } else {
//                                $zoom1 = '1.2';
//                            }
//                            foreach ($options as $option) {
//                                if ($sku == 'polka-bagtags') {
//                                    if (strpos($option, 'Bag Tags') !== false) {
//                                        preg_match('/(\d) Bag Tags/', $option, $matches);
//                                        $copies = $matches[1] * 2;
//                                    }
//                                } else if ($sku == 'daycare-temptags') {
//                                    if (strpos($option, 'Temp Tags') !== false) {
//                                        preg_match('/(\d\d\d) Temp Tags/', $option, $matches);
//                                        $copies = $matches[1] / 10;
//                                    }
//                                } elseif ($sku == 'senior-seniorvaluepak') {
//                                    if (strpos($option, 'sheets') !== false) {
//                                        preg_match('/(\d) sheets/', $option, $matches);
//                                        $copies = $matches[1];
//                                    }
//                                } else {
//                                    if (strpos($option, 'Sheet') !== false) {
//                                        preg_match('/(\d) Sheet/', $option, $matches);
//                                        $copies = $matches[1];
//                                    }
//                                }
//
//                                if (strpos($option, 'Option-Background_Color') !== false) {
//                                    $background = str_replace("Option-Background_Color: ", "", $option);
//                                }
//                                if (strpos($option, 'Option-Font_Color') !== false) {
//                                    $fontcolor = str_replace("Option-Font_Color: ", "", $option);
//                                }
//                                if (strpos($option, 'Option-Font_Name') !== false) {
//                                    $font = str_replace("Option-Font_Name: ", "", $option);
//                                }
//                                if (strpos($option, 'Option-Icon_Name') !== false) {
//                                    $character = str_replace("Option-Icon_Name: ", "", $option);
//                                }
//                                if (strpos($option, 'Option-Line1') !== false) {
//                                    $line1 = str_replace("Option-Line1: ", "", $option);
//                                }
//                                if (strpos($option, 'Option-Line2') !== false) {
//                                    $line2 = str_replace("Option-Line2: ", "", $option);
//                                }
//                            }
//                            if ($sku != 'clothing-tags' && $sku != 'extreme-value-pack' && $sku != 'deluxe-kiddos' && $sku != 'deluxe-valuetwinpack' && $sku != 'clothing_twin_pack' && $sku != 'pencil_slim_thin_iron_on_twin_pack' && $sku != 'deluxe-ironontwin' && $sku != 'twin_pack-twin_pack' && $sku != 'triplet_pack' && $sku != 'storagebin-xl-kiddo-tags') {
//
//                                if ($sku == 'deluxe-extreme-valuepak-camp' || $sku == 'deluxe-extreme-valuepak-camp1') {
//                                    $row .= 'deluxe-extreme-valuepak' . ',';
//                                } elseif ($sku == 'senior-seniorvaluepak') {
//                                    $row .= 'deluxe-valuepakgr' . ',';
//                                } elseif ($sku == 'senior-seniorclothing') {
//                                    $row .= 'clothing' . ',';
//                                } elseif ($sku == 'tween_emoji-tweenvaluepak') {
//                                    $row .= 'tween-tweenvaluepak' . ',';
//                                } else {
//                                    $row .= $sku . ',';
//                                }
//                                $row .= @$line1 . ',';
//                                $row .= @$line2 . ',' . ',' . ',' . ',';
//
//                                if ($sku == 'deluxe-extreme-valuepak' || $sku == 'senior-seniorvaluepak' || $sku == 'deluxe-extreme-valuepak-camp' || $sku == 'deluxe-extreme-valuepak-camp1' || $sku == 'senior-seniorclothing') {
//                                    if (@$background == 'red') {
//                                        $row .= 'Red' . ',';
//                                    } else if (@$background == 'rose') {
//                                        $row .= 'Rose' . ',';
//                                    } else if (@$background == 'deep blue') {
//                                        $row .= 'Deep Blue' . ',';
//                                    } else if (@$background == 'lavender') {
//                                        $row .= 'Lavender' . ',';
//                                    } else if (@$background == 'amethyst') {
//                                        $row .= 'Amethyst' . ',';
//                                    } else if (@$background == 'aqua_marine') {
//                                        $row .= 'Aquamarine' . ',';
//                                    } else if (@$background == 'milk_coca') {
//                                        $row .= 'Milk Cocoa' . ',';
//                                    } else {
//                                        $row .= @$background . ',';
//                                    }
//                                } else {
//                                    $row .= @$background . ',';
//                                }
//                                $row .= @$font . ',';
//                                $row .= @$character . ',';
//                                $row .= @$fontcolor . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',';
//                                if ($sku == 'deluxe-extreme-valuepak' || $sku == 'deluxe-extreme-valuepak-camp' || $sku == 'deluxe-extreme-valuepak-camp1') {
//                                    $row .= '4';
//                                } else if ($sku == 'tween-tweenvaluepak') {
//                                    $row .= '5';
//                                } else {
//                                    $row .= $copies . ',';
//                                }
//                                $row .= "\r\n";
//                            }
//                            //------------------------------------------------------------------
//                            if ($sku == 'storagebin-xl-kiddo-tags') {
//                                $options = explode(", ", $data[3]);
//                                $background = $fontcolor = $font = $character = $line1 = $line2 = $line3 = $line4 = $line5 = '';
//                                $copies = '';
//                                //$background_1 = $fontcolor_1 = $font_1 = $character_1 = $line1_1 = $line2_1 = '';
//                                foreach ($options as $option) {
//
//
//                                    if (strpos($option, 'Sheets') !== false) {
//                                        preg_match('/(\d) Sheets/', $option, $matches);
//                                        $copies = $matches[1];
//                                    }
//                                    if (strpos($option, 'Option-Background_Color') !== false) {
//                                        $background = str_replace("Option-Background_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Font_Color') !== false) {
//                                        $fontcolor = str_replace("Option-Font_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Font_Name') !== false) {
//                                        $font = str_replace("Option-Font_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Icon_Name') !== false) {
//                                        $character = str_replace("Option-Icon_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Line1') !== false) {
//                                        $line1 = str_replace("Option-Line1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Line2') !== false) {
//                                        $line2 = str_replace("Option-Line2: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Line3') !== false) {
//                                        $line3 = str_replace("Option-Line3: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Line4') !== false) {
//                                        $line4 = str_replace("Option-Line4: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Line5') !== false) {
//                                        $line5 = str_replace("Option-Line5: ", "", $option);
//                                    }
//                                }
//                                $row .= $sku . ',';
//                                $row .= @$line1;
//                                $row .= @$line2 . ',';
//                                $row .= @$line3 . ',';
//                                $row .= @$line4 . ',';
//                                $row .= @$line5 . ',';
//                                $row .= @$background . ',';
//                                $row .= @$font . ',';
//                                $row .= @$character . ',';
//                                $row .= @$fontcolor . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',';
//                                $row .= $copies . ',';
//
//                            }
//                            //------------------------------------------------------------------
//                            if ($sku == 'deluxe-valuetwinpack') {
//                                $options = explode(", ", $data[3]);
//                                $background = $fontcolor = $font = $character = $line1 = $line2 = '';
//                                $background_1 = $fontcolor_1 = $font_1 = $character_1 = $line1_1 = $line2_1 = '';
//                                foreach ($options as $option) {
//
//                                    $copies = '';
//                                    if (strpos($option, 'Sheets') !== false) {
//                                        preg_match('/(\d) Sheets/', $option, $matches);
//                                        $copies = $matches[1];
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Background_Color') !== false) {
//                                        $background = str_replace("Option-Child-1-Background_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Font_Color') !== false) {
//                                        $fontcolor = str_replace("Option-Child-1-Font_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Font_Name') !== false) {
//                                        $font = str_replace("Option-Child-1-Font_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Icon_Name') !== false) {
//                                        $character = str_replace("Option-Child-1-Icon_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Line1') !== false) {
//                                        $line1 = str_replace("Option-Child-1-Line1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Line2') !== false) {
//                                        $line2 = str_replace("Option-Child-1-Line2: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Background_Color') !== false) {
//                                        $background_1 = str_replace("Option-Child-2-Background_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Font_Color') !== false) {
//                                        $fontcolor_1 = str_replace("Option-Child-2-Font_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Font_Name') !== false) {
//                                        $font_1 = str_replace("Option-Child-2-Font_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Icon_Name') !== false) {
//                                        $character_1 = str_replace("Option-Child-2-Icon_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Line1') !== false) {
//                                        $line1_1 = str_replace("Option-Child-2-Line1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Line2') !== false) {
//                                        $line2_1 = str_replace("Option-Child-2-Line2: ", "", $option);
//                                    }
//                                }
//                                $row .= 'deluxe-valuepak' . ',';
//                                $row .= @$line1 . ',';
//                                $row .= @$line2 . ',' . ',' . ',' . ',';
//                                $row .= @$background . ',';
//                                $row .= @$font . ',';
//                                $row .= @$character . ',';
//                                $row .= @$fontcolor . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',';
//                                $row .= '5';
//                                $row .= "\r\n";
//                                $row .= 'deluxe-valuepak' . ',';
//                                $row .= @$line1_1 . ',';
//                                $row .= @$line2_1 . ',' . ',' . ',' . ',';
//                                $row .= @$background_1 . ',';
//                                $row .= @$font_1 . ',';
//                                $row .= @$character_1 . ',';
//                                $row .= @$fontcolor_1 . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',';
//                                $row .= '5';
//                                $row .= "\r\n";
//                            }
//                            //------------------------------------------------------------------
//                            if ($sku == 'triplet_pack') {
//                                $options = explode(", ", $data[3]);
//                                $background = $fontcolor = $font = $character = $line1 = $line2 = '';
//                                $background_1 = $fontcolor_1 = $font_1 = $character_1 = $line1_1 = $line1_2 = '';
//                                $background_2 = $fontcolor_2 = $font_2 = $character_2 = $line2_1 = $line2_2 = '';
//                                foreach ($options as $option) {
//
//                                    $copies = '';
//                                    if (strpos($option, 'Sheets') !== false) {
//                                        preg_match('/(\d) Sheets/', $option, $matches);
//                                        $copies = $matches[1];
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Background_Color') !== false) {
//                                        $background = str_replace("Option-Child-1-Background_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Font_Color') !== false) {
//                                        $fontcolor = str_replace("Option-Child-1-Font_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Font_Name') !== false) {
//                                        $font = str_replace("Option-Child-1-Font_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Icon_Name') !== false) {
//                                        $character = str_replace("Option-Child-1-Icon_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Line1') !== false) {
//                                        $line1 = str_replace("Option-Child-1-Line1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Line2') !== false) {
//                                        $line2 = str_replace("Option-Child-1-Line2: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Background_Color') !== false) {
//                                        $background_1 = str_replace("Option-Child-2-Background_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Font_Color') !== false) {
//                                        $fontcolor_1 = str_replace("Option-Child-2-Font_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Font_Name') !== false) {
//                                        $font_1 = str_replace("Option-Child-2-Font_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Icon_Name') !== false) {
//                                        $character_1 = str_replace("Option-Child-2-Icon_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Line1') !== false) {
//                                        $line1_1 = str_replace("Option-Child-2-Line1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Line2') !== false) {
//                                        $line1_2 = str_replace("Option-Child-2-Line2: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-3-Background_Color') !== false) {
//                                        $background_2 = str_replace("Option-Child-3-Background_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-3-Font_Color') !== false) {
//                                        $fontcolor_2 = str_replace("Option-Child-3-Font_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-3-Font_Name') !== false) {
//                                        $font_2 = str_replace("Option-Child-3-Font_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-3-Icon_Name') !== false) {
//                                        $character_2 = str_replace("Option-Child-3-Icon_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-3-Line1') !== false) {
//                                        $line2_1 = str_replace("Option-Child-3-Line1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-3-Line2') !== false) {
//                                        $line2_2 = str_replace("Option-Child-3-Line2: ", "", $option);
//                                    }
//                                }
//                                $row .= 'deluxe-valuepak' . ',';
//                                $row .= @$line1 . ',';
//                                $row .= @$line2 . ',' . ',' . ',' . ',';
//                                $row .= @$background . ',';
//                                $row .= @$font . ',';
//                                $row .= @$character . ',';
//                                $row .= @$fontcolor . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',';
//                                $row .= '5';
//                                $row .= "\r\n";
//                                $row .= 'deluxe-valuepak' . ',';
//                                $row .= @$line1_1 . ',';
//                                $row .= @$line2_1 . ',' . ',' . ',' . ',';
//                                $row .= @$background_1 . ',';
//                                $row .= @$font_1 . ',';
//                                $row .= @$character_1 . ',';
//                                $row .= @$fontcolor_1 . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',';
//                                $row .= '5';
//                                $row .= "\r\n";
//                                $row .= 'deluxe-valuepak' . ',';
//                                $row .= @$line1_2 . ',';
//                                $row .= @$line2_2 . ',' . ',' . ',' . ',';
//                                $row .= @$background_2 . ',';
//                                $row .= @$font_2 . ',';
//                                $row .= @$character_2 . ',';
//                                $row .= @$fontcolor_2 . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',' . ',';
//                                $row .= '5';
//                                $row .= "\r\n";
//                            }
//                            //------------------------------------------------------------------
//                            if ($sku == 'clothing_twin_pack' || $sku == 'pencil_slim_thin_iron_on_twin_pack' || $sku == 'deluxe-ironontwin' || $sku == 'twin_pack-twin_pack') {
//                                $options = explode(", ", $data[3]);
//                                $background = $fontcolor = $font = $character = $line1 = $line2 = '';
//                                $background_1 = $fontcolor_1 = $font_1 = $character_1 = $line1_1 = $line2_1 = $copies = '';
//
//                                foreach ($options as $option) {
//
//                                    if (strpos($option, 'Sheets') !== false) {
//                                        preg_match('/(\d) Sheets/', $option, $matches);
//                                        $copies = $matches[1];
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Background_Color') !== false) {
//                                        $background = str_replace("Option-Child-1-Background_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Font_Color') !== false) {
//                                        $fontcolor = str_replace("Option-Child-1-Font_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Font_Name') !== false) {
//                                        $font = str_replace("Option-Child-1-Font_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Icon_Name') !== false) {
//                                        $character = str_replace("Option-Child-1-Icon_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Line1') !== false) {
//                                        $line1 = str_replace("Option-Child-1-Line1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-1-Line2') !== false) {
//                                        $line2 = str_replace("Option-Child-1-Line2: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Background_Color') !== false) {
//                                        $background_1 = str_replace("Option-Child-2-Background_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Font_Color') !== false) {
//                                        $fontcolor_1 = str_replace("Option-Child-2-Font_Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Font_Name') !== false) {
//                                        $font_1 = str_replace("Option-Child-2-Font_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Icon_Name') !== false) {
//                                        $character_1 = str_replace("Option-Child-2-Icon_Name: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Line1') !== false) {
//                                        $line1_1 = str_replace("Option-Child-2-Line1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Option-Child-2-Line2') !== false) {
//                                        $line2_1 = str_replace("Option-Child-2-Line2: ", "", $option);
//                                    }
//                                }
//                                if ($sku == 'twin_pack-twin_pack') {
//                                    $row .= 'twin_pack' . ',';
//                                } else {
//                                    $row .= $sku . ',';
//                                }
//                                $row .= @$line1 . ',';
//                                $row .= @$line2 . ',' . ',' . ',' . ',';
//                                $row .= @$background . ',';
//                                $row .= @$font . ',';
//                                $row .= @$character . ',';
//                                $row .= @$fontcolor . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',';
//                                $row .= @$line1_1 . ',';
//                                $row .= @$line2_1 . ',' . ',' . ',' . ',';
//                                $row .= @$background_1 . ',';
//                                $row .= @$font_1 . ',';
//                                $row .= @$character_1 . ',';
//                                $row .= @$fontcolor_1 . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',' . ',';
//                                $row .= $copies . ',';
//                                $row .= "\r\n";
//                            }
//                            //------------------------------------------------------------------
//                            if ($sku == 'deluxe-kiddos') {
//                                $options = explode(", ", $data[3]);
//                                $background = $fontcolor = $font = $character = $line1 = $line2 = '';
//                                $background_1 = $fontcolor_1 = $font_1 = $character_1 = $line1_1 = $line2_1 = $copies = '';
//
//                                foreach ($options as $option) {
//
//                                    if (strpos($option, 'Sheets') !== false) {
//                                        preg_match('/(\d) Sheets/', $option, $matches);
//                                        $copies = $matches[1];
//                                    }
//                                    if (strpos($option, 'Background') !== false) {
//                                        $background = str_replace("Background: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Font Color') !== false) {
//                                        $fontcolor = str_replace("Font Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Font Style') !== false) {
//                                        $font = str_replace("Font Style: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character') !== false) {
//                                        $character = str_replace("Character: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Line 1') !== false) {
//                                        $line1 = str_replace("Line 1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Line 2') !== false) {
//                                        $line2 = str_replace("Line 2: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Background1') !== false) {
//                                        $background_1 = str_replace("Background1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Font Color1') !== false) {
//                                        $fontcolor_1 = str_replace("Font Color1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Font Style1') !== false) {
//                                        $font_1 = str_replace("Font Style1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character1') !== false) {
//                                        $character_1 = str_replace("Character1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Line 1-1') !== false) {
//                                        $line1_1 = str_replace("Line 1-1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Line 2-1') !== false) {
//                                        $line2_1 = str_replace("Line 2-1: ", "", $option);
//                                    }
//                                }
//
//                                $row .= $sku . ',';
//                                $row .= @$line1 . ',';
//                                $row .= @$line2 . ',' . ',' . ',' . ',';
//                                $row .= @$background . ',';
//                                $row .= @$font . ',';
//                                $row .= @$character . ',';
//                                $row .= @$fontcolor . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',';
//                                $row .= @$line1_1 . ',';
//                                $row .= @$line2_1 . ',' . ',' . ',' . ',';
//                                $row .= @$background_1 . ',';
//                                $row .= @$font_1 . ',';
//                                $row .= @$character_1 . ',';
//                                $row .= @$fontcolor_1 . ',' . ',' . ',' . ',' . ',' . ',' . ',';
//                                $row .= $copies . ',';
//                                $row .= "\r\n";
//
//                            }
//                            //------------------------------------------------------------------
//                            if ($sku == 'extreme-value-pack' || $sku == 'clothing-tags') {
//                                $options = explode(", ", $data[3]);
//                                $background = $fontcolor = $font = $character = $line1 = $line2 = '';
//                                $background_1 = $fontcolor_1 = $font_1 = $character_1 = $line1_1 = $line2_1 = $copies = '';
//
//                                foreach ($options as $option) {
//                                    if (strpos($option, 'Extreme value package') !== false) {
//                                        $copies = 4;
//                                    }
//                                    if (strpos($option, 'Sheets') !== false) {
//                                        preg_match('/(\d) Sheets/', $option, $matches);
//                                        $copies = $matches[1];
//                                    }
//                                    if (strpos($option, 'Color - Color') !== false) {
//                                        $background = str_replace("Color - Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Font & Font Color - Font Color') !== false) {
//                                        $fontcolor = str_replace("Font & Font Color - Font Color: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Font & Font Color - Font:') !== false) {
//                                        $font = str_replace("Font & Font Color - Font: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Super Hero') !== false) {
//                                        $character = str_replace("Character - Super Hero: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Princess Fairy Tale') !== false) {
//                                        $character = str_replace("Character - Princess Fairy Tale: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Adult / Senior') !== false) {
//                                        $character = str_replace("Character - Adult / Senior: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Allergy / Medical') !== false) {
//                                        $character = str_replace("Character - Allergy / Medical: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Animals') !== false) {
//                                        $character = str_replace("Character - Animals: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Emojis') !== false) {
//                                        $character = str_replace("Character - Emojis: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Food') !== false) {
//                                        $character = str_replace("Character - Food: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Kids') !== false) {
//                                        $character = str_replace("Character - Kids: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Monsters') !== false) {
//                                        $character = str_replace("Character - Monsters: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Nature') !== false) {
//                                        $character = str_replace("Character - Nature: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Peace & Love') !== false) {
//                                        $character = str_replace("Character - Peace & Love: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Space') !== false) {
//                                        $character = str_replace("Character - Space: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Sports') !== false) {
//                                        $character = str_replace("Character - Sports: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Transportation') !== false) {
//                                        $character = str_replace("Character - Transportation: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Character - Tween') !== false) {
//                                        $character = str_replace("Character - Tween: ", "", $option);
//                                    }
//
//                                    if (strpos($option, 'Text - Line 1') !== false) {
//                                        $line1 = str_replace("Text - Line 1: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Text - Line 2') !== false) {
//                                        $line2 = str_replace("Text - Line 2: ", "", $option);
//                                    }
//                                    if (strpos($option, 'Background1') !== false) {
//                                        $background_1 = str_replace("Background1: ", "", $option);
//                                    }
//
//                                }
//                                if ($sku != '' && $background != '' && $fontcolor != '') {
//
//                                    $row .= $sku . ',';
//                                    $row .= @$line1 . ',';
//                                    $row .= @$line2 . ',' . ',' . ',' . ',';
//                                    $row .= @$background . ',';
//                                    $row .= @$font . ',';
//                                    $row .= @$character . ',';
//                                    $row .= @$fontcolor . ',' . @$zoom1 . ',' . ',' . ',' . ',' . ',';
//                                    $row .= @$line1_1 . ',';
//                                    $row .= @$line2_1 . ',' . ',' . ',' . ',';
//                                    $row .= @$background_1 . ',';
//                                    $row .= @$font_1 . ',';
//                                    $row .= @$character_1 . ',';
//                                    $row .= @$fontcolor_1 . ',' . ',' . ',' . ',' . ',' . ',' . ',';
//                                    $row .= $copies . ',';
//                                    $row .= "\r\n";
//                                }
//
//                            }
//                            //------------------------------------------------------------------
//
//                        }
//                    }
//                }
//                fclose($handle);
//                header("Content-type: application/csv");
//                header("Content-Disposition: attachment; filename=\"order.csv\"");
//                header("Pragma: no-cache");
//                header("Expires: 0");
//                echo $title;
//                echo $row;
//                exit();
//            }
//        }
//    }
//}
?>
<div class="container">
    <div class="main">
        <div class="details col-md-12">
            <div class="kiddo-order-export-custom recentOrders">
                <h2>Order Export</h2>
                <div class="daterange">
                    <form action="download.php" method="post">
                        <h3>Choose date</h3>
                        <input type="text" class="order-input-field" name="daterange" value="" />
                        <input type="hidden" name="daterange_start" value="" />
                        <input type="hidden" name="daterange_end" value="" />
                        <textarea name='export_order_data' style='display: none;'><?php echo $orders['response'] ?></textarea>
                        <input type="submit" name="export_order" class="btn btn-success kiddo-submit-export-order" value="Export"/>
                    </form>

                </div>
            </div>

        </div>
        <div class="details col-md-12">
            <div class="kiddo-order-export-custom recentOrders">
                <h2>Convert Csv</h2>
                <div class="convert-csv">
                    <form action="download-convert.php" method="post" enctype="multipart/form-data">

                        <tr>
                            <td width="20%">Select file</td>
                            <td width="80%"><input type="file" name="file" id="file"/></td>
                        </tr>

                        <tr>
                            <td><input type="submit" name="submit_convert" class="btn btn-success kiddo-submit-export-order"/></td>
                        </tr>

                    </form>

                </div>
            </div>

        </div>



    </div>

</div>