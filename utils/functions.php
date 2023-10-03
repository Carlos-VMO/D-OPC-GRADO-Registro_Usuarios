<?php
function getProjectFolder()
{
    if (strpos(__DIR__, '/')) {
        $folder = str_replace('C:/xampp/htdocs/', '/', __DIR__);
    } else {
        $folder = str_replace('C:\\xampp\\htdocs', '/', __DIR__);
    }
    return str_replace('utils', '', $folder);
}

function saveImage($file)
{
    $filename = str_replace(' ', '', $file['name']);
    $imgTmp = $file['tmp_name'];

    move_uploaded_file($imgTmp, $_SERVER['DOCUMENT_ROOT'] . getProjectFolder() . '/images/' . $filename);
    return $filename;
}
