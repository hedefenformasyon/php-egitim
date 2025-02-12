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


    <p id="copy_text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil aliquid at porro totam perferendis consectetur libero culpa soluta sint. Nostrum aliquam reprehenderit possimus optio dignissimos in deserunt, deleniti sapiente aspernatur.</p>




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

/*
        function keypressClick(event){
            alert("Basılan tuş: " + event.key);
        }
        document.addEventListener("keydown", keypressClick);
*/

        document.addEventListener('paste',function(event){
            console.log('yapıştırılan içerik '+ event.clipboardData.getData("text"));
        });


        ////
        /*
        function islemBitti(){
            console.log("İşlem tamamlandı.");
        }
        function islemBaslat(callback)
        {
            console.log("İşlem başladı....");
            setTimeout(callback,3000);
        }
        islemBaslat(islemBitti);
*/


        ////
        /*
        function processUser(callback)
        {
            let user = {id: 1, name: "Enes"};
            callback(user);
        }
        processUser(function(user){
            console.log(user.name);
        });
*/

        ////
        
        function processNumbers(a,b,geridon)
        {
            return geridon(a+b,a,b);
        }
        let result =  processNumbers(10,5,function(result,x,y){
            return `${x} + ${y} = ${result}`;
        });

        console.log(result);



        //async callback

        function fetchData(callback){

            return new Promise(resolve => {
                setTimeout(() => {
                    resolve(callback({id:1, name:"Kırmızı"}));
                }, 2000);
            });
        }

        async function main(){

            console.log("Renk adı belirleniyor....");
            let response = await fetchData(function(renk){
                return renk.name;
            });
            console.log("Renk adı "+response);
        }

        main();
/*

        function getData(callback){
            setTimeout(() => {
                let error = true;
                let data = {id: 5, name: "Mehmet",surname:"Gören", age: 26};

                if(error){
                    callback("Veri alınamadı, hata var!",null);
                }
                else {
                    callback(null,data);
                }
            }, 2000);
        }

        getData(function(msg,user){
            if(msg){
                console.error("Hata: "+msg);
            }
            else {
                console.log("Kullanıcı : "+ user.name+" "+user.surname);
            }
        });
*/
        //XML REQUEST

        function sendXMLRequest(callback){
            let xhr = new XMLHttpRequest();
            xhr.open("GET","https://jsonplaceholder.typicode.com/users/1");
            xhr.onload = function(){
                if(xhr.status == 200)
                {
                    callback(JSON.parse(xhr.responseText));
                }
            };

            xhr.send();
        }

        sendXMLRequest(function(user){
            console.log("Kullanıcı adınız "+user.name);
        });


        //FETCH

        fetch("https://jsonplaceholder.typicode.com/users/1")
            .then(response => response.json())
            .then(user => {
                console.log("Fetch edildi, kullanıcı " + user.name+" "+user.email);
            })
            .catch(error => {
                console.error(error.responseText);
            });



        async function getUser(user_id)
        {
            try {
                let response = await fetch("https://jsonplaceholder.typicode.com/users/"+user_id);
                let user = await response.json();
                console.log(user);
            } catch (error) {
                console.error("Hata "+ error);
            }
        }
        console.log("FETCH başladı");
        getUser(2);
        console.log("FETCH bitti");



        
    </script>
</body>

</html>