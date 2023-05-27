if(localStorage['language'] === undefined) localStorage['language'] = 'ua';
let langLink = document.getElementById('lang-link');
langLink.querySelector('a').innerText = localStorage['language'].toUpperCase();

// 1
console.log(
    "Your browser name: " + navigator.appName + "\n" +
    "Your browser version: " + navigator.appVersion.substring(0, 4)
);

// 2
function getMathValue(a, b, action) {
    let value;

    switch (action) {
        case '+':
            value = parseInt(a) + parseInt(b);
            break;
        case '-':
            value = parseInt(a) - parseInt(b);
            break;
        case '/':
            value = parseInt(a) * parseInt(b);
            break;
        default: value = parseInt(a) - parseInt(b);
    }

    if(action === '+' || action === '-') document.write(value);
    else alert(value);
}
getMathValue(5, 5, '+');
getMathValue(4, 4, '-');
getMathValue(3, 7, '*');
getMathValue(7, 15, '/');

// 3
let leaderPhoto = document.getElementById('leader-photo');
if(leaderPhoto !== null) {
    leaderPhoto.addEventListener('mouseover', (e) => {
        e.target.classList.add('big');
    });

    leaderPhoto.addEventListener('mouseout', (e) => {
        e.target.classList.remove('big');
    });
}

var sitePages = [
    {
        name: "Головна",
        url: "index.html"
    },
    {
        name: "Історія",
        url: "history.html"
    },
    {
        name: "Політична програма",
        url: "program.html"
    },
    {
        name: "Блоги",
        url: "blogs.html"
    },
    {
        name: "Фотогалерея",
        url: "gallery.html"
    },
    {
        name: "Контакти",
        url: "contacts.html"
    }
];

// 6
let pageSelect = document.getElementById('page-select')
if(pageSelect !== null) {
    pageSelect.innerHTML = "";
    sitePages.map((e) => {
        let option = new Option(e.name, e.url);
        pageSelect.appendChild(option);
    });

    pageSelect.addEventListener('change', (e) => {
        location.href = e.target.value;
    });
}

// 7
var languages = ['ua', 'ru', "en"];
langLink.addEventListener('click', (e) => {
    let curLang = localStorage['language'],
        url = document.URL, newUrl = '', newLanguage = '';

    languages.forEach((lan, i) => {
        if(lan === curLang) {
            if(i === (languages.length - 1)) newLanguage = languages[0];
            else newLanguage = languages[i + 1];

            return;
        }
    });

    url = url.replace("/ua/", "/")
        .replace("/en/", "/").replace("/ru/", "/");

    let urlArray = url.split("/");
    urlArray.forEach((el, i) => {
        if(el !== 'file:' && el !== '') {
            if(i === (urlArray.length) - 1) {
                newUrl += "/" + newLanguage;
            }

            newUrl += "/" +el;
        }
    });

    localStorage['language'] = newLanguage;
    location.href = newUrl;
});

// 8
function getRandomInt(max) {
    return Math.floor(Math.random() * 10) + max;
}
let dayTexts = [
    "Гороскоп на 1 травня для Овнів\n" +
    "Спілкуючись із людьми – як знайомими, так і не дуже – намагайтеся тримати дистанцію, інакше їхнє негативне біополе може не найкращим чином вплинути на ваші самопочуття та настрій.",

    "Телець (21.04 – 21.05) Гороскоп на 1 травня для Тельців\n" +
    "Не варто витрачати час, призначений для роботи, намарно: розмови ні про що не принесуть вам жодної користі, а ось від роботи відвернуть і змусять виконувати поставлені перед вами завдання в цейтноті.",

    "Близнята (22.05 – 21.06) Гороскоп на 1 травня для Близнят\n" +
    "Незважаючи на те, що спокуса сказати неприємним вам людям усе, що ви про них думаєте, буде великою, йти у неї на поводі не варто – конфлікт, який ви отримаєте в результаті, виявиться, м'яко кажучи, непередбачуваним.",

    "Рак (22.06 – 22.07) Гороскоп на 1 травня для Раків\n" +
    "Необхідно чітко спланувати робочий день і планомірно переходити від одного його пункту до іншого, інакше ви тупцюватимете на місці, не знаючи, чим би вам зайнятися.",

    "Лев (23.07 – 21.08) Гороскоп на 1 травня для Левів\n" +
    'Оскільки навіть найсильнішій – як от ви – людині теж час від часу потрібен перепочинок, присвятіть цей день відпочинку: якщо такої можливості не буде, працюйте хоча б у режимі "лайт".',

    "Діва (22.08 – 23.09) Гороскоп на 1 травня для Дів\n" +
    "Схоже, що на шляху до важливої професійної мети ви якоїсь миті звернули не в той бік – сьогоднішній день сприятливий для того, щоб повернутися до цієї точки і піти туди, куди потрібно.",

    "Терези (24.09 – 23.10) Гороскоп на 1 травня для Терезів\n" +
    "У пошуках відповіді на важливі – як професійні, так і особисті – питання необхідно звернути увагу на підказки, які даватиме внутрішній голос – він вас не обдурить.",

    "Скорпіон (24.10 – 22.11) Гороскоп на 1 травня для Скорпіонів\n" +
    "День сприятливий для очищення організму – як на моральному, так і на фізичному рівні: для першого можна використовувати медитацію, для другого – детокс-дієту та велику кількість чистої негазованої води.",

    "Стрілець (23.11 – 21.12) Гороскоп на 1 травня для Стрільців\n" +
    "Тим, кому від самого ранку докучатиме поганий настрій, зірки наполегливо радять діяти максимально активно – як результат, ви дуже швидко забудете про те, що вас щось не влаштовувало.",

    "Козоріг (22.12 – 20.01) Гороскоп на 1 травня для Козорогів\n" +
    "Поміркуйте про те, як налагодити стосунки з близькою людиною, з якою ви посварилися через незначний привід: можливо, невеликий, але ретельно продуманий подарунок розтопить її серце.",

    "Водолій (21.01 – 18.02) Гороскоп на 1 травня для Водоліїв\n" +
    "Незважаючи на аврал на роботі, не варто присвячувати їй весь день: будь-яку можливість – навіть обідню перерву – краще використовувати для того, щоб зайнятися чимось приємним, наприклад, читанням чи в'язанням.",

    "Риби (19.02 – 20.03) Гороскоп на 1 травня для Риб\n" +
    "Сьогодні зірки рекомендують вам зробити перерву в роботі: вона необхідна для того, щоб проаналізувати ситуацію, що склалася, і підкоригувати стратегію досягнення головної мети."
];
alert(dayTexts[getRandomInt(0, (dayTexts.length - 1))]);