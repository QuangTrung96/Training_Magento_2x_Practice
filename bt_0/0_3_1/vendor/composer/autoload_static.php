<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd23a5c86aa66d22b8f67dcc8f1de4791
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd23a5c86aa66d22b8f67dcc8f1de4791::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd23a5c86aa66d22b8f67dcc8f1de4791::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
