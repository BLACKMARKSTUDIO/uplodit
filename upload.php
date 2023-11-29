<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];

    // 파일 정보 확인
    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileSize = $file["size"];
    $fileTmpName = $file["tmp_name"];
    $fileError = $file["error"];

    // 파일 업로드 디렉토리
    $uploadDirectory = "uploads/";

    // 파일을 지정된 디렉토리로 이동
    $destination = $uploadDirectory . $fileName;

    // 파일 확장자 확인 (예: 허용된 확장자가 .jpg, .png 인 경우)
    $allowedExtensions = array("jpg", "png");
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    if (in_array($fileExtension, $allowedExtensions)) {
        if (move_uploaded_file($fileTmpName, $destination)) {
            echo "파일 업로드 성공!";
        } else {
            echo "파일 업로드 실패.";
        }
    } else {
        echo "지원하지 않는 파일 형식입니다. 허용된 확장자: " . implode(", ", $allowedExtensions);
    }
} else {
    echo "올바른 요청이 아닙니다.";
}
?>
