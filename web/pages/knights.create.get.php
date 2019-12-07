<?php declare(strict_types=1);

namespace KL;

use function Siler\Swoole\emit;
use function Siler\Twig\render;

return function () {
    emit(render('knights/create.twig'));
};
