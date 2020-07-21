<?php

declare(strict_types=1);

namespace Database\Seeds;

use App\Common\Helpers\CharsetHelper;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

/**
 * Class TablesSeeder
 * @author: Tat.Pham
 *
 * @package Database\Seeds\Tables
 */
class TablesSeeder extends SQLFileSeeder
{
    /**
     * Function will define name of table and number row need insert in seed sql file
     * Get table name.
     *
     * @return array
     */
    public function getTableNames(): array
    {
        $tableNames = [
            'users',
            'loan_registers',
            'repayments',
        ];
        $result = [];
        foreach ($tableNames as $tableName) {
            $tableSeederFile = base_path() . DIRECTORY_SEPARATOR . 'database/seeds' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $tableName . '.sql';
            $sql = file_get_contents($tableSeederFile);
            $result[$tableName] = substr_count(strtoupper($sql), 'INSERT INTO');
        }
        return $result;
    }

    /**
     * Import all table name
     * @author: tat.pham
     */
    public function run(): void
    {
        try {
            $arrTablesName = $this->getTableNames();
            DB::beginTransaction();
            foreach ($arrTablesName as $tableName => $row) {
                $this->truncateTable($tableName);
                $result = $this->importFile($tableName . '.sql', CharsetHelper::CHARSET_UTF_8);
                if ($result === false) {
                    DB::rollBack();
                    exit(1);
                }
                $count = DB::table($tableName)->count();

                if ($count !== $row) {
                    echo "\e[0;31mFAIL:: Seed table `$tableName` is fail because insert only $count/$row rows\033[0m\n";
                    DB::rollBack();
                    exit(1);
                }

                echo "\033[0;32mInserting table `$tableName` with $count/$row rows\033[0m\n";
            }
            DB::commit();
        } catch (QueryException $exception) {
            $message = $exception->getMessage();
            echo "\e[0;31mFAIL:: $message\033[0m\n";
            DB::rollBack();
            exit(1);
        }
    }
}
