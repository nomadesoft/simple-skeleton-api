<?php

namespace App\Exceptions;

/**
 * NotFoundException
 *
 * @category  Exceptions
 * @package   Exceptions
 * @author    Jesus Farfan <jesu.farfan23@gmail.com>
 * @copyright Jesus Farfan
 * @license   MIT 
 * @link      https://github.com/jesusfar
 */
class NotFoundException extends \Exception
{
    
    /**
     * __construct
     * 
     * @param string $message Message error
     * @param int    $code    Code error
     *
     * @return void
     */
    public function __construct(string $message, int $code = 500)
    {
        parent::__contruct('NotFoundException : ' . $message, $code);
    }
}
