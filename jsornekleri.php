<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p id="metin"></p>


    <input type="text" id="name" placeholder="İsim Giriniz">


    <form action="/" id="form">
        <input type="text" name="name">
        <button type="submit">Gönder</button>
    </form>
    <script>
        let numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        for (let i = 0; i < numbers.length; i++) {
            const num = numbers[i];
            //eğer sayı tekse 1 ekle
            if (num % 2 !== 0) {
                numbers[i] = num + 1;
                console.log(`${num} sayısı tekti, 1 eklendi: ${numbers[i]}`);
            }

            else{ // eğer sayı çiftse 2 ile böl
                numbers[i] = num /2;
                console.log(`${num} sayısı çiftti, 2 'ye bölündü: ${numbers[i]}`);
            }
        }

        console.log("Sonuçları: ", numbers);
        document.getElementById('metin').innerText = "Sonuçları "+ numbers;



        document.getElementById("name").addEventListener("keyup",function(event){
            console.log('Yazılan: '+event.target.value);
        });

        document.getElementById("name").addEventListener("mouseover",function(event){
            this.style.backgroundColor = "red";
        });
        document.getElementById("name").addEventListener("mouseout",function(event){
            this.style.backgroundColor = "white";
        });

        document.getElementById("form").addEventListener("submit",function(event){
            event.preventDefault();
            console.log('form durduruldu');
        });

        document.addEventListener("keydown", function(event) {
            console.log("Basılan tuş: " + event.key);
        });

    </script>
</body>

</html>