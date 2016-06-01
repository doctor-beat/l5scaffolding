<?php

namespace DoctorBeat\L5Scaffolding\Metadata;

use Illuminate\Database\DatabaseManager;
use Log;

class SqliteMetadataRepository implements MetadataRepository{
    const SQL = "PRAGMA table_info(%s)";
    
    /**
     *
     * @var DatabaseManager
     */
    protected $db;
        
    function __construct(DatabaseManager $db) {
        $this->db = $db;
    }


    /**
     * Gets the metadata from the database;
     * @return DatabaseVolumn[] ordered list of database columns
     */
    public function getMetadata($class) {
        $tablename = (new $class)->getTable();
        $data = $this->db->select(sprintf(self::SQL, $tablename));
        
        $columns = [];
        foreach ($data as $row) {
            Log::debug(print_r($row, true));
            $column = new DatabaseColumn();
            $column->name = $row->name;
            $column->setType($row->type);
            $column->nullable = ($row->notnull == 0);
            $column->key = ($row->pk == 1);
            if ($column->isText()) {
                $column->size = 100;
            }
            
            $columns[] = $column;
        }
        return $columns;
    }
}
