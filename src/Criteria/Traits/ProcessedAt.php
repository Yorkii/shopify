<?php

namespace Yorkii\Shopify\Criteria\Traits;

/**
 * @method $this whereProcessedAtMin($processedAtMin)
 * @method $this whereProcessedAtMax($processedAtMax)
 * @method $this whereProcessedAtBetween($processedAtMin, $processedAtMax)
 */
trait ProcessedAt
{
    /**
     * @return $this
     */
    protected function addProcessedAtKeys()
    {
        $this->keys[] = 'processed_at_min';
        $this->keys[] = 'processed_at_max';

        $this->casts['processed_at_min'] = 'date';
        $this->casts['processed_at_max'] = 'date';

        return $this;
    }
}