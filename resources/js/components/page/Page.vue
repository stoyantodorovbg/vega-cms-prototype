<template>
    <div class="container">
        <div :class="'row ' + pageData.outer_row_classes"
             :style="pageStyles ? pageStyles : false"
        >
            <div v-if="pageData.status"
                 :style="pageStyles ? pageStyles : false"
                 :class="'col-md-' + pageData.col_width + ' ' + pageData.classes"
            >
                <div :class="'row ' + pageData.inner_row_classes">
                    <container v-for="container in pageData.containers"
                               :key="container.id"
                               :container_data="container"
                    ></container>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Container from "./containers/Container";

    export default {
        name: 'Page',

        components: {
            Container,
        },

        props: {
            page_data: {
                type: String,
                default: ''
            }
        },

        data() {
            return {
                pageData: JSON.parse(this.page_data),
            }
        },

        computed: {
            pageStyles: function () {
                return this.$helpers.processStyles(JSON.parse(this.pageData.styles));
            },
            metaTags: function () {
                return JSON.parse(this.pageData.meta_tags);
            }
        },

        mounted() {
            this.addMetaTags();
        },

        methods: {
            addMetaTags() {
                for (let tag of this.metaTags) {
                    let metaTag = document.createElement('meta');
                    for(let attribute in tag) {
                        metaTag.setAttribute(attribute, tag[attribute]);
                    }
                    document.getElementsByTagName('head')[0].appendChild(metaTag);
                }
            }
        }
    }
</script>
