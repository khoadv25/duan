<?php

if (!function_exists('checkBillByUserId')) {
    function checkBillByUserId($user_id) {
        try {
            $sql = "SELECT * FROM bill WHERE user_id = :user_id";
            
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":user_id", $user_id);

            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteCartWhereUserID')) {
    function deleteCartWhereUserID($tableName, $user_id) {
        try {
            $sql = "DELETE FROM $tableName WHERE user_id = :user_id";
            
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":user_id", $user_id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}