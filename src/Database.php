<?php declare(strict_types=1);

namespace KL;

interface Database
{
    /**
     * @return array<int, Knight>
     */
    public function findKnights(): array;

    public function saveKnight(Knight $knight): int;

    public function deleteKnightById(int $id): bool;
}
