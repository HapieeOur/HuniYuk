<?php

    namespace App\Repositories\Implementasi;


    use App\Models\Kost;
    use App\Repositories\Contracts\KostRepositoryInterface;


    class KostRepository implements KostRepositoryInterface {

        public function create_kost(array $data) {

            $getinput = [

                'nama_kost' => $data['nama_kost'],
                'jumlah_kamar' => $data['jumlah_kamar'],
                'status_kamar' => $data['status_kamar']

            ];


            return Kost::create($getinput);

        }

        public function create_kategori(array $data) {
            
        }
    }







?>
