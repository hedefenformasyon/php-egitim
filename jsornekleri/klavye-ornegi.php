<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klavye Tuşlarına Basılması</title>

    <style>
        #deleteBtn{
            padding: 15px;
            background-color:rgba(255, 0, 0, 0.49);
            border-style: none;
            color: white;
            font-size: 13px;
        }
        #deleteBtn:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <textarea id="textarea" placeholder="Metin giriniz" rows="10" style="width: 100%;"></textarea>
    <button type="button" id="deleteBtn">Sıfırla</button>
    <span id="textLength"></span>
    <p id="content" class="content">Yazdığınız mesajlar burada gösterilecek</p>

    <script>
        let textarea = document.getElementById('textarea');
        let content = document.getElementById('content');
        let deleteBtn = document.getElementById('deleteBtn');

        textarea.addEventListener("input",function(event){
            let value = event.target.value;
            if(value != "")
            {
                content.textContent = value;
            } else content.textContent = "Yazdığınız mesajlar burada gösterilecek";

            textLength.textContent = "Karakter sayısı "+ value.length;
            content.style.backgroundColor = 'red';
            content.style.color = 'white';
        });

        textarea.addEventListener('keyup',function(){
            content.style.backgroundColor = 'white';
            content.style.color = 'black';
        });

        deleteBtn.addEventListener('click',function(){
            content.textContent = "Yazdığınız mesajlar burada gösterilecek";
            textarea.value = '';
            textLength.textContent = '';
        });

    </script>
</body>
</html>