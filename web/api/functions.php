<?php

function validateInput($data) {
    $data = trim($data);
    $data = htmlentities($data);
    $data = stripslashes($data);

    return $data;
}

function validateInt($data) {
    $data = validateInput($data);

    // $data = (int) $data;

    $data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
    $data = filter_var($data, FILTER_VALIDATE_INT);

    return $data;
}