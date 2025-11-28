<?php
/**
 * Configuración de Base de Datos
 * Ajusta las constantes con tus datos de conexión
 */

// ⚠️ CAMBIA ESTOS VALORES CON TUS DATOS
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Tu usuario de MySQL
define('DB_PASS', 'manu'); // Tu contraseña de MySQL (vacía por defecto en Laragon)
define('DB_NAME', 'tu_unicornio_db'); // Nombre de tu base de datos

/**
 * Función para obtener conexión a la base de datos
 * @return mysqli|null Retorna la conexión o null si hay error
 */
function getDBConnection() {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        // Verificar conexión
        if ($conn->connect_error) {
            throw new Exception("Error de conexión: " . $conn->connect_error);
        }
        
        // Establecer charset UTF-8
        $conn->set_charset("utf8mb4");
        
        return $conn;
    } catch (Exception $e) {
        // Log del error (no mostrar al usuario por seguridad)
        error_log("Error de base de datos: " . $e->getMessage());
        return null;
    }
}

/**
 * Función para cerrar conexión
 * @param mysqli $conn Conexión a cerrar
 */
function closeDBConnection($conn) {
    if ($conn && $conn instanceof mysqli) {
        $conn->close();
    }
}
?>

