<?php

// Trait 1
trait Notifier {
    public function alert() {
        return "Sending a general notification.";
    }
}

// Trait 2 - ALSO has an alert() method!
trait EmergencyCaller {
    public function alert() {
        return "!!! CALLING EMERGENCY SERVICES !!!";
    }
}


// This class needs both functionalities.
class SecuritySystem {
    // This will cause a FATAL ERROR if we don't resolve the conflict.
    use Notifier, EmergencyCaller {
        // We tell PHP: For the 'alert' method, use the one from EmergencyCaller INSTEAD OF Notifier.
        EmergencyCaller::alert insteadof Notifier;

        // We can also keep the Notifier's alert method by giving it a new name.
        Notifier::alert as sendNotification;
    }
}

// LET'S USE OUR CONFLICT-FREE CLASS!
$system = new SecuritySystem();

// This will now call the method from EmergencyCaller as we specified.
echo $system->alert();
// Output: !!! CALLING EMERGENCY SERVICES !!!
echo "<br>";

// And now we can call the original Notifier method using its new name!
echo $system->sendNotification();
// Output: Sending a general notification.