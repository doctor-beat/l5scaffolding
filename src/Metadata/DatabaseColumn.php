<?php

namespace DoctorBeat\L5Scaffolding\Metadata;



class DatabaseColumn {
    const TYPE_TEXT = 'string';
    const TYPE_DATETIME = 'datetime';
    public $name;
    protected $type;        // boolean, integer, float, string, clob, binary, datetime   
    public $size;
    public $nullable;
    public $key;
    public $default;
    
    function getType() {
        return $this->type;
    }

    function setType($type) {
        switch (strtolower($type)) {
            case 'text':
            case 'varchar':
            case 'varchar2':
                $this->type = self::TYPE_TEXT;
                break;
            case 'date':
            case 'datetime':
                $this->type = self::TYPE_DATETIME;
                break;
            default:
                $this->type = strtolower($type);
        }
    }
    
    function isText() {
        return $this->type === self::TYPE_TEXT;
    }
    
    function setTypeAndSize($typeAndSize){
        $regex == '/^(\w+)(\(\d+\))?$/';
        if(preg_match($regex, $typeAndSize, $matches)) {
            $this->setType($matches[1]);
            if (count($matches) >= 3) {
                $this->size = $matches[2];
            }
        }
    }


}
