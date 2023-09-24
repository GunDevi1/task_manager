<script>
import EditComponent from "./EditComponent.vue";
import axios from "axios";

export default {
    name: "TaskComponent",
    data() {
        return {
            menuVisible: false,
            selectedTask: null,
        }
    },
    methods: {
        toggleMenu(taskId) {
            if (this.menuVisible === taskId) {
                this.menuVisible = false;
                document.removeEventListener('click', this.closeMenu);
            } else {
                this.menuVisible = taskId;
                document.addEventListener('click', this.closeMenu)
            }
        },
        closeMenu(event) {
            if (!this.$el.contains(event.target)) {
                this.menuVisible = false;
                document.removeEventListener('click', this.closeMenu);
            }
        },
        openEdit(task) {
            this.selectedTask = task;
        },
        deleteTask(id) {
            axios.delete(`/api/tasks/${id}`)
                .then(() => {
                    this.tasks = this.tasks.filter(task => task.id !== id);
                })
        },
    },
    props: {
        tasks: {
            type: Array,
            default: () => [],
        },
    },
    components: {
        EditComponent,
    },
}
</script>

<template>
    <div class="row mb-2">
        <div class="col-12" v-for="task in tasks" :key="task.id">
            <div class="card mb-1 element-to-hover">
                <div class="card-body d-flex justify-content-between">
                    <div class="card-task">
                        <h5 class="card-title">{{ task.title }}</h5>
                        <p class="card-text">{{ task.content }}</p>
                    </div>
                    <div class="options-group">
                        <button type="button" id="group-button" class="bg-transparent border-0"
                                @click="toggleMenu(task.id)">
                            <i class="fas fa-ellipsis-vertical fs-4"></i>
                        </button>
                        <div v-show="menuVisible === task.id" class="action-menu">
                            <button class="bg-transparent border-0" @click="openEdit(task)">
                                <div class="option">
                                    <i class="fas fa-pencil text-info fs-4"></i>
                                    Изменить
                                </div>
                            </button>
                            <button class="bg-transparent border-0" @click="deleteTask(task.id)">
                                <div class="option">
                                    <i class="fas fa-trash text-danger fs-4" role="button"></i>
                                    <span>Удалить</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <edit-component :selectedTask="selectedTask" @close-modal="selectedTask = null"></edit-component>
    </div>
</template>

<style>
.action-menu {
    position: absolute;
    top: 30;
    right: 0;
    background-color: transparent;
    z-index: 2;
    border-radius: 10px;
}

#group-button {
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 1;
}

.element-to-hover:hover #group-button {
    visibility: visible;
    opacity: 1;
}

.option {
    border: 1px solid #CCCED0;
    border-radius: 10px;
    margin-bottom: 3px;
    background-color: #F8FAFC;
    cursor: pointer;
    min-width: 150px;
    display: flex;
    justify-content: space-between;
}

.option:hover {
    background-color: #EFEFEF;
    border-radius: 10px;
    z-index: 1;
}
</style>
