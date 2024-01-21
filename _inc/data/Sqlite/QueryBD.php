<?php

declare(strict_types=1);

namespace data\Sqlite;
use \PDO;

final class QueryBD{

    function getConnection(){
        // Connection en utlisant la connexion PDO avec le moteur en prefix
        $mysqlClient = new PDO('sqlite:db.sqlite');
        // Permet de gérer le niveau des erreurs
        $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $mysqlClient;
    }

    function getQuestion($idQ)
    {
        $mysqlClient = $this->getConnection();
        $sqlQuery = <<<EOF
            SELECT * FROM QUESTION;
        EOF;
        $stmt = $mysqlClient->query($sqlQuery);
        $question = $stmt->fetchAll();
        return $question;
    }

    function getReponses($idQ)
    {
        $mysqlClient = $this->getConnection();
        $sqlQuery = "SELECT * FROM REPONSE where idQ = ?";
        $reponseStatement = $mysqlClient->prepare($sqlQuery);
        $reponseStatement->execute([$idQ]);
        $reponses = $reponseStatement->fetchAll();
        return $reponses;
    }
}