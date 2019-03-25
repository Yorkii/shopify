<?php

namespace Yorki\Shopify\Criteria\Traits;

/**
 * @method $this whereUpdatedAtMin($updatedAtMin)
 * @method $this whereUpdatedAtMax($updatedAtMax)
 * @method $this whereUpdatedAtBetween($updatedAtMin, $updatedAtMax)
 */
trait UpdatedAt
{
    /**
     * @return $this
     */
    protected function addUpdatedAtKeys()
    {
        $this->keys[] = 'updated_at_min';
        $this->keys[] = 'updated_at_max';

        $this->casts['updated_at_min'] = 'date';
        $this->casts['updated_at_max'] = 'date';

        return $this;
    }
}