<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/ua/assets/main.css">

        <title>Лабораторна робота №6 | Головна</title>
    </head>

    <body>
        <header class="header">
            <h4>Для пропозицій партнерства звертатися за телефоном: (050)123-45-67</h4>
        </header>

        <nav>
            <ul class="menu">
                <li class="menu-item"><a href="/index.php">Головна</a></li>
                <li class="menu-item"><a href="/ua/history.html">Історія</a></li>
                <li class="menu-item"><a href="/ua/program.html">Політична програма</a></li>
                <li class="menu-item"><a href="/ua/blogs.html">Блоги</a></li>
                <li class="menu-item"><a href="/ua/gallery.html">Фотогалерея</a></li>
                <li class="menu-item"><a href="/ua/contacts.html">Контакти</a></li>
                <li class="menu-item"><a href="/ua/questions.html">Опитування</a></li>
                <li class="menu-item active"><a href="/ua/contact-as.php">Залишити відгук</a></li>

                <li id="lang-link" class="menu-item"><a href="javascript:void(0)"></a></li>
            </ul>
        </nav>

        <section id="contact-as">

            <div class="form-wrapper">
                <form id="contact-form" action="/server/contact-as.php" method="post">
                    <div class="form-row">
                        <label for="phone">Телефон</label>
                        <input type="text" name="phone" id="phone" placeholder="+380501234567">
                        <label class="error-label"></label>
                    </div>

                    <div class="form-row">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email">
                        <label class="error-label"></label>
                    </div>

                    <div class="form-row">
                        <label for="name">І'мя</label>
                        <input type="text" name="name" id="name" placeholder="І'мя">
                        <label class="error-label"></label>
                    </div>

                    <div class="form-row">
                        <label for="surname">Прізвище</label>
                        <input type="text" name="surname" id="surname" placeholder="Прізвище">
                        <label class="error-label"></label>
                    </div>

                    <div class="form-row">
                        <label for="comment">Ваш коментар</label>
                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                        <label class="error-label"></label>
                    </div>

                    <div class="form-row x2">
                        <label>Сімейний стан</label>

                        <div class="radio-block">
                            <label for="married-1">Одружений/Заміжня</label>
                            <input type="radio" name="married" id="married-1" value="1" data-type="radio-checkbox">
                        </div>
                        <div class="radio-block">
                            <label for="married-0">Неодружений/Незаміжня</label>
                            <input type="radio" name="married" id="married-0" value="0" data-type="radio-checkbox">
                        </div>
                        <label class="error-label"></label>
                    </div>

                    <div class="form-row x2">
                        <label>Кількість дітей до 18ти років</label>

                        <div class="radio-block">
                            <label for="child-0">0</label>
                            <input type="radio" name="child" id="child-0" value="0" data-type="radio-checkbox">
                        </div>
                        <div class="radio-block">
                            <label for="child-1">1</label>
                            <input type="radio" name="child" id="child-1" value="1" data-type="radio-checkbox">
                        </div>
                        <div class="radio-block">
                            <label for="child-2">2</label>
                            <input type="radio" name="child" id="child-2" value="2" data-type="radio-checkbox">
                        </div>
                        <div class="radio-block">
                            <label for="child-3">3</label>
                            <input type="radio" name="child" id="child-3" value="3" data-type="radio-checkbox">
                        </div>
                        <div class="radio-block">
                            <label for="child-4">Більше 3х</label>
                            <input type="radio" name="child" id="child-4" value="4" data-type="radio-checkbox">
                        </div>
                        <label class="error-label"></label>
                    </div>

                    <button type="submit" onclick="return false;" data-type="submit-btn">Надіслати відгук</button>
                </form>
            </div>

        </section>

        <footer>
            <ul>
                <li class="footer-item"><a href="/index.php">Головна</a></li>
                <li class="footer-item"><a href="/ua/history.html">Історія</a></li>
                <li class="footer-item"><a href="/ua/program.html">Політична програма</a></li>
                <li class="footer-item"><a href="/ua/blogs.html">Блоги</a></li>
                <li class="footer-item"><a href="/ua/gallery.html">Фотогалерея</a></li>
                <li class="footer-item"><a href="/ua/contacts.html">Контакти</a></li>
                <li class="footer-item"><a href="/ua/questions.html">Опитування</a></li>
                <li class="footer-item active"><a href="/ua/contact-as.php">Залишити відгук</a></li>
            </ul>
        </footer>

        <script src="/ua/assets/js/main.js"></script>
        <script>
            let inputNames = ['phone', 'email', 'name', 'surname', 'comment', 'married', 'child'];

            function clearErrors() {
                Array.from(document.getElementsByClassName('error-label')).map((el) => el.innerText = "");
            }

            function showErrors(errors) {
                clearErrors();

                errors.map((e) => {
                    let selector = e.selector.replace(':checked', ''),
                        input = document.querySelector(selector);

                    let formRow = input.parentNode;
                    while (! formRow.classList.contains('form-row')){
                        formRow = formRow.parentNode;
                    }

                    formRow.querySelector('.error-label').innerText = e.message;
                })
            }

            document.querySelector('[data-type="submit-btn"]').addEventListener('click', (e) => {
                let errors = [];

                clearErrors();
                inputNames.map((nm) => {
                    let selector = '[name="' + nm + '"]',
                        error = { message: "Заповніть поле" },
                        el = document.querySelector(selector);

                    if(el.getAttribute('data-type') === 'radio-checkbox') {
                        selector += ':checked';
                        el = document.querySelector(selector);

                        error.message = "Оберіть варіант відповіді";
                    }
                    error.selector = selector;

                    if(el === null || el.value === "") errors.push(error);
                });

                if(errors.length > 0) showErrors(errors)
                else {
                    let xhr = new XMLHttpRequest(),
                        form = document.getElementById('contact-form');

                    xhr.open(form.getAttribute('method'), form.getAttribute('action'));
                    xhr.responseType = 'json';
                    xhr.send(new FormData(form));
                    xhr.onload = function() {
                        let responseObj = xhr.response;

                        if(responseObj.status) alert("Ваш відгук надіслано");
                        else {
                            responseObj.errors.map((er) => {
                                let erArr = Object.entries(er)[0],
                                    input = document.querySelector('[name="' + erArr[0] + '"]');

                                let formRow = input.parentNode;
                                while (! formRow.classList.contains('form-row')){
                                    formRow = formRow.parentNode;
                                }

                                formRow.querySelector('.error-label').innerText = erArr[1];
                            })
                        }
                    };
                }
            });
        </script>
    </body>
</html>