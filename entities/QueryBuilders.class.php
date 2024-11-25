<?php
require_once 'exceptions/QueryException.class.php';
require_once 'utils/strings.php';
require_once 'entities/App.class.php';
require_once 'entities/Categoria.class.php';

/**
 * Clase abstracta QueryBuilder
 * Proporciona una abstracción genérica para realizar operaciones CRUD en una base de datos.
 * Está diseñada para ser extendida por clases específicas.
 */
abstract class QueryBuilder {

    /**
     * @var PDO Conexión a la base de datos.
     */
    private $connection;

    /**
     * @var string Nombre de la tabla de la base de datos con la que se trabaja.
     */
    private $table;

    /**
     * @var string Clase de entidad asociada a los datos de la tabla.
     */
    private $classEntity;

    /**
     * Constructor de QueryBuilder.
     * 
     * @param string $table Nombre de la tabla.
     * @param string $classEntity Clase de la entidad asociada.
     */
    public function __construct($table, $classEntity)
    {
        // Obtiene la conexión a la base de datos desde la clase App.
        $this->connection = App::getConnection(); 
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    /**
     * Obtiene todos los registros de la tabla.
     * 
     * @return array Conjunto de resultados mapeados como objetos de la clase especificada.
     * @throws QueryException Si la consulta falla.
     */
    public function findAll() {
        // Consulta SQL para obtener todos los registros de la tabla.
        $sqlStatement = "SELECT * FROM $this->table";

        // Prepara la consulta usando PDO.
        $pdoStatement = $this->connection->prepare($sqlStatement);

        // Ejecuta la consulta y verifica si falla.
        if ($pdoStatement->execute() === false) {
            // Lanza la excepción personalizada si ocurre un error.
            throw new QueryException(getErrorString(ERROR_EXECUTE_STATEMENT));
        }

        // Devuelve los resultados mapeados a la clase de entidad.
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    /**
     * Incrementa el número de imágenes de una categoría específica.
     * 
     * @param int $categoria ID de la categoría.
     * @throws Exception Si ocurre un error durante la transacción.
     */
    public function incrementaNumCategoria(int $categoria) {
        try {
            // Inicia una transacción.
            $this->connection->beginTransaction();

            // SQL para incrementar el campo numImagenes en la tabla categorias.
            $sql = "UPDATE categorias SET numImagenes = numImagenes + 1 WHERE id = $categoria";

            // Ejecuta la consulta.
            $this->connection->exec($sql);

            // Confirma la transacción.
            $this->connection->commit();
        } catch (Exception $exception) {
            // Revierte la transacción en caso de error.
            $this->connection->rollBack();
            // Lanza la excepción original.
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * Inserta una nueva entidad en la base de datos.
     * 
     * @param IEntity $entity Entidad que se va a guardar.
     * @throws PDOException Si ocurre un error al ejecutar la consulta.
     */
    public function save(IEntity $entity): void {
        try {
            // Convierte la entidad a un array asociativo.
            $parameters = $entity->toArray();

            // Construye una consulta dinámica INSERT utilizando los parámetros.
            $sql = sprintf(
                'INSERT INTO %s (%s) VALUES (%s)',
                $this->table,                             // Nombre de la tabla.
                implode(', ', array_keys($parameters)),   // Nombres de las columnas.
                ':' . implode(',:', array_keys($parameters)) // Placeholders para los valores.
            );

            // Prepara la consulta con PDO.
            $statement = $this->connection->prepare($sql);

            // Ejecuta la consulta pasando los parámetros.
            $statement->execute($parameters);

            // Si la entidad es de tipo ImagenGaleria, incrementa el contador de su categoría.
            if ($entity instanceof ImagenGaleria) {
                $this->incrementaNumCategoria($entity->getCategoria());
            }

        } catch (PDOException $exception) {
            // Detiene la ejecución y muestra el mensaje de error.
            die($exception->getMessage());
        }
    }

    /**
     * Ejecuta múltiples consultas dentro de una transacción.
     * 
     * @param callable $fnExecuteQueries Función que contiene las consultas a ejecutar.
     * @throws PDOException Si ocurre un error durante la transacción.
     */
    public function executeTransaction(callable $fnExecuteQueries) {
        try {
            // Inicia una transacción.
            $this->connection->beginTransaction();

            // Ejecuta la función proporcionada que contiene las consultas.
            $fnExecuteQueries();

            // Confirma la transacción.
            $this->connection->commit();
        } catch (PDOException $pdoException) {
            // Lanza la excepción original si ocurre un error.
            throw new PDOException($pdoException->getMessage());
        }
    }
}
