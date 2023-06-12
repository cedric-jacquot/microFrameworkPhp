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
        echo '<p style="color: #BB88BC; margin: 10px;">' . 'array {' . '</p>';
        foreach ($datas as $key => $data) {
            echo '<p style="color: #AAD9F9; margin: 10px; padding-left: 10px">' . $key . ' => ' . $data . '</p>';
        }
        echo '<p style="color: #BB88BC; margin: 10px;">' . '}' . '</p>';
    } elseif (is_string($datas)) {
        // string
        echo '<p style="color: #BB88BC; margin: 10px;">' . 'string: <span style="color: #AAD9F9;">"' . $datas . '"</span>' . '</p>';
    } else {
        // autres
        echo '<pre style="color: #BB88BC; margin: 10px;">';
        var_dump($datas);
        echo '</pre>';
    }

    // fin div
    echo '</div>';
}
