<template>
    <div class="container contact-nav">
        <div class="items__container">
            <div class="contacts-nav__item">
                <p class="Tag-Bold">Помощь</p>
                <ul>
                    <li><a href="#" class="contacts-nav__link Body-14">Доставка и возврат</a></li>
                    <li><a href="#" class="contacts-nav__link Body-14">Карта клиента</a></li>
                </ul>
            </div>
            <div class="contacts-nav__item">
                <p class="Tag-Bold">Подробности</p>
                <ul>
                    <li><a href="#" class="contacts-nav__link Body-14">Новости и вакансии</a></li>
                    <li><a href="#" class="contacts-nav__link Body-14">О компании</a></li>
                </ul>
            </div>
            <div class="contacts-nav__item">
                <p class="Tag-Bold">Больше с планета АВТО</p>
                <ul>
                    <li><a href="#" class="contacts-nav__link Body-14">Акции и скидки</a></li>
                    <li><a href="#" class="contacts-nav__link Body-14">Купоны</a></li>
                </ul>
            </div>
            <ul class="contacts-nav__item">
                <li><a href="#" class="contacts-nav__link Body-14">Мастерские и сервисные центры</a></li>
                <li><a href="#" class="contacts-nav__link Body-14">Партнерам и рекламодателям</a></li>
            </ul>
        </div>
        <div>
            <img src="/icons/mail.svg" alt="напишите нам письмо">
            <img src="/icons/vk.svg" alt="напишите нам в VK">
        </div>
    </div>
</template>

<script>
    export default {
        name: "ContactLists"
    }
</script>

<style scoped>
    .contacts-nav {
        margin-top: 160px;
    }

    .contacts-nav__link {
        text-decoration: none;
    }

    .contacts-nav__link:hover {
        text-decoration: none;
    }

    .contacts-nav > .row {
        justify-content: space-between;
    }

    .contacts-nav .row {
        align-items: flex-end;
    }

    .contacts-nav__item {
        margin-right: 24px;
    }

    .contacts-nav__lists-container {
        display: flex;
        align-items: flex-end;
    }

    .items__container {
        display: flex;
        align-items: flex-end;
    }

    .contact-nav {
        margin-top: 160px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }

    .contact-lists__icons {
        margin-right: -15px;
    }
</style>