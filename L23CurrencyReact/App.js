import React, { useState } from "react";
import "./App.css";

function App() {
  const [fromCurrency, setFromCurrency] = useState("USD");
  const [toCurrency, setToCurrency] = useState("EUR");
  const [amount, setAmount] = useState("");
  const [convertedAmount, setConvertedAmount] = useState("");

  const exchangeRates = {
    USD: { EUR: 0.85, GBP: 0.74, INR: 75.19 },
    EUR: { USD: 1.18, GBP: 0.87, INR: 88.63 },
    GBP: { USD: 1.35, EUR: 1.15, INR: 101.23 },
    INR: { USD: 0.013, EUR: 0.011, GBP: 0.0099 },
  };

  const handleConvert = () => {
    if (amount && !isNaN(amount)) {
      const rate = exchangeRates[fromCurrency][toCurrency];
      setConvertedAmount((amount * rate).toFixed(2));
    } else {
      setConvertedAmount("");
    }
  };

  return (
    <div className="App">
      <h1>Currency Converter</h1>
      <div>
        <input
          type="number"
          placeholder="Enter Amount"
          value={amount}
          onChange={(e) => setAmount(e.target.value)}
        />
        <select
          value={fromCurrency}
          onChange={(e) => setFromCurrency(e.target.value)}
        >
          <option value="USD">USD</option>
          <option value="EUR">EUR</option>
          <option value="GBP">GBP</option>
          <option value="INR">INR</option>
        </select>
        <span>to</span>
        <select
          value={toCurrency}
          onChange={(e) => setToCurrency(e.target.value)}
        >
          <option value="EUR">EUR</option>
          <option value="USD">USD</option>
          <option value="GBP">GBP</option>
          <option value="INR">INR</option>
        </select>
        <button onClick={handleConvert}>Convert</button>
      </div>
      {convertedAmount && (
        <h2>
          {convertedAmount} {toCurrency}
        </h2>
      )}
    </div>
  );
}

export default App;
