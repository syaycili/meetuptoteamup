<template>
<div>
        <div class="shadow-4">
        <div class="card">

                    <template>
                    <h2 style="display: none;" class="font-semibold text-xl text-gray-800 leading-tight">
                        <chat-room-selection
                            v-if="currentRoom.id"
                            :rooms="chatRooms"
                            :currentRoom="currentRoom"
                            v-on:roomchanged="setRoom ( $event )"
                        />
                    </h2>
                    </template>



                <div class="card-body bg-light text-dark">
                    <message-container :aktifuser="aktifuser" :messages="messages" />
                    <input-message
                    :room="currentRoom"
                    v-on:messagesent="getMessages()" />
                </div>
            </div>
        </div>
 </div>
</template>

<script>
import MessageContainer from "./messageContainer.vue";
import InputMessage from "./inputMessage.vue";
import ChatRoomSelection from './chatRoomSelection.vue';

export default {
    props: [
            'deneme',
            'aktifuser'
    ],
    components: {
        MessageContainer,
        InputMessage,
        ChatRoomSelection,
    },

    data: function () {
        return {
            chatRooms: [],
            currentRoom: [],
            messages: []
        }
    },

    watch: {
        currentRoom( val, oldVal){
            if ( oldVal.id) {
                this.disconnet(oldVal);
            }
            this.connect();
        }
    },

    methods: {
        connect(){
            if (this.currentRoom.id) {
                let vm = this;
                this.getMessages();
                window.Echo.private("chat." + this.currentRoom.id)
                .listen('.message.new', e => {
                    vm.getMessages();
                });
            }
        },
        disconnet( room ){
            window.Echo.leave("chat." + room.id);
        },
        getRooms() {
            axios.get('/chat/rooms/' + this.deneme)
            .then( response => {
                this.chatRooms = response.data;
                this.setRoom(response.data[0]);
            })
            .catch( error=> {
                console.log (error);
            })
        },
        setRoom ( room ){
            this.currentRoom = room;

        },
        getMessages(){
            axios.get('/chat/rooms/' + this.currentRoom.id + '/messages')
            .then( response => {
                this.messages = response.data;
            })
            .catch( error=> {
                console.log (error);
            })
        }
    },
    created(){
        this.getRooms();
    }
};
</script>
