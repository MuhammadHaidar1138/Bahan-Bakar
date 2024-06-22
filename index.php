<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Desain.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="all ">
        <h1 class="text-center">Form Isi Bahan Bakar</h1>
        <form action="" method="post">
            <div class="input-group mb-3 px-3">
                <span class="Liter input-group-text" id="inputGroup-sizing-default" for="Liter">Liter</span>
                <input type="number" class="form-control " id="Liter" name="Liter" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Masukkann Jumlah Liter dengan angka">
            </div>
            <div class="px-3">
                <select class="form-select form-select-lg mb-3" name="Jenis" id="Jenis" for="Jenis" aria-label="Large select example">
                    <option selected>Pilih Jenis Bahan Bakar</option>
                    <option value="S Super">Shell S-Super</option>
                    <option value="S V-Power">Shell V-Power</option>
                    <option value="S V-Power Diesel">Shell V-Power Diesel</option>
                    <option value="S V-Power Nitro">Shell V-Power Nitro</option>
                </select>

            </div>
            <div class="px-3">
                <button type="submit" class="btn btn-light" name="beli">Cetak</button>                
            </div>
        </form>
    
        <?php

        $logic = new Pembelian ();
        $logic->setHarga(10000,15000,18000,20000);

        if (isset($_POST['beli'])){
            $logic->JenisYangDipilih = $_POST ['Jenis'];
            $logic->totalLiter = $_POST ['Liter'];
            $logic->totalHarga();
            $logic->cetakBukti();
        }
        class DataBahanBakar {
            private $HargaSSuper;
            private $HargaSVPower;
            private $HargaSVPowerDiesel;
            private $HargaSVPowerNitro;
    
            public $JenisYangDipilih;
            public $totalLiter;
    
            protected $totalPembayaran;
    
    
            public function setHarga($valSSuper, $valSVPower, $valSVPowerDiesel, $valSVPowerNitro){
                $this->HargaSSuper = $valSSuper;
                $this->HargaSVPower = $valSVPower;
                $this->HargaSVPowerDiesel = $valSVPowerDiesel;
                $this->HargaSVPowerNitro = $valSVPowerNitro;
            }
    
            public function getHarga(){
                $semuaDataSolar["S Super"] = $this->HargaSSuper;
                $semuaDataSolar["S V-Power"] = $this->HargaSVPower;
                $semuaDataSolar["S V-Power Diesel"] = $this->HargaSVPowerDiesel;
                $semuaDataSolar["S V-Power Nitro"] = $this->HargaSVPowerNitro;
                return $semuaDataSolar;
            }
        }
    
        class pembelian extends DataBahanBakar {
            public function totalHarga () {
                $this->totalPembayaran = $this->getHarga()[$this->JenisYangDipilih] * $this->totalLiter;
            }
            
            public function cetakBukti() {
                echo '<div class="d-flex align-items-center justify-content-center">';
                echo '--------------------------------------------------------'; 
                echo '<br>';
                echo 'Jenis Bahan Bakar : ' . $this->JenisYangDipilih;
                echo '<br>';
                echo 'Total Liter : ' . $this->totalLiter;
                echo '<br>';
                echo 'Harga Bayar : Rp. ' . number_format($this->totalPembayaran, 0, ',','.');
                echo '<br>';
                echo '--------------------------------------------------------';
                echo '</div>';
            }
            
        };
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </div>
</body>
</html>