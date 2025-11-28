<?php
/**
 * Configuración del sitio
 * Modificar según tus necesidades
 */

return [
    // Email donde recibirás las solicitudes
    'contact_email' => 'tu@email.com',
    
    'site_name' => 'Tu Unicornio',
    
    'site_subtitle' => 'Soluciones Geeks',
    
    // URL base del sitio (sin trailing slash)
    'site_url' => 'https://tudominio.com',
    
    // Información de contacto
    'phone' => '+34 123 456 789', // Opcional
    'address' => 'Tu ciudad, País', // Opcional
    
    // Configuración de Base de Datos
    // ⚠️ Ajusta estos valores según tu configuración
    'db' => [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => 'manu',
        'name' => 'tu_unicornio_db',
        'charset' => 'utf8mb4'
    ]
];
?>
