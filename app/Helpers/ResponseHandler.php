<?php

    namespace App\Helpers;
    class ResponseHandler {

        public function succses($message,$data=null,$code = 200) {

            return response()->json([

                'succses' => True,
                'message' => $message,
                'data' => $data

            ],$code);

        }


        public function error($message, $code = 400, $data=null) {

            return response()->json([

                'message' => $message,
                'data' => $data

            ],$code);

        }


    }











?>