<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Conversion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="number"],
        select {
            padding: 8px;
            margin: 5px;
        }

        button {
            padding: 8px 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Currency Conversion</h1>
        <form method="POST">
            <input type="number" name="amount" placeholder="Enter amount" step="any" required>
            <select name="fromCurrency">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
                <option value="INR">INR</option>
            </select>
            <span>to</span>
            <select name="toCurrency">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
                <option value="INR">INR</option>
            </select>
            <button type="submit">Convert</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $amount = $_POST['amount'];
            $fromCurrency = $_POST['fromCurrency'];
            $toCurrency = $_POST['toCurrency'];

            // Fixed exchange rates
            $exchangeRates = [
                'USD' => ['EUR' => 0.85, 'GBP' => 0.74, 'INR' => 75.19],
                'EUR' => ['USD' => 1.18, 'GBP' => 0.87, 'INR' => 88.63],
                'GBP' => ['USD' => 1.35, 'EUR' => 1.15, 'INR' => 101.23],
                'INR' => ['USD' => 0.013, 'EUR' => 0.011, 'GBP' => 0.0099],
            ];

            if (isset($exchangeRates[$fromCurrency][$toCurrency])) {
                $conversionRate = $exchangeRates[$fromCurrency][$toCurrency];
                $convertedAmount = $amount * $conversionRate;
                echo "<div class='result'><p>$amount $fromCurrency = $convertedAmount $toCurrency</p></div>";
            } else {
                echo "<div class='result'><p>Invalid conversion</p></div>";
            }
        }
        ?>
    </div>
</body>
</html>
