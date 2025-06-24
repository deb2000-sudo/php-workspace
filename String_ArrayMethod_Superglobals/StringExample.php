<?php
// This PHP file demonstrates common string functions with examples and comments explaining their usage.

// 1. strlen() - Counts the number of characters in a string
// Arguments:
// - First argument: The string to measure
// Returns: Integer representing the length of the string
echo "=== strlen() Example ===\n";
$greeting = "Hello PHP!";
$length = strlen($greeting);
echo "String: '$greeting'\n";
echo "Length: $length\n"; // Output: Length: 10

$emptyString = "";
$lengthEmpty = strlen($emptyString);
echo "Empty string length: $lengthEmpty\n\n"; // Output: Empty string length: 0

// 2. strtolower() - Converts a string to lowercase
// Arguments:
// - First argument: The string to convert
// Returns: The lowercase string
echo "=== strtolower() Example ===\n";
$mixedCase = "HeLLo WoRLD";
$lowercase = strtolower($mixedCase);
echo "Original: '$mixedCase'\n";
echo "Lowercase: '$lowercase'\n\n"; // Output: Lowercase: 'hello world'

// 3. strtoupper() - Converts a string to uppercase
// Arguments:
// - First argument: The string to convert
// Returns: The uppercase string
echo "=== strtoupper() Example ===\n";
$uppercase = strtoupper($mixedCase);
echo "Original: '$mixedCase'\n";
echo "Uppercase: '$uppercase'\n\n"; // Output: Uppercase: 'HELLO WORLD'

// 4. ucfirst() - Capitalizes the first character of a string
// Arguments:
// - First argument: The string to modify
// Returns: The string with the first character capitalized
echo "=== ucfirst() Example ===\n";
$lowerText = "hello world";
$firstCap = ucfirst($lowerText);
echo "Original: '$lowerText'\n";
echo "First letter capitalized: '$firstCap'\n\n"; // Output: First letter capitalized: 'Hello world'

// 5. ucwords() - Capitalizes the first character of each word
// Arguments:
// - First argument: The string to modify
// Returns: The string with the first character of each word capitalized
echo "=== ucwords() Example ===\n";
$wordsText = "hello beautiful world";
$wordsCap = ucwords($wordsText);
echo "Original: '$wordsText'\n";
echo "Each word capitalized: '$wordsCap'\n\n"; // Output: Each word capitalized: 'Hello Beautiful World'

// 6. trim() - Removes whitespace from both ends of a string
// Arguments:
// - First argument: The string to trim
// - Second argument (optional): Specific characters to trim (defaults to whitespace)
// Returns: The trimmed string
echo "=== trim() Example ===\n";
$spacedText = "   john_doe123   ";
$trimmed = trim($spacedText);
echo "Original: '$spacedText'\n";
echo "Trimmed: '$trimmed'\n\n"; // Output: Trimmed: 'john_doe123'

// 7. ltrim() - Removes whitespace from the left side of a string
// Arguments:
// - First argument: The string to trim
// - Second argument (optional): Specific characters to trim
// Returns: The left-trimmed string
echo "=== ltrim() Example ===\n";
$message = "   Hello there!   ";
$leftTrimmed = ltrim($message);
echo "Original: '$message'\n";
echo "Left trimmed: '$leftTrimmed'\n\n"; // Output: Left trimmed: 'Hello there!   '

// 8. rtrim() - Removes whitespace from the right side of a string
// Arguments:
// - First argument: The string to trim
// - Second argument (optional): Specific characters to trim
// Returns: The right-trimmed string
echo "=== rtrim() Example ===\n";
$rightTrimmed = rtrim($message);
echo "Original: '$message'\n";
echo "Right trimmed: '$rightTrimmed'\n\n"; // Output: Right trimmed: '   Hello there!'

// 9. strpos() - Finds the position of the first occurrence of a substring
// Arguments:
// - First argument: The string to search in (haystack)
// - Second argument: The substring to search for (needle)
// - Third argument (optional): Starting position for the search
// Returns: Integer position or FALSE if not found
echo "=== strpos() Example ===\n";
$sentence = "I love learning PHP programming.";
$position = strpos($sentence, "PHP");
echo "String: '$sentence'\n";
if ($position !== false) {
    echo "'PHP' found at position: $position\n"; // Output: 'PHP' found at position: 17
} else {
    echo "'PHP' not found.\n";
}

$notFound = strpos($sentence, "Java");
if ($notFound === false) {
    echo "'Java' not found.\n\n"; // Output: 'Java' not found.
}

// 10. str_replace() - Replaces all occurrences of a substring with another
// Arguments:
// - First argument: The substring to search for (needle)
// - Second argument: The replacement string
// - Third argument: The string to search in (haystack)
// - Fourth argument (optional): Variable to store the number of replacements
// Returns: The modified string
echo "=== str_replace() Example ===\n";
$text = "The cat sat on the mat. The cat is happy.";
$no=null;
$newText = str_replace("cat", "dog", $text,$no);

echo "Original: '$text'\n";
echo "Replaced: '$newText'\n\n"; // Output: Replaced: 'The dog sat on the mat. The dog is happy.'
echo $no;

// 11. substr() - Extracts a portion of a string
// Arguments:
// - First argument: The string to extract from
// - Second argument: Starting position (0-based, negative counts from end)
// - Third argument (optional): Length of the substring to extract
// Returns: The extracted substring
echo "=== substr() Example ===\n";
$longText = "This is a very long sentence for demonstration.";
$part1 = substr($longText, 1);
$part2 = substr($longText, 0, 5);
$part3 = substr($longText, -1);
echo "String: '$longText'\n";
echo "From position 1 to end: '$part1'\n"; // Output: 'very long sentence for demonstration.'
echo "First 5 characters: '$part2'\n"; // Output: 'This '
echo "Last 14 characters: '$part3'\n"; // Output: 'demonstration.'
?>