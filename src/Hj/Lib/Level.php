<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Lib;

use Hj\Lib\Exception\UnexpectedArgumentException;

/**
 * Create log level
 *
 * Class Level
 * @package Hj\Lib
 */
class Level
{
    const INFO = 0;
    const ERROR = 1;
    const CRITICAL = 2;
    const ALERT = 3;
    const EMERGENCY = 4;

    /**
     * @var array
     */
    private static $levels = array(
        0 => 'INFO',
        1 => 'ERROR',
        2 => 'CRITICAL',
        3 => 'ALERT',
        4 => 'EMERGENCY',
    );

    /**
     * Return the level name mapped by its level
     *
     * @param integer $logLevel
     *
     * @return string
     *
     * @throws \Hj\Lib\Exception\UnexpectedArgumentException
     */
    public static function getLogLevelName($logLevel)
    {
        if (false === self::guardAgainstLevelNotExisting($logLevel)) {
            throw new UnexpectedArgumentException("The level {$logLevel} does not exist.}");
        }

        return self::$levels[$logLevel];
    }

    /**
     * @param integer $level
     *
     * @return bool
     */
    public static function guardAgainstLevelNotExisting($level)
    {
        return array_key_exists($level, self::$levels);
    }

    /**
     * Return all levels
     *
     * @return array
     */
    public static function getLevels()
    {
        return self::$levels;
    }
}