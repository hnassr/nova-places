<template>
    <panel-item :field="field">
        <div class="" v-if="place" slot="value">
            <div class="flex" v-if="field.show_fields.indexOf('countryCode') > -1">
                <div class="w-1/6 py-4">
                    <h4 class="font-normal text-80">Country Code</h4>
                </div>
                <div class="w-3/4 py-4">
                    <p class="text-90">{{ place.countryCode }}</p>
                </div>
            </div>
            <div class="flex" v-if="field.show_fields.indexOf('country') > -1">
                <div class="w-1/6 py-4">
                    <h4 class="font-normal text-80">Country</h4>
                </div>
                <div class="w-3/4 py-4">
                    <p class="text-90">{{ place.country }}</p>
                </div>
            </div>
            <div class="flex" v-if="field.show_fields.indexOf('postcode') > -1">
                <div class="w-1/6 py-4">
                    <h4 class="font-normal text-80">Postcode</h4>
                </div>
                <div class="w-3/4 py-4">
                    <p class="text-90">{{ place.postcode }}</p>
                </div>
            </div>
            <div class="flex" v-if="field.show_fields.indexOf('administrative') > -1">
                <div class="w-1/6 py-4">
                    <h4 class="font-normal text-80">Administrative</h4>
                </div>
                <div class="w-3/4 py-4">
                    <p class="text-90">{{ place.administrative }}</p>
                </div>
            </div>
            <div class="flex" v-if="place.county && field.show_fields.indexOf('county') > -1">
                <div class="w-1/6 py-4">
                    <h4 class="font-normal text-80">County</h4>
                </div>
                <div class="w-3/4 py-4">
                    <p class="text-90">{{ place.county }}</p>
                </div>
            </div>
            <div class="flex" v-if="field.show_fields.indexOf('city') > -1">
                <div class="w-1/6 py-4">
                    <h4 class="font-normal text-80">City</h4>
                </div>
                <div class="w-3/4 py-4">
                    <p class="text-90">{{ place.name }}</p>
                </div>
            </div>
            <div class="flex" v-if="field.show_fields.indexOf('latlng') > -1">
                <div class="w-1/6 py-4">
                    <h4 class="font-normal text-80">LatLng</h4>
                </div>
                <div class="w-3/4 py-4">
                    <p class="text-90">{{ `${place.latlng.lat},${place.latlng.lng}` }}</p>
                </div>
            </div>
            <div class="flex" v-if="field.show_fields.indexOf('full') > -1">
                <div class="w-1/6 py-4">
                    <h4 class="font-normal text-80">Name</h4>
                </div>
                <div class="w-3/4 py-4">
                    <p class="text-90">{{ place.value }}</p>
                </div>
            </div>
        </div>
    </panel-item>
</template>

<script>
    export default {
        props: ['resource', 'resourceName', 'resourceId', 'field'],

        computed: {
            place() {
                if(this.field.value) {
                    return JSON.parse(this.field.value);
                }
                return null;
            }
        }
    }
</script>
