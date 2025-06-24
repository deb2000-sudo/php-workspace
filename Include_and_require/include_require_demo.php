<?php
// This PHP file demonstrates the use of include and require statements
// in a clear and student-friendly way with comments and examples.

// === Introduction to include and require ===
// Both 'include' and 'require' are used to bring external PHP files into the current script.
// This helps organize code, reuse functions, and maintain cleaner projects.

// Key Differences:
// - include: If the file is missing, it gives a warning but the script continues.
// - require: If the file is missing, it gives a fatal error and stops the script.

// === Example Structure ===
// We'll create a main file (this one) that uses two external files:
// 1. header.php - Contains a simple header function
// 2. footer.php - Contains a simple footer function

// === Using include ===
echo "=== Demonstration of include ===\n";

// The include statement pulls in header.php
// If header.php is missing, a warning is shown but the script continues
include 'header.php';

// Calling a function defined in header.php
//displayHeader("Welcome to PHP Learning");

// Some content in the main file
echo "This is the main content of our page.\n";

// Using include for footer.php
include 'footer.php';
//displayFooter();

// === Using require ===
echo "\n=== Demonstration of require ===\n";

// The require statement pulls in header.php
// If header.php is missing, the script will stop with a fatal error
require 'header.php';

// Calling the same header function again
//displayHeader("PHP Include vs Require");

// More main content
echo "More content in the main file.\n";

// Using require for footer.php
require 'footer1.php';
//displayFooter();

// === Error Handling Example ===
echo "\n=== Error Handling with include and require ===\n";

// Trying to include a non-existent file
echo "Trying to include a missing file:\n";
@include 'non_existent_file.php'; // @ suppresses the warning
echo "Script continues after include failure.\n";

// Trying to require a non-existent file
echo "\nTrying to require a missing file:\n";
// Uncomment the line below to see the fatal error
// require 'non_existent_file.php'; // This would stop the script
echo "This line won't run if require fails.\n";

// === Best Practices ===
echo "\n=== Best Practices ===\n";
echo "1. Use require for critical files (like database connections).\n";
echo "2. Use include for non-critical files (like optional templates).\n";
echo "3. Use include_once or require_once to prevent multiple inclusions.\n";

// === Using include_once ===
echo "\n=== Demonstration of include_once ===\n";
include_once 'header.php'; // Won't include again if already included
displayHeader("Using include_once");

// === Using require_once ===
echo "\n=== Demonstration of require_once ===\n";
require_once 'header.php'; // Won't require again if already included
displayHeader("Using require_once");

?>