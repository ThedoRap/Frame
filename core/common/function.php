<?php
function dd($data)
{
    // 定义样式
    $str = '';
    if (is_bool($data)) {
        $show_data = $data ? 'true' : 'false';
    } elseif (is_null($data)) {
        $show_data = 'null';
    } else {
        $show_data = "<pre style=\"background: #000; color: #ccc; font: 16px 'Consolas'; text-align: left; width: 90%; padding: 5px\">\n";
        $show_data .= print_r($data, true);
        $show_data .= "</pre>\n";
        $show_data = print_r($show_data, true);
    }
    $str .= $show_data;
    $str .= '';
    echo $str;
}
