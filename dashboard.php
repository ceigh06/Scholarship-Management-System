<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-4.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .cards-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            max-width: 500px;
            margin: 0 auto;
        }

        .card {
            border-radius: 15px;
            padding: 20px 25px;
            color: white;
        }

        .card p {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card h3 {
            font-size: 40px;
        }

        .total {
            background-color: #7c3aed;
        }

        .approved {
            background-color: #16a34a;
        }

        .pending {
            background-color: #eab308;
        }

        .rejected {
            background-color: #dc2626;
        }
    </style>
</head>
<body>

    <div class="cards-container">
        <div class="card total">
            <p>No. of Applications</p>
            <h3 id="total">---</h3>
        </div>
        <div class="card approved">
            <p>Approved</p>
            <h3 id="approved">---</h3>
        </div>
        <div class="card pending">
            <p>Pending</p>
            <h3 id="pending">---</h3>
        </div>
        <div class="card rejected">
            <p>Rejected</p>
            <h3 id="rejected">---</h3>
        </div>
    </div>

    <div>
        <canvas id="ApplicationsPerDay"></canvas>
    </div>

    <div>
        <canvas id="ApplicationsDistribution"></canvas>
    </div>

    <script src="script.js"></script>

</body>
</html>