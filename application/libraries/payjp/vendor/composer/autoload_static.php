<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit04fde53c461fbd576dbf46957724f0f2
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Payjp\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Payjp\\' => 
        array (
            0 => __DIR__ . '/..' . '/payjp/payjp-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit04fde53c461fbd576dbf46957724f0f2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit04fde53c461fbd576dbf46957724f0f2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit04fde53c461fbd576dbf46957724f0f2::$classMap;

        }, null, ClassLoader::class);
    }
}
