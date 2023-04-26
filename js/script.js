const { createApp } = Vue;

createApp({
    data() {
        return {
            todos: [],

            newTodo: '',
        }
    },

    methods: {
        getTodos() {
            axios.get('./server.php').then(res => {
                console.log(res.data);
                this.todos = res.data;
            })
        },

        addTodo() {
            // this.todos.push(this.newTodo);
            
            let data = {
                newTodo: '',
            }
            
            data.newTodo = this.newTodo;
            
            axios.post('./server.php', data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                
                console.log("chiamata post effettuata", response);
                
                this.getTodos();
            });
            
            this.newTodo = '';
        },
    },
    

    mounted() {
        this.getTodos();
    }
}).mount('#app');