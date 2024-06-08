<?php

namespace APITemplate\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use APITemplate\Composer\MiddlewareInstaller;

class MiddlewareInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new MiddlewareInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}