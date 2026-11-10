<?php

    namespace App\Services\Implementation;


    use App\Repositories\Interfaces\KostRepositoryInterface;
    use App\Services\Interfaces\KostServicesInterface;

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