

require('./bootstrap');

window.Vue = require('vue');



Vue.component('chat', require('./components/Chat.vue').default);



const app = new Vue({
    el: '#app',

    data: {
        chats: ''
    },

    created(){
        const userId = $('meta[name="userId"]').attr('content');
        const friendId = $('meta[name="friendId"]').attr('content');

        if(friendId != undefined){
            axios.post('/chat/getChat/' + friendId).then((response) => {
                this.chats = response.data;
            })
        }
    }
});
