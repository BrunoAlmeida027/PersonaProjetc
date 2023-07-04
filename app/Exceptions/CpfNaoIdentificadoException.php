<?php

namespace App\Exceptions;

use Exception;

class CpfNaoIdentificadoException extends Exception
{
    protected $message = 'CPF não identificado na API.';
}
