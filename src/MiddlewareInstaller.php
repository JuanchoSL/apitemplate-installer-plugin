<?php

namespace JuanchoSL\APITemplateInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class MiddlewareInstaller extends LibraryInstaller
{
    protected string $plugin_type = 'juanchosl-apitemplate';
    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 22);
        if ('juanchosl/apitemplate-' !== $prefix) {
            throw new \InvalidArgumentException("Unable to install " . $package->getPrettyName() . " should always start their package name with {$this->plugin_type}-");
        }

        $directories = explode('-', substr($package->getPrettyName(), strlen($this->plugin_type . '-')));
        foreach ($directories as $index => $directory) {
            $directories[$index] = ucfirst($directory);
        }
        return 'src/Context/Infrastructure/' . implode('/', $directories);
    }

    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return $this->plugin_type === $packageType;
    }
}