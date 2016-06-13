<?php

namespace DoctorBeat\L5Scaffolding\Metadata;

use Illuminate\Database\DatabaseManager;
use Log;

class SqliteMetadataRepository implements MetadataRepository{
    const SQL = "SHOW COLUMNS FROM %s";
    
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
            $column->name = $row->Field;
            $column->setTypeAndSize($row->Type);
            $column->nullable = ($row->Null == 'YES');
            $column->key = ($row->Key == 'PRI');
            $column->default = $row->Default;
            
            $columns[] = $column;
        }
        return $columns;
    }
}
