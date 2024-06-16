<?php

class SuccessResponse {
    public $status;
    public $data;

    public function __construct($status, $data = null) {
        $this->status = $status;
        $this->data = $data;
    }
}