<?php

class Result
{
    private $type;
    private $text;

    const WinType = 0;
    const LooseType = 1;
    const DrawType = 2;

    public function __construct($type, $text)
    {
        $this->type = $type;
        $this->text = $text;
    }

    public static function generateWinResult()
    {
        return new Result(self::WinType, 'あなたの勝ち');
    }

    public static function generateLooseResult()
    {
        return new Result(self::LooseType, 'あなたの負け');
    }

    public static function generateDrawResult()
    {
        return new Result(self::DrawType, 'ひきわけ');
    }

    public function getText()
    {
        return $this->text;
    }
}
