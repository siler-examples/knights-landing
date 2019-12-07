<?php declare(strict_types=1);

namespace KL\Http;

use Siler\Route;
use Siler\Twig;
use Swoole\Http\Request;
use Swoole\Http\Response;

class Website
{
    public function __construct(bool $debug = false)
    {
        Twig\init(
            __DIR__ . '/../../web/templates',
            __DIR__ . '/../../web/templates/cache',
            $debug
        );
    }

    public function __invoke(Request $request, Response $response): void
    {
        Route\files(__DIR__ . '/../../web/pages');
    }
}
