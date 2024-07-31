<?php

namespace Src\Purchase\Domain\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class PurchaseNotFound extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct('Purchase not found');
    }
}
