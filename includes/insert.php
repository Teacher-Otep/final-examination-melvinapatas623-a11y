<?php
require_once _DIR_ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $address = $_POST['address'] ?? '';
    $contact = $_POST['contact_number'] ?? '';

    try {
        $sql = "INSERT INTO students (name, surname, middlename, address, contact_number) 
                VALUES (:name, :surname, :middlename, :address, :contact)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':surname' => $surname,
            ':middlename' => $middlename,
            ':address' => $address,
            ':contact' => $contact
        ]);

        header("Location: ../index.php?status=success");
        exit();

    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>