<script setup>
import {ref} from "vue";

const isDelete = ref(false);
defineProps({
    id: {
        type: Number,
        required: true
    },
    nameId: {
        type: String,
        required: true
    },
    nameRoute: {
        type: String,
        required: true
    },
    method: {
        type: String,
        default: 'get',
    },

})
const confirmDelete = () => {
    isDelete.value = !isDelete.value;
};
</script>
<template>
    <td>
        <transition mode="out-in" name="delete">
            <span v-if="!isDelete" @click="confirmDelete">
            <font-awesome-icon class="text-red-600 text-[18px]" :icon="['fas', 'trash']"/>
        </span>
            <div v-else class="flex items-center">
                <Link
                    class="py-1 px-2 bg-red-500 text-white"
                    :href="route(nameRoute,{}['nameId'] = id)"
                    as="button"
                    :method="method"
                >
                    Confirm Delete
                </Link>
                <div @click="confirmDelete" class="py-1 px-2 bg-slate-600 cursor-pointer text-white">
                    <font-awesome-icon :icon="['fas', 'xmark']"/>
                </div>
            </div>
        </transition>
    </td>
</template>
<style scoped>
.delete-enter-from {
    opacity: 0;
    transform: translateX(-5px);
}

.delete-enter-to {
    opacity: 1;
    transform: translateX(0px);
}

.delete-enter-active, .delete-leave-active {
    transition: .2s ease-in-out;
}

.delete-leave-to {
    opacity: 1;
    transform: translateX(0px);
}

.delete-leave-active {
    opacity: 0;
    transform: translateX(5px);
}
</style>
