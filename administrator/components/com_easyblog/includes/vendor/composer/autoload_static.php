<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit41ec22823faeb187c2fc8ae78a2d5464
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Nahid\\JsonQ\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Nahid\\JsonQ\\' => 
        array (
            0 => __DIR__ . '/..' . '/nahid/jsonq/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit41ec22823faeb187c2fc8ae78a2d5464::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit41ec22823faeb187c2fc8ae78a2d5464::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}