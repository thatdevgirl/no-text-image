<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf8ca271a59c0e394ac73ffb764c779a4
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'thiagoalessio\\TesseractOCR\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'thiagoalessio\\TesseractOCR\\' => 
        array (
            0 => __DIR__ . '/..' . '/thiagoalessio/tesseract_ocr/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf8ca271a59c0e394ac73ffb764c779a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf8ca271a59c0e394ac73ffb764c779a4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf8ca271a59c0e394ac73ffb764c779a4::$classMap;

        }, null, ClassLoader::class);
    }
}