<?php

/**
 * Permet de mettre en forme les var_dump
 * Pour les strings et arrays : formatage spécifique
 * 
 * @param mixed $datas
 */
function dump(mixed $datas): void
{
    // div principale
    echo '<div style="background-color: #1e1e1e; color: white; padding: 5px; margin: 10px; width: fit-content; border-radius: 4px; font-family: Rockwell; font-size: 12px;">';

    if (is_array($datas)) {
        // array
        echo '<p style="color: #BB88BC; margin: 10px;">' .gettype($datas) . ' {' . '</p>';
        foreach ($datas as $key => $data) {
            echo '<p style="color: #BB88BC; margin: 10px; margin-left: 20px;">' . gettype($data) . ': <span style="color: #AAD9F9;">"' . $key . ' => ' . $data . '"</span>' . '</p>';
        }
        echo '<p style="color: #BB88BC; margin: 10px;">' . '}' . '</p>';
    } elseif (is_object($datas)) {
        // string
        echo '<p style="color: #BB88BC; margin: 10px;">' .gettype($datas) . ': <span style="color: #71C6B1;">"' . get_class($datas) .  '"</span> {' . '</p>';
            foreach ($datas as $key => $data) {
                echo '<p style="color: #BB88BC; margin: 10px; margin-left: 20px;">' . gettype($data) . ': <span style="color: #AAD9F9;">"' . $key . ' => ' . $data . '"</span>' . '</p>';
            }
            echo '<p style="color: #BB88BC; margin: 10px;">' . '}' . '</p>';
    } else {
        // autres types
        echo '<p style="color: #BB88BC; margin: 10px;">' . gettype($datas) . ': <span style="color: #AAD9F9;">"' . $datas . '"</span>' . '</p>';
    }

    // fin div
    echo '</div>';
}
