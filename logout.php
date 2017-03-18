<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 17/03/2017
 * Time: 15:00
 */
function logout()
{
    session_start();
    session_destroy();
}

logout();
header('Location: home');