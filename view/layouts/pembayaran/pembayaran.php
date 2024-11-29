<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5faff;
        }
        .back-arrow {
            font-size: 1.5rem;
            color: #333;
            text-decoration: none;
        }
        .card-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-width: 800px;
            margin: 20px auto;
        }
        .donation-button {
            border: 2px solid #007bff;
            border-radius: 20px;
            padding: 10px 20px;
            color: #007bff;
            background-color: #ffffff;
            font-size: 1rem;
            margin: 5px;
            cursor: pointer;
        }
        .donation-button.active {
            background-color: #007bff;
            color: #ffffff;
        }
        .donation-input {
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            margin-top: 10px;
        }
        .donation-minimum {
            color: #6c757d;
            font-size: 0.875rem;
            margin-top: 5px;
        }
        .hidden {
            display: none;
        }
        .donation-card {
            background-color: #e9f3fb;
            border: 1px solid #d1e7f5;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
        }
        .donation-card h5 {
            font-weight: bold;
        }
        .donation-card p {
            color: #6c757d;
        }
        .donation-amount {
            font-size: 24px;
            color: #007bff;
            font-weight: bold;
            text-align: center;
        }
        .slider-container {
            position: relative;
            margin-top: 20px;
        }
        .slider-container input[type="range"] {
            width: 100%;
        }
        .slider-container .slider-label {
            position: absolute;
            top: -30px;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            transform: translateX(-50%);
            transition: left 0.1s;
        }
        .slider-container .slider-label::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-width: 10px;
            border-style: solid;
            border-color: #007bff transparent transparent transparent;
        }
        .custom-amount {
            color: #007bff;
            cursor: pointer;
        }
        .toggle-switch {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .toggle-switch input[type="checkbox"] {
            width: 40px;
            height: 20px;
            appearance: none;
            background-color: #ccc;
            border-radius: 20px;
            position: relative;
            outline: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .toggle-switch input[type="checkbox"]:checked {
            background-color: #4cd137;
        }
        .toggle-switch input[type="checkbox"]::before {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background-color: white;
            top: 1px;
            left: 1px;
            transition: transform 0.3s;
        }
        .toggle-switch input[type="checkbox"]:checked::before {
            transform: translateX(20px);
        }
        .donation-section {
            background-color: #e6f0ff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .summary-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #e6e6e6;
            margin-top: 20px;
        }
        .slider-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .slider-container .slider-label {
            font-size: 14px;
            color: #666666;
        }
        .slider-container .slider-value {
            font-size: 14px;
            color: #007bff;
        }
        .summary-section .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .summary-section .summary-item:last-child {
            margin-bottom: 0;
        }
        .summary-section .summary-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .summary-section .total-payment {
            font-weight: bold;
            color: #007bff;
        }
        .summary-section .total-payment .usd {
            font-size: 12px;
            color: #666666;
        }
        .anonymous-checkbox {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .anonymous-checkbox input {
            margin-right: 10px;
        }
        .note {
            font-size: 12px;
            color: #666666;
            margin-top: 10px;
        }
        .donation-box {
            background-color: #e9f3fb;
            border: 1px solid #cce0f5;
            border-radius: 8px;
            padding: 20px;
            margin: 20px auto;
            display: none;
        }
        .donation-box h5 {
            font-weight: bold;
        }
        .donation-box p {
            color: #6c757d;
        }
        .donation-box .form-control {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .donation-box .form-text {
            color: #6c757d;
        }
        .donation-box a {
            color: #007bff;
            text-decoration: none;
        }
        .donation-box a:hover {
            text-decoration: underline;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .btn-custom {
            background-color: #e74c3c;
            color: #ffffff;
            width: 100%;
        }
        .form-label {
            margin-bottom: 5px;
        }
        .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card-container d-flex align-items-center mb-3">
            <a href="#" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
            <span class="ms-2">Tumor Mata Merenggut Masa Kecilnya, Bantu Kiran Sembuh!</span>
        </div>
        <div class="card-container donation-container mt-3">
            <h5>Nominal Donasi</h5>
            <div class="d-flex flex-wrap">
                <button class="donation-button" onclick="selectDonation(this, 30000)">Rp 30.000</button>
                <button class="donation-button" onclick="selectDonation(this, 50000)">Rp 50.000</button>
                <button class="donation-button" onclick="selectDonation(this, 100000)">Rp 100.000</button>
                <button class="donation-button" onclick="selectDonation(this, true)">Lainnya</button>
            </div>
            <div class="mt-3 hidden" id="custom-donation">
                <label for="donation-amount" class="form-label">Isi nominal donasi</label>
                <input type="text" id="donation-amount" class="donation-input" placeholder="">
                <div class="donation-minimum">Donasi minimal Rp 1.000</div>
            </div>
        </div>
        <div class="card-container donation-card mt-3" id="slider-section">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Donasi operasional</h5>
                <div class="toggle-switch">
                    <input type="checkbox" checked>
                </div>
            </div>
            <p>Donasi ini akan digunakan untuk mendukung operasionalisasi Yayasan WeCare.id. Kontribusi Anda akan membantu menopang operasionalisasi organisasi agar dapat membantu lebih banyak orang dan permasalahan sosial lainnya. Donasi ini opsional</p>
            <div class="donation-amount" id="donation-amount-display">Rp 5.000</div>
            <div class="slider-container">
                <div class="slider-label" id="slider-label">10%</div>
                <input type="range" min="0" max="100" value="10" id="donation-slider">
                <div class="d-flex justify-content-between">
                    <span>0%</span>
                    <span>100%</span>
                </div>
            </div>
            <div class="d-flex justify-content-start mt-3">
                <div class="custom-amount" id="custom-amount-link">Atau isi nominal sendiri</div>
            </div>
        </div>
        <div class="card-container donation-box" id="custom-amount-section">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Donasi operasional</h5>
                <div class="toggle-switch">
                    <input type="checkbox" checked>
                </div>
            </div>
            <p>Donasi ini akan digunakan untuk mendukung operasionalisasi Yayasan WeCare.id. Kontribusi Anda akan membantu menopang operasionalisasi organisasi agar dapat membantu lebih banyak orang dan permasalahan sosial lainnya. Donasi ini opsional</p>
            <input type="text" class="form-control" id="custom-amount-input" placeholder="">
            <div class="form-text">Donasi minimal Rp 1.000</div>
            <a href="#" id="back-to-slider">Kembali ke slider persentase</a>
        </div>
        <div class="card-container summary-section mt-3">
            <div class="summary-title">Ringkasan donasi</div>
            <div class="summary-item">
                <span>Donasi utama</span>
                <span id="main-donation">Rp 30.000</span>
            </div>
            <div class="summary-item">
                <span>Donasi operasional</span>
                <span id="operational-donation">Rp 5.000</span>
            </div>
            <hr>
            <div class="summary-item total-payment">
                <span>Total pembayaran</span>
                <span id="total-payment">Rp 35.000</span>
            </div>
            <div class="summary-item">
                <span></span>
                <span class="usd" id="usd-amount">2.22 USD</span>
            </div>
            <div class="anonymous-checkbox">
                <input type="checkbox" id="anonymousCheck" checked>
                <label for="anonymousCheck">Donasi sebagai anonymous</label>
            </div>
            <div class="note">Untuk donasi di bawah Rp 10.000 hanya dapat menggunakan opsi pembayaran GoPay, OVO, Jenius dan #DompetSehat WeCare.id</div>
        </div>
        <div class="card-container form-container mt-3">
            <h5 class="mb-4">Masukkan identitas kamu</h5>
            <form>
                <div class="mb-2">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="">
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="">
                </div>
                <div class="mb-2">
                    <label for="phone" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" id="phone" placeholder="">
                </div>
                <button type="submit" class="btn btn-custom">Lanjut pembayaran</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        const slider = document.getElementById('donation-slider');
        const sliderLabel = document.getElementById('slider-label');
        const donationAmountDisplay = document.getElementById('donation-amount-display');
        const operationalDonation = document.getElementById('operational-donation');
        const totalPayment = document.getElementById('total-payment');
        const usdAmount = document.getElementById('usd-amount');
        const customAmountLink = document.getElementById('custom-amount-link');
        const backToSlider = document.getElementById('back-to-slider');
        const sliderSection = document.getElementById('slider-section');
        const customAmountSection = document.getElementById('custom-amount-section');
        const customAmountInput = document.getElementById('custom-amount-input');
        const mainDonation = document.getElementById('main-donation');
        const donationButtons = document.querySelectorAll('.donation-button');

        let mainDonationAmount = 30000;

        function updateSummary() {
            const operationalAmount = parseInt(donationAmountDisplay.textContent.replace(/[^0-9]/g, ''), 10) || 0;
            const total = mainDonationAmount + operationalAmount;
            totalPayment.textContent = 'Rp ' + total.toLocaleString('id-ID');
            const usd = (total / 15750).toFixed(2); // Assuming 1 USD = 15750 IDR
            usdAmount.textContent = usd + ' USD';
        }

        function selectDonation(button, amount) {
            // Remove active class from all buttons
            donationButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to the clicked button
            button.classList.add('active');
            // Show or hide the custom donation input
            if (amount === true) {
                document.getElementById('custom-donation').classList.remove('hidden');
                mainDonationAmount = 0;
            } else {
                document.getElementById('custom-donation').classList.add('hidden');
                mainDonationAmount = amount;
            }
            mainDonation.textContent = 'Rp ' + mainDonationAmount.toLocaleString('id-ID');
            updateSummary();
        }

        slider.addEventListener('input', function() {
            const percentage = slider.value;
            sliderLabel.textContent = percentage + '%';
            const amount = (percentage / 100) * 50000;
            donationAmountDisplay.textContent = 'Rp ' + amount.toLocaleString('id-ID');
            operationalDonation.textContent = 'Rp ' + amount.toLocaleString('id-ID');
            sliderLabel.style.left = `calc(${percentage}% - 20px)`;
            updateSummary();
        });

        customAmountLink.addEventListener('click', function() {
            sliderSection.style.display = 'none';
            customAmountSection.style.display = 'block';
        });

        backToSlider.addEventListener('click', function() {
            sliderSection.style.display = 'block';
            customAmountSection.style.display = 'none';
        });

        customAmountInput.addEventListener('input', function() {
            const amount = parseInt(customAmountInput.value.replace(/[^0-9]/g, ''), 10) || 0;
            donationAmountDisplay.textContent = 'Rp ' + amount.toLocaleString('id-ID');
            operationalDonation.textContent = 'Rp ' + amount.toLocaleString('id-ID');
            updateSummary();
        });
    </script>
</body>
</html>