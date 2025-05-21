<?php
require 'vendor/autoload.php';

use App\Models\User;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('app');
$logger->pushHandler(new StreamHandler('app.log', Logger::INFO));
$logger->info('Starting application');

$user = new User();
echo $user->greet() . "\n";
?>