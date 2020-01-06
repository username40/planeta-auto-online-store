<template>
    <div id="app">
            <app-hint>
                <template v-slot:hintText>Найдите моторное масло и добавьте его в корзину. Оформите покупку.</template>
            </app-hint>
        <app-header-no-search class="header_white-background">
            <template v-slot:GeolocationCityName>Екатеринбург</template>
            <template v-slot:Entry>Войти</template>
        </app-header-no-search>
        <div class="container mt20px">
            <app-mini-search></app-mini-search>
            <div class="bread-crumbs mt10px">
                <p class="Tag-12">
                    <nuxt-link to="/prototypes/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/prototypes/catalog" class="Tag-12">Каталог</nuxt-link>

                </span>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Все разделы
                </span>
                </p>
            </div>
        </div>
        <main class="content-container container mt20px">
            <div class="row">
                <aside class="aside-lists col-3">
                    <nav class="aside-link-nav first-link-nav">
                        <h3 class="h3">Запчасти</h3>
                        <ul class="aside-link-list first-link-list">
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Двигатель</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Электрика</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Кузоные детали</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Автосвет</nuxt-link>
                            </li>
                        </ul>
                        <ul class="aside-link-list" v-show="showListParts">
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Двигатель</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Электрика</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Кузоные детали</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Автосвет</nuxt-link>
                            </li>
                        </ul>
                        <button class="aside-link-list__show-more-btn Body-16-Prime" @click.prevent="showListParts = !showListParts" v-show="!showListParts">
                            <span>Ещё 12 </span>
                            <img
                                    src="/icons/breadcrumbs-arrow-right.svg"
                                    alt="" class="show-more-list-links">
                        </button>

                    </nav>
                    <nav class="aside-link-nav mt20px">
                        <h3 class="h3">Шины и диски</h3>
                        <ul class="aside-link-list mt10px first-link-list">
                            <li class="aside-link-list__item">
                                <a href="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Шины</a>
                            </li>
                            <li class="aside-link-list__item">
                                <a href="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Диски</a>
                            </li>
                            <li class="aside-link-list__item">
                                <a href="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Шпильки, болты и секретки</a>
                            </li>
                            <li class="aside-link-list__item">
                                <a href="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Камеры и ободные ленты</a>
                            </li>
                        </ul>
                        <ul class="aside-link-list" v-show="showListTyres">
                            <li class="aside-link-list__item">
                                <a href="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Шины</a>
                            </li>
                            <li class="aside-link-list__item">
                                <a href="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Диски</a>
                            </li>
                            <li class="aside-link-list__item">
                                <a href="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Шпильки, болты и секретки</a>
                            </li>
                            <li class="aside-link-list__item">
                                <a href="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Камеры и ободные ленты</a>
                            </li>
                        </ul>
                        <button class="aside-link-list__show-more-btn Body-16-Prime" @click.prevent="showListTyres = !showListTyres" v-show="!showListTyres">
                            <span>Ещё 4 </span>
                            <img
                                    src="/icons/breadcrumbs-arrow-right.svg"
                                    alt="" class="show-more-list-links">
                        </button>
                    </nav>
                    <nav class="aside-link-nav mt20px">
                        <h3 class="h3">Инструменты</h3>
                        <ul class="aside-link-list mt10px first-link-list">
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Домкраты и подставки</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Наборы инстументов</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Толщиметры</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Ключи</nuxt-link>
                            </li>
                        </ul>
                        <ul class="aside-link-list" v-show="showListTools">
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Домкраты и подставки</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Наборы инстументов</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Толщиметры</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Ключи</nuxt-link>
                            </li>
                        </ul>
                        <button class="aside-link-list__show-more-btn Body-16-Prime" @click.prevent="showListTools = !showListTools" v-show="!showListTools">
                            <span>Ещё 7 </span>
                            <img
                                    src="/icons/breadcrumbs-arrow-right.svg"
                                    alt="" class="show-more-list-links">
                        </button>
                    </nav>
                    <nav class="aside-link-nav mt20px">
                        <h3 class="h3">Масла и тех. жидкости</h3>
                        <ul class="aside-link-list mt10px first-link-list">
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Моторные масла</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Трансмиссионные масла</nuxt-link>
                            </li>
                            <li class="aside-link-list__item">
                                <nuxt-link to="/prototypes/catalog" class="Body-16 aside-link-list__item-link">Антифризы</nuxt-link>
                            </li>
                        </ul>
                    </nav>
                    <nav class="aside-link-nav mt20px">
                        <h3 class="h3">Товары для ТО</h3>
                        <ul class="aside-link-list mt10px">
                            <li class="aside-link-list__item">
                                <h4 class="Body-18">Масла и жидкости</h4>
                                <div class="aside-link-list__item-links-container Tag-12-60">
                                <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Гидравлическая жидкость</nuxt-link><span> · </span>
                                <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Смазки</nuxt-link><span> · </span>
                                <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Очистители</nuxt-link><span> · </span>
                                <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Проводка и электрика</nuxt-link><span> · </span>
                                <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Детали салона</nuxt-link><span> · </span>
                                <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Тюнинг</nuxt-link><span> · </span>
                                </div>
                            </li>
                            <li class="aside-link-list__item">
                                <h4>Фильтры</h4>
                                <div class="aside-link-list__item-links-container Tag-12-60">
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Гидравлическая жидкость</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Смазки</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Очистители</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Проводка и электрика</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Детали салона</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Тюнинг</nuxt-link><span> · </span>
                                </div>
                            </li>
                            <li class="aside-link-list__item">
                                <h4>Расходные материалы</h4>
                                <div class="aside-link-list__item-links-container Tag-12-60">
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Гидравлическая жидкость</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Смазки</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Очистители</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Проводка и электрика</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Детали салона</nuxt-link><span> · </span>
                                    <nuxt-link to="/prototypes/catalog" class="Tag-12-60 aside-link-list__item-link">Тюнинг</nuxt-link><span> · </span>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <h3 class="h3 mt20px">Ближайшие магазины</h3>
                    <img class="aside-map__picture mt10px" src="/demo-images/small-map-for-aside.jpg" alt="мини карта">
                </aside>
                <div class="content col-9">
                    <article class="popular-categories">
                        <h2 class="h1">Популярные категории товаров</h2>
                        <div class="popular-categories__container">
                            <nuxt-link to="/prototypes/catalog" class="popular-categories__item">
                                <img src="/demo-images/pop-cat-01.jpg" alt="" class="popular-categories__item-background">
                                <p class="H2-White popular-categories__item-title">Шины</p>
                                <span class="gradient-bottom"></span>
                            </nuxt-link>
                            <nuxt-link to="/prototypes/catalog" class="popular-categories__item">
                                <img src="/demo-images/pop-cat-02.jpg" alt="" class="popular-categories__item-background">
                                <p class="H2-White popular-categories__item-title">Масла и Жидкости</p>
                                <span class="gradient-bottom"></span>
                            </nuxt-link>
                            <nuxt-link to="/prototypes/catalog" class="popular-categories__item">
                                <img src="/demo-images/pop-cat-03.jpg" alt="" class="popular-categories__item-background">
                                <p class="H2-White popular-categories__item-title">Аккумуляторы</p>
                                <span class="gradient-bottom"></span>
                            </nuxt-link>
                            <nuxt-link to="/prototypes/catalog" class="popular-categories__item">
                                <img src="/demo-images/pop-cat-04.jpg" alt="" class="popular-categories__item-background">
                                <p class="H2-White popular-categories__item-title">Радардетекторы</p>
                                <span class="gradient-bottom"></span>
                            </nuxt-link>
                            <nuxt-link to="/prototypes/catalog" class="popular-categories__item">
                                <img src="/demo-images/pop-cat-05.jpg" alt="" class="popular-categories__item-background">
                                <p class="H2-White popular-categories__item-title">Диски</p>
                                <span class="gradient-bottom"></span>
                            </nuxt-link>
                            <nuxt-link to="/prototypes/catalog" class="popular-categories__item">
                                <img src="/demo-images/pop-cat-06.jpg" alt="" class="popular-categories__item-background">
                                <p class="H2-White popular-categories__item-title">Электрика</p>
                                <span class="gradient-bottom"></span>
                            </nuxt-link>
                        </div>
                    </article>
                    <article class="discounts-and-supersales mt90px">
                        <h2 class="h1">Скидки и акции</h2>
                        <div class="discounts-and-supersales__container">
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/01.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 1л A3/B4 (синт.)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/02.png" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 4л A3/B4(синт.).</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/03.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 0w30 A3/B4 1л (синт)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/04.png" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 синт. 1л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/05.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 синт. 4л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/06.png" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w30 синт. 5л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/07.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 0w-20 (1л)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                        </div>
<!--                        <carousel v-if="isNuxtReady" :loop="true" :margin="30" :items="3.4" :dots="false" >-->
<!--                            <app-good-item-grid>-->
<!--                                <template v-slot:image>-->
<!--                                    <img src="/demo-images/oils/01.jpg" alt="изображение товара" style="width: 190px; height: 190px">-->
<!--                                </template>-->
<!--                                <template v-slot:priceButton>-->
<!--                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>-->
<!--                                </template>-->
<!--                                <template v-slot:discountTag>-->
<!--                                    <div>-->
<!--                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>-->
<!--                                        <app-discount-label-drop-down></app-discount-label-drop-down>-->
<!--                                    </div>-->
<!--                                </template>-->
<!--                                <template v-slot:goodName>Масло моторное 5w40 1л A3/B4 (синт.)</template>-->
<!--                                <template v-slot:goodsCategory>Масла</template>-->
<!--                            </app-good-item-grid>-->
<!--                            <app-good-item-grid>-->
<!--                                <template v-slot:image>-->
<!--                                    <img src="/demo-images/oils/02.png" alt="изображение товара" style="width: 190px; height: 190px">-->
<!--                                </template>-->
<!--                                <template v-slot:priceButton>-->
<!--                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>-->
<!--                                </template>-->
<!--                                <template v-slot:discountTag>-->
<!--                                    <div>-->
<!--                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>-->
<!--                                        <app-discount-label-drop-down></app-discount-label-drop-down>-->
<!--                                    </div>-->
<!--                                </template>-->
<!--                                <template v-slot:goodName>Масло моторное 5w40 4л A3/B4(синт.).</template>-->
<!--                                <template v-slot:goodsCategory>Масла</template>-->
<!--                            </app-good-item-grid>-->
<!--                            <app-good-item-grid>-->
<!--                                <template v-slot:image>-->
<!--                                    <img src="/demo-images/oils/03.jpg" alt="изображение товара" style="width: 190px; height: 190px">-->
<!--                                </template>-->
<!--                                <template v-slot:priceButton>-->
<!--                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>-->
<!--                                </template>-->
<!--                                <template v-slot:discountTag>-->
<!--                                    <div>-->
<!--                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>-->
<!--                                        <app-discount-label-drop-down></app-discount-label-drop-down>-->
<!--                                    </div>-->
<!--                                </template>-->
<!--                                <template v-slot:goodName>Масло моторное 0w30 A3/B4 1л (синт)</template>-->
<!--                                <template v-slot:goodsCategory>Масла</template>-->
<!--                            </app-good-item-grid>-->
<!--                            <app-good-item-grid>-->
<!--                                <template v-slot:image>-->
<!--                                    <img src="/demo-images/oils/04.png" alt="изображение товара" style="width: 190px; height: 190px">-->
<!--                                </template>-->
<!--                                <template v-slot:priceButton>-->
<!--                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>-->
<!--                                </template>-->
<!--                                <template v-slot:discountTag>-->
<!--                                    <div>-->
<!--                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>-->
<!--                                        <app-discount-label-drop-down></app-discount-label-drop-down>-->
<!--                                    </div>-->
<!--                                </template>-->
<!--                                <template v-slot:goodName>Масло моторное 5w40 синт. 1л</template>-->
<!--                                <template v-slot:goodsCategory>Масла</template>-->
<!--                            </app-good-item-grid>-->
<!--                            <app-good-item-grid>-->
<!--                                <template v-slot:image>-->
<!--                                    <img src="/demo-images/oils/05.jpg" alt="изображение товара" style="width: 190px; height: 190px">-->
<!--                                </template>-->
<!--                                <template v-slot:priceButton>-->
<!--                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>-->
<!--                                </template>-->
<!--                                <template v-slot:discountTag>-->
<!--                                    <div>-->
<!--                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>-->
<!--                                        <app-discount-label-drop-down></app-discount-label-drop-down>-->
<!--                                    </div>-->
<!--                                </template>-->
<!--                                <template v-slot:goodName>Масло моторное 5w40 синт. 4л</template>-->
<!--                                <template v-slot:goodsCategory>Масла</template>-->
<!--                            </app-good-item-grid>-->
<!--                            <app-good-item-grid>-->
<!--                                <template v-slot:image>-->
<!--                                    <img src="/demo-images/oils/06.png" alt="изображение товара" style="width: 190px; height: 190px">-->
<!--                                </template>-->
<!--                                <template v-slot:priceButton>-->
<!--                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>-->
<!--                                </template>-->
<!--                                <template v-slot:discountTag>-->
<!--                                    <div>-->
<!--                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>-->
<!--                                        <app-discount-label-drop-down></app-discount-label-drop-down>-->
<!--                                    </div>-->
<!--                                </template>-->
<!--                                <template v-slot:goodName>Масло моторное 5w30 синт. 5л</template>-->
<!--                                <template v-slot:goodsCategory>Масла</template>-->
<!--                            </app-good-item-grid>-->
<!--                            <app-good-item-grid>-->
<!--                                <template v-slot:image>-->
<!--                                    <img src="/demo-images/oils/07.jpg" alt="изображение товара" style="width: 190px; height: 190px">-->
<!--                                </template>-->
<!--                                <template v-slot:priceButton>-->
<!--                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>-->
<!--                                </template>-->
<!--                                <template v-slot:discountTag>-->
<!--                                    <div>-->
<!--                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>-->
<!--                                        <app-discount-label-drop-down></app-discount-label-drop-down>-->
<!--                                    </div>-->
<!--                                </template>-->
<!--                                <template v-slot:goodName>Масло моторное 0w-20 (1л)</template>-->
<!--                                <template v-slot:goodsCategory>Масла</template>-->
<!--                            </app-good-item-grid>-->
<!--                        </carousel>-->
                    </article>
                    <article class="discounts-and-supersales mt90px">
                        <h2 class="h1">Популярные товары</h2>
                        <div class="discounts-and-supersales__container">
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/08.png" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 1л A3/B4 (синт.)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/09.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 4л A3/B4(синт.).</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/10.png" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 0w30 A3/B4 1л (синт)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/11.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 синт. 1л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/12.png" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 синт. 4л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/13.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w30 синт. 5л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/14.png" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 0w-20 (1л)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                        </div>
                    </article>
                    <article class="discounts-and-supersales mt90px">
                        <h2 class="h1">Сезонная распродажа</h2>
                        <div class="discounts-and-supersales__container">
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/15.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 1л A3/B4 (синт.)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/16.png" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 4л A3/B4(синт.).</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/17.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 0w30 A3/B4 1л (синт)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/18.png" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 синт. 1л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/19.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 синт. 4л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/20.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w30 синт. 5л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/21.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 0w-20 (1л)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                        </div>
                    </article>
                    <article class="discounts-and-supersales mt90px">
                        <h2 class="h1">Моторные масла со скидками</h2>
                        <div class="discounts-and-supersales__container">
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/22.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 1л A3/B4 (синт.)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/23.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 4л A3/B4(синт.).</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/24.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 0w30 A3/B4 1л (синт)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/25.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 синт. 1л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/26.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w40 синт. 4л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/27.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 5w30 синт. 5л</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                            <app-good-item-grid>
                                <template v-slot:image>
                                    <img src="/demo-images/oils/28.jpg" alt="изображение товара" style="width: 190px; height: 190px">
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button :class="'price-button_just-white'">102 790 ₽</app-price-button>
                                </template>
                                <template v-slot:discountTag>
                                    <div>
                                        <app-discount-tag :class="'discount-tag_azalea'">−10%</app-discount-tag>
                                        <app-discount-label-drop-down></app-discount-label-drop-down>
                                    </div>
                                </template>
                                <template v-slot:goodName>Масло моторное 0w-20 (1л)</template>
                                <template v-slot:goodsCategory>Масла</template>
                            </app-good-item-grid>
                        </div>
                    </article>
                    <article class="brands">
                        <a href="#"><img src="/demo-images/brands-logo/nokian.svg" alt="бренд лого"></a>
                        <a href="#"><img src="/demo-images/brands-logo/yokohama.svg" alt="бренд лого"></a>
                        <a href="#"><img src="/demo-images/brands-logo/michelin.svg" alt="бренд лого"></a>
                        <a href="#"><img src="/demo-images/brands-logo/lukoil.svg" alt="бренд лого"></a>
                        <a href="#"><img src="/demo-images/brands-logo/castrol.svg" alt="бренд лого"></a>
                    </article>
                </div>
            </div>
        </main>

    </div>
</template>

<script>
    import HeaderNoSearch from '~/components/global/HeaderNoSearch'
    import MiniSearch from '~/components/global/MiniSearch'
    import GoodItemGrid from '~/components/global/GoodItemGrid'
    import Footer from '~/components/global/Footer'
    import ContactLists from '~/components/global/ContactLists'
    import PriceButton from '~/components/global/PriceButton'
    import DiscountTag from '~/components/global/DiscountTag'
    import DiscountLabelDropDown from '~/components/global/DiscountLabelDropDown'
    import Hint from '~/components/global/Hint'
    // const carousel = () => window && window !== undefined ? import("vue-owl-carousel") : null;
    export default {
        name: "catalog-upper-lvl",
        data() {1
            return {
                showListParts: false,
                showListTyres: false,
                showListTools: false,
                isNuxtReady: false,
            }
        },
        components: {
            appHeaderNoSearch: HeaderNoSearch,
            appMiniSearch: MiniSearch,
            appGoodItemGrid: GoodItemGrid,
            appFooter: Footer,
            appContactLists: ContactLists,
            appPriceButton: PriceButton,
            appDiscountTag: DiscountTag,
            appDiscountLabelDropDown: DiscountLabelDropDown,
            appHint: Hint,
            carousel
        },
        // mounted() {
        //     // const vm = this;
        //     if (process.client) {
        //         window.onNuxtReady(app => {
        //             this.isNuxtReady = true;
        //         });
        //     }
        // }
    }
</script>

<style scoped>
    .breadcrumbs-arrow {
        width: 14px;
        height: 14px;
        margin-bottom: -3px;
    }

    .popular-categories__container {
        margin-top: 5px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .popular-categories__item {
        border-radius: 8px;
        position: relative;
        margin-top: 15px;
        width: 265px;
        height: 140px;
        text-decoration: none;
    }
    .popular-categories__item-background {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
    }

    .popular-categories__item-title {
        position: absolute;
        z-index: 4;
        bottom: 10px;
        left: 16px;
    }

    .gradient-bottom {
        position: absolute;
        height: 70px;
        width: 100%;
        z-index: 3;
        background-image: linear-gradient(to top, rgba(0, 0, 0, 0.6), rgba(69, 240, 170, 0));
        bottom: 0;
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
    }
    .discounts-and-supersales__container {
        display: flex;
        border-right: 1px solid #918dae;
        overflow-x: hidden;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .good-item-grid:first-child {
        margin-left: 10px;
    }
    .good-item-grid:not(:first-child) {
        margin-left: 30px;
    }

    .first-link-nav {
        margin-top: 14px;
    }

    .aside-link-list__item {
        margin-top: 4px;
        text-decoration: none;
    }

    .aside-link-list__item-link {
        text-decoration: none;
    }

    .aside-link-list__item-link:hover {
        text-decoration: underline;
    }

    .aside-link-list__show-more-btn {
        margin-top: 8px;
        padding: 0;
        border:none;
        background-color: transparent;
    }

    .aside-link-list__item-links-container > span {
        line-height: 1;
    }

    .aside-map__picture {
        border-radius: 2px;
    }

    .brands {
        margin-top: 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .show-more-list-links {
        transform: rotate(90deg);
        width: 17px;
        height: 17px;
        margin-bottom: -3px;
    }
</style>