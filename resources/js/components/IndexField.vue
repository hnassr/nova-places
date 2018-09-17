<template>
    <span>{{ place }}</span>
</template>

<script>
    export default {
        props: ['resourceName', 'field'],

        data() {
            return {
                available: {
                    'country': 'country',
                    'county': 'county',
                    'administrative': 'administrative',
                    'city': 'name',
                    'full': 'value',
                    'countryCode': 'countryCode',
                    'latlng': 'latlng',
                    'postcode': 'postcode',
                }
            }
        },

        computed: {
            place() {
                if(this.field.value) {
                    let index = this.available[this.field.index_field];

                    let parsed = JSON.parse(this.field.value);

                    if(index == 'latlng') {
                        return `${parsed[index].lat},${parsed[index].lng}`;
                    }

                    return parsed[index];
                }

                return null;
            },
        }
    }
</script>
