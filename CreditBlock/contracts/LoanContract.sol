//SPDX-License-Identifier:MIT
pragma solidity ^0.8.0;

contract LoanContract{
    address public lender;
    address public borrower;
    uint256 public loanAmount;
    uint256 public duration;
    uint256 public interestRate;
    uint256 public totalRepayment;
    uint256 public startTime;
    bool public isApproved = false;
    bool public isRepaid = false;

    constructor(
        address _borrower, uint256 _loanAmount, uint256 _duration, uint256 _interestRate
    ){
        lender = msg.sender;
        borrower = _borrower;
        loanAmount = _loanAmount;
        duration = _duration;
        interestRate = _interestRate;
        totalRepayment = _loanAmount + (_loanAmount * _interestRate / 100);
    }
        function approveLoan() public {
        require(msg.sender == lender, "Hanya lender yang bisa menyetujui");
        require(!isApproved, "Pinjaman sudah disetujui");
        isApproved = true;
        startTime = block.timestamp;
    }
    function markAsRepaid() public {
        require(msg.sender == lender, "Hanya lender yang bisa menandai lunas");
        require(isApproved, "Pinjaman belum disetujui");
        require(!isRepaid, "Pinjaman sudah lunas");
        isRepaid = true;
    }
}
