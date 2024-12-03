    <template>
    <div class="mb-6">
        <label>{{label}}</label>
        <input :class="{'!ring-red-500':message}" :type="type" v-model="model" />
        <small class="error" v-if="message">{{message}}</small>
    </div>
</template>
<script setup>
const model = defineModel({
    type:null,
    required:true,
});
defineProps({
    label: {
        type: String,
    },
    type:{
        type: String,
        default: 'text',
    },
    message:String,
});
</script>
