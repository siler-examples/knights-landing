<?php declare(strict_types=1);

namespace KL\Database;

use KL\Database;
use KL\Knight;

class Pdo implements Database
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return array<int, Knight>
     */
    public function findKnights(): array
    {
        $stmt = $this->pdo->query('select * from knight order by name');
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Knight::class);
    }

    public function saveKnight(Knight $knight): int
    {
        $stmt = $this->pdo->prepare('insert into knight (name) value (:name)');
        $stmt->bindValue('name', $knight->name);
        $stmt->execute();
        return intval($this->pdo->lastInsertId());
    }

    public function deleteKnightById(int $id): bool
    {
        $stmt = $this->pdo->prepare('delete from knight where id = ?');
        return $stmt->execute([$id]);
    }
}
