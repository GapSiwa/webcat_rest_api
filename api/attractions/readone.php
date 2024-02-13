<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';

try {
    $id = $_GET['id'];
    $stmt = $dbh->prepare("SELECT * FROM cats WHERE id = :id");
    $stmt->bindParam('id', $id);
    $stmt->execute();

    $cats = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $cat = array(
            'id' => $row['id'],
            'cat_type' => $row['cat_type'],
            'detail2' => $row['detail1'],
            'detail2' => $row['detail2'],
            'detail3' => $row['detail3'],
            'detail3' => $row['detail4'],
            'img_file' => $row['img_file'],
        );
        array_push($cats, $cat);
    }
    echo json_encode($cat);
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// ตัวอย่างการนำทางไปหน้าใหม่
// header("Location: new_page.php");
?>
