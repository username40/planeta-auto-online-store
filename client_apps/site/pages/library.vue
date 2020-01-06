<template>
    <div>
        <app-header/>
        <app-header searchMenu="true"/>
        <div class="container">
            <h3 class="h3">Header</h3>
            <br>
            <p class="Body-16">Быстрое подключение:</p>
            <br>
            <p class="Body-18-Prime">import Header from '~/components/global/headers/Header'</p>
            <br>
            <p class="Body-16">В components</p>
            <p class="Body-18-Prime">appHeader: Header</p>
            <br>
            <p class="Body-16">Внутри template</p>
            <p class="Body-18-Prime"><span><</span>app-header/<span>></span></p>
            <br>
            <p class="Body-16">Props:</p>
            <table class="table">
                <thead>
                    <tr class="table__row table__header">
                        <th class="Body-16 table__cell">Название</th>
                        <th class="Body-16 table__cell">Тип Данных</th>
                        <th class="Body-16 table__cell">default</th>
                        <th class="Body-16 table__cell">Для чего</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="table__row">
                        <td class="Body-16 table__cell">searchMenu</td>
                        <td class="Body-16 table__cell">boolean</td>
                        <td class="Body-16 table__cell">false</td>
                        <td class="Body-16 table__cell">отображение поисковой строки</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p class="Body-16">Пример вызова компонента</p>
            <p class="Body-18-Prime"><span><</span>app-header searchMenu="true"/<span>></span></p>
            <p class="Body-16"></p>
        </div>


    </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'
    export default {
        name: "library",
        components: {
            appHeader: Header
        },
        data() {
            return {

            }
        }
    }
</script>

<style scoped>
    .table {
        width: 100%;
        border: 1px solid var(--asphalt);
    }
    .table__header {
        background-color: var(--snow);
    }
    .table__row {
        border: 1px solid var(--asphalt);
    }

    .table__cell {
        border: 1px solid var(--asphalt);
        padding: 5px;
    }
</style>