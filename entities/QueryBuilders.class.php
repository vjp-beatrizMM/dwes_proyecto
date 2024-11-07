<?php
require_once 'utils/strings.php';
require_once 'exceptions/QueryException.class.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'entities/App.class.php';

class QueryBuilder
{

    /**
     * @var PDO
     */
    private $connection;

    private $table;
    private $classEntity;

    /**
     * @param PDO $connection
     */
    public function __construct(string $table, string $classEntity)
    {
        $this->connection = APP::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }


    public function findAll()
    {
        $sqlStatement = "SELECT * from $this->table";
        $pdoStatement = $this->connection->prepare($sqlStatement);

        if ($pdoStatement->execute() === false) {
            throw new QueryException(ERROR_EXECUTE_STATEMENT);
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    public function save(IEntity $entity): void
    {
        $parameters = $entity->toArray();
            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $this->table,
                implode(', ', array_keys($parameters)),
                ': ' . implode(',:', array_keys($parameters)) //:id, :nombre, :descripcion
            );
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);
        } catch (PDOException $exception) {
            throw new QueryException(getErrorString(ERROR_INS_BD));
        }
    }
}
