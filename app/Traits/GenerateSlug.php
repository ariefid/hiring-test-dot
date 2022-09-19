<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GenerateSlug
{
    /**
     * Generate Slug from model boot[TraitName] magic method Laravel.
     *
     * @return void
     */
    public static function bootGenerateSlug(): void
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getSlugKey()})) {
                $model->{$model->getSlugKey()} = Str::slug($model->{$model->getSlugFromKey()}, $model->getSlugSeparator(), $model->getSlugLang());
            }
        });
    }

    /**
     * Get the slug column.
     *
     * @return string
     */
    public function getSlugKey(): string
    {
        return 'slug';
    }

    /**
     * Generate slug from column.
     *
     * @return string
     */
    public function getSlugFromKey(): string
    {
        return 'name';
    }

    /**
     * Get slug separator.
     *
     * @return string
     */
    public function getSlugSeparator(): string
    {
        return '-';
    }

    /**
     * Get slug language.
     *
     * @return string
     */
    public function getSlugLang(): string
    {
        return 'en';
    }
}
