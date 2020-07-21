<?php

declare(strict_types=1);

namespace Database\Seeds;

use App\Common\Helpers\CharsetHelper;
use Illuminate\Support\Facades\DB;

/**
 *  This trait supports for importing data to database.
 * @author: tat.tpham
 * @package Database\Seeds
 */
trait FileImportTrait
{
    protected function getPath($path)
    {
        return base_path() . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $path;
    }

    /**
     * Print error.
     *
     * @param $message
     */
    private function printError($message)
    {
        if (isset($this->command)) {
            $this->command->error($message);

            return;
        }
        echo $message;
    }

    /**
     * Import data from a file name.
     *
     * @param string $fileName
     * @param string $charset
     *
     * @return string || boolean
     */
    protected function importFile($fileName, $charset = CharsetHelper::CHARSET_SJIS)
    {
        $seedFilePath = base_path() . DIRECTORY_SEPARATOR . 'database/seeds' . DIRECTORY_SEPARATOR . 'files';
        $filePath = $seedFilePath . DIRECTORY_SEPARATOR . $fileName;
        if (!\file_exists($filePath) || !\is_readable($filePath)) {
            $this->printError("Can not read file : $filePath");

            return false;
        }

        // Detect file format
        $fileFormat = pathinfo($filePath, PATHINFO_EXTENSION);

        if ($fileFormat === 'sql') {
            return $this->importSQL($filePath);
        }

        return "Unsupport file format: $fileFormat";
    }

    /**
     * Import SQL File.
     * @author: tat.pham
     *
     * @param $sqlFile
     *
     * @return boolean
     */
    private function importSQL($sqlFile): bool
    {
        $result = DB::unprepared(\file_get_contents($sqlFile));
        return $result;
    }
}
