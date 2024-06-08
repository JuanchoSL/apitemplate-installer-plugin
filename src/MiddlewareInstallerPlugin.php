<?php

namespace JuanchoSL\APITemplateInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class MiddlewareInstallerPlugin implements PluginInterface
{
    public function uninstall(Composer $composer, IOInterface $io){}
    public function deactivate(Composer $composer, IOInterface $io){}
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new MiddlewareInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}