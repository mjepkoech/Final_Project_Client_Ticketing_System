<script>

    export default {

    }
</script>
<template>
    <ul class="menu vertical">
        <router-link :to="{ name: 'landing' }">
            <li><a href="" class="is-active">
                <i class="large fa fa-institution"></i><span class="app-dashboard-sidebar-text">Home</span>
            </a></li>
        </router-link>
        <router-link :to="{ name: 'ticket' }">
            <li><a href="" class="is-active">
                <i class="large fa fa-institution"></i><span class="app-dashboard-sidebar-text">New Issue</span>
            </a></li>
        </router-link>

        <router-link :to="{ name: 'user_ticket' }">
        <li><a>
            <i class="large fa fa-hourglass"></i><span class="app-dashboard-sidebar-text">View Your Issues</span>
        </a></li>
        </router-link>

    </ul>
</template>