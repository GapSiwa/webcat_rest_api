<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'db.php'; // ตรวจสอบว่าไฟล์ db.php เชื่อมต่อฐานข้อมูล test1 อย่างถูกต้อง

try {
    $cats = array();
    foreach($dbh->query('SELECT * from cats') as $row) {
        $cat = array(
            'id' => $row['id'],
            'cat_type' => $row['cat_type'],
            'detail1' => $row['detail1'],
        );
        array_push($cats, $cat);
    }
    echo json_encode($cats);
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
