<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <style>

        .content {
            padding: 15px;
            margin: 15px;
        }
        .content .content-item {
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 14px;
            color: black;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
        }
        .content .content-item .delete-btn {
            color: white;
            background-color: #ff0000a8;
            border: none;
            padding: 7px;
        }
        .content .content-item .delete-btn:hover { cursor: pointer;}
    </style>
</head>
<body>
    <input type="text" id="gorev" placeholder="Görev adını giriniz" class="gorev-input">
    <button type="button" id="addBtn" class="btn">Görevi ekle</button>

    <div class="content" id="content">

    </div>
    <script>
        let todolist = [];
        let addBtn = document.getElementById('addBtn');
        let gorev = document.getElementById('gorev');
        let content = document.getElementById('content');

        document.addEventListener("DOMContentLoaded",function(){
            toDoListGet();
        });

        addBtn.addEventListener('click',function(){
            if(gorev.value.length < 1)
            {
                alert("Görev girmediniz!");
            }

            todolist.push(gorev.value);
            gorev.value = '';
            toDoListGet();
        });

        function toDoListGet(){
            if(todolist.length == 0)
            {   
                content.innerHTML = '<span style="color:#00ff00;">Şu an hiç bir görev tanımlı değil.</span>';
                return;
            }

            content.innerHTML = '';
            todolist.forEach((value,key) => {
                let item = document.createElement('div');
                let html = '<span>'+value+'</span>'+
                            '<button type="button" class="delete-btn" delete-item="'+key+'">Kaldır</button>';
                item.innerHTML = html;
                item.classList.add("content-item");
                content.appendChild(item);
            });
        }
        document.addEventListener("click",function(event){
            let btn = event.target;
            if(btn.hasAttribute('delete-item'))
            {
                let key = btn.getAttribute('delete-item');
                todolist.splice(key,1);
                toDoListGet();
            }
        });

    </script>
</body>
</html>