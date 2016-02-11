<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Collector\Business\Exporter;

use Spryker\Zed\Collector\Business\Model\CountableIteratorInterface;
use Propel\Runtime\ActiveQuery\ModelCriteria;

class BatchIterator implements CountableIteratorInterface
{

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var int
     */
    protected $chunkSize = 100;

    /**
     * @var \Propel\Runtime\ActiveQuery\ModelCriteria
     */
    protected $query;

    /**
     * @var int
     */
    protected $currentKey = 0;

    /**
     * @var bool
     */
    protected $isValid = true;

    /**
     * @var array
     */
    protected $currentDataSet = [];

    /**
     * @param \Propel\Runtime\ActiveQuery\ModelCriteria $query
     * @param int $chunkSize
     */
    public function __construct(ModelCriteria $query, $chunkSize = 100)
    {
        $this->query = $query;
        $this->chunkSize = $chunkSize;
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->currentDataSet;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function next()
    {
        $this->query->setOffset($this->offset);
        $this->query->setLimit($this->chunkSize);
        $this->currentDataSet = $this->query->find();
        $this->currentKey++;
        $this->isValid = (bool)$this->currentDataSet;
        $this->offset += $this->chunkSize;
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->currentKey;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->isValid;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function rewind()
    {
        $this->currentKey = 0;
        $this->offset = 0;
        $this->next();
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        $this->query->setLimit(-1);

        return $this->query->count();
    }

}