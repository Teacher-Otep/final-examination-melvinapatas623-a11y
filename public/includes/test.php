<?php
require 'db.php';

if (isset($pdo)) {
    echo "connected suceesfully sa database!";
} else {
    echo "May problema sa \$pdo variable.";
}
?>