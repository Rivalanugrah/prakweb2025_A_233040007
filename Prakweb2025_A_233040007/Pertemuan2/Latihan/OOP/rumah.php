<?php

class rumah{

    //Properti
    public  $warna ="putih";
    public $jumlahkamar = 3;
    public $alamat = "Indramayu";

        //constructor
    public function __construct( $warnaBaru, $kamarBaru ) {
        $this->warna = $warnaBaru;
        $this->jumlahKamar = $kamarBaru;
    }


    //Method
    public function kunciPintu()
    {
        return "Pintu Terkunci";
    }

    public function gantiWarna($warnaBaru)
    {
        $this->warna = $warnaBaru;
        return 'Rumah ini berwarna' . $this->warna;
    }



}

function pasangListrik($rumah){
    return "Rumah yg berwarna " . $rumah->warna . " ini dipasang listrik";
}

//rumah 1
$rumahSaya = new rumah('coklat', 5);
echo pasangListrik ($rumahSaya);
//$rumahSaya->gantiWarna('kuning');
// echo "rumah saya berwarna $rumahSaya->warna";
// echo "<br>";
// echo "Rumah saya $rumahSaya->jumlahkamar";
// echo "<br>";
// echo "Rumah saya:" .$rumahSaya->KunciPintu();
// echo "<br>";

//rumah 2
$rumahAdi = new rumah('hitam', 5);
// $rumahAdi->gantiWarna('abu');
// echo "Rumah adi berwarna $rumahAdi->warna";
// echo "<br>";
// echo "Rumah saya $rumahAdi->jumlahkamar"; 
// echo "<br>";

?>