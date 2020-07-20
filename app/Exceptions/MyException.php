<?php
declare(strict_types=1);

namespace App\Exceptions;

class MyException extends ApplicationException
{
    /**
     * BackApiException constructor.
     * @author: tat.pham
     *
     * @param string $message
     * @param int $code
     */
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }

    /**
     * Get status code
     * @author: tat.pham
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->code;
    }

    /**
     * Function use for get type of exception
     * @author: tat.pham
     *
     * @return string
     */
    public function getType()
    {
        return 'ERROR';
    }

    /**
     * Function use for get data error
     * @author: tat.pham
     *
     * @return array
     */
    public function getDataError()
    {
        $data = [
            'ErrorType' => $this->getType(),
            'ErrorCode' => $this->getStatusCode(),
            'ErrorMessage' => $this->getMessage()
        ];
        return $data;
    }
}
