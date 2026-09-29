<?php

class Mahasiswa_model {
    private $dbh; // database handler
    private $stmt; // statement yang digunakan utk menyimpan query

    public function __construct()
    {
        // datasource name
        $dsn = 'mysql:host=localhost;dbname=pwbo_farid2511500023';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}