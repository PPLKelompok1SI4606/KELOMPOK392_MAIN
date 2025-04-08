<?php

namespace App\Http\Controllers;

use Web3\Web3;
use Web3\Contract;
use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    protected $web3;
    protected $contract;

    public function __construct()
    {
        $this->web3 = new Web3('https://ropsten.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $this->contract = new Contract(
            $this->web3->provider,
            file_get_contents(base_path('contracts/LoanContract.abi'))
        );
    }

    public function showApplicationForm()
    {
        return view('loans.apply');
    }

    public function submitApplication(Request $request)
    {
        $request->validate([
            'borrower_address' => 'required|string',//Alamat Metamask Pengguna
            'loan_amount' => 'required|numeric|min:1000000|max:100000000',
            'duration' => 'required|integer|min:30|max:'
        ]);

        $loan = new Loan();
        $loan->borrower_address = $request->borrower_address;
        $loan->amount = $request->loan_amount;
        $loan->duration
    }
};
