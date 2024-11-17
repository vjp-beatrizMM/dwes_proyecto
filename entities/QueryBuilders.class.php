<?php
require_once 'exceptions/QueryException.class.php';
require_once 'utils/strings.php';
require_once 'entities/App.class.php';
require_once 'entities/Categoria.class.php';

abstract class QueryBuilder
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @var string
     */
    private $table;

    /**
     * @var string
     */
    private $classEntity;


    /**
     * @param PDO $connection
     */
    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }


    public function findAll(): array
    {

        $sqlStatement = "Select * from $this->table";
        // mejor prepare para evitar que metan codigo sql

        $pdoStatement = $this->connection->prepare($sqlStatement);

        if ($pdoStatement->execute() === false) {

            throw new QueryException(getErrorString(ERROR_EXECUTE_STATEMENT));
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    public function incrementaNumCategoria(int $categoria)
    {
        try {
            $this->connection->beginTransaction();
            $sql = "UPDATE categorias SET numImagenes=numImagenes+1 WHERE id=$categoria";
            $this->connection->exec($sql);
            $this->connection->commit();
        } catch (Exception $exception) {
            throw new Exception(($exception->getMessage()));
            $this->connection->rollBack();
        }
    }

    public function save(IEntity $entity): void
    {
        try {
            $parameters = $entity->toArray();


            // insert into imagenbes (descripcion, categoria) values (bytes, 1)
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)),
                ':' . implode(',:', array_keys($parameters))
            );


            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
        } catch (PDOException $exception) {
            // throw new QueryException(ERROR_STRINGS[ERROR_INSERT_BD]);
            die($exception->getMessage());
        }
    }

    //     public function save(IEntity $entity): void
    //     {

    //         $parameters = $entity->toArray();

    //             $sql = sprintf(
    //                 'insert into %s (%s) values(%s)',
    //                 $this->table,
    //                 implode(', ', array_keys($parameters)),
    //                 ':' . implode(',:', array_keys($parameters)) // :id, :nombre, :descripcion
    //             );

    //         try {
    //             $statement = $this->connection->prepare($sql);
    //             $statement->execute($parameters);

    //             if($entity instanceof ImagenGaleria){
    //                 $this->incrementaNumCategoria($entity->getCategoria()); //Si es una imagen lo que hay en la tabla, incrementa el número de imagenes correspondiente en la tabla ccategorias
    //             }

    //         } catch (PDOException $exception) {
    //             throw new  QueryException(getErrorString($exception));
    //         }
    //     }

    public function executeTransaction(callable $fnExecuteQueries)
    {
        try {
            $this->connection->beginTransaction();
            $fnExecuteQueries();

            $this->connection->commit();
        } catch (PDOException $pdoException) {
            throw new PDOException($pdoException->getMessage());
        }
    }
}
