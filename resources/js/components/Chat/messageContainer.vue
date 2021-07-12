<template>
    <div ref="container" style="max-height: 300px;" class="h-96 w-auto overflow-auto customscrollbar">
        <div class="h-full p-1 flex flex-col-reverse">
            <div  v-for="(message, index) in messages" :key="index">
                <message-item :message="message" :aktifuser="aktifuser" />
            </div>
        </div>
    </div>
</template>

<script>
import messageItem from './messageItem.vue'
export default {
    components:{ messageItem },
        props: [
            'messages',
            'aktifuser'
            ],
         methods: {
                scrollToEnd () {
                var content = this.$refs.container;
                content.scrollTop = content.scrollHeight;
                },
         },
          updated () {
         	// This will be called when the component updates
           // try toggling a todo
         	this.scrollToEnd();
         },

         mounted () {
         	// This will be called on load
         	this.scrollToEnd();
         }

};
</script>
