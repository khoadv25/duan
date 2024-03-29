<?php 
session_start();
// Require file trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';

// Require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);


// Điều hướng
$act = $_GET['act'] ?? '/';
$authenRoute = [
    'login',

];

middleware_auth_check_client($act, $authenRoute);



match($act) {
    '/' =>  homeIndex(),

    'login' => authenShowFormLoginClient(),
    'logout' => authenLogoutUser(),
};

require_once './commons/disconnect-db.php';