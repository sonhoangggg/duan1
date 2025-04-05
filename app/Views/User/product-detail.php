<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Vongtey - Chi tiết sản phẩm</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css" />

    <!-- Favicon and Touch Icons  -->
   
    <style>
        .header-default {
            margin-bottom: 0 !important;
        }
    </style>
</head>

<body class="preload-wrapper popup-loader">
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        <!-- Header -->
        <?php include 'app/Views/Users/layouts/header.php' ?>
        <!-- /Header -->

        <section class="flat-spacing-4 pt_0">
            <div class="tf-main-product section-image-zoom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tf-product-media-wrap wrapper-gallery-scroll">
                                <div class="mb_10">
                                    <a href="<?= $product->image_main ?>" target="_blank" data-color="beige" class="item item-img-color" data-pswp-width="770px" data-pswp-height="1075px">
                                        <img class="tf-image-zoom ls-is-cached lazyloaded"
                                            data-zoom="<?= $product->image_main ?>"
                                            data-src="<?= $product->image_main ?>"
                                            src="<?= $product->image_main ?>" alt="">
                                    </a>
                                </div>

                                <div class="d-grid grid-template-columns-2 gap-10" id="gallery-started">
                                    <?php foreach ($productImage as $key => $value): ?>
                                        <a href="<?= $value->image ?>" target="_blank" data-color="beige" class="item item-img-color" data-pswp-width="770px" data-pswp-height="1075px">
                                            <img class="radius-10 tf-image-zoom ls-is-cached lazyloaded" data-zoom="<?= $value->image ?>" data-src="<?= $value->image ?>" src="<?= $value->image ?>" alt="img-product">
                                        </a>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tf-product-info-wrap sticky-top">
                                <div class="tf-zoom-main"></div>
                                <div class="tf-product-info-list other-image-zoom">
                                    <div class="tf-product-info-title">
                                        <h5><?= $product->name ?></h5>
                                    </div>
                                    <div class="tf-product-info-price">
                                        <?php if (empty($product->price_sale)): ?>
                                            <div class="price-on-sale">
                                                <?= isset($product->price) ? number_format($product->price, 0, ',', '.') . ' VND' : '' ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="price-on-sale">
                                                <?= isset($product->price_sale) ? number_format($product->price_sale, 0, ',', '.') . ' VND' : '' ?>
                                            </div>
                                            <div class="compare-at-price">
                                                <?= isset($product->price) ? number_format($product->price, 0, ',', '.') . ' VND' : '' ?>
                                            </div>
                                            <div class="badges-on-sale">
                                                <span>
                                                    Giảm
                                                    <?php
                                                    if (isset($product->price_sale, $product->price) && is_numeric($product->price_sale) && is_numeric($product->price) && $product->price > 0) {
                                                        $discount = round((($product->price - $product->price_sale) / $product->price) * 100);
                                                        echo $discount;
                                                    } else {
                                                        echo 0; // Hiển thị 0% nếu không có giá hợp lệ
                                                    }
                                                    ?>
                                                </span>%
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="tf-product-info-quantity mt-5">
                                        <div class="quantity-title fw-6">Số lượng</div>
                                        <div class="wg-quantity">
                                            <span class="btn-quantity btn-decrease-custom">-</span>
                                            <input type="text" class="quantity-product" name="number" value="1">
                                            <span class="btn-quantity btn-increase-custom">+</span>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-buy-button">
                                        <form class="">
                                            <a class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn 
                                            <?php if (isset($_SESSION['users'])): ?>
                                                btnAddToCart
                                            <?php endif ?>"
                                                <?php if (!isset($_SESSION['users'])): ?>
                                                onclick="alert('Bạn cần đăng nhập trước')"
                                                <?php endif ?>><span>Thêm vào giỏ hàng -&nbsp;</span>
                                                <span class="tf-qty-price total-price">
                                                    <?= $product->price_sale != null ? number_format($product->price_sale) : number_format($product->price) ?> VND
                                                </span></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal-shopping-cart -->
            <div class="modal fullRight fade modal-shopping-cart" id="shoppingCart" style="z-index: 1060; display: none;" aria-hidden="true" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="header">
                            <div class="title fw-5">Giỏ hàng <span class="count_product"></span></div>
                            <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                        </div>
                        <div class="wrap">
                            <div class="tf-mini-cart-wrap">
                                <div class="tf-mini-cart-main">
                                    <div class="tf-mini-cart-sroll">
                                        <div class="tf-mini-cart-items">

                                        </div>

                                    </div>
                                </div>
                                <div class="tf-mini-cart-bottom">

                                    <div class="tf-mini-cart-bottom-wrap">
                                        <div class="tf-cart-totals-discounts">
                                            <div class="tf-cart-total">Tổng cộng</div>
                                            <div class="tf-totals-total-value fw-6"></div>
                                        </div>

                                        <div class="tf-mini-cart-line"></div>
                                        <div class="tf-cart-checkbox">
                                            <div class="tf-checkbox-wrapp">
                                                <input class="" type="checkbox" id="CartDrawer-Form_agree" name="agree_checkbox">
                                                <div>
                                                    <i class="icon-check"></i>
                                                </div>
                                            </div>
                                            <label for="CartDrawer-Form_agree">
                                                Tôi đồng ý với
                                                <a href="#" title="Terms of Service">các điều khoản và điều kiện</a>
                                            </label>
                                        </div>
                                        <div class="tf-mini-cart-view-checkout">
                                            <a href="?act=shopping-cart" class="tf-btn btn-outline radius-3 link w-100 justify-content-center">Giỏ hàng</a>
                                            <a href="?act=check-out" class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Thanh toán</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-mini-cart-tool-openable add-note">
                                    <div class="overplay tf-mini-cart-tool-close"></div>
                                    <div class="tf-mini-cart-tool-content">
                                        <label for="Cart-note" class="tf-mini-cart-tool-text">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="currentColor">
                                                    <path d="M5.12187 16.4582H2.78952C2.02045 16.4582 1.39476 15.8325 1.39476 15.0634V2.78952C1.39476 2.02045 2.02045 1.39476 2.78952 1.39476H11.3634C12.1325 1.39476 12.7582 2.02045 12.7582 2.78952V7.07841C12.7582 7.46357 13.0704 7.77579 13.4556 7.77579C13.8407 7.77579 14.1529 7.46357 14.1529 7.07841V2.78952C14.1529 1.25138 12.9016 0 11.3634 0H2.78952C1.25138 0 0 1.25138 0 2.78952V15.0634C0 16.6015 1.25138 17.8529 2.78952 17.8529H5.12187C5.50703 17.8529 5.81925 17.5407 5.81925 17.1555C5.81925 16.7704 5.50703 16.4582 5.12187 16.4582Z"></path>
                                                    <path d="M15.3882 10.0971C14.5724 9.28136 13.2452 9.28132 12.43 10.0965L8.60127 13.9168C8.51997 13.9979 8.45997 14.0979 8.42658 14.2078L7.59276 16.9528C7.55646 17.0723 7.55292 17.1993 7.58249 17.3207C7.61206 17.442 7.67367 17.5531 7.76087 17.6425C7.84807 17.7319 7.95768 17.7962 8.07823 17.8288C8.19879 17.8613 8.32587 17.8609 8.44621 17.8276L11.261 17.0479C11.3769 17.0158 11.4824 16.9543 11.5675 16.8694L15.3882 13.0559C16.2039 12.2401 16.2039 10.9129 15.3882 10.0971ZM10.712 15.7527L9.29586 16.145L9.71028 14.7806L12.2937 12.2029L13.2801 13.1893L10.712 15.7527ZM14.4025 12.0692L14.2673 12.204L13.2811 11.2178L13.4157 11.0834C13.6876 10.8115 14.1301 10.8115 14.402 11.0834C14.6739 11.3553 14.6739 11.7977 14.4025 12.0692Z"></path>
                                                </svg>
                                            </div>
                                            <span>Add Order Note</span>
                                        </label>
                                        <textarea name="note" id="Cart-note" placeholder="How can we help you?"></textarea>
                                        <div class="tf-cart-tool-btns justify-content-center">
                                            <div class="tf-mini-cart-tool-primary text-center w-100 fw-6 tf-mini-cart-tool-close">Close</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-mini-cart-tool-openable add-gift">
                                    <div class="overplay tf-mini-cart-tool-close"></div>
                                    <form class="tf-product-form-addgift">
                                        <div class="tf-mini-cart-tool-content">
                                            <div class="tf-mini-cart-tool-text">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.65957 3.64545C4.65957 0.73868 7.89921 -0.995558 10.3176 0.617949L11.9997 1.74021L13.6818 0.617949C16.1001 -0.995558 19.3398 0.73868 19.3398 3.64545V4.32992H20.4286C21.9498 4.32992 23.1829 5.56311 23.1829 7.08416V9.10087C23.1829 9.61861 22.7632 10.0383 22.2454 10.0383H21.8528V20.2502C21.8528 20.254 21.8527 20.2577 21.8527 20.2614C21.8467 22.3272 20.1702 24 18.103 24H5.89634C3.82541 24 2.14658 22.3212 2.14658 20.2502V10.0384H1.75384C1.23611 10.0384 0.816406 9.61865 0.816406 9.10092V7.08421C0.816406 5.56304 2.04953 4.32992 3.57069 4.32992H4.65957V3.64545ZM6.53445 4.32992H11.0622V3.36863L9.27702 2.17757C8.10519 1.39573 6.53445 2.2357 6.53445 3.64545V4.32992ZM12.9371 3.36863V4.32992H17.4649V3.64545C17.4649 2.2357 15.8942 1.39573 14.7223 2.17756L12.9371 3.36863ZM3.57069 6.2048C3.08499 6.2048 2.69128 6.59851 2.69128 7.08421V8.16348H8.31067L8.3107 6.2048H3.57069ZM8.31071 10.0384V18.5741C8.31071 18.9075 8.48779 19.2158 8.77577 19.3838C9.06376 19.5518 9.4193 19.5542 9.70953 19.3901L11.9997 18.0953L14.2898 19.3901C14.58 19.5542 14.9356 19.5518 15.2236 19.3838C15.5115 19.2158 15.6886 18.9075 15.6886 18.5741V10.0383H19.9779V20.2137C19.9778 20.2169 19.9778 20.2201 19.9778 20.2233V20.2502C19.9778 21.2857 19.1384 22.1251 18.103 22.1251H5.89634C4.86088 22.1251 4.02146 21.2857 4.02146 20.2502V10.0384H8.31071ZM21.308 8.16344V7.08416C21.308 6.59854 20.9143 6.2048 20.4286 6.2048H15.6886V8.16344H21.308ZM13.8138 6.2048H10.1856V16.9672L11.5383 16.2024C11.8246 16.0405 12.1748 16.0405 12.461 16.2024L13.8138 16.9672V6.2048Z"></path>
                                                    </svg>
                                                </div>
                                                <div class="tf-gift-wrap-infos">
                                                    <p>Do you want a gift wrap?</p>
                                                    Only
                                                    <span class="price fw-6">$5.00</span>
                                                </div>
                                            </div>
                                            <div class="tf-cart-tool-btns">
                                                <button type="submit" class="tf-btn fw-6 w-100 justify-content-center btn-fill animate-hover-btn radius-3"><span>Add a gift wrap</span></button>
                                                <div class="tf-mini-cart-tool-primary text-center w-100 fw-6 tf-mini-cart-tool-close">Cancel</div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tf-mini-cart-tool-openable estimate-shipping">
                                    <div class="overplay tf-mini-cart-tool-close"></div>
                                    <div class="tf-mini-cart-tool-content">
                                        <div class="tf-mini-cart-tool-text">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="15" viewBox="0 0 21 15" fill="currentColor">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.441406 1.13155C0.441406 0.782753 0.724159 0.5 1.07295 0.5H12.4408C12.7896 0.5 13.0724 0.782753 13.0724 1.13155V2.91575H16.7859C18.8157 2.91575 20.5581 4.43473 20.5581 6.42296V11.8878C20.5581 12.2366 20.2753 12.5193 19.9265 12.5193H18.7542C18.4967 13.6534 17.4823 14.5 16.2703 14.5C15.0582 14.5 14.0439 13.6534 13.7864 12.5193H7.20445C6.94692 13.6534 5.93259 14.5 4.72054 14.5C3.50849 14.5 2.49417 13.6534 2.23664 12.5193H1.07295C0.724159 12.5193 0.441406 12.2366 0.441406 11.8878V1.13155ZM2.26988 11.2562C2.57292 10.1881 3.55537 9.40578 4.72054 9.40578C5.88572 9.40578 6.86817 10.1881 7.17121 11.2562H11.8093V1.76309H1.7045V11.2562H2.26988ZM13.0724 4.17884V6.68916H19.295V6.42296C19.295 5.2348 18.2252 4.17884 16.7859 4.17884H13.0724ZM19.295 7.95226H13.0724V11.2562H13.8196C14.1227 10.1881 15.1051 9.40578 16.2703 9.40578C17.4355 9.40578 18.4179 10.1881 18.7209 11.2562H19.295V7.95226ZM4.72054 10.6689C4.0114 10.6689 3.43652 11.2437 3.43652 11.9529C3.43652 12.662 4.0114 13.2369 4.72054 13.2369C5.42969 13.2369 6.00456 12.662 6.00456 11.9529C6.00456 11.2437 5.42969 10.6689 4.72054 10.6689ZM16.2703 10.6689C15.5611 10.6689 14.9863 11.2437 14.9863 11.9529C14.9863 12.662 15.5611 13.2369 16.2703 13.2369C16.9794 13.2369 17.5543 12.662 17.5543 11.9529C17.5543 11.2437 16.9794 10.6689 16.2703 10.6689Z"></path>
                                                </svg>
                                            </div>
                                            <span class="fw-6">Estimate Shipping</span>
                                        </div>
                                        <div class="field">
                                            <p>Country</p>
                                            <select class="tf-select w-100" id="ShippingCountry_CartDrawer-Form" name="address[country]" data-default="">
                                                <option value="---" data-provinces="[]">---</option>
                                                <option value="Australia" data-provinces="[['Australian Capital Territory','Australian Capital Territory'],['New South Wales','New South Wales'],['Northern Territory','Northern Territory'],['Queensland','Queensland'],['South Australia','South Australia'],['Tasmania','Tasmania'],['Victoria','Victoria'],['Western Australia','Western Australia']]">Australia</option>
                                                <option value="Austria" data-provinces="[]">Austria</option>
                                                <option value="Belgium" data-provinces="[]">Belgium</option>
                                                <option value="Canada" data-provinces="[['Alberta','Alberta'],['British Columbia','British Columbia'],['Manitoba','Manitoba'],['New Brunswick','New Brunswick'],['Newfoundland and Labrador','Newfoundland and Labrador'],['Northwest Territories','Northwest Territories'],['Nova Scotia','Nova Scotia'],['Nunavut','Nunavut'],['Ontario','Ontario'],['Prince Edward Island','Prince Edward Island'],['Quebec','Quebec'],['Saskatchewan','Saskatchewan'],['Yukon','Yukon']]">Canada</option>
                                                <option value="Czech Republic" data-provinces="[]">Czechia</option>
                                                <option value="Denmark" data-provinces="[]">Denmark</option>
                                                <option value="Finland" data-provinces="[]">Finland</option>
                                                <option value="France" data-provinces="[]">France</option>
                                                <option value="Germany" data-provinces="[]">Germany</option>
                                                <option value="Hong Kong" data-provinces="[['Hong Kong Island','Hong Kong Island'],['Kowloon','Kowloon'],['New Territories','New Territories']]">Hong Kong SAR</option>
                                                <option value="Ireland" data-provinces="[['Carlow','Carlow'],['Cavan','Cavan'],['Clare','Clare'],['Cork','Cork'],['Donegal','Donegal'],['Dublin','Dublin'],['Galway','Galway'],['Kerry','Kerry'],['Kildare','Kildare'],['Kilkenny','Kilkenny'],['Laois','Laois'],['Leitrim','Leitrim'],['Limerick','Limerick'],['Longford','Longford'],['Louth','Louth'],['Mayo','Mayo'],['Meath','Meath'],['Monaghan','Monaghan'],['Offaly','Offaly'],['Roscommon','Roscommon'],['Sligo','Sligo'],['Tipperary','Tipperary'],['Waterford','Waterford'],['Westmeath','Westmeath'],['Wexford','Wexford'],['Wicklow','Wicklow']]">Ireland</option>
                                                <option value="Israel" data-provinces="[]">Israel</option>
                                                <option value="Italy" data-provinces="[['Agrigento','Agrigento'],['Alessandria','Alessandria'],['Ancona','Ancona'],['Aosta','Aosta Valley'],['Arezzo','Arezzo'],['Ascoli Piceno','Ascoli Piceno'],['Asti','Asti'],['Avellino','Avellino'],['Bari','Bari'],['Barletta-Andria-Trani','Barletta-Andria-Trani'],['Belluno','Belluno'],['Benevento','Benevento'],['Bergamo','Bergamo'],['Biella','Biella'],['Bologna','Bologna'],['Bolzano','South Tyrol'],['Brescia','Brescia'],['Brindisi','Brindisi'],['Cagliari','Cagliari'],['Caltanissetta','Caltanissetta'],['Campobasso','Campobasso'],['Carbonia-Iglesias','Carbonia-Iglesias'],['Caserta','Caserta'],['Catania','Catania'],['Catanzaro','Catanzaro'],['Chieti','Chieti'],['Como','Como'],['Cosenza','Cosenza'],['Cremona','Cremona'],['Crotone','Crotone'],['Cuneo','Cuneo'],['Enna','Enna'],['Fermo','Fermo'],['Ferrara','Ferrara'],['Firenze','Florence'],['Foggia','Foggia'],['Forlì-Cesena','Forlì-Cesena'],['Frosinone','Frosinone'],['Genova','Genoa'],['Gorizia','Gorizia'],['Grosseto','Grosseto'],['Imperia','Imperia'],['Isernia','Isernia'],['L'Aquila','L’Aquila'],['La Spezia','La Spezia'],['Latina','Latina'],['Lecce','Lecce'],['Lecco','Lecco'],['Livorno','Livorno'],['Lodi','Lodi'],['Lucca','Lucca'],['Macerata','Macerata'],['Mantova','Mantua'],['Massa-Carrara','Massa and Carrara'],['Matera','Matera'],['Medio Campidano','Medio Campidano'],['Messina','Messina'],['Milano','Milan'],['Modena','Modena'],['Monza e Brianza','Monza and Brianza'],['Napoli','Naples'],['Novara','Novara'],['Nuoro','Nuoro'],['Ogliastra','Ogliastra'],['Olbia-Tempio','Olbia-Tempio'],['Oristano','Oristano'],['Padova','Padua'],['Palermo','Palermo'],['Parma','Parma'],['Pavia','Pavia'],['Perugia','Perugia'],['Pesaro e Urbino','Pesaro and Urbino'],['Pescara','Pescara'],['Piacenza','Piacenza'],['Pisa','Pisa'],['Pistoia','Pistoia'],['Pordenone','Pordenone'],['Potenza','Potenza'],['Prato','Prato'],['Ragusa','Ragusa'],['Ravenna','Ravenna'],['Reggio Calabria','Reggio Calabria'],['Reggio Emilia','Reggio Emilia'],['Rieti','Rieti'],['Rimini','Rimini'],['Roma','Rome'],['Rovigo','Rovigo'],['Salerno','Salerno'],['Sassari','Sassari'],['Savona','Savona'],['Siena','Siena'],['Siracusa','Syracuse'],['Sondrio','Sondrio'],['Taranto','Taranto'],['Teramo','Teramo'],['Terni','Terni'],['Torino','Turin'],['Trapani','Trapani'],['Trento','Trentino'],['Treviso','Treviso'],['Trieste','Trieste'],['Udine','Udine'],['Varese','Varese'],['Venezia','Venice'],['Verbano-Cusio-Ossola','Verbano-Cusio-Ossola'],['Vercelli','Vercelli'],['Verona','Verona'],['Vibo Valentia','Vibo Valentia'],['Vicenza','Vicenza'],['Viterbo','Viterbo']]">Italy</option>
                                                <option value="Japan" data-provinces="[['Aichi','Aichi'],['Akita','Akita'],['Aomori','Aomori'],['Chiba','Chiba'],['Ehime','Ehime'],['Fukui','Fukui'],['Fukuoka','Fukuoka'],['Fukushima','Fukushima'],['Gifu','Gifu'],['Gunma','Gunma'],['Hiroshima','Hiroshima'],['Hokkaidō','Hokkaido'],['Hyōgo','Hyogo'],['Ibaraki','Ibaraki'],['Ishikawa','Ishikawa'],['Iwate','Iwate'],['Kagawa','Kagawa'],['Kagoshima','Kagoshima'],['Kanagawa','Kanagawa'],['Kumamoto','Kumamoto'],['Kyōto','Kyoto'],['Kōchi','Kochi'],['Mie','Mie'],['Miyagi','Miyagi'],['Miyazaki','Miyazaki'],['Nagano','Nagano'],['Nagasaki','Nagasaki'],['Nara','Nara'],['Niigata','Niigata'],['Okayama','Okayama'],['Okinawa','Okinawa'],['Saga','Saga'],['Saitama','Saitama'],['Shiga','Shiga'],['Shimane','Shimane'],['Shizuoka','Shizuoka'],['Tochigi','Tochigi'],['Tokushima','Tokushima'],['Tottori','Tottori'],['Toyama','Toyama'],['Tōkyō','Tokyo'],['Wakayama','Wakayama'],['Yamagata','Yamagata'],['Yamaguchi','Yamaguchi'],['Yamanashi','Yamanashi'],['Ōita','Oita'],['Ōsaka','Osaka']]">Japan</option>
                                                <option value="Malaysia" data-provinces="[['Johor','Johor'],['Kedah','Kedah'],['Kelantan','Kelantan'],['Kuala Lumpur','Kuala Lumpur'],['Labuan','Labuan'],['Melaka','Malacca'],['Negeri Sembilan','Negeri Sembilan'],['Pahang','Pahang'],['Penang','Penang'],['Perak','Perak'],['Perlis','Perlis'],['Putrajaya','Putrajaya'],['Sabah','Sabah'],['Sarawak','Sarawak'],['Selangor','Selangor'],['Terengganu','Terengganu']]">Malaysia</option>
                                                <option value="Netherlands" data-provinces="[]">Netherlands</option>
                                                <option value="New Zealand" data-provinces="[['Auckland','Auckland'],['Bay of Plenty','Bay of Plenty'],['Canterbury','Canterbury'],['Chatham Islands','Chatham Islands'],['Gisborne','Gisborne'],['Hawke's Bay','Hawke’s Bay'],['Manawatu-Wanganui','Manawatū-Whanganui'],['Marlborough','Marlborough'],['Nelson','Nelson'],['Northland','Northland'],['Otago','Otago'],['Southland','Southland'],['Taranaki','Taranaki'],['Tasman','Tasman'],['Waikato','Waikato'],['Wellington','Wellington'],['West Coast','West Coast']]">New Zealand</option>
                                                <option value="Norway" data-provinces="[]">Norway</option>
                                                <option value="Poland" data-provinces="[]">Poland</option>
                                                <option value="Portugal" data-provinces="[['Aveiro','Aveiro'],['Açores','Azores'],['Beja','Beja'],['Braga','Braga'],['Bragança','Bragança'],['Castelo Branco','Castelo Branco'],['Coimbra','Coimbra'],['Faro','Faro'],['Guarda','Guarda'],['Leiria','Leiria'],['Lisboa','Lisbon'],['Madeira','Madeira'],['Portalegre','Portalegre'],['Porto','Porto'],['Santarém','Santarém'],['Setúbal','Setúbal'],['Viana do Castelo','Viana do Castelo'],['Vila Real','Vila Real'],['Viseu','Viseu'],['Évora','Évora']]">Portugal</option>
                                                <option value="Singapore" data-provinces="[]">Singapore</option>
                                                <option value="South Korea" data-provinces="[['Busan','Busan'],['Chungbuk','North Chungcheong'],['Chungnam','South Chungcheong'],['Daegu','Daegu'],['Daejeon','Daejeon'],['Gangwon','Gangwon'],['Gwangju','Gwangju City'],['Gyeongbuk','North Gyeongsang'],['Gyeonggi','Gyeonggi'],['Gyeongnam','South Gyeongsang'],['Incheon','Incheon'],['Jeju','Jeju'],['Jeonbuk','North Jeolla'],['Jeonnam','South Jeolla'],['Sejong','Sejong'],['Seoul','Seoul'],['Ulsan','Ulsan']]">South Korea</option>
                                                <option value="Spain" data-provinces="[['A Coruña','A Coruña'],['Albacete','Albacete'],['Alicante','Alicante'],['Almería','Almería'],['Asturias','Asturias Province'],['Badajoz','Badajoz'],['Balears','Balears Province'],['Barcelona','Barcelona'],['Burgos','Burgos'],['Cantabria','Cantabria Province'],['Castellón','Castellón'],['Ceuta','Ceuta'],['Ciudad Real','Ciudad Real'],['Cuenca','Cuenca'],['Cáceres','Cáceres'],['Cádiz','Cádiz'],['Córdoba','Córdoba'],['Girona','Girona'],['Granada','Granada'],['Guadalajara','Guadalajara'],['Guipúzcoa','Gipuzkoa'],['Huelva','Huelva'],['Huesca','Huesca'],['Jaén','Jaén'],['La Rioja','La Rioja Province'],['Las Palmas','Las Palmas'],['León','León'],['Lleida','Lleida'],['Lugo','Lugo'],['Madrid','Madrid Province'],['Melilla','Melilla'],['Murcia','Murcia'],['Málaga','Málaga'],['Navarra','Navarra'],['Ourense','Ourense'],['Palencia','Palencia'],['Pontevedra','Pontevedra'],['Salamanca','Salamanca'],['Santa Cruz de Tenerife','Santa Cruz de Tenerife'],['Segovia','Segovia'],['Sevilla','Seville'],['Soria','Soria'],['Tarragona','Tarragona'],['Teruel','Teruel'],['Toledo','Toledo'],['Valencia','Valencia'],['Valladolid','Valladolid'],['Vizcaya','Biscay'],['Zamora','Zamora'],['Zaragoza','Zaragoza'],['Álava','Álava'],['Ávila','Ávila']]">Spain</option>
                                                <option value="Sweden" data-provinces="[]">Sweden</option>
                                                <option value="Switzerland" data-provinces="[]">Switzerland</option>
                                                <option value="United Arab Emirates" data-provinces="[['Abu Dhabi','Abu Dhabi'],['Ajman','Ajman'],['Dubai','Dubai'],['Fujairah','Fujairah'],['Ras al-Khaimah','Ras al-Khaimah'],['Sharjah','Sharjah'],['Umm al-Quwain','Umm al-Quwain']]">United Arab Emirates</option>
                                                <option value="United Kingdom" data-provinces="[['British Forces','British Forces'],['England','England'],['Northern Ireland','Northern Ireland'],['Scotland','Scotland'],['Wales','Wales']]">United Kingdom</option>
                                                <option value="United States" data-provinces="[['Alabama','Alabama'],['Alaska','Alaska'],['American Samoa','American Samoa'],['Arizona','Arizona'],['Arkansas','Arkansas'],['Armed Forces Americas','Armed Forces Americas'],['Armed Forces Europe','Armed Forces Europe'],['Armed Forces Pacific','Armed Forces Pacific'],['California','California'],['Colorado','Colorado'],['Connecticut','Connecticut'],['Delaware','Delaware'],['District of Columbia','Washington DC'],['Federated States of Micronesia','Micronesia'],['Florida','Florida'],['Georgia','Georgia'],['Guam','Guam'],['Hawaii','Hawaii'],['Idaho','Idaho'],['Illinois','Illinois'],['Indiana','Indiana'],['Iowa','Iowa'],['Kansas','Kansas'],['Kentucky','Kentucky'],['Louisiana','Louisiana'],['Maine','Maine'],['Marshall Islands','Marshall Islands'],['Maryland','Maryland'],['Massachusetts','Massachusetts'],['Michigan','Michigan'],['Minnesota','Minnesota'],['Mississippi','Mississippi'],['Missouri','Missouri'],['Montana','Montana'],['Nebraska','Nebraska'],['Nevada','Nevada'],['New Hampshire','New Hampshire'],['New Jersey','New Jersey'],['New Mexico','New Mexico'],['New York','New York'],['North Carolina','North Carolina'],['North Dakota','North Dakota'],['Northern Mariana Islands','Northern Mariana Islands'],['Ohio','Ohio'],['Oklahoma','Oklahoma'],['Oregon','Oregon'],['Palau','Palau'],['Pennsylvania','Pennsylvania'],['Puerto Rico','Puerto Rico'],['Rhode Island','Rhode Island'],['South Carolina','South Carolina'],['South Dakota','South Dakota'],['Tennessee','Tennessee'],['Texas','Texas'],['Utah','Utah'],['Vermont','Vermont'],['Virgin Islands','U.S. Virgin Islands'],['Virginia','Virginia'],['Washington','Washington'],['West Virginia','West Virginia'],['Wisconsin','Wisconsin'],['Wyoming','Wyoming']]">United States</option>
                                                <option value="Vietnam" data-provinces="[]">Vietnam</option>
                                            </select>
                                        </div>
                                        <div class="field">
                                            <p>Zip code</p>
                                            <input type="text" name="text" placeholder="">
                                        </div>
                                        <div class="tf-cart-tool-btns">
                                            <a href="#" class="tf-btn fw-6 justify-content-center btn-fill w-100 animate-hover-btn radius-3"><span>Estimate</span></a>
                                            <div class="tf-mini-cart-tool-primary text-center fw-6 w-100 tf-mini-cart-tool-close">Cancel</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="flat-spacing-17 pt_0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-tabs style-has-border">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner">Mô tả</span>
                                </li>
                                <!-- <li class="item-title">
                                    <span class="inner">Additional Information</span>
                                </li> -->
                                <li class="item-title">
                                    <span class="inner">Đánh giá</span>
                                </li>
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <?= $product->description ?>
                                </div>
                                <div class="widget-content-inner">
                                    <div class="tab-reviews write-cancel-review-wrap">
                                        <div class="tab-reviews-heading">
                                            <div class="top">
                                                <div class="text-center">
                                                    <h1 class="number fw-6"></h1>
                                                    <div class="list-star">
                                                        <i class="icon icon-star"></i>
                                                        <i class="icon icon-star"></i>
                                                        <i class="icon icon-star"></i>
                                                        <i class="icon icon-star"></i>
                                                        <i class="icon icon-star"></i>
                                                    </div>
                                                    <p>(<?= count($ratingProduct) ?> Xếp hạng)</p>
                                                </div>
                                                <?php
                                                $count5 = 0;
                                                $count4 = 0;
                                                $count3 = 0;
                                                $count2 = 0;
                                                $count1 = 0;
                                                foreach ($ratingProduct as $key => $value) {
                                                    if ($value->rating == '5') {
                                                        $count5++;
                                                    } else if ($value->rating == '4') {
                                                        $count4++;
                                                    } else if ($value->rating == '3') {
                                                        $count3++;
                                                    } else if ($value->rating == '2') {
                                                        $count2++;
                                                    } else if ($value->rating == '1') {
                                                        $count1++;
                                                    }
                                                }
                                                ?>
                                                <div class="rating-score">
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">5</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: <?= count($ratingProduct) != 0 ? ($count5 / count($ratingProduct)) * 100 : '' ?>%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1">
                                                            <?= $count5 ?>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">4</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: <?= count($ratingProduct) != 0 ? ($count4 / count($ratingProduct)) * 100 : '' ?>%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1"><?= $count4 ?></div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">3</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: <?= count($ratingProduct) != 0 ? ($count3 / count($ratingProduct)) * 100 : '' ?>%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1"><?= $count3 ?></div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">2</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: <?= count($ratingProduct) != 0 ? ($count2 / count($ratingProduct)) * 100 : '' ?>%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1"><?= $count2 ?></div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="number-1 text-caption-1">1</div>
                                                        <i class="icon icon-star"></i>
                                                        <div class="line-bg">
                                                            <div style="width: <?= count($ratingProduct) != 0 ? ($count1 / count($ratingProduct)) * 100 : '' ?>%;"></div>
                                                        </div>
                                                        <div class="number-2 text-caption-1"><?= $count1 ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tf-btn btn-outline-dark fw-6 btn-comment-review btn-cancel-review">Hủy đánh giá</div>
                                                <?php if (isset($_SESSION['users'])): ?>
                                                    <div class="tf-btn btn-outline-dark fw-6 btn-comment-review btn-write-review">Viết đánh giá</div>
                                            </div>
                                        <?php endif ?>

                                        </div>
                                        <div class="reply-comment cancel-review-wrap">
                                            <div class="d-flex mb_24 gap-20 align-items-center justify-content-between flex-wrap">
                                                <h5 class=""><?= count($comment) ?> Các đánh giá</h5>
                                                <div class="d-flex align-items-center gap-12">
                                                    <div class="text-caption-1">Sắp xếp theo:</div>
                                                    <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                                                        <div class="btn-select">
                                                            <span class="text-sort-value">Mới nhất</span>
                                                            <span class="icon icon-arrow-down"></span>
                                                        </div>
                                                        <div class="dropdown-menu">
                                                            <div class="select-item active">
                                                                <span class="text-value-item">Mới nhất</span>
                                                            </div>
                                                            <div class="select-item">
                                                                <span class="text-value-item">Cũ nhất</span>
                                                            </div>
                                                            <div class="select-item">
                                                                <span class="text-value-item">Phổ biến nhất</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reply-comment-wrap">
                                                <?php foreach ($comment as $key => $value): ?>
                                                    <?php if ($value->parent == null): ?>
                                                        <div class="reply-comment-item">
                                                            <div class="user">
                                                                <div class="image">
                                                                    <img src="<?= $value->image ?>" alt="">
                                                                </div>
                                                                <div>
                                                                    <h6>
                                                                        <a href="#" class="link"><?= $value->name ?></a>
                                                                    </h6>
                                                                    <div class="day text_black-3">
                                                                        <?php
                                                                        if ($value->rating != null) {
                                                                            echo $value->rating . " <i class='icon icon-star text-warning'></i>";
                                                                        }
                                                                        ?>
                                                                        <?= date("d/m/Y", strtotime($value->created_at)) ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="text_black-3">
                                                                <?= $value->comment ?>
                                                            </p>
                                                        </div>
                                                        <?php foreach ($comment as $key2 => $value2): ?>
                                                            <?php if ($value2->parent == $value->id): ?>
                                                                <div class="reply-comment-item type-reply">
                                                                    <div class="user">
                                                                        <div class="image">
                                                                            <img src="<?= $value2->image ?>" alt="">
                                                                        </div>
                                                                        <div>
                                                                            <h6>
                                                                                <a href="#" class="link"><?= $value2->name ?></a>
                                                                            </h6>
                                                                            <div class="day text_black-3"><?= date("d/m/Y", strtotime($value2->created_at)) ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="text_black-3"><?= $value2->comment ?></p>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <form action="?act=write-review" method="post" class="form-write-review write-review-wrap">
                                            <div class="heading">
                                                <input type="hidden" value="<?= $product->id ?>" name="productId">
                                                <h5>Viết đánh giá của bạn:</h5>
                                                <div class="list-rating-check">
                                                    <input type="radio" id="star5" name="rate" value="5">
                                                    <label for="star5" title="text"></label>
                                                    <input type="radio" id="star4" name="rate" value="4">
                                                    <label for="star4" title="text"></label>
                                                    <input type="radio" id="star3" name="rate" value="3">
                                                    <label for="star3" title="text"></label>
                                                    <input type="radio" id="star2" name="rate" value="2">
                                                    <label for="star2" title="text"></label>
                                                    <input type="radio" id="star1" name="rate" value="1">
                                                    <label for="star1" title="text"></label>
                                                </div>
                                            </div>
                                            <div class="form-content">
                                                <fieldset class="box-field">
                                                    <label class="label">Đánh giá sản phẩm</label>
                                                    <textarea rows="4" placeholder="Viết bình luận của bạn ở đây" tabindex="2" aria-required="true" required="" name="comment"></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="button-submit">
                                                <button class="tf-btn btn-fill animate-hover-btn" type="submit">Hoàn tất đánh giá</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="flat-spacing-5 pt_0 flat-seller">
            <div class="container">
                <div class="flat-title">
                    <span class="title wow fadeInUp" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">Các sản phẩm liên quan</span>
                </div>
                <div class="grid-layout loadmore-item wow fadeInUp" data-wow-delay="0s" data-grid="grid-4" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                    <!-- card product 1 -->
                    <?php foreach ($otherProduct as $key => $value): ?>
                        <div class="card-product fl-item" style="display: block;">
                            <div class="card-product-wrapper">
                                <a href="?act=product-detail&product_id=<?= $value->id ?>" class="product-img">
                                    <img class="img-product ls-is-cached lazyloaded" data-src="<?= $value->image_main ?>" src="<?= $value->image_main ?>" alt="image-product">
                                    <img class="img-hover ls-is-cached lazyloaded" data-src="<?= $value->image_main ?>" src="<?= $value->image_main ?>" alt="image-product">
                                </a>
                                <div class="list-product-btn">
                                    <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                        <span class="icon icon-bag"></span>
                                        <span class="tooltip">Thêm nhanh</span>
                                    </a>
                                    <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Thêm vào yêu thích</span>
                                        <span class="icon icon-delete"></span>
                                    </a>
                                    <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                        <span class="icon icon-view"></span>
                                        <span class="tooltip">Xem nhanh</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-product-info">
                                <div style="display: flex;">

                                    <span class="price" style="margin-right: 5px;">
                                        <?php if ($value->price_sale != null): ?>
                                            <span class="price" style="margin-right: 5px; text-decoration: line-through; ">
                                                <?= number_format($value->price) ?> VND
                                            </span>

                                            <span class="price price-sale">
                                                <?= number_format($value->price_sale) ?> VND
                                            </span>
                                        <?php else: ?>
                                            <span class="price" style="margin-right: 5px;">
                                                <?= number_format($value->price) ?> VND
                                            </span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <?php include 'app/Views/Users/layouts/footer.php' ?>
        <!-- /Footer -->

    </div>

    <!-- gotop -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- /gotop -->


    <!-- Javascript -->
    <script type="text/javascript" src="assets/Users/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/carousel.js"></script>
    <script type="text/javascript" src="assets/Users/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/lazysize.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/count-down.js"></script>
    <script type="text/javascript" src="assets/Users/js/wow.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/multiple-modal.js"></script>
    <script type="text/javascript" src="assets/Users/js/main.js"></script>

    <script>
        // Nếu có giá khuyến mãi khi dùng nó để tính, nếu không thì dùng price thường
        let price = "<?= $product->price_sale != null ? $product->price_sale : $product->price ?>"
        price = Number(price)
        // Khi ấn nút dấu - 
        document.querySelector(".btn-decrease-custom").addEventListener("click", function() {
            let quantity = document.querySelector(".quantity-product")
            if (Number(quantity.value) > 0) {
                quantity.value = Number(quantity.value) - 1
                let total = price * Number(quantity.value)
                document.querySelector(".total-price").textContent = total.toLocaleString() + " VND"
            }
        })
        // Khi ấn nút dấu +
        document.querySelector(".btn-increase-custom").addEventListener("click", function() {
            let quantity = document.querySelector(".quantity-product")
            quantity.value = Number(quantity.value) + 1
            let total = price * Number(quantity.value)
            document.querySelector(".total-price").textContent = total.toLocaleString() + " VND"
        })

        // khi ấn nút thêm vào giỏ
        const btnAddToCart = document.querySelector(".btnAddToCart")
        btnAddToCart.addEventListener("click", function() {
            // lấy id. số lượng từ input
            let productId = "<?= $_GET['product_id'] ?>"
            let quantity = document.querySelector(".quantity-product").value
            // Tạo đối tượng FormData() để gửi dữ liệu qua POST
            let formData = new FormData();
            formData.append('productId', productId)
            formData.append('quantity', quantity)

            fetch('?act=add-to-cart', {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    showCart(data)
                })

            var myModal = new bootstrap.Modal(document.getElementById('shoppingCart'));
            myModal.show();
        })

        // Bấm show cart
        const exampleModal = document.getElementById('shoppingCart')
        exampleModal.addEventListener('show.bs.modal', event => {

            fetch('?act=show-to-cart')
                .then(response => response.json())
                .then(data => {
                    showCart(data)
                })
        })

        function showCart(data) {
            $(".count_product").text(`(${data.length})`)
            $(".tf-mini-cart-items").empty();

            let UI = ''
            let tong = 0
            data.forEach(item => {
                UI += `
                            <div class="tf-mini-cart-item">
                                <div class="tf-mini-cart-image">
                                    <a href="?act=product-detail&product_id=${item.product_id}">
                                        <img src="${item.image_main}" alt="">
                                    </a>
                                </div>
                                <div class="tf-mini-cart-info">
                                    <a class="title link" href="?act=product-detail&product_id=${item.product_id}">
                                        ${item.name}
                                    </a>
                                    
                                    <div class="price fw-6">
                                        ${item.price_sale != null ? item.price_sale.toLocaleString() : item.price.toLocaleString()} vnd
                                    </div>
                                    <div class="tf-mini-cart-btns">
                                        <div class="wg-quantity small">
                                            <span class="btn-quantity minus-btn" onclick="handleUpdate('${item.id}', 'decrease')">-</span>
                                            <input type="text" name="number" value="${item.quantity}">
                                            <span class="btn-quantity plus-btn" onclick="handleUpdate('${item.id}', 'increase')">+</span>
                                        </div>
                                        <div class="tf-mini-cart-remove" onclick="handleUpdate('${item.id}', 'deleted')">Xóa</div>
                                    </div>
                                </div>
                            </div>  
                        `
                let price = item.price_sale != null ? Number(item.price_sale) : Number(item.price)
                let quantity = Number(item.quantity)
                tong = tong + (price * quantity)
            })
            $(".tf-mini-cart-items").append(UI)
            $(".tf-totals-total-value").empty();
            $(".tf-totals-total-value").text(tong.toLocaleString() + " vnd")
        }

        function handleUpdate(cartDetailId, action) {
            if (action == "deleted") {
                let check = confirm("Bạn có muốn xóa không?")
                if (!check) {
                    return
                }
            }

            let formData = new FormData();

            formData.append('cart_detail_id', cartDetailId)
            formData.append('action', action)

            fetch('?act=update-cart', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    showCart(data)
                })
        }
    </script>
</body>

</html>