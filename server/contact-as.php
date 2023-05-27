<?php

$errors = [];

$email = $_POST['email'];
if(! preg_match('/^\S+@\S+\.\S+$/', $email)) {
    $errors[] = ['email' => "Невірний формат email"];
}

$phone = $_POST['phone'];
if(! preg_match('/^[\+]?(380)[0-9]{7}/', $phone)) {
    $errors[] = ['phone' => "Невірний формат номеру телефону"];
}

die(json_encode(['status' => !(count($errors)), 'data' => [], 'errors' => $errors]));