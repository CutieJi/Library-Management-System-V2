<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Borrowed & Returned Books Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 30px;
            color: #333;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            border-bottom: 3px solid #2c3e50;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }
        .header img {
            width: 80px;
            height: auto;
            margin-right: 20px;
        }
        .header-text h2 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
        }
        .header-text h4 {
            margin: 3px 0;
            font-size: 13px;
            color: #555;
        }
        .header-text p {
            margin: 2px 0;
            font-size: 11px;
            font-style: italic;
            color: #777;
        }

        /* Title */
        .report-title {
            text-align: center;
            margin: 15px 0 25px 0;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            color: #2c3e50;
            letter-spacing: 1px;
        }

        /* Modern Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 12px;
        }
        th, td {
            padding: 8px 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
        }
        td {
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #eef5ff;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 11px;
            color: #555;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .footer p {
            margin: 2px 0;
        }

        /* Signature Section */
        .signature {
            margin-top: 50px;
            text-align: left;
            font-size: 12px;
        }
        .signature p {
            margin: 4px 0;
        }
        .signature .line {
            margin-top: 35px;
            border-top: 1px solid #000;
            width: 200px;
        }
        .watermark {
            position: fixed;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 400px;
            opacity: 0.08; /* adjust transparency */
            z-index: -1;   /* keep behind text */
        }
        .watermark img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="<?= $logo; ?>" alt="School Logo">
        <div class="header-text">
            <h2>University of Caloocan City</h2>
            <h4>Biglang Awa Corner Cattleya Sts., Grace Park, Caloocan</h4>
            <p>Borrowed and Returned Books Report</p>
            <p>Date Generated: <?= date("F d, Y"); ?></p>
        </div>
    </div>

    <!-- Report Title -->
    <div class="report-title">
        Books Transaction Summary
    </div>

    <!-- Modern Table -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Quantity</th>
                <th>Borrow Date</th>
                <th>Requested Return</th>
                <th>Approved Return</th>
                <th>Status</th>
                <th>Fine</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($returned_books as $r): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $r['title']; ?></td>
                <td><?= $r['quantity']; ?></td>
                <td><?= date('M d, Y', strtotime($r['borrow_date'])); ?></td>
                <td><?= date('M d, Y', strtotime($r['request_return_date'])); ?></td>
                <td><?= $r['return_date'] ? date('M d, Y', strtotime($r['return_date'])) : '-'; ?></td>
                <td><?= ucfirst($r['status']); ?></td>
                <td><?= $r['fine_amount'] ? '₱'.number_format($r['fine_amount'],2) : '-'; ?></td>
                <td><?= $r['first_name'].' '.$r['last_name']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Signature Section -->
    <div class="signature">
        <p>Prepared by:</p>
        <div class="line"></div>
        <p><?= $user['first_name'].' '.$user['last_name']; ?></p>
        <p><i>System Administrator</i></p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>System Generated Report – <?= date("h:i A"); ?></p>
        <p>Confidential Document • For Official Use Only</p>
    </div>

    <div class="watermark">
    <img src="<?= $seal; ?>" alt="School Seal">
</div>

</body>
</html>
