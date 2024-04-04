<?php 

// function userDetail($id) {
//     $user = getUserByID($id);

//     require_once PATH_VIEW . 'users/detail.php';
// }

use function App\YourNamespace\guiMail;

function checkmail() {
    $view = 'client/test';
    // guiMail();
    require_once PATH_VIEW . 'home.php';
}