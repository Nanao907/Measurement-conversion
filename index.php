<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jacquard+24&display=swap" rel="stylesheet">
    <title> Converter</title>
</head>
<body>

<h2> Converter</h2>

<form method="post" action="">
    <label for="category">Select Category:</label>
    <select name="category" id="category">
        <option value="temperature">Temperature</option>
        <option value="speed">Speed</option>
        <option value="mass">Mass</option>
    </select>
    <br>
    <label>Enter Value:</label>
    <input type="text" name="value" required>
    <br>
    <label>From Unit:</label>
    <select name="from_unit" required>
        <option value="celsius">Celsius</option>
        <option value="kmh">km/h</option>
        <option value="kg">kg</option>
        <option value="g">g</option>
    </select>
    <br>
    <label>To Unit:</label>
    <select name="to_unit" required>
        <option value="fahrenheit">Fahrenheit</option>
        <option value="kelvin">Kelvin</option>
        <option value="ms">m/s</option>
        <option value="knots">knots</option>
        <option value="kg">kg</option>
        <option value="g">g</option>
    </select>
    <br>
    <button type="submit" name="calculate">Convert</button>
</form>

<div>
    <?php

// Temperature Conversion
function convertTemperature($value, $fromUnit, $toUnit) {
    switch ($fromUnit) {
        case 'celsius':
            $celsius = $value;
            break;
        default:
            return "Invalid from unit";
    }

    switch ($toUnit) {
        case 'fahrenheit':
            return ($celsius * 9/5) + 32;
        case 'kelvin':
            return $celsius + 273.15;
        default:
            return "Invalid to unit";
    }
}

// Speed Conversion
function convertSpeed($value, $fromUnit, $toUnit) {
    switch ($fromUnit) {
        case 'kmh':
            $kmh = $value;
            break;
        default:
            return "Invalid from unit";
    }

    switch ($toUnit) {
        case 'ms':
            return $kmh * 1000 / 3600;
        case 'knots':
            return $kmh * 0.539957;
        default:
            return "Invalid to unit";
    }
}

// Mass Conversion
function convertMass($value, $fromUnit, $toUnit) {
    switch ($fromUnit) {
        case 'kg':
            $kg = $value;
            break;
        case 'g':
            $kg = $value / 1000;
            break;
        default:
            return "Invalid from unit";
    }

    switch ($toUnit) {
        case 'g':
            return $kg * 1000;
        case 'kg':
            return $kg;
        default:
            return "Invalid to unit";
    }
}
if (isset($_POST['calculate'])) {
    $value = $_POST['value'];
    $fromUnit = $_POST['from_unit'];
    $toUnit = $_POST['to_unit'];
    $category = $_POST['category'];

    // Perform conversion based on selected category
    switch ($category) {
        case 'temperature':
            $result = convertTemperature($value, $fromUnit, $toUnit);
            break;
        case 'speed':
            $result = convertSpeed($value, $fromUnit, $toUnit);
            break;
        case 'mass':
            $result = convertMass($value, $fromUnit, $toUnit);
            break;
        default:
            $result = "Invalid category";
    }

    // Display result if available
    if (isset($result)) {
        echo "<h3>Result: $result</h3>";
    }
}
?>
</div>



<footer>
        <p> &copy Arina Belugina </p>
    </footer>

</body>
</html>
