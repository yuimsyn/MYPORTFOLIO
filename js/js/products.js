<script>
    new Vue({
        el:"#app",
        date:{
            todos:[
                {done:false,text:"パンを買う"},
                {done:false,text:"牛乳を買う"}

            ]

            
        },
        computed:{
            remaining:function(){
                return this.todos.filter(function(val){
                    return val.done;
                }).length;
             }
        }

    })

    
</script>