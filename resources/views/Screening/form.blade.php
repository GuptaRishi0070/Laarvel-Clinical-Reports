<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Screening Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f3f5;
        }
        .container {
            max-width: 600px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
        }
        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
            color: #555555;
        }
        .form-check-label {
            color: #666666;
            margin-right: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 30px;
            font-size: 16px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control {
            border-color: #ced4da;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Subject Screening Form</h2>
        <form action="/screening" method="post">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label>Frequency of Migraine Headaches:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="monthly" name="headache_frequency" value="Monthly" required>
                    <label class="form-check-label" for="monthly">Monthly</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="weekly" name="headache_frequency" value="Weekly">
                    <label class="form-check-label" for="weekly">Weekly</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="daily" name="headache_frequency" value="Daily">
                    <label class="form-check-label" for="daily">Daily</label>
                </div>
            </div>

            <div class="form-group" id="daily_frequency_div" style="display: none;">
                <label for="daily_frequency">Daily Frequency of Migraine Headaches:</label>
                <select class="form-control" id="daily_frequency" name="daily_frequency">
                    <option value="1-2">1-2</option>
                    <option value="3-4">3-4</option>
                    <option value="5+">5+</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        document.getElementById('daily').addEventListener('change', function() {
            document.getElementById('daily_frequency_div').style.display = this.checked ? 'block' : 'none';
        });
    </script>
</body>
</html>
