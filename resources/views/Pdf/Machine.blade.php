<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Máquinas Asignadas</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Listado de Máquinas Asignadas</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha Inicio</th>
                <th>Kilómetros</th>
                <th>Proyecto</th>
                <th>Provincia</th>
                <th>Máquina</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignedMachines as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->machine->kilometers }}</td>
                    <td>{{ $project->project->project_name }}</td>
                    <td>{{ $project->project->province->province_name }}</td>
                    <td>{{ $project->machine->serial_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
