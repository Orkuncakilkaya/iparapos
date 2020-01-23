<?php

namespace Promega\IParaPos\Tests;

use PHPUnit\Framework\TestCase;
use Promega\IParaPos\Settings;

abstract class BaseTestCase extends TestCase
{
    /** @var Settings */
    protected static $settings;

    public static function setUpBeforeClass(): void
    {
        static::$settings = new Settings(getenv('IPARA_PUBLIC'), getenv('IPARA_PRIVATE'));
    }
}