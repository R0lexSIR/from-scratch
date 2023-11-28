import logo from "./logo.svg";
import "./App.css";

function App() {
  const [units, setUnits] = useState("");
  const [customerType, setCustomerType] = useState("residential");
  const [result, setResult] = useState("");

  const calculateBill = () => {
    if (!/^\d+$/.test(units) || units <= 0) {
      setResult("Please enter a valid number of units.");
      return;
    }
    const rate = customerType === "residential" ? 5 : 7;
    const billAmount = units * rate;
    setResult(`Your Electricity Bill is: ${billAmount}`);
  };
  return (
    <div className="App">
      <h1>Electricity Bill Calculator</h1>
      <form>
        <label>
          Enter Units Consumed:
          <input
            type="number"
            value={units}
            onChange={(e) => setUnits(e.target.value)}
            required
          />
        </label>

        <label>
          Select Customer Type:
          <select
            value={customerType}
            onChange={(e) => setCustomerType(e.target.value)}
          >
            <option value="residential">Residential</option>
            <option value="commercial">Commercial</option>
          </select>
        </label>

        <button type="button" onClick={calculateBill}>
          Calculate Bill
        </button>
      </form>

      <div id="result">{result}</div>
    </div>
  );
}

export default App;
