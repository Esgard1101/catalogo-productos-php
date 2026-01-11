# Catálogo de Productos - Arquitectura por Capas

Este proyecto es un sistema de gestión (CRUD) desarrollado como parte de mi formación técnica, enfocado en las mejores prácticas de programación orientada a objetos y separación de responsabilidades.

## Tecnologías Utilizadas
**Backend:** PHP puro (POO) 
**Base de Datos:** MySQL con el driver PDO 
*Frontend:** Bootstrap 5 

##  Arquitectura del Proyecto
El sistema implementa una arquitectura por capas para facilitar el mantenimiento y la escalabilidad:
* Capas de Entidad (Entity):** Define los objetos de negocio como Producto, Categoría, Marca y Unidad
* Capa de Acceso a Datos (DAO):** Maneja todas las consultas SQL utilizando el patrón Singleton para la conexión
* Capa de Lógica (Logic):** Contiene las validaciones de negocio antes de interactuar con la base de datos
* Vistas (Views):** Interfaz de usuario organizada por módulos

##  Instalación
1. Clonar el repositorio en tu carpeta local.
2. Importar el archivo `sql/database.sql` en tu servidor MySQL
3. Configurar las credenciales en `config/Database.php`
