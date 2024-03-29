<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit58151cd15d2d260cfd6ec3e8837a8e47
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Desarrollo\\Proyectos\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Desarrollo\\Proyectos\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit58151cd15d2d260cfd6ec3e8837a8e47::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit58151cd15d2d260cfd6ec3e8837a8e47::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit58151cd15d2d260cfd6ec3e8837a8e47::$classMap;

        }, null, ClassLoader::class);
    }
}
