<?php
    function firstImage($imagelist) {
        $imageArray = explode(';', $imagelist);
        return $imageArray[0];
    }

    function cropText($text) {
        $textArray = explode('.', $text);
        return $textArray[0];
    }
    function getImages($images) {
        $imageArray = explode(';', $images);
        return $imageArray;
    }
?>