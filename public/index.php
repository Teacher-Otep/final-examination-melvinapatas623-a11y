<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link   rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
            <img src="../images/northhub.svg" id="logo"></img>
            <button class="navbarbuttons" onclick="showSection('create')"> Create </button>
            <button class="navbarbuttons" > Read </button>
            <button class="navbarbuttons" > Update </button>
            <button class="navbarbuttons" > Delete </button>
    </nav>
    <section id="home" class="homecontent"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <section id="create" class="content">
        <h1 class="contenttitle"> Insert New Student </h1>

    <form action="../includes/insert.php" method="POST">
        <label for="surname" class="label">Surname</label>
        <input type="text" name="surname" id="surname" class="field" required><br/>

        <label for="name" class="label">Name</label>
        <input type="text" name="name" id="name" class="field" required><br/>

        <label for="middlename" class="label">Middle name</label>
        <input type="text" name="middlename" id="middlename" class="field"><br/>

        <label for="address" class="label">Address</label>
        <input type="text" name="address" id="address" class="field"><br/>

        <label for="contact" class="label">Mobile Number</label>
        <input type="text" name="contact" id="contact" class="field"><br/>

        <div id="btncontainer">
            <button type="button" id="clrbtn" class="btns">Clear Fields</button><br/>
            <button type="submit" id="savebtn" class="btns">Save</button>
        </div>

        <div id="success-toast" class="toast-hidden">
            Registration Successful!
        </div>
    </form>   

    </section>

<br/><br/><br/><br/>

    <section id="read" class="content"> View Students </section>
    <section id="update" class="content">
<h1 class="contenttitle">Update Student</h1>

<form method="GET">
    <input type="number" name="id" placeholder="Enter Student ID" required>
    <button type="submit">Search</button>
</form>

<?php
$conn = new mysqli("localhost", "root", "", "your_database");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<form method="POST">
    <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">

    <input type="text" name="surname" value="<?php echo $row['surname']; ?>"><br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
    <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>"><br>
    <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
    <input type="text" name="contact" value="<?php echo $row['contact']; ?>"><br>

    <button type="submit" name="update">Update</button>
</form>

<?php
    } else {
        echo "No student found.";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['update_id'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $middlename = $_POST['middlename'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $conn->query("UPDATE students SET 
        surname='$surname',
        name='$name',
        middlename='$middlename',
        address='$address',
        contact='$contact'
        WHERE id=$id");

    echo "Updated successfully!";
}
?>
</section>

<section id="delete" class="content">
<h1 class="contenttitle">Delete Student</h1>

<form method="POST">
    <input type="number" name="delete_id" placeholder="Enter Student ID" required>
    <button type="submit" name="delete">Delete</button>
</form>

<?php
$conn = new mysqli("localhost", "root", "", "your_database");

if (isset($_POST['delete'])) {
    $id = $_POST['delete_id'];

    $conn->query("DELETE FROM students WHERE id=$id");

    echo "Deleted successfully!";
}
?>
</section>


   


    <script src="script.js"></script>
</body>
</html>