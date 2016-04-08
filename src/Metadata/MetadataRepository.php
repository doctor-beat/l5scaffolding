<?php

namespace DoctorBeat\L5Scaffolding\Metadata;

interface MetadataRepository {
    /**
     * Gets the metadata from the database;
     * @return DataBaseColumn[] ordered list of database columns
     */
    public function getMetadata($tablename);
}
