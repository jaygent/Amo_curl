<?php

declare(strict_types=1);

namespace App\Handler;

use App\AmoCurl;
use App\AuthAmo;
use App\Token;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;



class PingHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
       $amo=new AmoCurl('etalish');
       var_dump($amo->contacts->all());
    }
}
