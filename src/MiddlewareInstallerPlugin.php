<?php

namespace JuanchoSL\APITemplate\Installer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class MiddlewareInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new MiddlewareInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}