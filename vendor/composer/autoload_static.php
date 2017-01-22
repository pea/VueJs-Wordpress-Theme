<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite18545ca5c0a3e734ef64b077eddadaa
{
    public static $files = array (
        '940abd8fb01ee76a36b44f35dcf9783b' => __DIR__ . '/..' . '/weew/helpers-array/src/array.php',
        '4034923be216e4e8cb8283d7c5b5bb22' => __DIR__ . '/..' . '/weew/helpers-string/src/string.php',
        'b21d79628590566a6b8b2e6ed4678462' => __DIR__ . '/../..' . '/Common/routes.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Phroute\\Phroute\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Phroute\\Phroute\\' => 
        array (
            0 => __DIR__ . '/..' . '/phroute/phroute/src/Phroute',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/weew/contracts/src',
        1 => __DIR__ . '/..' . '/weew/collections/src',
        2 => __DIR__ . '/..' . '/weew/url-matcher/src',
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite18545ca5c0a3e734ef64b077eddadaa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite18545ca5c0a3e734ef64b077eddadaa::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInite18545ca5c0a3e734ef64b077eddadaa::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite18545ca5c0a3e734ef64b077eddadaa::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}