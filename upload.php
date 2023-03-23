<?php
/* Get the name of the uploaded file */
$filename = $_FILES['fichier']['name'];
$filetmp_name = $_FILES['fichier']['tmp_name'];
$filesize = $_FILES['fichier']['size'];
$fileerror = $_FILES['fichier']['error'];

/* Choose where to save the uploaded file */

$ext = pathinfo($filename, PATHINFO_EXTENSION);
$tab_ext = ["png", "jpg", "jpeg"];

if(in_array($ext, $tab_ext))
{
    if($filesize <= 8000000 && $fileerror === 0)
    {
        $file = uniqid("IMG-", true);
        $filename = $file . "." . $ext;
        $location = "upload/".$filename;
        move_uploaded_file($_FILES['fichier']['tmp_name'], $location);
        echo "good";
    }
}
