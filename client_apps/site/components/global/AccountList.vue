<template>
    <div class="account-service-list">
        <div class="account-service-list__description">
            <h2 class="h3 account-service-list__title">Услуги сервиса</h2>
            <p class="Body-14">Pajero Sport 2.5 TD</p>
            <p class="Body-14">Ремонт подвески</p>
            <p class="Body-14">Замена масла двигателя, промывка системы</p>
            <p class="Body-14">Диагностика электрики</p>
        </div>
        <div class="account-service-list__date-and-place">
            <h2 class="h3 account-service-list__title">12→17 ноя 2018</h2>
            <p class="Body-14">Мастер:</p>
            <ul>
                <li class="Body-14">Болконский А.Н.</li>
                <li class="Body-14">Раскольников Р.Р.</li>
            </ul>
            <p class="Body-14">Сервисный центр:</p>
            <p class="Body-14">Сибирский тракт, 2</p>
        </div>
        <div class="account-service-list__total">
            <details class="det">
                <summary class="h3 account-service-list__title">14 товаров · 5 видов работ</summary>
                <table class="account-service-list__table">
                    <tbody>
                    <tr>
                        <td class="service-list-table__name Body-14-Prime">VAG 030 115 561 AN · Фильтр масляный для двигателя</td>
                        <td class="service-list-table__quantity Tag-12-60">×10</td>
                        <td class="service-list-table__price Body-14">903 790 ₽</td>
                    </tr>
                    <tr>
                        <td class="service-list-table__name Body-14-Prime">Шина Bridgestone Hakkapeliitta 7 SUV 215/55 R18 99T, зимняя, шип</td>
                        <td class="service-list-table__quantity Tag-12-60">×1</td>
                        <td class="service-list-table__price Body-14">15 790 ₽</td>
                    </tr>
                    <tr>
                        <td class="service-list-table__name Body-14-Prime">Аккумуляторная батарея (32-45798) 45 · Amh</td>
                        <td class="service-list-table__quantity Tag-12-60">×1</td>
                        <td class="service-list-table__price Body-14">200 790 ₽</td>
                    </tr>
                    <tr>
                        <td class="service-list-table__name Body-14-Prime">Шины Б-24 «Народное достояние» ЛИТОЛ-24 банка 1л (80-А) Автопроизводитель ВОСТОК</td>
                        <td class="service-list-table__quantity Tag-12-60">×1</td>
                        <td class="service-list-table__price Body-14">17 790 ₽</td>
                    </tr>
                    <tr>
                        <td class="service-list-table__name Body-14-Prime">Снятие-установка защиты двигателя</td>
                        <td class="service-list-table__quantity Tag-12-60">×1</td>
                        <td class="service-list-table__price Body-14">190 790 ₽</td>
                    </tr>
                    </tbody>
                </table>
            </details>


        </div>
        <h2 class="h3 account-service-list__title account-service-list_last-element">903 790 ₽</h2>
    </div>
</template>

<script>
    export default {
        name: "AccountList"
    }
</script>
<!--
<style scoped>
    .account-service-list {
        position: relative;
        display: flex;
        padding: 15px;
        max-width: 855px;
        border-radius: 6px;
        box-sizing: border-box;
        transition: box-shadow .2s linear;
    }
    .account-service-list:hover {
        box-shadow: var(--shadow-6-prime);
    }
    .account-service-list__description {
        max-width: 180px;
    }
    .Body-14 {
        margin-top: 6px;
    }
    .account-service-list__total {
        margin-left: 47px;
        flex: 1;
    }

    .account-service-list__title {
        font-size: 18px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.33;
        letter-spacing: normal;
        text-align: right;
        color: var(--just_black);
        text-align: left;
    }

    .account-service-list__date-and-place {
        margin-left: 20px;
        max-width: 180px;
    }
    .account-service-list_last-element {
        position: absolute;
        top: 15px;
        right: 15px;
    }

    .account-service-list__table {
        position: relative;
    }
    .service-list-table__name {
        max-width: 338px;
        padding-left: 10px;
    }

    .service-list-table__name::before {
        content: '•';
        left: 0;
        position: absolute;
    }

    .service-list-table__quantity {
        opacity: 0.6;
        font-size: 12px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.33;
        letter-spacing: normal;
        color: var(--blueberry);
    }

    .service-list-table__price {
        color: var(--asphalt_dark);
        text-align: right;
        margin-left: 4px;
        display: block;
    }
    details {
        cursor: pointer;
    }
    details summary::-webkit-details-marker {
        display: none;
    }
</style>
-->

<style scoped>
    .account-service-list {
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        padding: 15px;
        max-width: 855px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: -webkit-box-shadow .2s linear;
        transition: -webkit-box-shadow .2s linear;
        -o-transition: box-shadow .2s linear;
        transition: box-shadow .2s linear;
        transition: box-shadow .2s linear, -webkit-box-shadow .2s linear;
    }
    .account-service-list:hover {
        -webkit-box-shadow: var(--shadow-6-prime);
        box-shadow: var(--shadow-6-prime);
    }
    .account-service-list__description {
        max-width: 180px;
    }
    .Body-14 {
        margin-top: 6px;
    }
    .account-service-list__total {
        margin-left: 47px;
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }

    .account-service-list__title {
        outline: none;
        text-align: left;
    }



    .account-service-list__date-and-place {
        margin-left: 20px;
        max-width: 180px;
    }
    .account-service-list_last-element {
        position: absolute;
        top: 15px;
        right: 15px;
    }

    .account-service-list__table {
        position: relative;
    }
    .service-list-table__name {
        max-width: 338px;
        padding-left: 10px;
    }

    .service-list-table__name::before {
        content: '•';
        left: 0;
        position: absolute;
    }

    .service-list-table__quantity {
        opacity: 0.6;
    }

    .service-list-table__price {
        color: var(--asphalt_dark);
        text-align: right;
        margin-left: 4px;
        display: block;
    }
    details {
        cursor: pointer;
    }
    details > summary::-webkit-details-marker {
        display: none;
    }
    summary.account-service-list__title::after {
        content: '▼';
        padding-left: 10px;
        font-size: 8px;
        position: absolute;
        top: 22px;
    }
    .det[open] summary.account-service-list__title::after {
        content: '▲';
        padding-left: 10px;
        font-size: 8px;
        position: absolute;
        top: 22px;
    }

    details > summary {display:block}
</style>