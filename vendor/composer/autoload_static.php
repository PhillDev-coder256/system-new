<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1a89a760b4d673d0c47d90d9d7f7e8bc
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1a89a760b4d673d0c47d90d9d7f7e8bc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1a89a760b4d673d0c47d90d9d7f7e8bc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1a89a760b4d673d0c47d90d9d7f7e8bc::$classMap;

        }, null, ClassLoader::class);
    }
}
