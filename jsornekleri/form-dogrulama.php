<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Doğrulama</title>

    <style>
        .form-item{
            margin: 10px;
        }
    </style>
</head>
<body>
    <form action="/index.php" id="validation-form">
        <div class="form-item">
            <label for="name">İsim</label>
            <input type="text" name="name" placeholder="İsim giriniz..">
            <span error-text="name"></span>
        </div>
        <div class="form-item">
            <label for="email">Mail adresi</label>
            <input type="text" name="email" placeholder="Mail adresi  giriniz..">
            <span error-text="email"></span>
        </div>
        <div class="form-item">
            <label for="password">Şifreniz</label>
            <input type="password" name="password" placeholder="******">
            <span error-text="password"></span>
        </div>
        <div class="form-item">
            <label for="password2">Şifre Tekrarı</label>
            <input type="password" name="password2" placeholder="******">
        </div>
        <button type="submit">Gönder</button>
    </form>

    <script>
        let form = document.getElementById('validation-form');

        form.addEventListener("submit", function(event){

            event.preventDefault();

            let errors = document.querySelectorAll('[error-text]');
            errors.forEach((value,key) => {
                value.innerHTML = '';
            });


            let name = document.querySelector('[name="name"]').value;
            let email = document.querySelector('[name="email"]').value;
            let password = document.querySelector('[name="password"]').value;
            let password2 = document.querySelector('[name="password2"]').value;

            let isValid = true;

            if(name.length < 3 || name.length > 10)
            {
                document.querySelector('[error-text="name"]').innerHTML = '<span style="color:red;">İsim alanı 3 - 10 karakter olabilir.</span>';
                isValid = false;
            }
            if(!validateEmail(email))
            {
                document.querySelector('[error-text="email"]').innerHTML = '<span style="color:red;">Geçerli bir email adresi giriniz.</span>';
                isValid = false;
            }
            if(password !== password2)
            {
                document.querySelector('[error-text="password"]').innerHTML = '<span style="color:red;">Şifreniz tekrarıyla uyuşmuyor.</span>';
                isValid = false;
            }
            else if(password.length < 8)
            {
                document.querySelector('[error-text="password"]').innerHTML = '<span style="color:red;">Şifreniz en az 8 karakter olabilir.</span>';
                isValid = false;
            }

            if(isValid)
            {
                alert("Form başarıyla gönderildi.");

                //api
                //yönlendirme
            }
        });

        const validateEmail = (email) => {
            return String(email)
                .toLowerCase()
                .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };
    </script>
</body>
</html>