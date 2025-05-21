<?php

require 'vendor/autoload.php';

use App\Models\ElectricCar;
use App\Models\Truck;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Initialize Monolog logger
$logger = new Logger('vehicle_app');
$logger->pushHandler(new StreamHandler('app.log', Logger::INFO));
$logger->info('Application started');

// Create and use vehicles
$tesla = new ElectricCar('Tesla');
$truck = new Truck('Volvo');

echo $tesla->charge() . "\n";
echo $truck->drive(100) . "\n";

$logger->info('Application ended');