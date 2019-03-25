<?php

namespace Yorki\Shopify\Criteria\Traits;

/**
 * @method $this whereStartsAtMin($startsAtMin)
 * @method $this whereStartsAtMax($startsAtMax)
 * @method $this whereStartsAtBetween($startsAtMin, $startsAtMax)
 */
trait StartsAt
{
    /**
     * @return $this
     */
    protected function addStartsAtKeys()
    {
        $this->keys[] = 'starts_at_min';
        $this->keys[] = 'starts_at_max';

        $this->casts['starts_at_min'] = 'date';
        $this->casts['starts_at_max'] = 'date';

        return $this;
    }
}