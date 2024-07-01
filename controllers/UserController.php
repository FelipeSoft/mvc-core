<?php
require_once(__DIR__ . "../../config/controller_functions.php");
require_once(__DIR__ . "../../gateways/user/database.php");

class UserController{
    public function get_all_users() {
        response(200, [
            "users" => UserDatabaseGateway::all()
        ]);
    }

    public function create_user () {
        $input = request("name");
        
        response(200, [
            "request" => $input
        ]);
    }
}