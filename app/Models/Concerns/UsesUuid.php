<?php

namespace App\Models\Concerns;

use Ramsey\Uuid\Uuid;

trait UsesUuid
{
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            $model->uid = Uuid::uuid4();
        });
    }

    /**
     * Get the route key for the model.
     * 
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uid';
    }
}
