<?php
/**
 * Clase para manejar solicitudes en la base de datos
 */
require_once __DIR__ . '/../database.php';

class Solicitud {
    private $conn;
    
    public function __construct() {
        $this->conn = getDBConnection();
    }
    
    /**
     * Guardar una nueva solicitud
     * @param string $nombre Nombre del solicitante
     * @param string $email Email del solicitante
     * @param string $empresa Nombre de la empresa
     * @param string $tipo Tipo de web solicitada
     * @param string $descripcion Descripción del proyecto
     * @return array Resultado de la operación
     */
    public function guardar($nombre, $email, $empresa, $tipo, $descripcion) {
        if (!$this->conn) {
            return [
                'success' => false, 
                'message' => 'Error de conexión a la base de datos'
            ];
        }
        
        // Preparar consulta con prepared statements (seguridad)
        $stmt = $this->conn->prepare(
            "INSERT INTO solicitudes (nombre, email, empresa, tipo, descripcion) 
             VALUES (?, ?, ?, ?, ?)"
        );
        
        if (!$stmt) {
            return [
                'success' => false, 
                'message' => 'Error al preparar consulta: ' . $this->conn->error
            ];
        }
        
        // Bind parameters
        $stmt->bind_param("sssss", $nombre, $email, $empresa, $tipo, $descripcion);
        
        // Ejecutar
        if ($stmt->execute()) {
            $id = $stmt->insert_id;
            $stmt->close();
            return [
                'success' => true, 
                'id' => $id, 
                'message' => 'Solicitud guardada correctamente'
            ];
        } else {
            $error = $stmt->error;
            $stmt->close();
            return [
                'success' => false, 
                'message' => 'Error al guardar: ' . $error
            ];
        }
    }
    
    /**
     * Obtener todas las solicitudes
     * @param string|null $estado Filtrar por estado
     * @return array Lista de solicitudes
     */
    public function obtenerTodas($estado = null) {
        if (!$this->conn) {
            return [];
        }
        
        $sql = "SELECT * FROM solicitudes";
        if ($estado) {
            $sql .= " WHERE estado = ?";
        }
        $sql .= " ORDER BY fecha_creacion DESC";
        
        $stmt = $this->conn->prepare($sql);
        
        if ($estado) {
            $stmt->bind_param("s", $estado);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        $solicitudes = [];
        while ($row = $result->fetch_assoc()) {
            $solicitudes[] = $row;
        }
        
        $stmt->close();
        return $solicitudes;
    }
    
    /**
     * Obtener solicitud por ID
     * @param int $id ID de la solicitud
     * @return array|null Datos de la solicitud o null si no existe
     */
    public function obtenerPorId($id) {
        if (!$this->conn) {
            return null;
        }
        
        $stmt = $this->conn->prepare("SELECT * FROM solicitudes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $solicitud = $result->fetch_assoc();
        $stmt->close();
        
        return $solicitud;
    }
    
    /**
     * Actualizar estado de solicitud
     * @param int $id ID de la solicitud
     * @param string $estado Nuevo estado
     * @return bool True si se actualizó correctamente
     */
    public function actualizarEstado($id, $estado) {
        if (!$this->conn) {
            return false;
        }
        
        $stmt = $this->conn->prepare("UPDATE solicitudes SET estado = ? WHERE id = ?");
        $stmt->bind_param("si", $estado, $id);
        $result = $stmt->execute();
        $stmt->close();
        
        return $result;
    }
    
    /**
     * Contar solicitudes por estado
     * @param string|null $estado Estado a contar
     * @return int Número de solicitudes
     */
    public function contar($estado = null) {
        if (!$this->conn) {
            return 0;
        }
        
        $sql = "SELECT COUNT(*) as total FROM solicitudes";
        if ($estado) {
            $sql .= " WHERE estado = ?";
        }
        
        $stmt = $this->conn->prepare($sql);
        if ($estado) {
            $stmt->bind_param("s", $estado);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        
        return (int)$row['total'];
    }
    
    public function __destruct() {
        if ($this->conn) {
            closeDBConnection($this->conn);
        }
    }
}
?>

