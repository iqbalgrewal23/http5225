<?php
require 'config.php';

$sql = "
    SELECT cars.id, cars.model, cars.type, cars.year, cars.price,
           manufacturers.name AS manufacturer, manufacturers.country
    FROM cars
    JOIN manufacturers ON cars.manufacturer_id = manufacturers.id
    ORDER BY cars.year DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Inventory</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Car Inventory</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Type</th>
            <th>Year</th>
            <th>Price ($)</th>
            <th>Manufacturer</th>
            <th>Country</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['model'] ?></td>
            <td><?= $row['type'] ?></td>
            <td><?= $row['year'] ?></td>
            <td><?= number_format($row['price'], 2) ?></td>
            <td><?= $row['manufacturer'] ?></td>
            <td><?= $row['country'] ?></td>
        </tr>
        <?php endwhile; ?>

    </table>
</body>
</html>
