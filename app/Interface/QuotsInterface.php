<?php

namespace App\Interface;

interface QuotsInterface {
    public function getQuots();
    public function getQuotsByCategory($category);
}