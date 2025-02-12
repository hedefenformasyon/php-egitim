<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JQuery</title>
</head>
<body>
    <form id="dataForm">

        <input type="text" name="title" placeholder="Başlık">
        <input type="text" name="body" placeholder="Mesaj">
        <input type="number" name="user_id" placeholder="Kullanıcı No">
    </form>
    <button id="createBtn">Ekle</button>



    <form id="updateDataForm">
        <input type="hidden" name="id" value="1">
        <input type="text" name="title" placeholder="Başlık">
        <input type="text" name="body" placeholder="Mesaj">
        <input type="number" name="user_id" placeholder="Kullanıcı No">
        <button type="submit">Güncelle</button>
    </form>

    <input type="number" name="delete_id" value="1">
    <button id="deleteBtn">Veriyi sil</button>

    <script src="/daviva/jsornekleri/jquery.js"></script>

    <script>

        $("#createBtn").click(function(){

            var formData = {};
            var data = $("input","#dataForm").serializeArray();
            data.forEach((elm) => {
                formData[elm.name] = elm.value;
            });
            //console.log(formData);
            $.ajax({
                url: "https://jsonplaceholder.typicode.com/posts",
                method: "POST",
                dataType: "json",
                data: $.extend({
                    surname: "Taşdemir"
                },formData),
                success: function(data){
                    console.log("İstek başarıyla gönderildi.");
                },
                error: function(err)
                {
                    console.error(err.responseText);
                }
            });
        });

        $('#updateDataForm').submit(function(e){
            e.preventDefault();
            var data = new FormData(this);

            var id = $(this).find('[name="id"]').val();
            $.ajax({
                url: "https://jsonplaceholder.typicode.com/posts/"+id,
                method: "PUT",
                dataType: "json",
                data:data,
                processData: false,
                contentType: false,
                success: function(response)
                {
                    console.log(response);
                },
                error: function(err){
                    console.error(err.responseText);
                }
            });
        });


        $('#deleteBtn').click(function(){
            var id = $('[name="delete_id"]').val();
            $.ajax({
                url: "https://jsonplaceholder.typicode.com/posts/"+id,
                method: "DELETE",
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response)
                {
                    console.log(response);
                },
                error: function(err){
                    console.error(err.responseText);
                }
            });
        });


        $.ajax({
            url: "https://jsonplaceholder.typicode.com/users/1000",
            method: "GET",
            dataType: "json",
            success: function(data){
                console.log("Ajax -> kullanıcı "+data.name+" "+data.email);
            },
            error: function(err)
            {
                console.error(err.status);
            }
        });
    </script>
</body>
</html>