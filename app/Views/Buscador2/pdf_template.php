<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Hero Attributes</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Atributos de Superhéroes</h2>

    <table>
        <thead>
            <tr>
                <th>Hero ID</th>
                <th>Superhero Name</th>
                <th>Full Name</th>
                <th>Attribute</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($atributos)): ?>
                <?php foreach ($atributos as $attr): ?>
                    <tr>
                        <td><?= esc($attr['hero_id']) ?></td>
                        <td><?= esc($attr['superhero_name']) ?></td>
                        <td><?= esc($attr['full_name']) ?></td>
                        <td><?= esc($attr['attribute_name']) ?></td>
                        <td><?= esc($attr['attribute_value']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">No se encontraron resultados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
