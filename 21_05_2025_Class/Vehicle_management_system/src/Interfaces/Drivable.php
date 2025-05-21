<?php
namespace App\Interfaces;

interface Drivable {
    public function drive(int $distance): string;
}