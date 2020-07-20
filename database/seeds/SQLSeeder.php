<?php

declare(strict_types=1);

namespace Database\Seeds;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

abstract class SQLSeeder extends Seeder
{
    /**
     * Limit number of records.
     */
    const LIMIT_RECORDS = 100;

    /**
     * Limit number of records.
     *
     * @var int
     */
    protected $limitRecords = self::LIMIT_RECORDS;

    /**
     * Set limit for records
     * Override maximum number of records can be imported.
     *
     * @param int $limitRecords
     */
    public function setLimitRecords(int $limitRecords)
    {
        $this->limitRecords = $limitRecords;
    }

    /**
     * Get table name.
     *
     * @return string
     */
    abstract protected function getTableNames();

    /**
     * Get the limitation of records.
     *
     * @return int
     */
    protected function getLimitRecords()
    {
        return $this->limitRecords;
    }

    /**
     * Truncate all records from a specific table.
     * @param string $tableName
     */
    protected function truncateTable($tableName = ''): void
    {
        if (empty($tableName)) {
            exit(1);
        }

        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table($tableName)->truncate();
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
