require("@nomicfoundation/hardhat-toolbox");
require("dotenv").config();

module.exports = {
  solidity: "0.8.20",
  networks: {
    hardhat: {},
    goerli: {
      url: process.env.ALCHEMY_API_URL, // Gunakan Alchemy atau Infura
      accounts: [process.env.PRIVATE_KEY] // Masukkan private key wallet kamu
    }
  }
};
