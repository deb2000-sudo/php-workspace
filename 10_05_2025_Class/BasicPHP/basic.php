<?php
$a = 0;
// True because $a is set (even though it's 0, it's not NULL)
if (isset($a)) {
  echo "✅ Variable 'a' is set.<br>";
}

$b;
// False because $b is NULL
if (isset($b)) {
  echo "✅ Variable 'b' is set.<br>";
} else {
  echo "🚫 Variable 'b' is NOT set (it's NULL).<br>";
}

// 🧠 Ternary Operator: Short-hand if-else
$age = 17;
echo ($age >= 18) ? "🧍‍♂️ You're an adult!<br>" : "👶 You're still a kid!<br>";

// 🤖 Null Coalescing Operator (??): Use if variable might be undefined or null
$username = "Debashis";
echo "Hello, " . ($username ?? "👤 Guest") . "!<br>"; // If $username is null, fallback to "Guest"


echo "Welcome, " . ($nickname ?? "🕵️ Anonymous") . "!<br>";
?>
