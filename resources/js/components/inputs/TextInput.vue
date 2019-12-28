<template>
    <input :value="input_value"
           name="input_name"
           type="text"
           class="form-control"
    />
</template>

<script>
    export default {
        name: 'TextInput',

        props: ['input_value', 'input_name']
    }
</script>
