    </div>
    <footer>
        <p>Jean Forteroche, tous droits réservés.</p>
    </footer>
    <script>
        async function disconnect(articleId){
            let response = await axios.get("/disconnect")
        }
    </script>
</body>
</html>