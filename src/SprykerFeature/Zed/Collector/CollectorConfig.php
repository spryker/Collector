<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\Collector;

use SprykerEngine\Shared\Config;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Zed\Collector\Dependency\Plugin\DataProcessorPluginInterface;
use SprykerFeature\Zed\Collector\Dependency\Plugin\ExportFailedDeciderPluginInterface;
use SprykerFeature\Zed\Collector\Dependency\Plugin\QueryExpanderPluginInterface;
use SprykerEngine\Zed\Kernel\AbstractBundleConfig;

class CollectorConfig extends AbstractBundleConfig
{

    /**
     * @return DataProcessorPluginInterface[]
     */
    public function getKeyValueProcessors()
    {
        return [];
    }

    /**
     * @return QueryExpanderPluginInterface[]
     */
    public function getKeyValueQueryExpander()
    {
        return [];
    }

    /**
     * @return ExportFailedDeciderPluginInterface[]
     */
    public function getKeyValueExportFailedDeciders()
    {
        return [];
    }

    /**
     * @return ExportFailedDeciderPluginInterface[]
     */
    public function getSearchExportFailedDeciders()
    {
        return [];
    }

    /**
     * @return QueryExpanderPluginInterface[]
     */
    public function getSearchQueryExpander()
    {
        return [];
    }

    /**
     * @return DataProcessorPluginInterface[]
     */
    public function getSearchProcessors()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getSearchUpdateProcessors()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getSearchIndexName()
    {
        return Config::get(SystemConfig::ELASTICA_PARAMETER__INDEX_NAME);
    }

    /**
     * @return string
     */
    public function getSearchDocumentType()
    {
        return Config::get(SystemConfig::ELASTICA_PARAMETER__DOCUMENT_TYPE);
    }

    /**
     * @return int
     */
    public function getStandardChunkSize()
    {
        return 1000;
    }

    /**
     * @return array
     */
    public function getChunkSizeTypeMap()
    {
        return [];
    }

}
