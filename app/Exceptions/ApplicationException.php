<?php

declare(strict_types=1);

namespace App\Exceptions;

/**
 * Class ApplicationException
 * @author: tat.pham
 *
 * @package App\Exceptions
 */
abstract class ApplicationException extends \Exception
{
    const LOGIN_ERROR = 40001;
    const DENY = 40002;

    /**
     * @var string
     */
    protected $code;

    /**
     * ApplicationException constructor.
     * @author: tat.pham
     *
     * @param string $code
     * @param string $message
     */
    public function __construct($message, $code)
    {
        $this->code = $code;
        parent::__construct($message, $code, null);
    }

    /**
     * Get status code with corresponding exception
     * @author: tat.pham
     *
     * @return int
     */
    abstract public function getStatusCode();

    /**
     * Function use for get type of exception
     * @author: tat.pham
     *
     * @return string
     */
    abstract public function getType();

    /**
     * Function use for get data error
     * @author: tat.pham
     *
     * @return array
     */
    abstract public function getDataError();
}
