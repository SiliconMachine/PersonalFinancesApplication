<template>
    <a :href="'/'">
        <h2>Personal Finances App</h2>
    </a>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
