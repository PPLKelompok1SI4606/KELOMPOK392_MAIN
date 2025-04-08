const hre = require("hardhat");

async function main() {
  const LoanContract = await hre.ethers.getContractFactory("LoanContract");
  const loanContract = await LoanContract.deploy("0x38cEA110F24eA18A6cdd3761dFDd68Ff16bF9121", 1000, 30, 5);

  await loanContract.deployed();
  console.log(`LoanContract deployed to: ${loanContract.address}`);
}

main().catch((error) => {
  console.error(error);
  process.exitCode = 1;
});
