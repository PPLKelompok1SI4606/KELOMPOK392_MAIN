<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Blockchain RPC URL
    |--------------------------------------------------------------------------
    | URL ke node blockchain (misalnya Infura, Alchemy, atau lokal Ganache).
    */
    'rpc_url' => env('BLOCKCHAIN_RPC_URL', 'http://localhost:8545'),

    /*
    |--------------------------------------------------------------------------
    | Chain ID
    |--------------------------------------------------------------------------
    | ID jaringan blockchain (misalnya 1 untuk Ethereum Mainnet, 11155111 untuk Sepolia).
    */
    'chain_id' => env('BLOCKCHAIN_CHAIN_ID', 1),

    /*
    |--------------------------------------------------------------------------
    | Default Wallet Private Key (Opsional)
    |--------------------------------------------------------------------------
    | Private key untuk deploy kontrak (hanya untuk testing, simpan di .env).
    | Jangan gunakan di produksi, gunakan vault atau HSM untuk keamanan.
    */
    'private_key' => env('BLOCKCHAIN_PRIVATE_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | Contract Address (Opsional)
    |--------------------------------------------------------------------------
    | Alamat Smart Contract default jika sudah dideploy sebelumnya.
    */
    'contract_address' => env('BLOCKCHAIN_CONTRACT_ADDRESS', null),

    /*
    |-------------------------------------------------------------------------
    | API Key (Opsional)
    |-------------------------------------------------------------------------
    | Kunci API untuk layanan seperti Infura atau Alchemy.
    */
    'api_key' => env('BLOCKCHAIN_API_KEY', null),

    /*
    |-------------------------------------------------------------------------
    | Network Name
    |-------------------------------------------------------------------------
    | Nama jaringan untuk logging atau display (misalnya 'mainnet', 'sepolia').
    */
    'network_name' => env('BLOCKCHAIN_NETWORK_NAME', 'local'),
];
