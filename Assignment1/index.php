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
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 10px 15px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        .expensive {
            color: red;
            font-weight: bold;
        }
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

    <?php
    $count = 0;
    while ($row = $result->fetch_assoc()):
        $count++;
    ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['model'] ?></td>
        <td><?= $row['type'] ?></td>
        <td><?= $row['year'] ?></td>
        <td>
            <?php if ($row['price'] > 50000): ?>
                <span class="expensive"><?= number_format($row['price'], 2) ?>*</span>
            <?php else: ?>
                <?= number_format($row['price'], 2) ?>
            <?php endif; ?>
        </td>
        <td><?= $row['manufacturer'] ?></td>
        <td><?= $row['country'] ?></td>
    </tr>
    <?php endwhile; ?>

</table>

<p>Total cars shown: <?= $count ?></p>

</body>
</html>
