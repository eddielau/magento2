<?php
/**
 * Application config file resolver
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Config;

use Magento\Framework\Module\Dir\Reader;
use Magento\Framework\Filesystem;
use Magento\Framework\View\DesignInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Symfony\Component\Config\Definition\Exception\Exception;

class FileResolver implements \Magento\Framework\Config\FileResolverInterface
{
    /**
     * Module configuration file reader
     *
     * @var \Magento\Framework\Module\Dir\Reader
     */
    protected $moduleReader;

    /**
     * @var \Magento\Framework\Config\FileIteratorFactory
     */
    protected $iteratorFactory;

    /**
     * @var \Magento\Framework\View\DesignInterface
     */
    protected $currentTheme;

    /**
     * @var string
     */
    protected $themePath;

    /**
     * @var string
     */
    protected $area;

    /**
     * Root directory
     *
     * @var ReadInterface
     */
    protected $rootDirectory;

    /**
     * @param Reader $moduleReader
     * @param FileIteratorFactory $iteratorFactory
     * @param DesignInterface $designInterface
     * @param DirectoryList $directoryList
     * @param Filesystem $filesystem
     */
    public function __construct(
        Reader $moduleReader,
        FileIteratorFactory $iteratorFactory,
        DesignInterface $designInterface,
        DirectoryList $directoryList,
        Filesystem $filesystem
    ) {
        $this->directoryList = $directoryList;
        $this->iteratorFactory = $iteratorFactory;
        $this->moduleReader = $moduleReader;
        $this->currentTheme = $designInterface->getDesignTheme();
        $this->themePath = $designInterface->getThemePath($this->currentTheme);
        $this->area = $designInterface->getArea();
        $this->rootDirectory = $filesystem->getDirectoryRead(DirectoryList::ROOT);
    }

    /**
     * {@inheritdoc}
     */
    public function get($filename, $scope)
    {
        switch ($scope) {
            case 'global':
                $iterator = $this->moduleReader->getConfigurationFiles($filename)->toArray();

                $themeConfigFile = $this->currentTheme->getCustomization()->getCustomViewConfigPath();
                if ($themeConfigFile
                    && $this->rootDirectory->isExist($this->rootDirectory->getRelativePath($themeConfigFile))
                ) {
                    $iterator[$this->rootDirectory->getRelativePath($themeConfigFile)] = $this->rootDirectory->readFile(
                        $this->rootDirectory->getRelativePath($themeConfigFile)
                    );
                }

                $designPath =
                    $this->directoryList->getPath(DirectoryList::APP)
                    . '/design/'
                    . $this->area
                    . '/'
                    . $this->themePath
                    . '/etc/view.xml';
                if (file_exists($designPath)) {
                    try {
                        $designDom = new \DOMDocument;
                        $designDom->load($designPath);
                        $iterator[$designPath] = $designDom->saveXML();
                    } catch (Exception $e) {
                    }
                }
                break;
            default:
                $iterator = $this->iteratorFactory->create([]);
                break;
        }
        return $iterator;
    }
}
