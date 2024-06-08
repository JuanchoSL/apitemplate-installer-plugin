<?php

namespace JuanchoSL\APITemplateInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class MiddlewareInstaller extends LibraryInstaller
{
    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 22);
        if ('juanchosl/apitemplate-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install ' . $package->getPrettyName()
                . ' should always start their package name with '
                . '"juanchosl/apitemplate-"'
            );
        }

        return 'src/Context/Infrastructure/' . substr($package->getPrettyName(), 22);
    }

    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return 'juanchosl-apitemplate' === $packageType;
    }
}