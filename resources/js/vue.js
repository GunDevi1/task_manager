import { createApp } from "vue";
import Task from './components/TaskComponent.vue';
import Create from './components/CreateComponent.vue';
import Edit from './components/EditComponent.vue';
import './bootstrap';

const app = createApp({
    components: {
        Task,
        Create,
        Edit,
    }
});

app.mount('#app');
