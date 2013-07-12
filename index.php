<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="galleria/galleria-1.2.9.min.js"></script>
    <style>
        #galleria{ width: 700px; height: 400px; background: #000 }
    </style>
</head>
<body>
<?php
include_once 'DBHandle.php';
include_once 'Entities.php';

use Entities\GalleryImage;

$imageArr = GalleryDAO::getInstance()->getImages();

$output = "<div id='galleria'>";
foreach ($imageArr as $image)
{
    $output.= "<img src = {$image->getName()} >";
}

$output.="</div><script>Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');Galleria.run('#galleria');</script>";
echo $output;
?>
</body>
</html>
