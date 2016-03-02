<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Collector\Business\Exporter\Writer\Search;

use Orm\Zed\Touch\Persistence\Map\SpyTouchSearchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchSearch;
use Spryker\Zed\Collector\CollectorConfig;
use Spryker\Zed\Collector\Business\Exporter\Writer\AbstractTouchUpdater;

class TouchUpdater extends AbstractTouchUpdater
{

    /**
     * @var string
     */
    protected $touchKeyTableName = SpyTouchSearchTableMap::TABLE_NAME;

    /**
     * @var string
     */
    protected $touchKeyIdColumnName = SpyTouchSearchTableMap::COL_ID_TOUCH_SEARCH;

    /**
     * @var string
     */
    protected $touchKeyColumnName = CollectorConfig::COLLECTOR_SEARCH_KEY;

    /**
     * @return \Orm\Zed\Touch\Persistence\SpyTouchSearch
     */
    protected function createTouchKeyEntity()
    {
        return new SpyTouchSearch();
    }

}
