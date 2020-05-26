<?php

namespace Source\Members;

class Config
{
    public const COMPANY = "UpInside";
    protected const DOMAIN = "upinside.com.br";
    private const SECTOR = "Educação";

    // Por ser static ela passa a fazer parte somente da própria classe
    public static $company;
    public static $domain;
    public static $sector;

    // self:: = Referência as propriedades dessa classe(por não se tratar de um objeto($this) usamos self)
    public static function setConfig($company, $domain, $sector)
    {
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }
}
