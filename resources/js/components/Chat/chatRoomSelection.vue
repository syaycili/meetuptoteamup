<template>
    <div class="grid">
        <div class="text-sm">
            {{ selected.name }}

            <select
            v-model="selected"
            @change="$emit('roomchanged', selected )"
            class="float-right"
            >
            <option

                v-for="(room, index) in rooms"
                :key="index"
                :value="room"

            >{{room.name}}</option>




            </select>
        </div>

    </div>
</template>

<script>
export default {
    props: ['rooms', 'currentRoom'],
    data: function() {
        return{
            selected: ''
        }
    },
    created(){
        this.selected = this.currentRoom;
    }
};
</script>
