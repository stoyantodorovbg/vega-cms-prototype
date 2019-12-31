<template>
    <div>
        <div v-if="adding">
            <input v-model="newKey"
                   type="text"
                   class="form-control"
            />
            <button type="button"
                    class="btn btn-success"
                    @click="addKey()"
            >Add</button>
        </div>
        <div v-else
            @click="addingKey()"
        >ADD</div>
    </div>
</template>

<script>
    export default {
        name: 'AddJsonInputKey',

        data() {
            return {
                adding: false,
                newKey: '',
            }
        },

        methods: {
            addingKey() {
                this.adding = true;
            },

            addKey() {
                if(this.newKey !== '') {
                    this.$parent.addStructureKey(this.newKey);
                }

                this.adding = false;
                this.newKey = '';
            }
        }
    }
</script>
