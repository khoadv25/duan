<?php

if (!function_exists('showSpByCate')) {
    function showSpByCate($cateID)
    {
        try {
            $sql = "SELECT * FROM product WHERE category_id = :category_id";


            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":category_id", $cateID);
            $stmt->execute();
            return $stmt->fetchaLL();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}