<?php

namespace App\Core;

use PDO;

abstract class Model {
    protected $db;
    protected $table; // Each model should define its table

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Find a record by its ID.
     *
     * @param int $id The ID of the record.
     * @return mixed The record object or false if not found.
     */
    public function find($id) {
        if (!$this->table) {
            throw new \Exception("Table name not defined in model: " . get_class($this));
        }
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ); // Or PDO::FETCH_ASSOC, or an instance of the model
    }

    /**
     * Get all records from the table.
     *
     * @return array An array of record objects.
     */
    public function all() {
        if (!$this->table) {
            throw new \Exception("Table name not defined in model: " . get_class($this));
        }
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_OBJ); // Or PDO::FETCH_ASSOC
    }

    /**
     * Create a new record.
     *
     * @param array $data Associative array of column => value.
     * @return int|false The ID of the newly created record or false on failure.
     */
    public function create(array $data) {
        if (!$this->table) {
            throw new \Exception("Table name not defined in model: " . get_class($this));
        }
        if (empty($data)) {
            return false;
        }

        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";

        $stmt = $this->db->prepare($sql);

        try {
            $stmt->execute($data);
            return $this->db->lastInsertId();
        } catch (\PDOException $e) {
            // Log error: $e->getMessage();
            return false;
        }
    }

    /**
     * Update an existing record by ID.
     *
     * @param int $id The ID of the record to update.
     * @param array $data Associative array of column => value.
     * @return bool True on success, false on failure.
     */
    public function update($id, array $data) {
        if (!$this->table) {
            throw new \Exception("Table name not defined in model: " . get_class($this));
        }
        if (empty($data)) {
            return false;
        }

        $setClauses = [];
        foreach (array_keys($data) as $key) {
            $setClauses[] = "{$key} = :{$key}";
        }
        $setSql = implode(', ', $setClauses);
        $sql = "UPDATE {$this->table} SET {$setSql} WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $data['id'] = $id; // Add id to the data array for binding

        try {
            return $stmt->execute($data);
        } catch (\PDOException $e) {
            // Log error: $e->getMessage();
            return false;
        }
    }

    /**
     * Delete a record by ID.
     *
     * @param int $id The ID of the record to delete.
     * @return bool True on success, false on failure.
     */
    public function delete($id) {
        if (!$this->table) {
            throw new \Exception("Table name not defined in model: " . get_class($this));
        }
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            return $stmt->execute();
        } catch (\PDOException $e) {
            // Log error: $e->getMessage();
            return false;
        }
    }

    // You might add more common methods here, like:
    // - findBy($column, $value)
    // - first($column, $value)
    // - count()
    // - etc.
}

?>
