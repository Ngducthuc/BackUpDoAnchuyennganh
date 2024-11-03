<?php
session_start();
require_once('header.php');
?>

<head>
    <link rel="stylesheet" href="Style.css">
</head>


<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <a href="index.php"><img src="Image/modal-dialog.jpg" alt=""></a>
        </div>
    </div>
    <script src="access/modal-dialog.js"></script>
    <div class="container">
        <section class="section1">
            <div class="list-images">
                <img src="Image/slide1.webp" alt="" width="100%">
                <img src="Image/slide2.webp" alt="" width="100%">
            </div>
            <div class="btns">
                <div class="btn-left btn"><i class='bx bx-chevron-left'></i></div>
                <div class="btn-right btn"><i class='bx bx-chevron-right'></i></div>
            </div>
            <div class="index-images">
                <div class="index-item index-item-0 active1"></div>
                <div class="index-item index-item-1"></div>

            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    const listImage = document.querySelector('.list-images')
                    const imgs = document.querySelectorAll('.list-images img')
                    const btnLeft = document.querySelector('.btn-left')
                    const btnRight = document.querySelector('.btn-right')
                    const indexItems = document.querySelectorAll('.index-item')
                    const length = imgs.length
                    let current = 0
                    let handleEventChangeSlide

                    const handleChangeSlide = () => {
                        if (current === length - 1) {
                            current = 0
                        } else {
                            current++
                        }
                        listImage.style.transform = `translateX(-${current * 100}%)`
                        indexItems.forEach(item => item.classList.remove('active1'))
                        indexItems[current].classList.add('active1')
                    }

                    handleEventChangeSlide = setInterval(handleChangeSlide, 4000)
                    btnRight.addEventListener('click', () => {
                        clearInterval(handleEventChangeSlide)
                        handleChangeSlide()
                        handleEventChangeSlide = setInterval(handleChangeSlide, 4000)
                    })

                    btnLeft.addEventListener('click', () => {
                        clearInterval(handleEventChangeSlide)
                        if (current === 0) {
                            current = length - 1
                        } else {
                            current--
                        }
                        listImage.style.transform = `translateX(-${current * 100}%)`
                        indexItems.forEach(item => item.classList.remove('active1'))
                        indexItems[current].classList.add('active1')
                        handleEventChangeSlide = setInterval(handleChangeSlide, 4000)
                    })
                });
            </script>
        </section>




        <section class="section2">


            <div class="policies-item">
                <div class="policies-image">
                    <img src="Image/policies_icon_1.png" alt="policies_icon_1.png" width="50" height="50" class="img-fluid">
                </div>
                <div class="policies-info">
                    <h3 class="policies-title">Miễn phí vận chuyển</h3>
                    <div class="policies-desc">Nhận hàng trong vòng 3 ngày</div>
                </div>
            </div>

            <div class="policies-item">
                <div class="policies-image">
                    <img src="Image/policies_icon_2.png" alt="policies_icon_2.png" width="50" height="50" class="img-fluid">
                </div>
                <div class="policies-info">
                    <h3 class="policies-title">Quà tặng hấp dẫn</h3>
                    <div class="policies-desc">Nhiều ưu đãi khuyến mãi hot</div>
                </div>
            </div>

            <div class="policies-item">
                <div class="policies-image">
                    <img src="Image/policies_icon_3.png" alt="policies_icon_3.png" width="50" height="50" class="img-fluid">
                </div>
                <div class="policies-info">
                    <h3 class="policies-title">Bảo đảm chất lượng</h3>
                    <div class="policies-desc">Sản phẩm đã dược kiểm định</div>
                </div>
            </div>

            <div class="policies-item">
                <div class="policies-image">
                    <img src="Image/policies_icon_4.png" alt="policies_icon_4.png" width="50" height="50"  class="img-fluid ">
                </div>
                <div class="policies-info ">
                    <h3 class="policies-title ">Hotline: 19001993</h3>
                    <div class="policies-desc ">Dịch vụ hỗ trợ bạn 24/7</div>
                </div>
            </div>


        </section>

        <section class="section3 ">
            <h2 class="heading-bar__title ">Thời Trang Thể Thao</h2>
                <div class="ss_body ">
                    <div class="ss_item ">
                        <a href="/access/index_search.php?q=%C3%A1o+b%C3%B3ng+%C4%91%C3%A1">
                            <div class="ss_img ">
                                <img src="Image/ss_img_1.jpg " alt=" ">
                            </div>
                            <div class="ss_info ">
                                <div class="ss_name ">Áo bóng đá</div>
                                <span class="ss_number ">10 sản phẩm</span>
                            </div>
                        </a>
                    </div>

                    <div class="ss_item ">
                        <a href="/access/index_search.php?q=giày">
                            <div class="ss_img ">
                                <img src="Image/ss_img_2.jpg " alt=" ">
                            </div>
                            <div class="ss_info ">
                                <div class="ss_name ">Giày đá bóng</div>
                                <span class="ss_number ">7 sản phẩm</span>
                            </div>
                        </a>
                    </div>

                    <div class="ss_item ">
                        <a href="/access/index_search.php?q=gi%C3%A0y+th%E1%BB%83+thao">
                            <div class="ss_img ">
                                <img src="Image/ss_img_3.jpg " alt=" ">
                            </div>
                            <div class="ss_info ">
                                <div class="ss_name ">Giày thể thao</div>
                                <span class="ss_number ">5 sản phẩm</span>
                            </div>
                        </a>
                    </div>

                    <div class="ss_item ">
                        <a href="/access/index_search.php?q=%C3%A1o+kho%C3%A1c+th%E1%BB%83+thao">
                            <div class="ss_img ">
                                <img src="Image/ss_img_4.jpg " alt=" ">
                            </div>
                            <div class="ss_info ">
                                <div class="ss_name ">Áo khoác thể thao</div>
                                <span class="ss_number ">11 sản phẩm</span>
                            </div>
                        </a>
                    </div>
                    <div class="ss_item ">
                        <a href="/access/index_search.php?q=ph%E1%BB%A5+ki%E1%BB%87n">
                            <div class="ss_img ">
                                <img src="Image/ss_img_6.jpg " alt=" ">
                            </div>
                            <div class="ss_info ">
                                <div class="ss_name ">Phụ kiện khác</div>
                                <span class="ss_number ">11 sản phẩm</span>
                            </div>
                        </a>
                    </div>
                </div>
        </section>

        <section class="section4 ">
            
                <div class="coupon_item ">
                    <div class="coupon_img ">
                        <img src="Image/coupon_1_img.webp " alt=" ">
                    </div>
                    <div class="coupon_body ">
                        <div class="coupon_top ">
                            <div class="coupon_title ">NHẬP MÃ: NS10</div>
                            <div class="coupon_desc ">Mã giảm 10% cho đơn hàng tối thiểu 1.5 triệu</div>
                        </div>
                        
                        <div class="coupon_bottom ">
                            <button class="coupon_copy ">
                                <a href=" ">
                                    <span>Sao chép</span>
                                </a>
                            </button>

                            <button class="coupon_info_toggle " id="myBtn_coupon1 ">Điều kiện</button>
                        </div>

                        <div id="myModal_coupon1 " class="modal_coupon ">

                             
                            <div class="modal-content_coupon ">
                              <span class="close_coupon ">&times;</span>
                              <h3>NHẬP MÃ: NS10</h3>
                              <p>Điều kiện:</p>
                              <ul>
                                <li>Mã giảm 10% cho đơn hàng có giá trị tối thiểu 500k</li>
                                <li>Giảm tối đa 100k</li>
                              </ul>
                            </div>
                          
                        </div>
                    </div>
                </div>
            

                <div class="coupon_item ">
                    <div class="coupon_img ">
                        <img src="Image/coupon_2_img.webp " alt=" ">
                    </div>
                    <div class="coupon_body ">
                        <div class="coupon_top ">
                            <div class="coupon_title ">NHẬP MÃ: NS15</div>
                            <div class="coupon_desc ">Mã giảm 15% cho đơn hàng tối thiểu 2 triệu</div>
                        </div>
                        
                        <div class="coupon_bottom ">
                            <button class="coupon_copy ">
                                <a href=" ">
                                    <span>Sao chép</span>
                                </a>
                            </button>

                            <button class="coupon_info_toggle " id="myBtn_coupon2 ">Điều kiện</button>
                        </div>

                        <div id="myModal_coupon2 " class="modal_coupon ">

                             
                            <div class="modal-content_coupon ">
                                <span class="close_coupon ">&times;</span>
                                <h3>NHẬP MÃ: NS15</h3>
                                <p>Điều kiện:</p>
                                <ul>
                                  <li>Mã giảm 15% cho đơn hàng có giá trị tối thiểu 600k</li>
                                  <li>Giảm tối đa 100k</li>
                                </ul>
                              </div>
                          
                        </div>
                    </div> 
                </div>
                

                <div class="coupon_item ">
                    <div class="coupon_img ">
                        <img src="Image/coupon_3_img.webp " alt=" ">
                    </div>
                    <div class="body ">
                        <div class="coupon_top ">
                            <div class="coupon_title ">NHẬP MÃ: NS99</div>
                            <div class="coupon_desc ">Giảm giá 99k các sản phẩm Áo đá bóng</div>
                        </div>
                        
                        <div class="coupon_bottom ">
                            <button class="coupon_copy ">
                                <a href=" ">
                                    <span>Sao chép</span>
                                </a>
                            </button>

                            <button class="coupon_info_toggle " id="myBtn_coupon3 ">Điều kiện</button>
                        </div>

                        <div id="myModal_coupon3 " class="modal_coupon ">

                            <div class="modal-content_coupon ">
                                <span class="close_coupon ">&times;</span>
                                <h3>NHẬP MÃ: NS99</h3>
                                <p>Điều kiện:</p>
                                <ul>
                                    <li>Giảm giá 99k các sản phẩm Áo bóng đá</li>
                                    <li>Tổng giá trị sản phẩm từ 500k trở lên</li>
                                </ul>
                              </div>
                          
                        </div>
                    </div>
                </div>

                <div class="coupon_item ">
                    <div class="coupon_img ">
                        <img src="Image/coupon_4_img.webp " alt=" ">
                    </div>
                    <div class="coupon_body ">
                        <div class="coupon_top ">
                            <div class="coupon_title ">NHẬP MÃ: NFREESHIP</div>
                            <div class="coupon_desc ">Miễn phí ship cho đơn hàng tối thiểu 500.000đ</div>
                        </div>
                        
                        <div class="coupon_bottom ">
                            <button class="coupon_copy ">
                                <a href=" ">
                                    <span>Sao chép</span>
                                </a>
                            </button>

                            <button class="coupon_info_toggle " id="myBtn_coupon4 ">Điều kiện</button>
                        </div>

                        <div id="myModal_coupon4 " class="modal_coupon ">

                            <div class="modal-content_coupon ">
                                <span class="close_coupon ">&times;</span>
                                <h3>NHẬP MÃ: NFREESHIP</h3>
                                <p>Điều kiện:</p>
                                <ul>
                                  <li>Miễn phí ship 100K cho đơn hàng tối thiểu từ 500k</li>
                                  <li>Áp dụng cho tất cả tỉnh / thành phố</li>
                                </ul>
                              </div>
                          
                        </div>
                    </div>
                </div>

                <script>
                    var modals = document.querySelectorAll(".modal_coupon ");
                    var btns = document.querySelectorAll(".coupon_info_toggle ");
                    var spans = document.querySelectorAll(".close_coupon ");

                    btns.forEach(function(btn, index) {
                        btn.onclick = function() {
                            modals[index].style.display = "block ";
                        }
                    });

                    spans.forEach(function(span, index) {
                        span.onclick = function() {
                            modals[index].style.display = "none ";
                        }
                    });

                    window.onclick = function(event) {
                        modals.forEach(function(modal) {
                            if (event.target == modal) {
                                modal.style.display = "none ";
                            }
                        });
                    }
                </script>
        </section>

        <section class="section5 ">
            <div class="flash_sale_main ">
                <div class="flash_sale_header ">
                    <div class="flash_sale_heading ">
                            <a href=" ">GIẢM SỐC 50%</a>
                        <img src="https://theme.hstatic.net/200000696635/1001199686/14/flashsale-hot.png?v=8 " alt="Flash Sale ">
                    </div>


                    
                </div>
                
                <div class="flashsale_tab ">
                    <button class="tablinks active " data-electronic="giam50 ">Áo đá bóng -50%</button>
                    <button class="tablinks " data-electronic="muahe ">Năng động mùa hè</button>
                </div>
            </div>

            <div class="e-taps ">
                <div class="tabcontent active " id="giam50 ">
                    <div class="product-item ">
                        <div class="flashsale-item ">
                            <div class="card ">
                                <div class="imgBx ">
                                <img src="https://shop.mancity.com/dw/image/v2/BDWJ_PRD/on/demandware.static/-/Sites-master-catalog-MAN/default/dwae233114/images/large/701225663001_pp_01_mcfc.png?sw=400&sh=400&sm=fit "> 
                                </div>
                                <div class="contentBx ">
                                <h2>Manchester City 23-24</h2>
                                <div class="size ">
                                    <h3>Size :</h3>
                                    <span >S</span>
                                    <span>M</span>
                                    <span>L</span>
                                    <span>XL</span>
                                </div>
                                <div class="color ">
                                    <h3>Màu: </h3>
                                    <span style="background-color: rgb(32, 173, 255); "></span>
                                    <span style="background-color: rgb(213, 213, 213); "></span>
                                    <span style="background-color: rgb(33, 33, 33); "></span>
                                </div>
                                <a href="/access/index_chitiet.php?product_id=15">Mua ngay</a>
                                </div>
                            </div>

                            <div class="product_price ">
                                <span class="price ">249.000 ₫</span>
                                <span class="compare-price ">500.000 ₫</span>
                                <div class="label-product ">
                                    <div class="label-wapper ">-50%</div>
                                </div>
                            </div>
                            <div class="flashsale-label ">
                                <div class="flashsale-label-tittle ">
                                    <img src="//theme.hstatic.net/200000696635/1001199686/14/fire-icon.svg?v=8 " alt=" ">
                                    Đã bán <b class="flashsale__sold-qty ">229</b> sản phẩm
                                </div>
                                <div class="flashsale___percent " style="width: 84%; ">
                                </div>
                            </div>
                        </div>

                        <div class="flashsale-item ">
                            <div class="card ">
                                <div class="imgBx ">
                                <img src="Image/real.png ">
                                </div>
                                <div class="contentBx ">
                                <h2>Real Madrid 23-24</h2>
                                <div class="size ">
                                    <h3>Size :</h3>
                                    <span>S</span>
                                    <span>M</span>
                                    <span>L</span>
                                    <span>XL</span>
                                </div>
                                <div class="color ">
                                    <h3>Màu: </h3>
                                    <span style="background-color: rgb(255, 255, 255); "></span>
                                    <span style="background-color: rgb(1, 1, 1); "></span>
                                    <span style="background-color: rgb(10, 0, 144); "></span>
                                </div>
                                <a href="/access/index_chitiet.php?product_id=19">Mua ngay</a>
                                </div>
                            </div>

                            <div class="product_price ">
                                <span class="price ">249.000 ₫</span>
                                <span class="compare-price ">500.000 ₫</span>
                                <div class="label-product ">
                                    <div class="label-wapper ">-50%</div>
                                </div>
                            </div>
                            <div class="flashsale-label ">
                                <div class="flashsale-label-tittle ">
                                    <img src="//theme.hstatic.net/200000696635/1001199686/14/fire-icon.svg?v=8 " alt=" ">
                                    Đã bán <b class="flashsale__sold-qty ">111</b> sản phẩm
                                </div>
                                <div class="flashsale___percent " style="width: 40%; ">
                                </div>
                            </div>
                        </div>

                        <div class="flashsale-item ">
                            <div class="card ">
                                <div class="imgBx ">
                                <img src="Image/bayen.png ">
                                </div>
                                <div class="contentBx ">
                                <h2>Bayen Muchen 23-24</h2>
                                <div class="size ">
                                    <h3>Size :</h3>
                                    <span>S</span>
                                    <span>M</span>
                                    <span>L</span>
                                    <span>XL</span>
                                </div>
                                <div class="color ">
                                    <h3>Màu: </h3>
                                    <span style="background-color: rgb(255, 255, 255); "></span>
                                    <span style="background-color: rgb(255, 0, 0); "></span>
                                    <span style="background-color: rgb(33, 0, 74); "></span>
                                </div>
                                <a href="/access/index_chitiet.php?product_id=20">Mua ngay</a>
                                </div>
                            </div>
                            <div class="product_price ">
                                <span class="price ">249.000 ₫</span>
                                <span class="compare-price ">500.000 ₫</span>
                                <div class="label-product ">
                                    <div class="label-wapper ">-50%</div>
                                </div>
                            </div>
                            <div class="flashsale-label ">
                                <div class="flashsale-label-tittle ">
                                    <img src="//theme.hstatic.net/200000696635/1001199686/14/fire-icon.svg?v=8 " alt=" ">
                                    Đã bán <b class="flashsale__sold-qty ">200</b> sản phẩm
                                </div>
                                <div class="flashsale___percent " style="width: 57%; ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabcontent " id="muahe ">
                    <div class="product-item ">
                        <div class="flashsale-item ">
                            <div class="card ">
                                <div class="imgBx ">
                                <img src="Image/adidas.png ">
                                </div>
                                <div class="contentBx ">
                                <h2>Giày ADIDAS GDO100</h2>
                                <div class="size ">
                                    <h3>Size :</h3>
                                    <span>39</span>
                                    <span>40</span>
                                    <span>41</span>
                                    <span>42</span>
                                    <span>43</span>
                                    <span>44</span>
                                </div>
                                <div class="color ">
                                    <h3>Màu: </h3>
                                    <span style="background-color: rgb(255, 255, 255); "></span>
                                    <span style="background-color: rgb(1, 1, 1); "></span>
                                    <span style="background-color: rgb(10, 0, 144); "></span>
                                </div>
                                <a href="# ">Mua ngay</a>
                                </div>
                            </div>
                            <div class="product_price ">
                                <span class="price ">399.000 ₫</span>
                                <span class="compare-price ">700.000 ₫</span>
                                <div class="label-product ">
                                    <div class="label-wapper ">-40%</div>
                                </div>
                            </div>
                            <div class="flashsale-label ">
                                <div class="flashsale-label-tittle ">
                                    <img src="//theme.hstatic.net/200000696635/1001199686/14/fire-icon.svg?v=8 " alt=" ">
                                    Đã bán <b class="flashsale__sold-qty ">90</b> sản phẩm
                                </div>
                                <div class="flashsale___percent " style="width: 37%; ">
                                </div>
                            </div>
                        </div>

                        <div class="flashsale-item ">
                            <div class="card ">
                                <div class="imgBx ">
                                <img src="Image/aokhoackvien.png ">
                                </div>
                                <div class="contentBx ">
                                <h2>Áo khoác thể thao</h2>
                                <div class="size ">
                                    <h3>Size :</h3>
                                    <span >S</span>
                                    <span>M</span>
                                    <span>L</span>
                                    <span>XL</span>
                                </div>
                                <div class="color ">
                                    <h3>Màu: </h3>
                                    <span style="background-color: rgb(123, 204, 250); "></span>
                                    <span style="background-color: rgb(255, 200, 200); "></span>
                                    <span style="background-color: rgb(33, 33, 33); "></span>
                                </div>
                                <a href="# ">Mua ngay</a>
                                </div>
                            </div>
                            <div class="product_price ">
                                <span class="price ">149.000 ₫</span>
                                <span class="compare-price ">300.000 ₫</span>
                                <div class="label-product ">
                                    <div class="label-wapper ">-50%</div>
                                </div>
                            </div>

                            
                            <div class="flashsale-label ">
                                <div class="flashsale-label-tittle ">
                                    <img src="//theme.hstatic.net/200000696635/1001199686/14/fire-icon.svg?v=8 " alt=" ">
                                    Đã bán <b class="flashsale__sold-qty ">100</b> sản phẩm
                                </div>
                                <div class="flashsale___percent " style="width: 47%; ">
                                    
                                </div>
                            </div>
                            
                        </div>

                        <div class="flashsale-item ">
                            <div class="card ">
                                <div class="imgBx ">
                                <img src="Image/yonex.png "> 
                                </div>
                                <div class="contentBx ">
                                <h2>Vợt cầu lông Yonex</h2>
                                <div class="size ">
                                    <h3>Độ căng (kg):</h3>
                                    <span>10</span>
                                    <span>10,5</span>
                                    <span>11</span>
                                    
                                </div>
                                <div class="color ">
                                    <h3>Màu: </h3>
                                    <span style="background-color: rgb(0, 0, 0); "></span>
                                    <span style="background-color: rgb(255, 0, 0); "></span>
                                    <span style="background-color: rgb(2, 26, 107); "></span>
                                </div>
                                <a href="# ">Mua ngay</a>
                                </div>
                            </div>
                            <div class="product_price ">
                                <span class="price ">1.119.000 ₫</span>
                               
                                <span class="compare-price ">1.500.000 ₫</span>
                                <div class="label-product ">
                                    <div class="label-wapper ">-20%</div>
                                </div>
                            </div>

                            
                            <div class="flashsale-label ">
                                <div class="flashsale-label-tittle ">
                                    <img src="//theme.hstatic.net/200000696635/1001199686/14/fire-icon.svg?v=8 " alt=" ">
                                    Đã bán <b class="flashsale__sold-qty ">31</b> sản phẩm
                                </div>
                                <div class="flashsale___percent " style="width: 78%; ">
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <script src="access/flashsale.js "></script>
            
        </section>

        <section class="section6 ">
            <div class="slider ">
                <img src="Image/slide2.webp " alt=" " width="100% ">

            </div>
        </section>

        <section class="section7 ">
            <div class="headline ">
                <h3>Sản phẩm bán chạy</h3>
            </div>
            <ul class="products ">
                <li>
                    <div class="product_item_list ">
                        <div class="product_top_list ">
                            <a href="" class="product_thumb ">
                                <img src="Image/list-1.jpg " alt=" " style="height: 295px; ">
                            </a>
                            <a href=" " class="buy-now ">Mua ngay</a>
                        </div>
                    </div>
                    <div class="product_info_list ">
                        <a href=" " class="product_cat ">Áo bóng đá</a>
                        <a href=" " class="product_name ">Áo Manchester City 2023-2024</a> 
                        <div class="product_price_list ">249.000 ₫</div>
                    </div>
                </li>
                <li>
                    <div class="product_item_list ">
                        <div class="product_top_list ">
                            <a href=" " class="product_thumb ">
                                <img src="Image/list-2.jpg " alt=" " style="height: 295px; ">
                            </a>
                            <a href=" " class="buy-now ">Mua ngay</a>
                        </div>
                    </div>
                    <div class="product_info_list ">
                        <a href=" " class="product_cat ">Áo bóng đá</a>
                        <a href=" " class="product_name ">Áo Real Madrid 2023-2024</a> 
                        <div class="product_price_list ">249.000 ₫</div>
                    </div>
                </li>
                <li>
                    <div class="product_item_list ">
                        <div class="product_top_list ">
                            <a href=" " class="product_thumb ">
                                <img src="Image/list-3.jpg " alt=" " style="height: 295px; ">
                            </a>
                            <a href=" " class="buy-now ">Mua ngay</a>
                        </div>
                    </div>
                    <div class="product_info_list ">
                        <a href=" " class="product_cat ">Áo bóng đá</a>
                        <a href=" " class="product_name ">Áo Manchester United 2022-2023</a> 
                        <div class="product_price_list ">249.000 ₫</div>
                    </div>
                </li>
                <li>
                    <div class="product_item_list ">
                        <div class="product_top_list ">
                            <a href=" " class="product_thumb ">
                                <img src="Image/list-4.jpg " alt=" " style="height: 295px; ">
                            </a>
                            <a href=" " class="buy-now ">Mua ngay</a>
                        </div>
                    </div>
                    <div class="product_info_list ">
                        <a href=" " class="product_cat ">Áo bóng đá</a>
                        <a href=" " class="product_name ">Áo Inter Miami 2023-2024</a> 
                        <div class="product_price_list ">249.000 ₫</div>
                    </div>
                </li>
                <li>
                    <div class="product_item_list ">
                        <div class="product_top_list ">
                            <a href=" " class="product_thumb ">
                                <img src="Image/list-5.jpg " alt=" ">
                            </a>
                            <a href=" " class="buy-now ">Mua ngay</a>
                        </div>
                    </div>
                    <div class="product_info_list ">
                        <a href=" " class="product_cat ">Giày</a>
                        <a href=" " class="product_name ">Giày 3 sọc</a> 
                        <div class="product_price_list ">149.000 ₫</div>
                    </div>
                </li>
                <li>
                    <div class="product_item_list ">
                        <div class="product_top_list ">
                            <a href=" " class="product_thumb ">
                                <img src="Image/list-6.jpg " alt=" ">
                            </a>
                            <a href=" " class="buy-now ">Mua ngay</a>
                        </div>
                    </div>
                    <div class="product_info_list ">
                        <a href=" " class="product_cat ">Tất thể thao</a>
                        <a href=" " class="product_name ">Tất, Vớ thể thao</a> 
                        <div class="product_price_list ">15.000 ₫</div>
                    </div>
                </li>
                <li>
                    <div class="product_item_list ">
                        <div class="product_top_list ">
                            <a href=" " class="product_thumb ">
                                <img src="Image/list-7.jpg " alt=" ">
                            </a>
                            <a href=" " class="buy-now ">Mua ngay</a>
                        </div>
                    </div>
                    <div class="product_info_list ">
                        <a href=" " class="product_cat ">Áo khoác</a>
                        <a href=" " class="product_name ">Áo Khoác Nike</a> 
                        <div class="product_price_list ">179.000 ₫</div>
                    </div>
                </li>
                <li>
                    <div class="product_item_list ">
                        <div class="product_top_list ">
                            <a href=" " class="product_thumb ">
                                <img src="Image/list-8.jpg " alt=" ">
                            </a>
                            <a href=" " class="buy-now ">Mua ngay</a>
                        </div>
                    </div>
                    <div class="product_info_list ">
                        <a href=" " class="product_cat ">Giày</a>
                        <a href=" " class="product_name ">Giày thể thao</a> 
                        <div class="product_price_list ">249.000 ₫</div>
                    </div>
                </li>
            </ul>
        </section>

        <section class="section8 ">
            <div class="headline ">
                <h3>Thương hiệu nổi bật</h3>
            </div>

            <div class="image-container ">
                <ul class="image-list ">
                    <img src="Image/icon-akka-slogan-1.webp " alt=" " />
                    <img src="Image/icon-dong-luc.webp " alt=" " />
                    <img src="Image/icon-mitre.webp " alt=" " />
                    <img src="Image/icon-mizuno.webp " alt=" " />
                    <img src="Image/icon-pan.webp " alt=" " />
                    <img src="Image/bulbal.webp " alt=" " />
                </ul>
                <ul class="image-list ">
                    <img src="Image/icon-akka-slogan-1.webp " alt=" " />
                    <img src="Image/icon-dong-luc.webp " alt=" " />
                    <img src="Image/icon-mitre.webp " alt=" " />
                    <img src="Image/icon-mizuno.webp " alt=" " />
                    <img src="Image/icon-pan.webp " alt=" " />
                    <img src="Image/bulbal.webp " alt=" " />
                </ul>
            </div>

            <div class="image-container ">
                <ul class="image-list ">
                    <img src="Image/icon-spalding.webp " alt=" " />
                    <img src="Image/logo-just-playicon-1.webp " alt=" " />
                    <img src="Image/logo-kamito-icon-1.webp " alt=" " />
                    <img src="Image/logo-mira-icon-1.webp " alt=" " />
                    <img src="Image/logo-molten-icon-1.webp " alt=" " />
                    <img src="Image/partners-jgbl.webp " alt=" " />
                </ul>
                <ul class="image-list ">
                    <img src="Image/icon-spalding.webp " alt=" " />
                    <img src="Image/logo-just-playicon-1.webp " alt=" " />
                    <img src="Image/logo-kamito-icon-1.webp " alt=" " />
                    <img src="Image/logo-mira-icon-1.webp " alt=" " />
                    <img src="Image/logo-molten-icon-1.webp " alt=" " />
                    <img src="Image/partners-jgbl.webp " alt=" " />
                </ul>
            </div>
        </section>

        <section class="section9 ">
            <div class="headline ">
                <h3>Tin tức thể thao</h3>
            </div>
            <iframe src="https://thethao247.vn/ " frameborder="0 " width="100% " height="500 " style="border:1px solid rgb(172, 172, 172); "></iframe>
        </section>



    </div>

    <div class="list-policy ">
        <div class="policy ">
            <img src="Image/chinhhang.webp " alt=" ">
            <div class="content-policy ">
                <h3>HÀNG CHÍNH HÃNG 100%</h3>
                <p>N-SPORTS cam kết bán hàng chính hãng 100%</p>
            </div>
        </div>
        <div class="policy ">
            <img src="Image/giaohangnhanh.webp " alt=" ">
            <div class="content-policy ">
                <h3>GIAO HÀNG SIÊU NHANH</h3>
                <p>N-SPORTS giao hàng siêu nhanh nội thành TP.HCM chỉ trong 2H</p>
            </div>
        </div>
        <div class="policy ">
            <img src="Image/doi-tra.webp " alt=" ">
            <div class="content-policy ">
                <h3>ĐỔI TRẢ TRONG 90 NGÀY</h3>
                <p>N-SPORTS có chính sách đổi trả trong 90 ngày chưa qua sử dụng</p>
            </div>
        </div>
        <div class="policy ">
            <img src="Image/bao-hanh.webp " alt=" ">
            <div class="content-policy ">
                <h3>BẢO HÀNH TRỌN ĐỜI</h3>
                <p>N-SPORTS bảo hành miễn phí keo trọn đời suốt quá trình quý khách sử dụng</p>
            </div>
        </div>
    </div>
    <?php require_once('access/footer.php');?>