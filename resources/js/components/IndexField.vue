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
                    'full': 'value'
                }
            }
        },

        computed: {
            placeN() {
                if(this.field.value) {
                    return JSON.parse(this.field.value).value;
                }

                return null;
            },

            place() {
                if(this.field.value) {
                    let index = this.available[this.field.index_field];

                    return JSON.parse(this.field.value)[index];
                }

                return null;
            },
        }
    }
</script>
