<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
    <!-- Puedes agregar Bootstrap si deseas mejor estilo automático -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Listado de Alumnos</h2>

        <?php
        $host = "localhost";
        $usuario = "root";
        $contrasena = "";
        $base_datos = "escuela tv";

        $conn = new mysqli($host, $usuario, $contrasena, $base_datos);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT pk_persona, num_legajo, DNI, curso FROM alumno";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Legajo</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Curso</th>
                        </tr>
                    </thead>
                    <tbody>';

            while($fila = $resultado->fetch_assoc()) {
                echo "<tr>
                        <th scope='row'>{$fila['pk_persona']}</th>
                        <td>{$fila['num_legajo']}</td>
                        <td>{$fila['DNI']}</td>
                        <td>{$fila['curso']}</td>
                      </tr>";
            }

            echo '  </tbody>
                  </table>';
        } else {
            echo "<p>No se encontraron resultados.</p>";
        }

        $conn->close();
        ?>
    </div>
    <div class="mt-5">
        <h2 class="text-center">Agregar Nueva Persona</h2>
        <form action="" method="POST">
            <div class="form-group mb-3">
                <label for="n_legajo">Legajo</label>
                <input type="text" class="form-control" id="n_legajo" name="n_legajo" placeholder="Ingrese legajo" required>
            </div>

            <div class="form-group mb-3">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese DNI" required>
            </div>

            <div class="form-group mb-3">
                <label for="curso">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" placeholder="Ingrese curso" required>
            </div>

            <button type="submit" name="insertar" class="btn btn-primary w-100">Insertar Persona</button>
        </form>
    </div>
</div>

</body>

</html>
