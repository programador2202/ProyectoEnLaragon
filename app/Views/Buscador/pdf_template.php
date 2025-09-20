<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Superhéroes</title>
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
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th {
            background: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }
        td {
            padding: 6px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Listado de Superhéroes</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>SubNombre</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($heroes)): ?>
                <?php foreach ($heroes as $h): ?>
                    <tr>
                        <td><?= esc($h['id']) ?></td>
                        <td><?= esc($h['superhero_name']) ?></td>
                        <td><?= esc($h['full_name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No se encontraron resultados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
