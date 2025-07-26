<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Имя и Имя. Приглашение на свадьбу.</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="//fonts.googleapis.com/css?family=Comfortaa&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
  <style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: auto;
        font-family: 'Comfortaa', cursive;
    }

    .my_bg {
        background-image: url('images/3b.jpg');
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-repeat: no-repeat;
        background-position: top center;
        z-index: -2;
        filter: brightness(0.6);
    }

    .content {
        position: relative;
        z-index: 1;
        min-height: 100vh; /* Минимум на экран, но можно больше */
        display: flex;
        flex-direction: column; /* Строим элементы сверху вниз */
        align-items: center; /* Центрируем по горизонтали */
        color: #000;
    }

    .centered {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .name {
        margin-top: 50px;
        width: min(90vw, 600px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }


    .dearguests {
        margin-bottom: 2vh;
        width: min(90vw, 600px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .arrow {
        margin-top: -5vh;
        font-size: clamp(100px, 2.5vw, 150px);
        animation: bounce 2s infinite;
        color: #bb9862;
    }

    .main {
        width: 100%;                    /* Блок занимает всю ширину */
        background-color: rgba(0, 0, 0, 0.5); /* Полупрозрачный черный фон */
        color: white;                   /* Белый текст */
        padding: 20px;                  /* Отступы внутри блока */
        box-sizing: border-box;         /* Учитываем отступы внутри блока */
        text-align: center;             /* Текст по центру */
    }

    .music-toggle {
        background-color: rgba(255, 255, 255, 0.0); /* Прозрачный фон */
        border-radius: 20px; /* Закруглённые края */
        padding: 20px 25px;
        max-width: 200px;
        margin-left: auto;
        margin-right: auto;
        align-items: center;
        cursor: pointer;
        user-select: none;
        transition: all 0.3s ease;
        backdrop-filter: blur(5px); /* Эффект размытия для лучшей читаемости */
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 3vh;
    }
    
    .music-toggle:hover {
        background-color: rgba(255, 255, 255, 0.4);
    }
    
    .icon {
        font-size: 24px;
        margin-bottom: 8px;
    }
    
    .text {
        /* font-family: Arial, sans-serif; */
        font-family: 'Comfortaa', cursive;
        font-size: 14px;
        color: white;
    }

    .text-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: 20px;
    }

    .guest-text {
        max-width: 500px;
        color: #ffffff;
        font-size: clamp(16px, 2.5vw, 24px);
        font-family: 'Comfortaa', cursive;
        line-height: 25px;
        font-weight: 400;
    }

    .details-text {
        max-width: 800px;
        color: #ffffff;
        font-size: clamp(16px, 2.5vw, 24px);
        font-family: 'Comfortaa', cursive;
        line-height: 25px;
        font-weight: 400;
    }

    .contacts-text {
        max-width: 800px;
        color: #ffffff;
        font-size: clamp(18px, 2.5vw, 32px); 
        font-family: 'Comfortaa', cursive;
        font-weight: 400;
        margin-top: -2vh;
    }
    

    .date {
        margin-top: 2vh;
        margin-bottom: 2vh;
        width: min(90vw, 600px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .wait {
        margin-top: 2vh;
        margin-bottom: 2vh;
        width: min(90vw, 600px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .countdown-wrapper {
        width: min(90vw, 400px);
        padding: 10px;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        margin-left: auto;
        margin-right: auto;
    }

    .countdown {
        display: flex;
        gap: 20px;
    }

    .circle {
        width: min(15vw, 100px); /* меньше делаем 22% ширины */
        height: min(15vw, 100px);
        border: 5px solid #bb9862;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-weight: bold;
    }

    .number {
        font-size: clamp(10px, 5vw, 24px); /* Шрифт адаптивный */
        font-family: 'Comfortaa', cursive;
    }

    .label {
        font-family: 'Comfortaa', cursive;
        font-size: clamp(10px, 2.5vw, 14px); /* Шрифт адаптивный */
        margin-top: 5px;
    }

    .joint {
        margin-top: 2vh;
        margin-bottom: 2vh;
        width: min(90vw, 600px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .plan {
        margin-top: 2vh;
        margin-bottom: 2vh;
        width: min(90vw, 450px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .img-center {
        margin-top: 2vh;
        margin-bottom: 2vh;
        width: min(90vw, 450px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }


    .timeline {
        position: relative;
        width: 100%;
        max-width: 600px;
        margin: 50px auto;
        padding: 20px 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 50%;
        width: 4px;
        background: #bb9862;
        transform: translateX(-50%);
    }

    .timeline-start-dot,
    .timeline-end-dot {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 20px;
        background: #bb9862;
        border: 3px solid #bb9862;
        border-radius: 50%;
        z-index: 1;
    }

    .timeline-start-dot {
        top: 0;
    }

    .timeline-end-dot {
        bottom: 0;
    }

    .timeline-event {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 50px 0;
        position: relative;
    }

    .timeline-time {
        width: 45%;
        text-align: right;
        padding-right: 20px;
        font-size: clamp(16px, 5vw, 28px);
        color: white;
    }

    .timeline-content {
        width: 45%;
        padding-left: 20px;
        font-size: clamp(16px, 5vw, 28px);
        color: white;
        text-align: left;
    }

    .location {
        margin-top: 2vh;
        margin-bottom: 2vh;
        width: min(90vw, 450px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .toggle-button {
        background-color: rgba(255, 255, 255, 0.0); /* Прозрачный фон */
        border-radius: 20px; 
        padding: 20px 25px;
        max-width: 200px;
        margin-left: auto;
        margin-right: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        user-select: none;
        transition: all 0.3s ease;
        border: 1px solid #bb9862;
        margin-bottom: 3vh;
    }

    .toggle-button:hover {
        background-color: rgba(255, 255, 255, 0.4);
    }

    .toggle-button .icon {
        font-size: 24px;
        margin-bottom: 8px;
    }

    .toggle-button .text {
        font-family: 'Comfortaa', cursive;
        font-size: 20px;
        color: white;
    }


    .toggle-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease;
        margin-top: 20px;
        text-align: center;
    }

    /* Когда открыто */
    .toggle-content.open {
        max-height: 500px; /* Подбери нужную высоту побольше, чтобы вместить контент */
    }



    /* Внутренний блок карты */
    .map-placeholder {
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 10px;
        color: white;
        text-align: center;
    }

    .details {
        margin-top: 2vh;
        margin-bottom: 2vh;
        width: min(90vw, 450px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .anketa {
        margin-top: 2vh;
        margin-bottom: 2vh;
        width: min(90vw, 450px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .survey-form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        color: white;
        font-family: 'Comfortaa', cursive;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 10px;
        font-size: 16px;
        margin-top: 30px;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        background: transparent;
        border: 2px solid #bb9862;
        border-radius: 10px;
        color: white;
        font-size: 16px;
        box-sizing: border-box;
    }

    .radio-wrapper,
    .checkbox-wrapper {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .radio-wrapper input[type="radio"],
    .checkbox-wrapper input[type="checkbox"] {
        display: none;
    }

        /* Кастомный радиобаттон */
    .custom-radio {
        width: 18px;
        height: 18px;
        border: 2px solid #bb9862;
        border-radius: 50%;
        margin-right: 10px;
        position: relative;
    }

    .radio-wrapper input[type="radio"]:checked + .custom-radio::after {
        content: '';
        width: 10px;
        height: 10px;
        background: #bb9862;
        border-radius: 50%;
        position: absolute;
        top: 3px;
        left: 3px;
    }

    /* Кастомный чекбокс */
    .custom-checkbox {
        width: 18px;
        height: 18px;
        border: 2px solid #bb9862;
        margin-right: 10px;
        position: relative;
    }

    .checkbox-wrapper input[type="checkbox"]:checked + .custom-checkbox::after {
        content: ''; /* стандартная галочка */
        width: 10px;
        height: 10px;
        background: #bb9862;
        position: absolute;
        top: 3px;
        left: 3px;
    }


    /* Кнопка */
    .submit-button {
        background-color: rgba(255, 255, 255, 0);
        border: 2px solid #bb9862;
        border-radius: 20px;
        padding: 10px 20px;
        color: white;
        font-family: 'Comfortaa', cursive;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(5px);
    }

    .submit-button:hover {
        background-color: rgba(255, 255, 255, 0.4);
    }


    .contacts {
        margin-top: 2vh;
        margin-bottom: 2vh;
        width: min(90vw, 600px); /* максимум 600px, но не больше 90% ширины экрана */
        height: auto;            /* сохраняем пропорции картинки */
        object-fit: contain;
        padding: 10px;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }


    /* Мобильные экраны (ширина до 768px — подберите по своему) */
    @media (max-width: 768px) {
        .my_bg {
            background-image: url('images/3b.jpg');
            background-size: cover;           /* масштабируем так, чтобы заполнить всё */
            background-position: center center; /* центрируем по обеим осям */
        }
        .name {
            width: 90vw;
        }
    }

    @media (min-width: 769px) {

        .my_bg {
            background-image: url('images/bg-hight.png');
            background-size: cover;           /* масштабируем так, чтобы заполнить всё */
            background-position: center center; /* центрируем по обеим осям */
        }
    }
    @keyframes bounce {
      0%,100% { transform: translateY(0); }
      50%    { transform: translateY(-4vh); }
    }
    
  </style>
</head>
<body>

  <div class="my_bg"></div>

  <div class="content">
    <div class="centered">
        <img class="name"src="images/name.png"> </img>
        <!-- <div class="arrow">&#8595;</div> -->
        <div class="main">
            <img class="dearguests" src="images/guest.png"></img>
            <!-- Кнопка переключения музыки -->
            <div class="music-toggle" id="musicToggle">
                <div class="icon">
                    <i class="fas fa-volume-up"></i>
                </div>
                <div class="text">Включить музыку</div>
            </div>
            
            <audio id="backgroundMusic" loop>
                <source src="music.mp3" type="audio/mpeg">
                Ваш браузер не поддерживает аудио элемент.
            </audio>

            <div class="text-wrapper">
                <p class="guest-text">
                    <strong>
                    Один день в этом году будет для нас
                    <br>
                    особенным и мы хотим провести его
                    <br>
                    в кругу близких и друзей
                    <br>
                    С большим удовольствием
                    <br>
                    приглашаем вас на<br>
                    знаменательный праздник - нашу свадьбу!
                    </strong>
                </p>
            </div>
            <img class="date" src="images/date.png"></img>
            <img class="wait" src="images/wait.png"></img>
            <div class="countdown-wrapper">
                <div class="countdown">
                    <div class="circle">
                    <div class="number" id="days">0</div>
                    <div class="label">дней</div>
                    </div>
                    <div class="circle">
                    <div class="number" id="hours">0</div>
                    <div class="label">часов</div>
                    </div>
                    <div class="circle">
                    <div class="number" id="minutes">0</div>
                    <div class="label">минут</div>
                    </div>
                    <div class="circle">
                    <div class="number" id="seconds">0</div>
                    <div class="label">секунд</div>
                    </div>
                </div>
            </div>

            <img class="joint" src="images/3.jpg"></img>
            <img class="plan" src="images/plan.png"></img>

            <div class="timeline">
                <div class="timeline-start-dot"></div>
              
                <div class="timeline-event">
                  <div class="timeline-time">16:00</div>
                  <div class="timeline-content">Сбор гостей</div>
                </div>
              
                <div class="timeline-event">
                  <div class="timeline-time">17:00</div>
                  <div class="timeline-content">Банкет</div>
                </div>
              
                <div class="timeline-event">
                  <div class="timeline-time">23:00</div>
                  <div class="timeline-content">Праздничный фейерверк</div>
                </div>
              
                <div class="timeline-end-dot"></div>
            </div>
              


            <img class="location" src="images/location.png"></img>
              
            <div class="text-wrapper">
                <p class="guest-text">
                    Банкетный зал "Золотой замок"<br>
                    г. Минусинск
                </p>
            </div>

            <div class="toggle-button" id="mapToggle">
                <div class="text">Карта ⮞</div>
            </div>

            <div class="toggle-content" id="mapContent">
                <!-- Здесь будет карта -->
                <div class="map-placeholder">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ad4cbdb1d7bfb6b734d85401885a663a266fd104a2304c0e754ad0ea021a617a6&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>
                </div>
            </div>

            <div class="text-wrapper">
                <p class="guest-text">
                    Второй день на базе отдыха<br>"Рыжий лис"<br>
                    Начало в 15:00
                </p>
            </div>
            


            <img class="details" src="images/details.png"></img>
            <div class="text-wrapper">
                <p class="details-text">
                    Мы знаем, что на свадьбе принято дарить цветы,<br>
                    но так как у нас не будет возможности<br>
                    разместить большое количество букетов дома, свою<br>
                    любовь и радость можете выразить в виде бутылочки<br>
                    вина для наших романтических вечеров
                </p>
            </div>



            <img class="anketa" src="images/anketa.png"></img>
            <form id="surveyForm" class="survey-form">
                <!-- ФИО -->
                <div class="form-group">
                  <label for="fullname" class="form-label">Напишите, пожалуйста, Ваши ФИО</label>
                  <input type="text" id="fullname" name="fullname" class="form-input" required>
                </div>
              
                <!-- Присутствие -->
                <div class="form-group">
                  <p class="form-label">Сможете ли присутствовать на нашем торжестве?</p>
                  <label class="radio-wrapper">
                    <input type="radio" name="attendance" value="Я с удовольствием приду" required>
                    <span class="custom-radio"></span> Я с удовольствием приду
                  </label>
                  <label class="radio-wrapper">
                    <input type="radio" name="attendance" value="Буду со своей парой">
                    <span class="custom-radio"></span> Буду со своей парой
                  </label>
                  <label class="radio-wrapper">
                    <input type="radio" name="attendance" value="К сожалению, не смогу присутствовать">
                    <span class="custom-radio"></span> К сожалению, не смогу присутствовать
                  </label>
                  <!-- <label class="radio-wrapper">
                    <input type="radio" name="attendance" value="Сообщу позже">
                    <span class="custom-radio"></span> Сообщу позже
                  </label> -->
                </div>
              
                <!-- Напитки -->
                <!-- <div class="form-group">
                  <p class="form-label">Что предпочитаете из напитков?</p>
                  <label class="checkbox-wrapper">
                    <input type="checkbox" name="drinks" value="Красное вино">
                    <span class="custom-checkbox"></span> Красное вино
                  </label>
                  <label class="checkbox-wrapper">
                    <input type="checkbox" name="drinks" value="Белое вино">
                    <span class="custom-checkbox"></span> Белое вино
                  </label>
                  <label class="checkbox-wrapper">
                    <input type="checkbox" name="drinks" value="Шампанское">
                    <span class="custom-checkbox"></span> Шампанское
                  </label>
                  <label class="checkbox-wrapper">
                    <input type="checkbox" name="drinks" value="Водка">
                    <span class="custom-checkbox"></span> Водка
                  </label>
                  <label class="checkbox-wrapper">
                    <input type="checkbox" name="drinks" value="Самогон">
                    <span class="custom-checkbox"></span> Самогон
                  </label>
                  <label class="checkbox-wrapper">
                    <input type="checkbox" name="drinks" value="Не пью алкоголь">
                    <span class="custom-checkbox"></span> Не пью алкоголь
                  </label>
                </div> -->
              
                <!-- Кнопка отправить -->
                <button id="submit-button" type="submit" class="submit-button">Отправить</button>
              </form>



              <img class="contacts" src="images/contacts.png"></img>

              <div class="text-wrapper">
                <p class="contacts-text">
                    Жених: номер
                    <br>
                    Невеста: номер
                </p>
            </div>

        </div>

    </div>
    
  </div>

  

  <script>

    const mapToggle = document.getElementById('mapToggle');
    const mapContent = document.getElementById('mapContent');

    mapToggle.addEventListener('click', function() {
        mapContent.classList.toggle('open');
    });



    const musicToggle = document.getElementById('musicToggle');
    const icon = musicToggle.querySelector('.icon i');
    const text = musicToggle.querySelector('.text');
    const audio = document.getElementById('backgroundMusic');
    
    let isMusicOn = false;
    
    musicToggle.addEventListener('click', function () {
        isMusicOn = !isMusicOn;
    
        if (isMusicOn) {
            icon.classList.remove('fa-volume-up');
            icon.classList.add('fa-volume-mute');
            text.textContent = 'Выключить музыку';
            audio.play();
        } else {
            icon.classList.remove('fa-volume-mute');
            icon.classList.add('fa-volume-up');
            text.textContent = 'Включить музыку';
            audio.pause();
        }
    });

</script>

<script>
    function pluralize(number, forms) {
      number = Math.abs(number) % 100;
      const n1 = number % 10;
      if (number > 10 && number < 20) return forms[2];
      if (n1 > 1 && n1 < 5) return forms[1];
      if (n1 == 1) return forms[0];
      return forms[2];
    }
  
    function updateCountdown() {
      const targetDate = new Date('2025-06-06T10:00:00Z'); // 17:00 Красноярск
      const now = new Date();
      const diff = targetDate - now;
  
      if (diff <= 0) {
        document.getElementById('days').textContent = '0';
        document.getElementById('hours').textContent = '0';
        document.getElementById('minutes').textContent = '0';
        document.getElementById('seconds').textContent = '0';
        return;
      }
  
      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
      const minutes = Math.floor((diff / (1000 * 60)) % 60);
      const seconds = Math.floor((diff / 1000) % 60);
  
      document.getElementById('days').textContent = days;
      document.getElementById('hours').textContent = hours;
      document.getElementById('minutes').textContent = minutes;
      document.getElementById('seconds').textContent = seconds;
  
      document.querySelector('#days + .label').textContent = pluralize(days, ['день', 'дня', 'дней']);
      document.querySelector('#hours + .label').textContent = pluralize(hours, ['час', 'часа', 'часов']);
      document.querySelector('#minutes + .label').textContent = pluralize(minutes, ['минута', 'минуты', 'минут']);
      document.querySelector('#seconds + .label').textContent = pluralize(seconds, ['секунда', 'секунды', 'секунд']);
    }
  
    setInterval(updateCountdown, 1000);
    updateCountdown();
  </script>

  <script>
document.getElementById('surveyForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const fullname = document.getElementById('fullname').value;
    const attendance = document.querySelector('input[name="attendance"]:checked')?.value || 'Не выбрано';

    const formData = new FormData();
    formData.append('fullname', fullname);
    formData.append('attendance', attendance);

    fetch('send.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // alert(data); // Сообщение от сервера
    })
    .catch(error => {
        alert('Ошибка отправки');
        console.error(error);
    });

    const submitButton = document.getElementById('submit-button');

    // Эффект затухания
    submitButton.style.transition = 'opacity 0.5s ease';
    submitButton.style.opacity = '0.5';

    // Через 0.5 сек — деактивировать
    setTimeout(() => {
        submitButton.disabled = true;
        submitButton.innerText = "Ответ принят";
        submitButton.style.opacity = '0.3'; // Можно ещё уменьшить
    }, 500);

    alert("Спасибо за ответ");
});
</script>
</body>
</html>
