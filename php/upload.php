<?php
// Check if the file was uploaded successfully
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $uploadedFile = $_FILES['file'];
    $tempPath = $uploadedFile['tmp_name'];
    $fileName = $uploadedFile['name'];

    // Move the uploaded file to a permanent location
    $uploadPath = '../uploads/' . $fileName;
    move_uploaded_file($tempPath, $uploadPath);

    // Return the file URL to the client
    $fileUrl = 'https://example.com/uploads/' . $fileName;
    echo $fileUrl;
} else {
    // File upload failed, return an error message
    http_response_code(400);
    echo 'File upload failed';
}
?>