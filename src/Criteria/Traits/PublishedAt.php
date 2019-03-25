<?php

namespace Yorki\Shopify\Criteria\Traits;

/**
 * @method $this wherePublishedAtMin($publishedAtMin)
 * @method $this wherePublishedAtMax($publishedAtMax)
 * @method $this wherePublishedAtBetween($publishedAtMin, $publishedAtMax)
 * @method $this wherePublishedStatus($publishedStatus)
 */
trait PublishedAt
{
    /**
     * @return $this
     */
    protected function addPublishedAtKeys()
    {
        $this->keys[] = 'published_at_min';
        $this->keys[] = 'published_at_max';
        $this->keys[] = 'published_status';

        $this->casts['published_at_min'] = 'date';
        $this->casts['published_at_max'] = 'date';

        return $this;
    }
}