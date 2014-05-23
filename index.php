<!DOCTYPE html>
<html lang="es">
    
    <head>
        <?php include('headBasico.html'); ?>
    </head>
    
    <body>
        <img class="burbujas" src="images/para.png" alt="fondo burbujas">
        
        <header>
            <?php include('menu.html'); ?>
        </header>
        
        <section class="content" id="urgente">
            <h1>URGENTE</h1>
            <h2>Trabaja en estas tareas primero</h2>
            <?php include('urgente.php') ?>
        </section>

        <section class="content" id="buscar">
            <h1>Buscar tareas por asignatura</h1>
            <form action="buscar.php" method="post">
                <label for="asignatura">Elige una asignatura:</label>
                <select name="asignatura">
                    <?php
                        include('abreConexionBD.php');

                        $query = "SELECT Asignatura, Id  FROM Tareas GROUP BY Asignatura ORDER BY Asignatura ASC";
                        $result = mysql_query($query, $link);

                        while($registro = mysql_fetch_array($result))
                        {
                            $valor = $registro["Id"] ;
                            $nombre = $registro["Asignatura"];
                            echo "<option value=\"" . $nombre . "\">" . $nombre . "</option>"; 
                        }
                        include('cierraConexionBD.php');
                    ?>
                </select>
                <input type="submit" name="buscador" value="Buscar">
            </form>
        </section>
    </body>

</html>
