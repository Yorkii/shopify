<?php

namespace Yorkii\Shopify\Criteria\Traits;

/**
 * @method $this whereEndsAtMin($endsAtMin)
 * @method $this whereEndsAtMax($endsAtMax)
 * @method $this whereEndsAtBetween($endsAtMin, $endsAtMax)
 */
trait EndsAt
{
    /**
     * @return $this
     */
    protected function addEndsAtKeys()
    {
        $this->keys[] = 'ends_at_min';
        $this->keys[] = 'ends_at_max';

        $this->casts['ends_at_min'] = 'date';
        $this->casts['ends_at_max'] = 'date';

        return $this;
    }
}