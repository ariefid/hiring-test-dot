<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateUuid
{
    /**
     * Generate Uuid from model boot[TraitName] magic method Laravel.
     *
     * @return void
     */
    public static function bootGenerateUuid(): void
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getUuidKey()})) {
                $model->{$model->getUuidKey()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * Get the uuid column.
     *
     * @return string
     */
    public function getUuidKey(): string
    {
        return 'uuid';
    }
}
