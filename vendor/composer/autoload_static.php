<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitabf2f84b0fba5138a0f1bfb9ea9780f8
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wpbel\\classes\\' => 14,
        ),
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'K' => 
        array (
            'KhanhIceTea\\Twigeval\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wpbel\\classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'KhanhIceTea\\Twigeval\\' => 
        array (
            0 => __DIR__ . '/..' . '/khanhicetea/twigeval/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitabf2f84b0fba5138a0f1bfb9ea9780f8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitabf2f84b0fba5138a0f1bfb9ea9780f8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitabf2f84b0fba5138a0f1bfb9ea9780f8::$classMap;

        }, null, ClassLoader::class);
    }
}
