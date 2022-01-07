<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae49f03d02a980f2c4c12434b29d537b
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae49f03d02a980f2c4c12434b29d537b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae49f03d02a980f2c4c12434b29d537b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae49f03d02a980f2c4c12434b29d537b::$classMap;

        }, null, ClassLoader::class);
    }
}