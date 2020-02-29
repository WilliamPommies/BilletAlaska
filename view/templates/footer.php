    </div>
    <footer>
        <p>Jean Forteroche, tout droits réservés.</p>
    </footer>
</body>

<script>
        async function disconnect(articleId)
    {
        let response = await axios.get("/disconnect")
        if(response.status >= 200 && response.status < 400){
            console.log('ok')
        }
    }
</script>

</html>