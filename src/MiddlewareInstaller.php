<?php

namespace JuanchoSL\APITemplate\Installer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class MiddlewareInstaller extends LibraryInstaller
{
    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 23);
        if ('juanchosl/apitemplate-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, phpdocumentor templates '
                .'should always start their package name with '
                .'"juanchosl/apitemplate-"'
            );
        }

        return 'src/Context/Infrastructure/'.substr($package->getPrettyName(), 23);
    }

    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return 'juanchosl-apitemplate' === $packageType;
    }
}