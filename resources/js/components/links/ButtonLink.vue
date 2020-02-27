<template>
    <section class="section-create-user">
        <div>
            <a :href="prop_data.url" :class="prop_data.htmlClass">
                {{ prop_data.text}}
            </a>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'ButtonLink',

        props: {
            prop_data: {
                type: Object,
                value: function () {
                    return {
                        htmlClass: '',
                        text: 'submit',
                        url: '/'
                    };
                },
            },
        }
    }
</script>
