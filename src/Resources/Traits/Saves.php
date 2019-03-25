<?php

namespace Yorkii\Shopify\Resources\Traits;

trait Saves
{
    /**
     * @return bool
     */
    public function save()
    {
        if ($this->getData($this->getPrimaryKey())) {
            if (empty($this->getChangedData())) {
                return true;
            }

            return $this->update($this->getData($this->getPrimaryKey()), $this->getChangedData());
        }

        if (method_exists($this, 'create')) {
            return $this->create($this->getData());
        }

        return false;
    }
}