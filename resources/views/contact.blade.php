<html>

<head>
    <title>お問い合わせ</title>
</head>

<body>
    <div id="app">
        <label>名前</label>
        <input type="text" v-model="params.name">
        <br>
        <label>メールアドレス</label>
        <input type="text" v-model="params.email">
        <br>
        <label>内容</label>
        <textarea v-model="params.body"></textarea>
        <br>
        <button type="button" @click="onClick">送信する</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.prototype.$http = axios;

        new Vue({
            el: '#app'
            data: {
                params: {
                    name: '',
                    email: '',
                    body: ''
                }
            },
            methods: {
        onClick: function() {

            // ここにAjax
            this.$http.post('/ajax/contacts', this.params)
        .then(function(response){

            // 成功したとき
            self.params = {
                name: '',
                email: '',
                body: ''
            };
            alert('送信が完了しました。');

        }).catch(function(error){

            // 失敗したとき

        });

        }
        })

    </script>
</body>

</html>