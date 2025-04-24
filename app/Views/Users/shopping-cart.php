<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Vongtey - Giỏ hàng</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css" />

 
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
        <div class="tf-page-title style-2">
            <div class="container-full">
                <div class="heading text-center">Giỏ hàng</div>
            </div>
        </div>

        <section class="flat-spacing-11">
            <div class="container">
                <div class="tf-page-cart-wrap">
                    <div class="tf-page-cart-item">
                        <form>
                            <table class="tf-table-page-cart">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng cộng</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php if (count($data) > 0): ?>
        <?php foreach ($data as $key => $value): ?>
            <tr class="tf-cart-item file-delete">
                <td class="tf-cart-item_product">
                    <a href="?act=product-detail&product_id=<?= $value->product_id ?>" class="img-box">
                        <img src="<?= $value->image_main ?>" alt="img-product">
                    </a>
                    <div class="cart-info">
                        <a href="?act=product-detail&product_id=<?= $value->product_id ?>" class="cart-title link"><?= $value->name ?></a>
                        <span class="remove-cart" onclick="handleUpdate('<?= $value->id ?>', 'deleted')">Xóa</span>
                    </div>
                </td>
                <td class="tf-cart-item_price" cart-data-title="Price">
                    <div class="cart-price">
                        <?php
                        if ($value->price_sale == null) {
                            echo number_format($value->price) . " vnd";
                        } else {
                            echo number_format($value->price_sale) . " vnd";
                        }
                        ?>
                    </div>
                </td>
                <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                    <div class="cart-quantity">
                        <div class="wg-quantity">
                            <span class="btn-quantity" onclick="handleUpdate('<?= $value->id ?>', 'decrease')">
                                <svg class="d-inline-block" width="9" height="1" viewBox="0 0 9 1" fill="currentColor">
                                    <path d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z"></path>
                                </svg>
                            </span>
                            <input type="text" name="number" value="<?= $value->quantity ?>">
                            <span class="btn-quantity" onclick="handleUpdate('<?= $value->id ?>', 'increase')">
                                <svg class="d-inline-block" width="9" height="9" viewBox="0 0 9 9" fill="currentColor">
                                    <path d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </td>
                <td class="tf-cart-item_total" cart-data-title="Total">
                    <div class="cart-total">
                        <?php
                        if ($value->price_sale != null) {
                            $total = intval($value->price_sale) * intval($value->quantity);
                            echo number_format($total) . " vnd";
                        } else {
                            $total = intval($value->price) * intval($value->quantity);
                            echo number_format($total) . " vnd";
                        }
                        ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Không có sản phẩm</td>
        </tr>
    <?php endif; ?>
</tbody>

                            </table>
                        </form>
                    </div>
                    <div class="tf-page-cart-footer">
                        <div class="tf-cart-footer-inner">
                            <div class="tf-page-cart-checkout">
                                <div class="cart-checkbox">
                                </div>
                                <div class="tf-cart-totals-discounts">
                                    <h3>Tổng cộng</h3>
                                    <span class="total-value">
                                        <?php
                                        $total = 0;
                                        foreach ($data as $key => $value) {
                                            if ($value->price_sale != null) {
                                                $total = $total + (intval($value->price_sale) * intval($value->quantity));
                                            } else {
                                                $total = $total + (intval($value->price) * intval($value->quantity));
                                            }
                                        }
                                        echo number_format($total) . " vnd";
                                        ?>
                                    </span>
                                </div>
                                <p class="tf-cart-tax">
                                    Thuế và <a href="shipping-delivery.html">phí vận chuyển</a> sẽ được tính khi thanh toán
                                </p>
                                <?php if (count($data) > 0): ?>
                                    <div class="cart-checkbox">
                                        <input type="checkbox" class="tf-check" id="check-agree">
                                        <label for="check-agree" class="fw-4">
                                            Tôi đồng ý với <a href="#">điều khoản</a>
                                        </label>
                                    </div>
                                    <div class="cart-checkout-btn">
                                        <a href="#" id="link-check-out" class="tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                                            <span>Thanh toán</span>
                                        </a>
                                    </div>
                                <?php endif;  ?>

                            </div>
                        </div>
                    </div>
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
        function handleUpdate(cart_detail_id, action) {
            if (action == "deleted") {
                let check = confirm("Bạn có muốn xóa không?")
                if (!check) {
                    return
                }
            }

            let formData = new FormData();

            formData.append('cart_detail_id', cart_detail_id)
            formData.append('action', action)

            fetch('?act=update-cart', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    updateCart(data)
                    //window.location.reload()
                })
        }

        function updateCart(data) {
            $(".tf-table-page-cart tbody").empty()
            let totalMoney = 0
            data.forEach(item => {
                let UI = `
                    <tr class="tf-cart-item file-delete">
                        <td class="tf-cart-item_product">
                            <a href="?act=product-detail&product_id=${item.product_id}" class="img-box">
                                <img src="${item.image_main}" alt="img-product">
                            </a>
                            <div class="cart-info">
                                <a href="?act=product-detail&product_id=${item.product_id}" class="cart-title link">
                                    ${item.name}
                                </a>
                                <span class="remove-cart" onclick="handleUpdate('${item.id}', 'deleted')">Xóa</span>
                            </div>
                        </td>
                        <td class="tf-cart-item_price" cart-data-title="Price">
                            <div class="cart-price">
                                ${item.price_sale != null ? item.price_sale.toLocaleString(): item.price.toLocaleString()} vnd
                            </div>
                        </td>
                        <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                            <div class="cart-quantity">
                                <div class="wg-quantity">
                                    <span class="btn-quantity" onclick="handleUpdate('${item.id}', 'decrease')">
                                        <svg class="d-inline-block" width="9" height="1" viewBox="0 0 9 1" fill="currentColor"><path d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z"></path></svg>
                                    </span>
                                    <input type="text" name="number" value="${item.quantity}" fdprocessedid="l2okth">
                                    <span class="btn-quantity" onclick="handleUpdate('${item.id}', 'increase')">
                                        <svg class="d-inline-block" width="9" height="9" viewBox="0 0 9 9" fill="currentColor"><path d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z"></path></svg>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="tf-cart-item_total" cart-data-title="Total">
                            <div class="cart-total">
                                ${item.price_sale != null ? (Number(item.price_sale ) * Number(item.quantity)).toLocaleString() : 
                                (Number(item.price) * Number(item.quantity)).toLocaleString()} vnd
                            </div>
                        </td>
                    </tr>
                `

                $(".tf-table-page-cart tbody").append(UI)

                if (item.price_sale != null) {
                    totalMoney = totalMoney + (Number(item.price_sale) * Number(item.quantity))
                } else {
                    totalMoney = totalMoney + (Number(item.price) * Number(item.quantity))
                }
            })

            $(".total-value").text(totalMoney.toLocaleString() + " vnd")
        }

        $("#link-check-out").click(function(event) {
            event.preventDefault();
            if ($("#check-agree").is(":checked")) {
                window.location.replace("?act=check-out")
            } else {
                alert("Vui lòng đồng ý điều khoản")
            }
        })
    </script>
</body>
<style>
    /* Căn chỉnh chung cho bảng giỏ hàng */
.table {
    border-collapse: separate;
    border-spacing: 0 15px;
    width: 100%;
    margin-bottom: 20px;
}

.table th,
.table td {
    vertical-align: middle;
    padding: 15px;
    text-align: center;
}

/* Định dạng hình ảnh sản phẩm */
.img-box {
    display: inline-block;
    width: 80px;
    height: 80px;
}

.img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

/* Phần thông tin sản phẩm */
.cart-info {
    margin-top: 10px;
}

.cart-title {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    text-decoration: none;
}

.cart-title:hover {
    color: #007bff;
}

/* Nút "Xóa" */
.remove-cart {
    display: inline-block;
    margin-top: 5px;
    color: #e74c3c;
    font-size: 14px;
    cursor: pointer;
}

.remove-cart:hover {
    text-decoration: underline;
}

/* Giá sản phẩm */
.cart-price {
    font-size: 18px;
    font-weight: bold;
    color: #2c3e50;
}

/* Phần số lượng */
.cart-quantity {
    display: flex;
    justify-content: center;
    align-items: center;
}

.wg-quantity {
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-quantity {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    padding: 8px;
    background-color: #f7f7f7;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-quantity:hover {
    background-color: #007bff;
    color: white;
}

/* Input số lượng */
input[name="number"] {
    text-align: center;
    width: 50px;
    height: 30px;
    font-size: 16px;
    margin: 0 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

/* Tổng tiền */
.cart-total {
    font-size: 18px;
    font-weight: bold;
    color: #e67e22;
}

/* Giỏ hàng trống */
.text-center {
    color: #888;
    font-size: 16px;
    font-weight: 600;
}

/* Phần responsive */
@media (max-width: 767px) {
    .table {
        width: 100%;
    }

    .cart-quantity {
        flex-direction: column;
    }

    .btn-quantity {
        width: 30px;
        height: 30px;
    }

    input[name="number"] {
        width: 40px;
        font-size: 14px;
    }
}

</style>
</html>