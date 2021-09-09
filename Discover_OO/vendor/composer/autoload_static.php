<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1205453d218e90b27d73d7ba30406484
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1205453d218e90b27d73d7ba30406484::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1205453d218e90b27d73d7ba30406484::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1205453d218e90b27d73d7ba30406484::$classMap;

        }, null, ClassLoader::class);
    }
}
