<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit66a93fc41d3e3850c3f5fb7a38180a42
{
    public static $prefixLengthsPsr4 = array(
        'K' =>
            array(
                'Kavenegar\\' => 10,
            ),
    );

    public static $prefixDirsPsr4 = array(
        'Kavenegar\\' =>
            array(
                0 => __DIR__ . '/..' . '/kavenegar/php/src',
            ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit66a93fc41d3e3850c3f5fb7a38180a42::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit66a93fc41d3e3850c3f5fb7a38180a42::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
