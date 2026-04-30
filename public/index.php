<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <img src="images/northhub.svg" id="logo" onclick="showSection('home')">
    <button onclick="showSection('create')">Create</button>
    <button onclick="showSection('read')">Read</button>
    <button onclick="showSection('update')">Update</button>
    <button onclick="showSection('delete')">Delete</button>
</nav>

<section id="home" class="homecontent">
    <h1>Welcome</h1>
</section>

<section id="create" class="content" style="display:none;">
<form action="includes/insert.php" method="POST">
<input type="text" name="surname" placeholder="Surname" required><br>
<input type="text" name="name" placeholder="Name" required><br>
<input type="text" name="middlename"><br>
<input type="text" name="address"><br>
<input type="text" name="contact_number"><br>

<button type="button" id="clrbtn">Clear</button>
<button type="submit">Save</button>
</form>

<div id="success-toast" class="toast-hidden">Saved!</div>
</section>

<section id="read" class="content" style="display:none;">
<?php
$stmt = $pdo->query("SELECT * FROM students");
while($row = $stmt->fetch()){
    echo $row['id']." ".$row['name']." ".$row['surname']."<br>";
}
?>
</section>

<section id="update" class="content" style="display:none;">
<form method="GET">
<input type="number" name="id">
<button type="submit">Search</button>
</form>

<?php
if(isset($_GET['id'])){
$id = intval($_GET['id']);
$stmt = $pdo->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if($row){
?>
<form method="POST">
<input type="hidden" name="update_id" value="<?= $row['id'] ?>">
<input type="text" name="surname" value="<?= $row['surname'] ?>"><br>
<input type="text" name="name" value="<?= $row['name'] ?>"><br>
<input type="text" name="middlename" value="<?= $row['middlename'] ?>"><br>
<input type="text" name="address" value="<?= $row['address'] ?>"><br>
<input type="text" name="contact_number" value="<?= $row['contact_number'] ?>"><br>

<button name="update">Update</button>
</form>
<?php } }

if(isset($_POST['update'])){
$stmt = $pdo->prepare("UPDATE students SET surname=?, name=?, middlename=?, address=?, contact_number=? WHERE id=?");
$stmt->execute([
$_POST['surname'],
$_POST['name'],
$_POST['middlename'],
$_POST['address'],
$_POST['contact_number'],
$_POST['update_id']
]);

header("Location: index.php");
}
?>
</section>

<section id="delete" class="content" style="display:none;">
<form method="POST">
<input type="number" name="delete_id">
<button name="delete">Delete</button>
</form>

<?php
if(isset($_POST['delete'])){
$stmt = $pdo->prepare("DELETE FROM students WHERE id=?");
$stmt->execute([$_POST['delete_id']]);

header("Location: index.php");
}
?>
</section>

<script src="script.js"></script>
</body>
</html>