<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JQuery</title>
</head>
<body>
    
    <script src="/daviva/jsornekleri/jquery.js"></script>

    <script>

        $.ajax({
            url: "https://jsonplaceholder.typicode.com/users/1",
            method: "GET",
            dataType: "json",
            success: function(data){
                console.log("Ajax -> kullanıcı "+data.name+" "+data.email);
            },
            error: function(err)
            {
                console.error(err.responseText);
            }
        });
    </script>
</body>
</html>