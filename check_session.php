<?php
function checkSession()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}
