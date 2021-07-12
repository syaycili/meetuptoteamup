<template>
    <div class="relative h-10 m-1">
        <div style="border-top: 1px solid #e6e6e6;" class="row">
            <div class="col-md-10">
            <input
            type="text"
            v-model="message"
            @keyup.enter="sendMessage()"
            placeholder="Buraya Yazınız..."
            class="form-control mt-3"
            />
            </div>
            <div class="col-md-2">
            <button
            @click="sendMessage()"
            class="btn btn-primary mt-3"
            >Gönder
            </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['room'],
    data: function(){
        return {
            message: ''
        }
    },
    methods: {
        sendMessage() {
            if(this.message == ''){
                return;
            }
            axios.post('/chat/rooms/' + this.room.id + '/messages', {
                message: this.message
            })
            .then( response => {
                if( response.status == 201){
                    this.message = '';
                    this.$emit('messagesent');
                }
            })
            .catch( error => {
                console.log( error );
            })
        }
    }
};
</script>
