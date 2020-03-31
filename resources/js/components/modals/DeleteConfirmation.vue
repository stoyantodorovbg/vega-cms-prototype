<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button"
                class="d-none"
                id="deleteModelModalTrigger"
                data-toggle="modal"
                data-target="#deleteModel"
        >
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete a {{ request_data.modelName }}</h5>
                        <button type="button" class="close" id="closeDeleteModelModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are You sure you want to delete this {{ request_data.modelName }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button @click="deleteModel()" type="button" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'DeleteConfirmation',

        props: {
            request_data: {
                type: Object,
                default: function () {
                    return {
                        modelName: 'user',
                        slug: 1,
                    }
                }
            }
        },

        methods: {
            deleteModel() {
                /** Use Getters to access state from the store **/
                axios.delete('/api/' + this.$store.getters.locale + '/admin/destroy', {
                        params: {
                            slug: this.request_data.slug,
                            modelName: this.request_data.modelName
                        }
                    }
                ).then((response) => {
                    document.getElementById('closeDeleteModelModal').click();
                    this.$parent.load(false);
                });
            }
        }
    }
</script>
