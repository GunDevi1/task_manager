<script>
export default {
    name: "CreateComponent",

    props: {
        userId: {
            type: Number,
            required: true,
        },
    },

    data() {
        return {
            title: '',
        };
    },

    methods: {
        addTask() {
            axios.post('/api/tasks', {title: this.title, user_id: this.userId,})
                .then(response => {
                    this.title = '';
                })
        }
    }
}
</script>

<template>
    <div class="form-group mb-2">
        <input
            type="text"
            name="title"
            class="form-control py-2"
            v-model="title"
            placeholder="Введите название задачи"
            @keyup.enter="addTask"
        />
    </div>
</template>

<style scoped>

</style>
