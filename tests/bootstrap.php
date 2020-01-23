<?php

use Dotenv\Dotenv;

require './vendor/autoload.php';
/** @noinspection SpellCheckingInspection */
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();