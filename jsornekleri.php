<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p id="metin"></p>
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
    </script>
</body>

</html>