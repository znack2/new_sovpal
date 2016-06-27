<?php namespace App\Models\Traits;

trait NullTrait
{
    protected static function bootNullableFields()
    {
        static::saving(function ($model) {
            foreach ($model->nullableFromArray($model->getAttributes()) as $key => $value) {
                $model->attributes[$key] = $model->nullIfEmpty($value, $key);
            }
        });
    }

    public function nullIfEmpty($value, $key = null)
    {
        if (! is_null($key) && $this->isJsonCastable($key)) {
            $value = method_exists($this, 'fromJson') ? $this->fromJson($value) : json_decode($value);
            return empty($value) ? null : $value;
        }
        if (is_array($value)) {
            return empty($value) ? null : $value;
        }
        return trim($value) === '' ? null : $value;
    }

    // abstract protected function isJsonCastable($key);

    protected function nullableFromArray(array $attributes = [ ])
    {
        if (is_array($this->nullable) && count($this->nullable) > 0) {
            return array_intersect_key($attributes, array_flip($this->nullable));
        }
        return [ ];
    }
}