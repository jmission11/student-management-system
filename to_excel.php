<?php
include_once("connections/connections.php");

$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
$sorttype = isset($_POST['sorttype']) ? $_POST['sorttype'] : 'DESC';
$search = isset($_POST['search']) ? trim($_POST['search']) : "";
$filename = isset($_POST['fileName']) ? trim($_POST['fileName']) : "Roster";

$con = connection();

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename= $filename.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Build query
$searchParts = explode(" ", $search);

if (count($searchParts) == 2) {
    $firstPart = "%" . $searchParts[0] . "%";
    $secondPart = "%" . $searchParts[1] . "%";
    $sql = "
        SELECT * FROM student_list 
        WHERE (firstname LIKE ? AND lastname LIKE ?) 
        OR (firstname LIKE ? AND lastname LIKE ?)
        ORDER BY $sort $sorttype
    ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $firstPart, $secondPart, $secondPart, $firstPart);
} else {
    $searchTerm = "%" . $search . "%";
    $sql = "
        SELECT * FROM student_list 
        WHERE firstname LIKE ? OR lastname LIKE ?
        ORDER BY $sort $sorttype
    ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
}

$stmt->execute();
$result = $stmt->get_result();

// Output table
echo "ID\tFirst Name\tLast Name\n";
while ($row = $result->fetch_assoc()) {
    echo $row['ismisID'] . "\t" . $row['firstname'] . "\t" . $row['lastname'] . "\n";
}
?>
