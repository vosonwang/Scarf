<?php
/**
 * Created by PhpStorm.
 * User: voson
 * Date: 2016/8/30
 * Time: 14:33
 */
require '../../database/config.php';

$database->action(function($database) {
    $database->insert("account", [
        "name" => "foo",
        "email" => "bar@abc.com"
    ]);

    $database->delete("account", [
        "user_id" => 2312
    ]);

    // If you want to  find something wrong, just return false to rollback the whole transaction.
    if ($database->has("post", ["user_id" => 2312]))
    {
        return false;
    }
});