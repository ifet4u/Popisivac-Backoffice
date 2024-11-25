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
     * Execute a query and return results with proper encoding.
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

        // Fetch data
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Normalize encoding
        return array_map(function ($row) {
            return self::normalizeEncoding($row);
        }, $results);
    }

    /**
     * Normalize encoding of array values to UTF-8.
     *
     * @param array $data
     * @return array
     */
    private static function normalizeEncoding(array $data) // skripta za enkodovanje, resava problem sa losim karakterima drugacijeg enkodovanja
    {
        return array_map(function ($value) {
            if (is_string($value)) {
                // Attempt to convert encoding to UTF-8
                if (!mb_check_encoding($value, 'UTF-8')) {
                    return mb_convert_encoding($value, 'UTF-8', 'ISO-8859-1'); // Adjust source encoding as needed
                }
            }
            return $value;
        }, $data);
    }
}
