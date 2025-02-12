<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>
    <button id="createBtn">Ekle</button>
    <script>
        document.getElementById("createBtn").addEventListener('click',function(){

            fetch("https://jsonplaceholder");
        });
    </script>
</body>
</html>