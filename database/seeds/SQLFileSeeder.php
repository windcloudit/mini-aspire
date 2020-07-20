<?php

declare(strict_types=1);

namespace Database\Seeds;

/**
 * Class SQLFileSeeder
 * @package Database\Seeds
 */
abstract class SQLFileSeeder extends SQLSeeder
{
    /**
     * This trait support for importing a file
     * we have two kind of format are CSV and SQL.
     */
    use FileImportTrait;
}
