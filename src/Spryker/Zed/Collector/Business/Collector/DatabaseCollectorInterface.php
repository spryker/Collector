<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Collector\Business\Collector;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Spryker\Shared\Library\BatchIterator\CountableIteratorInterface;
use Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface;
use Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface;
use Spryker\Zed\Collector\Business\Model\BatchResultInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface DatabaseCollectorInterface
{

    /**
     * @param \Orm\Zed\Touch\Persistence\SpyTouchQuery $touchQuery
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    public function collectDataFromDatabase(
        SpyTouchQuery $touchQuery,
        LocaleTransfer $locale
    );

    /**
     * @param \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface $batchCollection
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface $touchUpdater
     * @param \Spryker\Zed\Collector\Business\Model\BatchResultInterface $batchResult
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface $storeWriter
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function exportDataToStore(
        CountableIteratorInterface $batchCollection,
        TouchUpdaterInterface $touchUpdater,
        BatchResultInterface $batchResult,
        WriterInterface $storeWriter,
        LocaleTransfer $locale,
        OutputInterface $output
    );

    /**
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\TouchUpdaterInterface $touchUpdater
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\WriterInterface $storeWriter
     * @param string $itemType
     *
     * @return int
     */
    public function deleteDataFromStore(
        TouchUpdaterInterface $touchUpdater,
        WriterInterface $storeWriter,
        $itemType
    );

}
