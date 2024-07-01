<?php

require_once(__DIR__ . "../../config/router.php");

Router::get("/user/all", UserController::class, "get_all_users");
Router::post("/user/create", UserController::class, "create_user");

Router::init();