<?php
// Initialize variables for error and success messages
$errorMsg = $successMsg = "";

// Define allowed file types and max file size (2MB)
$allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
$maxFileSize = 2 * 1024 * 1024; // 2MB in bytes

// Check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $file = $_FILES["fileToUpload"];
    
    // Check for upload errors
    // $file['error']: Contains error code; UPLOAD_ERR_OK (0) means no error
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $errorMsg = "Upload failed with error code: " . $file['error'];
    } else {
        // Validate file size
        // $file['size']: Size of the uploaded file in bytes
        if ($file['size'] > $maxFileSize) {
            $errorMsg = "File is too large. Maximum size is 2MB.";
        } elseif (!in_array($file['type'], $allowedTypes)) {
            // Validate file type
            // $file['type']: MIME type of the uploaded file
            $errorMsg = "Invalid file type. Only PNG, JPG, and JPEG are allowed.";
        } else {
            // Get file extension and generate a unique filename
            // pathinfo($path, $option): Returns information about a file path
            // PATHINFO_EXTENSION returns the file extension
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $newFileName = uniqid() . '.' . $fileExt;
            $uploadDir = "uploads/";
            $uploadPath = $uploadDir . $newFileName;

            // Move the uploaded file to the destination
            // move_uploaded_file($tmp_name, $destination): Moves the file from temporary storage to the specified path
            // Returns true on success, false on failure
            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                $successMsg = "File uploaded successfully: " . htmlspecialchars($newFileName);
            } else {
                $errorMsg = "Failed to move the uploaded file. Check directory permissions.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP File Upload</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">PHP File Upload</h2>
        
        <?php if ($successMsg): ?>
            <p class="text-green-600 font-medium mb-4 text-center"><?php echo $successMsg; ?></p>
        <?php endif; ?>

        <?php if ($errorMsg): ?>
            <p class="text-red-500 font-medium mb-4 text-center"><?php echo $errorMsg; ?></p>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label for="fileToUpload" class="block text-sm font-medium text-gray-700">Select Image (PNG, JPG, JPEG)</label>
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/png,image/jpeg,image/jpg" 
                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>
            <div>
                <button type="submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Upload File
                </button>
            </div>
        </form>
    </div>
</body>
</html>