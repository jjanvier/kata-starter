<?php

namespace KataStarter\Test;

use KataStarter\Character;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class RPGCombatTest extends TestCase
{
    /**
     * @test
     */
    public function a_new_character_has_1000_hp()
    {
        $sut = new Character();
        $actual = $sut->getHp();
        Assert::assertSame(1000, $actual);
    }

    /**
     * @test
     */
    public function a_new_character_is_alive()
    {
        $sut = new Character();
        $actual = $sut->isAlive();
        Assert::assertTrue($actual);
    }

    /**
     * @test
     */
    public function a_character_loses_health()
    {
        $sut = new Character();
        $attacker = new Character();

        $attacker->attacks($sut, 15);
        $actual = $sut->getHp();

        Assert::assertSame(985, $actual);
    }

    /**
     * @test
     */
    public function a_character_can_kill_another_one()
    {
        $attacker = new Character();
        $sut = new Character();
        $attacker->attacks($sut, 4000);
        $actualHp = $sut->getHp();
        $actualStatus = $sut->isAlive();
        Assert::assertSame(0, $actualHp);
        Assert::assertFalse($actualStatus);
    }

    /**
     * @test
     */
    public function a_character_cannot_deal_damage_to_themselves()
    {
        $sut = new Character();
        $this->expectException(\LogicException::class);
        $sut->attacks($sut, 15);
    }

    /**
     * @test
     */
    public function a_character_can_heal_themselves()
    {
        $sut = new Character();
        $attacker = new Character();
        $attacker->attacks($sut, 500);
        $sut->heal(15);
        $actual = $sut->getHp();

        Assert::assertSame(515, $actual);
    }

    /**
     * @test
     */
    public function a_dead_character_cannot_heal()
    {
        $sut = RPGCombatTest::createDeadCharacter();
        $this->expectException(\LogicException::class);
        $sut->heal(15);
    }

    /**
     * @test
     */
    public function a_character_starts_at_level_1()
    {
       $sut = new Character();
       $actual= $sut->getLevel();
       Assert::assertSame(1, $actual);
    }

    /**
     * @test
     */
    public function a_character_cannot_have_more_than_1000_hp_before_level_6()
    {
        $sut = new Character();
        $sut->heal(15);
        $actual = $sut->getHp();

        Assert::assertSame(1000, $actual);
    }

    /**
     * @test
     */
    public function a_character_can_have_more_than_1000_hp_after_level_6()
    {
        $sut = new Character(6);
        $sut->heal(15);
        $actual = $sut->getHp();

        Assert::assertSame(1015, $actual);
    }

    /**
     * @test
     */
    public function a_character_cannot_have_more_ahtn_1500_hp_from_level6()
    {
        $sut = new Character(6);
        $sut->heal(4000);
        $actual = $sut->getHp();

        Assert::assertSame(1500, $actual);
    }

    /**
     * @test
     */
    public function characters_damage_is_increased_by_50p_when_level_difference_exceeds_5()
    {
        $sut = new Character();
        $attacker = new Character($sut->getLevel() + 5);
        $attacker->attacks($sut, 500);
        $actual = $sut->getHp();

        Assert::assertSame(250, $actual);
    }

    private static function createDeadCharacter(): Character
    {
        $sut = new Character();
        $attacker = new Character();
        $attacker->attacks($sut, 4000);
        return $sut;
    }
}
