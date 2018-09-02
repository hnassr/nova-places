<?php

namespace Hnassr\NovaPlaces;

use Laravel\Nova\Fields\Field;

class Places extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-places';

    /**
     * @param array $fields
     * @options=["country", "county", "administrative", "city", "full"]
     * @return Places
     */
    public function showFields(array $fields)
    {
        return $this->withMeta(['show_fields' => $fields]);
    }

    /**
     * @param string $filed
     * @options=["country", "county", "administrative", "city", "full"]
     * @return Places
     */
    public function indexField(string $filed)
    {
        return $this->withMeta(['index_field' => $filed]);
    }

    /**
     * @param $locale
     * @return Places
     */
    public function locale($locale)
    {
        return $this->withMeta(['place_locale' => $locale]);
    }
}
