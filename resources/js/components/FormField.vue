<template>
    <default-field :field="field">
        <template slot="field">
            <input :id="field.name" type="text"
                   class="w-full form-control form-input form-input-bordered hnassr-places"
                   :class="errorClasses"
                   :placeholder="field.name"
                   :value="place"
            />

            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
        </template>
    </default-field>
</template>

<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova'
    import places from 'places.js'

    export default {
        mixins: [FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        data() {
            return {
                place: null,
            }
        },

        mounted() {
            if(this.value) {
                this.place = JSON.parse(this.value).value;
            }

            let placesAutocomplete = places({
                container: document.querySelector('.hnassr-places'),
                language: this.field.place_locale ? this.field.place_locale : 'en',
                countries: this.field.place_countries ? this.field.place_countries : [],
            });
            placesAutocomplete.on('change', e => {
                let place = {
                    country: e.suggestion.country,
                    countryCode: e.suggestion.countryCode,
                    name: e.suggestion.name,
                    value: e.suggestion.value,
                    county: e.suggestion.county,
                    administrative: e.suggestion.administrative,
                    latlng: e.suggestion.latlng,
                    postcode: e.suggestion.postcode,
                }
                this.place = place.value;
                this.value = JSON.stringify(place)
            });
        },

        methods: {
            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {
                this.value = this.field.value || ''
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                formData.append(this.field.attribute, this.value || '')
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.value = value
            }
        }
    }
</script>
