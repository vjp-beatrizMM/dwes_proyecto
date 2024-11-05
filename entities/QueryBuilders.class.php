<?php
require 'utils/strings.php';
require 'exceptions/QueryException.class.php';

class QueryBuilder
{

    /**
     * @var PDO
     */
    private $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    public function findAll(string $table, string $classEntity)
    {
        $sqlStatement = "SELECT * from $table";

        $pdoStatement = $this->connection->prepare($sqlStatement);
        if ($pdoStatement->execute() === false) {
            throw new QueryException(ERROR_STRINGS(ERROR_EXECUTE_STATEMENT));
        }

        return $pdoStatement->fetchAll(PDO::FETCH_PROPS_LATE)
    }
}
