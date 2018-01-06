<?php

namespace App\Ship\Exceptions;

use App\Ship\Exceptions\Codes\ApplicationErrorCodesTable;
use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NotAuthorizedResourceException.
 *
 * @author Johannes Schobel <johannes.schobel@googlemail.com>
 */
class NotAuthorizedResourceException extends Exception
{

    public $httpStatusCode = Response::HTTP_UNAUTHORIZED;

    public $message = 'You are not authorized to request this resource.';

    public $code = ApplicationErrorCodesTable::AUTHORIZATION_NOT_AUTHORIZED;

}
