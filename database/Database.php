<?php


class Database
{
    private PDO $pdoInstance;

    public function __construct()
    {
        $host = '127.0.0.1';
        $port = 3306;
        $dbname = 'Scrap';
        $username = 'root';
        $mdp = 'root';

        $this->pdoInstance = new PDO("mysql:host=$host;dbname=$dbname", $username, $mdp);
        $this->pdoInstance->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
    }

    /**
     * @return PDO
     */
    public function getPdoInstance(): PDO
    {
        return $this->pdoInstance;
    }

    public function testDb() : string {
        $request = $this->pdoInstance->prepare("SELECT * FROM Cours;");

        $request->execute();

        foreach ($request as $row) {
            print_r($row);
        }

        return $request->queryString;
    }


}