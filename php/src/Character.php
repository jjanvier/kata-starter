<?php

namespace KataStarter;

class Character
{

    const DEFAULT_HP = 1000;
    const DEFAULT_HP_LEVEL_6 = 1500;
    private int $hp;
    private bool $alive;
    private int $level;


    public function __construct(int $level = 1)
    {
        $this->hp = self::DEFAULT_HP;
        $this->alive = true;
        $this->level = $level;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function isAlive()
    {
        return $this->alive;
    }

    public function attacks(Character $target, int $damage): void
    {
        if ($target === $this) {
            throw new \LogicException('character cannot attack themselves');
        }
        $dp = $this->level - $target->level;

        if ($dp >= 5) {
            $damage *= 1.5;
        }

        $target->hp -= $damage;
        if ($target->hp <= 0) {
            $target->hp = 0;
            $target->alive = false;
        }
    }

    public function heal(int $healing): void
    {
        if (!$this->alive) {
            throw new \LogicException('A dead character cannot heal ITSELF');
        }
        $this->hp += $healing;
        if ($this->hp > $this->getMaximumHp()) {
            $this->hp = $this->getMaximumHp();
        }
    }

    public function getLevel()
    {
        return $this->level;
    }

    private function getMaximumHp(): int
    {
        return $this->level < 6 ? self::DEFAULT_HP : self::DEFAULT_HP_LEVEL_6;
    }
}
