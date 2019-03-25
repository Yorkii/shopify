<?php

namespace Yorkii\Shopify\Criteria\Traits;

/**
 * @method $this whereCreatedAtMin($createdAtMin)
 * @method $this whereCreatedAtMax($createdAtMax)
 * @method $this whereCreatedAtBetween($createdAtMin, $createdAtMax)
 */
trait CreatedAt
{
    /**
     * @return $this
     */
    protected function addCreatedAtKeys()
    {
        $this->keys[] = 'created_at_min';
        $this->keys[] = 'created_at_max';

        $this->casts['created_at_min'] = 'date';
        $this->casts['created_at_max'] = 'date';

        return $this;
    }
}