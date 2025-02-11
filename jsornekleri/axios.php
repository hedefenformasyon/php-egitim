<?php
header('Access-Control-Allow-Headers: *');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Axios</title>
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

    async function getUser()
    {
        try {
            let response = await axios.get("https://jsonplaceholder.typicode.com/users/3");
            console.log(response.data);
        } catch (error) {
            console.log("Hata -> "+error);
        }
    }

    getUser();
</script>
</body>
</html>