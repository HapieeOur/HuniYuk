<?php

    namespace App\Services\Implementasi;


    use App\Repositories\Contracts\KostRepositoryInterface;
    use App\Services\Contracts\KostServicesInterface;

    class KostServices implements KostServicesInterface {

        protected $kostRepository;
        public function __construct(KostRepositoryInterface $kostRepository) {

            $this->kostRepository = $kostRepository;
        }

        public function tambah_kost(array $data) {

            return $this->kostRepository->create_kost($data);
            
        }

    }













?>