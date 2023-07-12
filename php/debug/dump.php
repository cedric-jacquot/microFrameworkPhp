<?php

/**
 * Beautify var_dump()
 * For strings and arrays : specific formatting
 * 
 * @param mixed $datas
 */
function dump(mixed $datas): void
{
    // div principale
    echo '<div style="background-color: #1e1e1e; color: white; padding: 5px; margin: 10px; width: fit-content; border-radius: 4px; font-family: Rockwell; font-size: 12px;">';

    if (is_array($datas)) {
        // array
        echo '<p style="color: #BB88BC; margin: 10px;">' . gettype($datas) . ' [' . '</p>';
        foreach ($datas as $key => $data) {

            if (is_array($data)) {
                echo '<p style="color: #BB88BC; margin: 10px; margin-left: 20px;">' . (is_numeric($data) ? 'int' : gettype($data)) . ': <span style="color: #AAD9F9;">"' . $key . ' [</p>';
                foreach ($data as $key => $d) {
                    echo '<p style="color: #BB88BC; margin: 10px; margin-left: 50px;">' . (is_numeric($d) ? 'int' : gettype($d)) . ': <span style="color: #AAD9F9;">"' . $key . ' => ' . $d . '"</span>' . '</p>';
                }
                echo '<p style="color: #AAD9F9; margin: 10px; margin-left: 20px;">' . ']' . '</p>';
            } else {
                echo '<p style="color: #BB88BC; margin: 10px; margin-left: 20px;">' . (is_numeric($data) ? 'int' : gettype($data)) . ': <span style="color: #AAD9F9;">"' . $key . ' => ' . $data . '"</span>' . '</p>';
            }
        }
        echo '<p style="color: #BB88BC; margin: 10px;">' . ']' . '</p>';
    } elseif (is_object($datas)) {
        // string
        echo '<p style="color: #BB88BC; margin: 10px;">' . gettype($datas) . ': <span style="color: #71C6B1;">"' . get_class($datas) .  '"</span> {' . '</p>';
        foreach ($datas as $key => $data) {
            echo '<p style="color: #BB88BC; margin: 10px; margin-left: 20px;">' . gettype($data) . ': <span style="color: #AAD9F9;">"' . $key . ' => ' . $data . '"</span>' . '</p>';
        }
        echo '<p style="color: #BB88BC; margin: 10px;">' . ']' . '</p>';
    } else {
        // autres types
        echo '<p style="color: #BB88BC; margin: 10px;">' . gettype($datas) . ': <span style="color: #AAD9F9;">"' . $datas . '"</span>' . '</p>';
    }

    // fin div
    echo '</div>';
}
