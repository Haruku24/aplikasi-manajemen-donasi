
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Kalkulator Zakat
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            margin-top: 15px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #495057;
        }

        .nav-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            color: #007bff;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 2px solid #007bff;
            font-weight: bold;
        }

        .form-label {
            font-weight: bold;
            color: #495057;
        }

        .input-group-text {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .info-toggle {
            cursor: pointer;
            color: #007bff;
            font-weight: bold;
        }

        .info-toggle .arrow-icon {
            transition: transform 0.3s;
        }

        .info-toggle .arrow-icon.open {
            transform: rotate(180deg);
        }

        .info-content {
            display: none;
            margin-top: 10px;
            color: #6c757d;
        }

        .info-content.active {
            display: block;
        }

        .modal-content {
            border-radius: 15px;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .niat-zakat-card {
            border: none;
            background-color: #f8f9fa;
        }

        .niat-zakat-card .card-body {
            padding: 10px;
        }

        .niat-zakat-card .text-primary {
            color: #007bff !important;
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 15px;
            }

            .card-title {
                font-size: 1.25rem;
            }

            .modal-title {
                font-size: 1.25rem;
            }

            .btn {
                font-size: 0.875rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-start mb-3">
                        Kalkulator Zakat
                    </h5>
                    <ul class="nav nav-tabs mb-4" id="zakatTabs" role="tablist">
                        <li class="nav-item">
                            <button aria-controls="penghasilan" aria-selected="true" class="nav-link active"
                                data-bs-target="#penghasilan" data-bs-toggle="tab" id="penghasilan-tab" role="tab"
                                type="button">
                                Penghasilan
                            </button>
                        </li>
                        <li class="nav-item">
                            <button aria-controls="maal" aria-selected="false" class="nav-link" data-bs-target="#maal"
                                data-bs-toggle="tab" id="maal-tab" role="tab" type="button">
                                Maal
                            </button>
                        </li>
                        <li class="nav-item">
                            <button aria-controls="fitrah" aria-selected="false" class="nav-link"
                                data-bs-target="#fitrah" data-bs-toggle="tab" id="fitrah-tab" role="tab" type="button">
                                Fitrah
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="zakatTabsContent">
                        <!-- Tab Penghasilan -->
                        <div aria-labelledby="penghasilan-tab" class="tab-pane fade show active" id="penghasilan"
                            role="tabpanel">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" for="income">
                                        Penghasilan per bulan *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                        <input class="form-control format-number" id="income" placeholder="0"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="bonus">
                                        THR atau bonus (Opsional)
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                        <input class="form-control format-number" id="bonus" placeholder="0"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="debt">
                                        Utang dan cicilan (Opsional)
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                        <input class="form-control format-number" id="debt" placeholder="0"
                                            type="text" />
                                    </div>
                                </div>
                                <p class="info-toggle" onclick="toggleInfo('info-penghasilan')">
                                    <span class="arrow-icon">&#9660;</span>
                                    Kalkulator ini dibuat berdasarkan peraturan Menteri Agama RI No. 52 Tahun 2019
                                </p>
                                <div class="info-content" id="info-penghasilan">
                                    <p>
                                        Zakat penghasilan atau yang dikenal juga sebagai zakat profesi...
                                    </p>
                                </div>
                                <button class="btn btn-primary w-100 mt-3" onclick="calculateZakat()" type="button">
                                    Hitung Zakat
                                </button>
                            </form>
                        </div>
                        <!-- Tab Maal -->
                        <div aria-labelledby="maal-tab" class="tab-pane fade" id="maal" role="tabpanel">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" for="emas">
                                        Nilai aset logam mulia (emas, perak, atau permata) *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                        <input class="form-control format-number" id="emas" placeholder="0"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="uang">
                                        Uang tunai, tabungan, deposito
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                        <input class="form-control format-number" id="uang" placeholder="0"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="surat">
                                        Nilai aset surat berharga
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                        <input class="form-control format-number" id="surat" placeholder="0"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="lainnya">
                                        Nilai aset lainnya
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                        <input class="form-control format-number" id="lainnya" placeholder="0"
                                            type="text" />
                                    </div>
                                </div>
                                <p class="info-toggle" onclick="toggleInfo('info-maal')">
                                    <span class="arrow-icon">&#9660;</span>
                                    Kalkulator zakat maal
                                </p>
                                <div class="info-content" id="info-maal">
                                    <p>
                                        Zakat maal adalah zakat yang dikenakan pada harta yang dimiliki oleh seseorang...
                                    </p>
                                </div>
                                <button class="btn btn-primary w-100 mt-3" onclick="calculateZakatMaal()" type="button">
                                    Hitung Zakat Maal
                                </button>
                            </form>
                        </div>
                        <!-- Tab Fitrah -->
                        <div aria-labelledby="fitrah-tab" class="tab-pane fade" id="fitrah" role="tabpanel">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" for="jumlahOrang">
                                        Jumlah Orang yang wajib dizakati *
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="jumlahOrang" placeholder="0" type="number" />
                                        <span class="input-group-text">
                                            Orang
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="hargaFitrah">
                                        Harga zakat fitrah per orang *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Rp
                                        </span>
                                        <input class="form-control format-number" id="hargaFitrah" placeholder="0"
                                            type="text" />
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100 mt-3" onclick="calculateZakatFitrah()"
                                    type="button">
                                    Hitung Zakat Fitrah
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Penghasilan -->
    <div aria-hidden="true" aria-labelledby="zakatModalLabel" class="modal fade" id="zakatModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zakatModalLabel">
                        Kalkulator Zakat Penghasilan
                    </h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img alt="Logo with two blue hearts" class="mb-3" height="50"
                            src="https://storage.googleapis.com/a1aa/image/0GfY5O4fFeS7gpPp0MvIgM41iTO7BGbbk6hfjgrHW3fLLZ5eE.jpg"
                            width="50" />
                        <h5>
                            Kalkulator Zakat Penghasilan
                        </h5>
                        <p>
                            Jumlah zakat penghasilan kamu sebesar
                        </p>
                        <h3 class="text-primary" id="zakatAmount">
                            Rp 0
                        </h3>
                        <div class="card niat-zakat-card">
                            <div class="card-body">
                                <p>
                                    <i class="fas fa-praying-hands text-primary"></i> <strong>Niat Zakat:</strong>
                                </p>
                                <p class="text-primary">
                                    Allahuma Aj'alha maghnaman wa la taj'alha maghramann.
                                </p>
                                <p>
                                    Artinya: “Aku berniat mengeluarkan zakat hartaku karena Allah Ta’ala”
                                </p>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100 mb-3" data-bs-dismiss="modal" type="button">
                            Hitung Ulang
                        </button>
                        <button class="btn btn-primary w-100" type="button">
                            Bayar Zakat Penghasilan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Maal -->
    <div aria-hidden="true" aria-labelledby="maalModalLabel" class="modal fade" id="maalModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="maalModalLabel">
                        Kalkulator Zakat Maal
                    </h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img alt="Logo with two blue hearts" class="mb-3" height="50"
                            src="https://storage.googleapis.com/a1aa/image/0GfY5O4fFeS7gpPp0MvIgM41iTO7BGbbk6hfjgrHW3fLLZ5eE.jpg"
                            width="50" />
                        <h5>
                            Kalkulator Zakat Maal
                        </h5>
                        <p>
                            Jumlah zakat maal kamu sebesar
                        </p>
                        <h3 class="text-primary" id="maalAmount">
                            Rp 0
                        </h3>
                        <div class="card niat-zakat-card">
                            <div class="card-body">
                                <p>
                                    <i class="fas fa-praying-hands text-primary"></i> <strong>Niat Zakat:</strong>
                                </p>
                                <p class="text-primary">
                                    Allahuma Aj'alha maghnaman wa la taj'alha maghramann.
                                </p>
                                <p>
                                    Artinya: “Aku berniat mengeluarkan zakat hartaku karena Allah Ta’ala”
                                </p>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100 mb-3" data-bs-dismiss="modal" type="button">
                            Hitung Ulang
                        </button>
                        <button class="btn btn-primary w-100" type="button">
                            Bayar Zakat Maal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Fitrah -->
    <div aria-hidden="true" aria-labelledby="fitrahModalLabel" class="modal fade" id="fitrahModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fitrahModalLabel">
                        Kalkulator Zakat Fitrah
                    </h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img alt="Logo with two blue hearts" class="mb-3" height="50"
                            src="https://storage.googleapis.com/a1aa/image/0GfY5O4fFeS7gpPp0MvIgM41iTO7BGbbk6hfjgrHW3fLLZ5eE.jpg"
                            width="50" />
                        <h5>
                            Kalkulator Zakat Fitrah
                        </h5>
                        <p>
                            Jumlah zakat fitrah kamu sebesar
                        </p>
                        <h3 class="text-primary" id="fitrahAmount">
                            Rp 0
                        </h3>
                        <div class="card niat-zakat-card">
                            <div class="card-body">
                                <p>
                                    <i class="fas fa-praying-hands text-primary"></i> <strong>Niat Zakat:</strong>
                                </p>
                                <p class="text-primary">
                                    Allahuma Aj'alha maghnaman wa la taj'alha maghramann.
                                </p>
                                <p>
                                    Artinya: “Aku berniat mengeluarkan zakat hartaku karena Allah Ta’ala”
                                </p>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100 mb-3" data-bs-dismiss="modal" type="button">
                            Hitung Ulang
                        </button>
                        <button class="btn btn-primary w-100" type="button">
                            Bayar Zakat Fitrah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script>
        // Fungsi untuk memformat angka dengan pemisah ribuan (titik)
        function formatRupiah(value) {
            return value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Mengaplikasikan formatRupiah pada input yang memiliki kelas '.format-number'
        document.querySelectorAll('.format-number').forEach(input => {
            input.addEventListener('input', function () {
                this.value = formatRupiah(this.value.replace(/[^\d]/g, ''));
            });
        });

        // Fungsi untuk menampilkan atau menyembunyikan informasi tambahan
        function toggleInfo(id) {
            const infoElement = document.getElementById(id);
            const arrowIcon = infoElement.previousElementSibling.querySelector('.arrow-icon');

            infoElement.classList.toggle('active');
            arrowIcon.classList.toggle('open');
        }

        // Fungsi untuk menghitung zakat penghasilan
        function calculateZakat() {
            const income = parseInt(document.getElementById('income').value.replace(/\./g, '') || '0');
            const bonus = parseInt(document.getElementById('bonus').value.replace(/\./g, '') || '0');
            const debt = parseInt(document.getElementById('debt').value.replace(/\./g, '') || '0');

            const zakat = (income + bonus - debt) * 0.025;

            if (zakat > 0) {
                document.getElementById('zakatAmount').innerText = `Rp ${formatRupiah(zakat.toString())}`;
                var zakatModal = new bootstrap.Modal(document.getElementById('zakatModal'));
                zakatModal.show();
            } else {
                alert("Jumlah zakat penghasilan tidak valid. Pastikan input benar.");
            }
        }

        // Fungsi untuk menghitung zakat maal
        function calculateZakatMaal() {
            const emas = parseInt(document.getElementById('emas').value.replace(/\./g, '') || '0');
            const uang = parseInt(document.getElementById('uang').value.replace(/\./g, '') || '0');
            const surat = parseInt(document.getElementById('surat').value.replace(/\./g, '') || '0');
            const lainnya = parseInt(document.getElementById('lainnya').value.replace(/\./g, '') || '0');

            // Total harta yang dimiliki
            const totalHarta = emas + uang + surat + lainnya;

            // Zakat 2.5% dari total harta
            const zakat = totalHarta * 0.025;

            if (zakat > 0) {
                document.getElementById('maalAmount').innerText = `Rp ${formatRupiah(zakat.toString())}`;
                var maalModal = new bootstrap.Modal(document.getElementById('maalModal'));
                maalModal.show();
            } else {
                alert("Jumlah zakat maal tidak valid. Pastikan input benar.");
            }
        }

        // Fungsi untuk menghitung zakat fitrah
        function calculateZakatFitrah() {
            const jumlahOrang = parseInt(document.getElementById('jumlahOrang').value || '0');
            const hargaFitrah = parseInt(document.getElementById('hargaFitrah').value.replace(/\./g, '') || '0');

            // Zakat fitrah per orang
            const zakatFitrah = jumlahOrang * hargaFitrah;

            if (zakatFitrah > 0) {
                document.getElementById('fitrahAmount').innerText = `Rp ${formatRupiah(zakatFitrah.toString())}`;
                var fitrahModal = new bootstrap.Modal(document.getElementById('fitrahModal'));
                fitrahModal.show();
            } else {
                alert("Jumlah zakat fitrah tidak valid. Pastikan input benar.");
            }
        }
    </script>
</body>

</html>
