<?php

namespace App\Http\Controllers;

use App\Models\PodesavanjaModel;
use PDO;
use PDOException;

class DB
{
    private static $instance = null; // Singleton instance
    private $db; // Database connection

    /**
     * Private constructor to prevent direct instantiation.
     */
    private function __construct()
    {
        $this->connect();
    }

    /**
     * Establish a database connection.
     */
    private function connect()
    {
        $podesavanja = PodesavanjaModel::first();

        if (!$podesavanja) {
            throw new \Exception('Popunite podesavanja.');
        }

        try {
            $dsn = "odbc:DRIVER={" . $podesavanja->drajver . "}; DBQ=" . $podesavanja->putanja . "; Uid=; Pwd=;";
            $this->db = new PDO($dsn);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $pe) {
            throw new \Exception('Konekcija nije uspesna: ' . $pe->getMessage());
        }
    }

    /**
     * Get the Singleton instance of the DB class.
     *
     * @return self
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Execute a query and return results.
     *
     * @param string $sql
     * @param array $params
     * @return array
     */
    public static function get($sql, $params = [])
    {
        $instance = self::getInstance();

        $stmt = $instance->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
