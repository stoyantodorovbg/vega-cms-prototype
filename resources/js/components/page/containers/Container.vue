<template>
        <component :is="container_data.semantic_tag" v-if="container_data.status"
                   :class="'col-md-' + container_data.col_width + ' ' + container_data.classes"
                   :style="containerStyles ? containerStyles : false"
        >
            <div :class="'row ' + title.row_classes" v-if="title.status">
                <component :is="title.semantic_tag"
                           :class="'col-md-' + title.col_width + ' ' + title.classes"
                           :style="titleStyles ? titleStyles : false"
                ><text-renderer :text_data="title.text"></text-renderer>
                </component>
            </div>
            <div :class="'row ' + summary.row_classes" v-if="summary.status">
                <component :is="summary.semantic_tag"
                           :class="'col-md-' + summary.col_width + ' ' + summary.classes"
                           :style="summaryStyles ? summaryStyles : false"
                ><text-renderer :text_data="summary.text"></text-renderer>
                </component>
            </div>
            <div :class="'row ' + body.row_classes" v-if="body.status">
                <component :is="body.semantic_tag"
                           :class="'col-md-' + body.col_width + ' ' + body.classes"
                           :style="bodyStyles ? bodyStyles : false"
                ><text-renderer :text_data="body.text"></text-renderer>
                </component>
            </div>
            <div :class="'row ' + container_data.row_classes" v-if="container_data.child_containers.length">
                <container v-for="container in container_data.child_containers"
                       :key="container.id"
                       :container_data="container"
                ></container>
            </div>
        </component>
</template>
<script>
    import TextRenderer from "./TextRenderer";

    export default {
        name: 'Container',

        components: { TextRenderer },

        props: {
            container_data: {
                type: Object,
                default: {
                    function() {
                        return {

                        }
                    }
                }
            }
        },

        data() {
            return {
                title: JSON.parse(this.container_data.title),

                summary: JSON.parse(this.container_data.summary),

                body: JSON.parse(this.container_data.body),
            }
        },

        computed: {
            containerStyles: function () {
                return this.$helpers.processStyles(JSON.parse(this.container_data.styles));
            },
            titleStyles: function () {
                return this.$helpers.processStyles(this.title.styles);
            },

            summaryStyles: function () {
                return this.$helpers.processStyles(this.body.styles);
            },

            bodyStyles: function () {
                return this.$helpers.processStyles(this.summary.styles);
            },
        },

        methods: {

        }
    }
</script>
