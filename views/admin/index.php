<h1 class="nombre-pagina">Panel de Administración</h1>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
?>

<h2>Buscar reservas</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input 
                type="date"
                id="fecha"
                name="fecha"
                value="<?php echo $fecha; ?>"
            />
        </div>
    </form> 
</div>

<?php
    if(count($reservas) === 0) {
        echo "<h2>No Hay reservas en esta fecha</h2>";
    }
?>

<div id="citas-admin">
    <ul = class = "citas">
            <?php   
                $idReserva = 0;
                foreach($reservas as $key => $reserva){

                    if($idReserva !== $reserva->id) {
                        $total = 0; 
            ?>
            <li>
                    <p>ID: <span><?php echo $reserva->id; ?></span></p>
                    <p>Hora: <span><?php echo $reserva->hora; ?></span></p>
                    <p>Cliente: <span><?php echo $reserva->cliente; ?></span></p>
                    <p>Email: <span><?php echo $reserva->email; ?></span></p>
                    <p>Telefono: <span><?php echo $reserva->telefono; ?></span></p>
                    

                    <h3>Servicios</h3>
            <?php 
                $idReserva = $reserva->id;
            } //Fin de if 
                $total += $reserva->precio;
            ?>
                    <p class="servicio"><?php echo $reserva->servicio . " " . $reserva->precio; ?></p>
            
            <?php 
                $actual = $reserva->id;
                $proximo = $reservas[$key + 1]->id ?? 0;

                if(esUltimo($actual, $proximo)) { ?>
                    <p class="total">Total: <span>$ <?php echo $total; ?></span></p>

                    <form action="/api/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $reserva->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>

            <?php } 
        } //Fin de foereach?>
    </ul>
</div>

<?php
    $script = "<script src='build/js/buscador.js'></script>"
?>