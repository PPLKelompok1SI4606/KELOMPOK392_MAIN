<?php

namespace App\Services;

use Web3\Web3;
use Illuminate\Support\Facades\Log;

class BlockchainService
{
    protected $web3;

    public function __construct()
    {
        $this->web3 = new Web3(config('blockchain.rpc_url'));
    }

    public function testConnection()
    {
        $this->web3->eth->blockNumber(function ($err, $block) {
            if ($err) {
                Log::error("Blockchain connection failed: {$err->getMessage()}");
                return false;
            }
            Log::info("Connected to blockchain. Current block: {$block}");
            return true;
        });
    }
}
