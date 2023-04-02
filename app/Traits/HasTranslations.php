<?php

namespace App\Traits;

use App\Models\Language;

trait HasTranslations
{
    protected $translations = null;

    protected $cachedLanguages;

    protected function loadTranslations(int $id)
    {
        $raw = $this->translationsModel::where($this->translationsForeignKey, $id)->get();

        if (!$raw) {
            return;
        }

        $translations = [];
        foreach ($raw as $row) {
            $translations[$row->language_id] = $row->toArray();
        }

        $this->translations = $translations;
    }

    public function getTranslation(string $language, string $column, string|bool $fallback = null)
    {
        $language = $this->getLanguageByCode($language);

        if (!$this->translationsModel) {
            return $this->attributes[$column] ?? null;
        }

        if (!$this->translations) {
            $this->loadTranslations($this->id);
        }

        return $this->translate($language, $column, !!$fallback, is_string($fallback) ? $fallback : null);
    }

    public function getTranslationWithFallback(string $language, string $column, string|bool $fallback = null)
    {
        $language = $this->getLanguageByCode($language);

        if (!$this->translationsModel) {
            return $this->attributes[$column] ?? null;
        }

        if (!$this->translations) {
            $this->loadTranslations($this->id);
        }

        return $this->translate($language, $column, !!$fallback, is_string($fallback) ? $fallback : null);
    }

    public function setTranslation(string $language, string $column, ?string $value = null): self
    {
        $model = $this->findTranslation($language);

        if (!$model) {
            $model = new $this->translationsModel();

            $model->attributes[$this->translationsForeignKey] = $this->id;
            $model->attributes['language_id'] = $this->getLanguageByCode($language);
        }

        $model->attributes[$column] = $value;
        $model->save();

        return $this;
    }

    protected function translate(string $language, string $column, bool $fallback = false, ?string $fallbackValue = null)
    {
        if (!isset($this->translations[$language][$column])) {
            if ($fallback) {
                return $fallbackValue ?? $this->attributes[$column];
            }

            return null;
        }

        return $this->translations[$language][$column];
    }

    protected function findTranslation(string $language)
    {
        return
            $this->translationsModel::where($this->translationsForeignKey, $this->id)
                ->where('language_id', $this->getLanguageByCode($language))
                ->first();
    }

    /**
     * @throws \Exception
     */
    protected function getLanguageByCode(string $language)
    {
        if (!$this->cachedLanguages) {
            $cachedLanguages = Language::active()->get(['id', 'code'])->toArray();

            foreach ($cachedLanguages as $lang) {
                $this->cachedLanguages[$lang['code']] = $lang['id'];
            }
        }

        if (!isset($this->cachedLanguages[$language])) {
            throw new \Exception('Language not found.');
        }

        return $this->cachedLanguages[$language];
    }
}
