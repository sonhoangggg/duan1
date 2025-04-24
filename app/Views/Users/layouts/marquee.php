<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .banner {
            background: url('file-Bp826cV6gPrnAH7826jkit') no-repeat center center;
            background-size: cover;
            padding: 20px;
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        .features {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .feature-box {
            display: flex;
            align-items: center;
            background: #f5f5f5;
            padding: 15px;
            border-radius: 10px;
            width: 200px;
            text-align: left;
        }
        .feature-box div {
            font-size: 14px;
        }
        .feature-title {
            font-weight: bold;
            color: #003366;
        }
        .tf-marquee {
            background-color: #FFD700;
            padding: 10px 0;
            overflow: hidden;
            white-space: nowrap;
        }
        .wrap-marquee {
            display: flex;
            animation: marquee 10s linear infinite;
        }
        .marquee-item {
            display: flex;
            align-items: center;
            margin: 0 20px;
        }
        .marquee-item svg {
            margin-right: 10px;
        }
        .text {
            font-size: 16px;
            font-weight: bold;
        }
        @keyframes marquee {
            from { transform: translateX(100%); }
            to { transform: translateX(-100%); }
        }
    </style>
    
   
    
    <div class="tf-marquee bg_yellow-2">
        <div class="wrap-marquee">
            <div class="marquee-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20"><path d="M14.5833 8H8.61742L9.94318 0L0 12H5.96591L4.64015 20L14.5833 8"></path></svg>
                <p class="text">Sự kiện xả hàng mùa xuân: Giảm giá lên đến 70%</p>
            </div>
            <div class="marquee-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20"><path d="M14.5833 8H8.61742L9.94318 0L0 12H5.96591L4.64015 20L14.5833 8"></path></svg>
                <p class="text">Sự kiện xả hàng mùa xuân: Giảm giá lên đến 70%</p>
            </div>
            <div class="marquee-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20"><path d="M14.5833 8H8.61742L9.94318 0L0 12H5.96591L4.64015 20L14.5833 8"></path></svg>
                <p class="text">Sự kiện xả hàng mùa xuân: Giảm giá lên đến 70%</p>
            </div>
        </div>
    </div>


    <div class="features">
        <div class="feature-box">
            <img src="https://cdn.pnj.io/images/2023/relayout-pdp/shipping-icon.svg?1724816317359" alt="Miễn phí giao hàng" width="50">
            <div>
                <div class="feature-title">MIỄN PHÍ</div>
                <div>Giao hàng 3H</div>
            </div>
        </div>
        <div class="feature-box">
            <img src="https://cdn.pnj.io/images/2023/relayout-pdp/shopping%20247-icon.svg?1724816239732" alt="Phục vụ 24/7" width="50">
            <div>
                <div class="feature-title">PHỤC VỤ 24/7</div>
            </div>
        </div>
        <div class="feature-box">
            <img src="https://cdn.pnj.io/images/2023/relayout-pdp/thudoi-icon.svg?1724816287975" alt="Thu đổi 48H" width="50">
            <div>
                <div class="feature-title">THU ĐỔI 48H</div>
            </div>
        </div>
    </div>