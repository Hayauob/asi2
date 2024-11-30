<?php
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = @file_get_contents($URL);

if ($response === FALSE) {
    die('Error fetching data.');
}

$result = json_decode($response, true);

if ($result === NULL) {
    die('Error decoding JSON: ' . json_last_error_msg());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Nationalities Data</title>
    <link rel="stylesheet" href="https://unpkg.com/pico-css/dist/pico.min.css">
    <style>
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f4f4f4;
        }
        .overflow-auto {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <main>
        <h1>Students Nationalities Data</h1>
        <div class="overflow-auto">
            <table>
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Programs</th>
                        <th>Nationality</th>
                        <th>Colleges</th>
                        <th>Number of Students</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result['results'] as $record): ?>
                        <tr>
                            <td><?= htmlspecialchars($record['year']) ?></td>
                            <td><?= htmlspecialchars($record['semester']) ?></td>
                            <td><?= htmlspecialchars($record['the_programs']) ?></td>
                            <td><?= htmlspecialchars($record['nationality']) ?></td>
                            <td><?= htmlspecialchars($record['colleges']) ?></td>
                            <td><?= htmlspecialchars($record['number_of_students']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

