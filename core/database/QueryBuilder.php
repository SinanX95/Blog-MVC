<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAllFromTable($table)
    {   
        try {
            // $statement->bindValue(":table", $table, \PDO::PARAM_STR);
            $tables = ["posts"]; // whitelist of tables from db
            $key = array_search($table, $tables); // see if we have a such name
            $table = $tables[$key];

            $query = "SELECT * FROM {$table}";

            $statement = $this->pdo->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } catch(\PDOException $e) {
            echo "Error: {$e->getMessage()} \n";
        }
    }

    public function selectPostsByDate($uriParams)
    {
        try {
            $uriParams['year'] = $uriParams['yearClone'] = !empty($uriParams['year']) ? $uriParams['year'] : null;
            $uriParams['month'] = $uriParams['monthClone'] = !empty($uriParams['month']) ? $uriParams['month'] : null;
            $uriParams['day'] = $uriParams['dayClone'] = !empty($uriParams['day']) ? $uriParams['day'] : null;

            $query = "SELECT * FROM posts 
                    WHERE (YEAR(date) = :year OR :yearClone IS NULL) 
                    AND (MONTH(date) = :month OR :monthClone IS NULL) 
                    AND (DAY(date) = :day OR :dayClone IS NULL)";

            $statement = $this->pdo->prepare($query);
            $statement->execute($uriParams);
            return $statement->fetchAll(PDO::FETCH_CLASS);

        } catch(\PDOException $e) {
            echo "Error: {$e->getMessage()} \n";
        }
    }

    public function selectPost($uriParams)
    {
        try {
            $uriParams['year'] = $uriParams['yearClone'] = !empty($uriParams['year']) ? $uriParams['year'] : null;
            $uriParams['month'] = $uriParams['monthClone'] = !empty($uriParams['month']) ? $uriParams['month'] : null;
            $uriParams['day'] = $uriParams['dayClone'] = !empty($uriParams['day']) ? $uriParams['day'] : null;
            $uriParams['slug'] = $uriParams['slugClone'] = !empty($uriParams['slug']) ? $uriParams['slug'] : null;

            $query = "SELECT * FROM posts 
            WHERE (YEAR(date) = :year OR :yearClone IS NULL) 
            AND (MONTH(date) = :month OR :monthClone IS NULL) 
            AND (DAY(date) = :day OR :dayClone IS NULL)
            AND (slug = :slug OR :slugClone IS NULL)";

            $statement = $this->pdo->prepare($query);
            $statement->execute($uriParams);
            return $statement->fetch(PDO::FETCH_ASSOC);

        } catch(\PDOException $e) {
            echo "Error: {$e->getMessage()} \n";
        }
    }
}
