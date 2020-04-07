<template>
    <div>
        <div v-for="(value, key) in json_data" :key="key">
            {{ key }}: {{ value }}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'JsonPresenter',

        props: ['json_data'],

        // props: {
        //     json_data: {
        //         type: Object,
        //         default: function () {
        //             return {
        //                 classes: '',
        //                 status: 1,
        //                 text: 'data',
        //                 styles: [],
        //                 structure: {
        //                     classes: {
        //                         type: 'text',
        //                     },
        //                     status: {
        //                         type: 'text',
        //                     },
        //                     styles: {
        //                         nested: [],
        //                         type: 'json'
        //                     },
        //                     text: {
        //                         type: 'text',
        //                     },
        //                 },
        //             };
        //         }
        //     }
        // },
    }
</script>
