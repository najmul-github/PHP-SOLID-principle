<?php
// Load the dependencies
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB;
$db->addConnection([
    'driver'    => DB_CONNECTION,
    'host'      => DB_HOST,
    'database'  => DB_DATABASE,
    'username'  => DB_USERNAME,
    'password'  => DB_PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$db->setAsGlobal();

function get() {
    $data = [];
    $data['success'] = true;

    $questions = DB::table('questions')->get();

    $data['questions'] = $questions;

    return json_encode($data);
}

echo get();