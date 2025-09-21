<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Héroes y Poderes</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #444;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Listado de Héroes y sus Poderes</h2>

    <table>
        <thead>
            <tr>
                <th>ID Héroe</th>
                <th>SuperHero Name</th>
                <th>Poder</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($heroes)): ?>
                <?php foreach ($heroes as $h): ?>
                    <tr>
                        <td><?= esc($h['hero_id']) ?></td>
                        <td><?= esc($h['hero_name']) ?></td>
                        <td><?= esc($h['power_name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align: center;">No se encontraron resultados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
