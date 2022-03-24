let currentUser = document.head.querySelector('meta[name="currentUser"]');
module.exports = {
    computed: {
        currentUser(){
            return JSON.parse(currentUser.content);
        }
    }
}