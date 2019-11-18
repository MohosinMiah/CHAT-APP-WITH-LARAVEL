/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const axios = require('axios');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('message', require('./components/Message.vue').default);
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        message: "",
        type : '',
        chat: {
            messages: [],
            user: [],
            color: [],
            time: [],
        },

        typing: '',
        numberOfUsers: 0
    },
    watch: {
        message() {
            Echo.private('chat')
                .whisper('typing', {
                    name: this.message
                   
                });
        }
    },
    methods: {
        send() {
            if (this.message.length != 0) {
                this.chat.messages.push(this.message);

                this.chat.color.push('success');
                this.chat.user.push('you');
                this.chat.time.push(this.getTime());
                axios.post('/send', {
                    message: this.message

                })
                    .then(response => {
                        // console.log(response);
                        this.message = ''
                    })
                    .catch(error => {
                        // console.log(error);
                    });
                // console.log(this.chat.messages);
            }

        },
        getTime() {
            let time = new Date();
            return time.getHours() + ':' + time.getMinutes();
        },
    },

    mounted() {
        Echo.private('chat')
            .listen('MessageSent', (e) => {

                this.chat.messages.push(e.message.message);
                this.chat.color.push('warning');
                this.chat.user.push(e.user.name);
                // console.log(e.message.message);
            }).listenForWhisper('typing', (e) => {
                if(e.name != ""){
                  this.type = "Typing...";
                }else{
                  this.type = "";
  
                }
  
      });
    
    },



});
