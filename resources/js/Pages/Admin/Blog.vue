<script setup>
import LayoutAdmin from "../../Layout/LayoutAdmin.vue";
import ConfirmDelete from "../../Components/ConfirmDelete.vue";
import PaginationLinks from "../../Components/PaginationLinks.vue";
import {ref, watch} from "vue";
import {debounce} from "lodash";
import {router} from "@inertiajs/vue3";

defineOptions({
    layout:LayoutAdmin,
});
const props = defineProps({
    blogs:{
        type: Object,
    },
    search:String
})
const search = ref(props.search);
watch(search, debounce(
    (search) => router.get(route('adminBlog'), {
        search: search,
    }, {
        // preserveState: true
    }), 1000
))
</script>
<template>
    <div class="py-10">
        <div class="flex justify-between">
            <div class="w-1/4">
                <input type="search" placeholder="Search for title" v-model="search"/>
            </div>
            <Link
            class="px-4 py-2 bg-slate-500 mb-4 text-white rounded-md"
            :href="route('adminAddBlog')"
            >Add Blog</Link>
        </div>
        <table>
            <thead>
            <tr class="bg-slate-300">
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created at</th>
                <th>Watches</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="blog in blogs.data" :key="blog.id">
                <td>{{blog.id}}</td>
                <td >
                    <div class="line-clamp-2">
                        {{blog.blog_name}}
                    </div>
                    </td>
                <td >
                    <div class="line-clamp-2">
                        {{blog.content}}
                    </div>
                    </td>
                <td>{{blog.created_at}}</td>
                <td>{{blog.view}}</td>
                <td>{{blog.category_name}}</td>
                <td>
                    <Link class="text-green-600 text-[18px]" :href="route('adminEditBlog',{blog: blog.id})">
                        <font-awesome-icon :icon="['fas', 'pen-to-square']" />
                    </Link>
                </td>
                <ConfirmDelete :id="blog.id" name-route="adminHandleDeleteBlog" name-id="blog" method="delete"></ConfirmDelete>
            </tr>

            </tbody>
        </table>
        <PaginationLinks :paginator="blogs"></PaginationLinks>
    </div>
</template>
