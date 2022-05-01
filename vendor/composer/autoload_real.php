<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit5ec2c0a9e8050d4fbbcc2edb4a58dc19
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit5ec2c0a9e8050d4fbbcc2edb4a58dc19', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit5ec2c0a9e8050d4fbbcc2edb4a58dc19', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit5ec2c0a9e8050d4fbbcc2edb4a58dc19::getInitializer($loader));

        $loader->setClassMapAuthoritative(true);
        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit5ec2c0a9e8050d4fbbcc2edb4a58dc19::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire5ec2c0a9e8050d4fbbcc2edb4a58dc19($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire5ec2c0a9e8050d4fbbcc2edb4a58dc19($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
