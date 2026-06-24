<?php
<<<<<<< HEAD
echo'<p>Hello world</p>';

=======
require 'db.php';

if (isset($pdo)) {
    echo "connected suceesfully sa database!";
} else {
    echo "May problema sa \$pdo variable.";
}
>>>>>>> cd3c9bdbde0789e01419739ebaf484fa5e601da9
?>