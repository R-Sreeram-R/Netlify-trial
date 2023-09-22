<?php
$response = array();

if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $response["success"] = true;
    } else {
        $response["success"] = false;
        $response["message"] = "Error uploading file.";
    }
} else {
    $response["success"] = false;
    $response["message"] = "File upload error.";
}

header("Content-Type: application/json");
echo json_encode($response);
