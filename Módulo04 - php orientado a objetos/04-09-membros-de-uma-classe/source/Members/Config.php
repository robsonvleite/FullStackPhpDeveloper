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
}
