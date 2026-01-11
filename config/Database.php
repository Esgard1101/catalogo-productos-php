<?php
class Database
{
    // Configuración de la base de datos
    private static $host = '127.0.0.1'; // Usamos IP para forzar conexión TCP y que respete el puerto
    private static $db_name = 'catalogo_productos';
    private static $username = 'root';
    private static $password = '05kl8KCwZb9K5zHR'; // Contraseña actualizada
    private static $port = '3306'; // Usando puerto 3306 donde corre MySQL 9.5.0

    private static $conn = null;

    /**
     * Obtiene la conexión a la base de datos usando el patrón Singleton.
     * Esto asegura que solo haya una conexión activa a la vez.
     * 
     * @return PDO Objeto de conexión a la base de datos
     */
    public static function getConnection()
    {
        if (self::$conn === null) {
            try {
                // Cadena de conexión (DSN) incluyendo el puerto
                $dsn = "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$db_name . ";charset=utf8mb4";

                // Opciones para mejorar la seguridad y manejo de errores
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Lanza excepciones en caso de error
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Devuelve arrays asociativos
                    PDO::ATTR_PERSISTENT => false, // No usar conexiones persistentes
                    PDO::ATTR_EMULATE_PREPARES => false // Usar sentencias preparadas nativas (seguridad contra inyección SQL)
                ];

                self::$conn = new PDO($dsn, self::$username, self::$password, $options);
            } catch (PDOException $e) {
                // En ambiente de producción, es mejor registrar el error en un log y mostrar un mensaje genérico al usuario
                die("Error de conexión a la base de datos: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>