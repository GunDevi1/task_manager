<script>
export default {
    props: {
        selectedTask: Object,
    },
    data() {
        return {
            title: '',
            content: '',
            deadline: null,
        }
    },
    methods: {
        closeModal() {
            this.$emit('close-modal');
        },
        updateTask(id) {
            const data = {
                title: this.selectedTask.title,
                content: this.selectedTask.content,
                deadline: this.selectedTask.deadline,
            };

            axios.patch(`/api/tasks/${id}`, data)

            this.closeModal()
        },
    },
}
</script>

<template>
    <div v-if="selectedTask" class="popup">
        <div class="popup-inner">
            <h2 class="popup-title">Редактирование задачи</h2>
            <div class="form-group">
                <label for="title">Заголовок:</label>
                <input type="text" id="title" class="form-control" v-model="selectedTask.title" name="title"/>
            </div>
            <div class="form-group">
                <label for="content">Описание:</label>
                <textarea id="content" class="form-control" v-model="selectedTask.content" name="content"></textarea>
            </div>
            <div class="btn-group mt-3">
                <button type="submit" class="btn btn-primary" @click="updateTask(selectedTask.id)">Сохранить</button>
                <button type="button" class="btn btn-secondary" @click="closeModal">Закрыть</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.popup {
    position: fixed;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 99;
    display: flex;
    align-items: center;
    justify-content: center;
}

.popup-inner {
    width: 400px;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.popup-title {
    font-size: 1.5rem;
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
}

.btn-group {
    display: flex;
    justify-content: space-between;
}

.btn {
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #ccc;
    color: #333;
}

.btn-secondary:hover {
    background-color: #999;
}
</style>
