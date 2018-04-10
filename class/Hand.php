<?php

class Hand
{
    private $type;
    private $imagePath;

    const RockType = 0;
    const Scissors = 1;
    const Paper = 2;

    public function __construct($type, $imagePath)
    {
        $this->type = $type;
        $this->imagePath = $imagePath;
    }

    public static function generateRockHand()
    {
        return new Hand(self::RockType, 'images/rock.jpeg');
    }

    public static function generateScissorsHand()
    {
        return new Hand(self::Scissors, 'images/scissors.jpeg');
    }

    public static function generatePaperHand()
    {
        return new Hand(self::Paper, 'images/paper.jpeg');
    }

    public static function generateRandomHand()
    {
        $randomNumber = rand(0, 2);
        return self::generateHandByType($randomNumber);
    }

    public static function generateHandByType($type)
    {
        switch ($type) {
            case self::RockType:
                return self::generateRockHand();
            case self::Scissors:
                return self::generateScissorsHand();
            case self::Paper:
                return self::generatePaperHand();
        }

        throw new LogicException();
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function isStrongerThan($anotherHand)
    {
        if ($this->type == self::RockType && $anotherHand->type == self::Scissors
            || $this->type == self::Scissors && $anotherHand->type == self::Paper
            || $this->type == self::Paper && $anotherHand->type == self::RockType) {
            return true;
        }
        return false;
    }

    public function battle($anotherHand)
    {
        if ($this->type === $anotherHand->type) {
            return Result::generateDrawResult();
        }

        return $this->isStrongerThan($anotherHand)
            ? Result::generateWinResult()
            : Result::generateLooseResult();
    }
}
