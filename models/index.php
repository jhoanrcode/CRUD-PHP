<?php
Class Datos {

    //========================================================================
    // Consulta los datos de la tabla
    //========================================================================
    function consultaDatos( ){
        include_once('../config/init_db.php');
        $query_sql = "SELECT id_empleados AS id,nombre,apellido,salario,email,fecha_creacion FROM prueba_uniminuto ORDER BY id_empleados DESC";
        $Rows_config = DB::query($query_sql);

        return $Rows_config;
    }


    function crearDatos( $p ){
        include_once('../config/init_db.php');

        $query_sql = "SELECT email FROM prueba_uniminuto WHERE email='".$p['email']."'";
        $Rows_result = DB::queryFirstRow($query_sql);
        $Rows_config = 0;

        if ($Rows_result == NULL) {

            DB::insert( 'prueba_uniminuto', [
                "nombre" => $p['nombre'],
                "apellido" => $p['apellido'],
                "salario" => $p['salario'],
                "email" => $p['email']
            ] );
            $Rows_config = DB::insertId();

        } else {
            $Rows_config = -1;
        }

        return $Rows_config;
    }
    

    function editarDatos( $p ){
        include_once('../config/init_db.php');

        $query_sql = "SELECT email FROM prueba_uniminuto WHERE id_empleados != ".$p['id']." AND email='".$p['email']."'";
        $Rows_result = DB::queryFirstRow($query_sql);
        $Rows_config = 0;

        if ($Rows_result == NULL) {
            DB::update( 'prueba_uniminuto', [
                "nombre" => $p['nombre'],
                "apellido" => $p['apellido'],
                "salario" => $p['salario'],
                "email" => $p['email']
            ], "id_empleados = {$p['id']}" );
            $Rows_config = DB::affectedRows();

        } else {
            $Rows_config = -1;
        }
        
        return $Rows_config;
    }

    function eliminarDatos( $p ){
        include_once('../config/init_db.php');
        DB::delete( 'prueba_uniminuto', "id_empleados = ".$p['id'] );
        $Rows_config = DB::affectedRows();
        return $Rows_config;
    }

    function consultaSelectEmpleados( ){
        include_once('../config/init_db.php');
        $query_sql = "SELECT id_empleados AS id,CONCAT(nombre,' ', apellido) nombres, salario FROM prueba_uniminuto ORDER BY id_empleados DESC";
        $Rows_config = DB::query($query_sql);

        return $Rows_config;
    }

}
?>