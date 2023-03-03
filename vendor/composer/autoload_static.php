<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6403517cdc8182046a9a86eeb27f8e0b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6403517cdc8182046a9a86eeb27f8e0b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6403517cdc8182046a9a86eeb27f8e0b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6403517cdc8182046a9a86eeb27f8e0b::$classMap;

        }, null, ClassLoader::class);
    }
}
