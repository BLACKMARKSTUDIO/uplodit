<?php
// 업로드된 파일 처리
if(isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // 파일 정보 확인
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileSize = $file['size'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    // 파일 확장자 확인 (예: 허용된 확장자가 .jpg, .png 인 경우)
    $allowedExtensions = array("jpg", "png");
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    if (in_array($fileExtension, $allowedExtensions)) {
        // 파일 업로드 디렉토리
        $uploadDirectory = "uploads/";

        // 파일을 지정된 디렉토리로 이동
        $newFileName = uniqid('', true) . "." . $fileExtension; // 파일명 중복 방지
        $destination = $uploadDirectory . $newFileName;

        if (move_uploaded_file($fileTmpName, $destination)) {
            echo "파일 업로드 성공!";
        } else {
            echo "파일 업로드 실패.";
        }
    } else {
        echo "지원하지 않는 파일 형식입니다. 허용된 확장자: " . implode(", ", $allowedExtensions);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>업로드 결과</title>
</head>
<body>
    <h1>파일 업로드 결과</h1>
    <!-- 업로드 결과 또는 추가 정보를 표시하는 부분 -->
</body>
</html>
