<?php

class Produk {
    // Properti umum
    public $judul,
           $penulis,
           $penerbit,
           $harga;

    // Constructor milik Parent
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Method milik Parent
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }
}

class komik extends Produk {
    public $jumlahHalaman;
    public function __construct($judul, $penulis, $penerbit, $harga, $jumlahHalaman) 
    {
        parent::__construct( $judul, $penulis, $penerbit, $harga);
        $this->jumlahHalaman = $jumlahHalaman;
    }

    public function getInfoProduk() {
        $info = "komik: " . parent::getLabel() . " | Harga: " . $this->harga . " | Halaman: " . $this->jumlahHalaman;
        return $info;
    }
}

//komik 1
$komik1 = new komik('NARUTO', 'Penulis Naruto', '2002', 1000, 10);
echo $komik1->getInfoProduk();
?>