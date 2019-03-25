<?php

namespace Yorki\Shopify\Events\Theme;

use Yorki\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $id
 * @property string $name
 * @property string $role
 * @property int $theme_store_id
 * @property bool $previewable
 * @property bool $processing
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method string getName()
 * @method string getRole()
 * @method int getThemeStoreId()
 * @method bool getPreviewable()
 * @method bool getProcessing()
 */
class ThemeCreateEvent extends Base
{
    const EVENT_TOPIC = 'themes/create';

    /**
     * @var array
     */
    protected $casts = [
        'previewable' => 'bool',
        'processing' => 'bool',
    ];
}