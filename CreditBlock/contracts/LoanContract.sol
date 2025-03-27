// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

contract LoanContract {
    address public lender;
    address public borrower;
    uint256 public amount;
    uint256 public term; // Dalam bulan
    uint256 public startTime;
    mapping(uint256 => bool) public payments; // Cicilan ke-n lunas atau belum
    uint256 public totalPayments;

    event PaymentRecorded(uint256 installmentNumber, uint256 timestamp);

    constructor(address _borrower, uint256 _amount, uint256 _term) {
        lender = msg.sender;
        borrower = _borrower;
        amount = _amount;
        term = _term;
        startTime = block.timestamp;
        totalPayments = 0;
    }

    function recordPayment(uint256 installmentNumber) external {
        require(msg.sender == borrower, "Only borrower can record payment");
        require(!payments[installmentNumber], "Payment already recorded");
        require(installmentNumber < term, "Invalid installment number");

        payments[installmentNumber] = true;
        totalPayments += 1;

        emit PaymentRecorded(installmentNumber, block.timestamp);
    }

    function isLoanCompleted() public view returns (bool) {
        return totalPayments == term;
    }
}
