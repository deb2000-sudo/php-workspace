<?php
namespace App\Traits;

trait Loggable {
    public function log(string $message): void {
        $logMessage = date('Y-m-d H:i:s') . " - $message\n";
        file_put_contents('app.log', $logMessage, FILE_APPEND);
    }
}