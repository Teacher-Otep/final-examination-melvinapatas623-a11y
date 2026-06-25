<?php
<<<<<<< HEAD

require_once __DIR__ . '/db.php';
=======
<<<<<<< HEAD
require_once DIR . '/db.php';
=======
require_once _DIR_ . '/db.php';
>>>>>>> cd3c9bdbde0789e01419739ebaf484fa5e601da9
>>>>>>> 5ec4f652dec9c460afe6215a516cce406f872bdc

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $address = $_POST['address'] ?? '';
    $contact = $_POST['contact'] ?? '';

    try {
        $sql = "INSERT INTO student (name, surname, middlename, address, contact_number) 
                VALUES (:name, :surname, :middlename, :address, :contact)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name'       => $name,
            ':surname'    => $surname,
            ':middlename' => $middlename,
            ':address'    => $address,
            ':contact'    => $contact
        ]);

        header("Location: ../public/index.php?status=success");
        exit();
        
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>