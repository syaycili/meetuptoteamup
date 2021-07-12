<template>
    <div>
        <span v-if="message.user.id == aktifuser">
            <span class="d-flex justify-content-end"><span class="text-primary ">{{ message.user.name }}</span>: {{message.message}}</span>
        </span>
        <span v-else>
            <span class="text-primary ">{{ message.user.name }}</span>: {{message.message}}
        </span>

    </div>
</template>

<script>
export default {
    props: [
        'message',
        'aktifuser'
    ],
};
</script>
