<?php

if (!function_exists('showDetail')) {
    function showDetail($tableName, $id) {
        try {
            $sql = "SELECT * FROM $tableName WHERE product_id  = :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}