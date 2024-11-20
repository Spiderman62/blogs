<script setup>
import LayoutAdmin from "../../Layout/LayoutAdmin.vue";
import ConfirmDelete from "../../Components/ConfirmDelete.vue";
defineOptions({
    layout: LayoutAdmin,
})
defineProps({
    categories: Object,
});
</script>
<template>
    <div class="w-2/4 mx-auto py-10">
        <div class="flex justify-end">
            <Link
                :href="route('adminAddCategory')"
                class="px-4 py-2 bg-slate-500 mb-4 text-white rounded-md"
            >
                Add Category
            </Link>

        </div>
        <div class="">
            <table>
                <thead>
                <tr class="bg-slate-300">
                    <th>Id</th>
                    <th>name</th>
                    <th>user</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                </thead>

                <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <td>{{category.id}}</td>
                    <td>{{category.category_name}}</td>
                    <td>{{category.user_name}}</td>
                    <td>
                        <Link class="text-green-600 text-[18px]" :href="route('adminEditCategory',{category: category.id})">
                            <font-awesome-icon :icon="['fas', 'pen-to-square']" />
                        </Link>
                    </td>
                    <ConfirmDelete :id="category.id" name-route="adminHandleDeleteCategory" name-id="category" method="delete"></ConfirmDelete>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

</template>
