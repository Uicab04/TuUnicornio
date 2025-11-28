# 📋 Instrucciones para Configurar la Base de Datos

## Paso 1: Configurar la conexión a la base de datos

Edita el archivo `database.php` y cambia estos valores:

```php
define('DB_HOST', 'localhost');        // Normalmente 'localhost'
define('DB_USER', 'root');             // Tu usuario de MySQL
define('DB_PASS', '');                 // Tu contraseña de MySQL
define('DB_NAME', 'tu_unicornio_db');  // Nombre de tu base de datos
```

## Paso 2: Crear la base de datos

### Opción A: Usando phpMyAdmin (Recomendado)

1. Abre phpMyAdmin en tu navegador: `http://localhost/phpmyadmin`
2. Ve a la pestaña "SQL"
3. Copia y pega el contenido completo del archivo `database.sql`
4. Haz clic en "Ejecutar"

### Opción B: Usando la línea de comandos MySQL

```bash
mysql -u root -p < database.sql
```

## Paso 3: Verificar que todo funciona

1. Asegúrate de que los valores en `database.php` sean correctos
2. Asegúrate de que la base de datos y las tablas se hayan creado correctamente
3. Prueba enviar un formulario desde tu sitio web
4. Verifica en phpMyAdmin que los datos se guarden en la tabla `solicitudes`

## Estructura de la Base de Datos

### Tabla: `solicitudes`

- `id` - ID único de la solicitud (auto-incremental)
- `nombre` - Nombre del solicitante
- `email` - Email del solicitante
- `empresa` - Nombre de la empresa
- `tipo` - Tipo de web solicitada
- `descripcion` - Descripción del proyecto
- `fecha_creacion` - Fecha y hora de creación (automático)
- `estado` - Estado de la solicitud: pendiente, en_proceso, completada, cancelada

### Tabla: `logs` (Opcional)

- `id` - ID único del log
- `accion` - Acción realizada
- `tabla_afectada` - Tabla afectada
- `registro_id` - ID del registro afectado
- `detalles` - Detalles adicionales
- `fecha` - Fecha y hora del log

## Solución de Problemas

### Error: "Error de conexión a la base de datos"

- Verifica que MySQL esté corriendo en Laragon
- Verifica que los datos en `database.php` sean correctos
- Verifica que la base de datos exista

### Error: "Table 'solicitudes' doesn't exist"

- Ejecuta el script `database.sql` en phpMyAdmin
- Verifica que hayas seleccionado la base de datos correcta

### Los datos no se guardan

- Verifica los permisos de la base de datos
- Revisa los logs de error de PHP
- Verifica que la tabla tenga la estructura correcta

## Próximos Pasos

Una vez configurada la base de datos, puedes:

1. Crear un panel de administración para ver las solicitudes
2. Agregar más funcionalidades a la clase `Solicitud`
3. Implementar filtros y búsquedas
4. Agregar más tablas según tus necesidades

