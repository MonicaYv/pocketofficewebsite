<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice – PocketOffice</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #e8f5fa;
            font-family: DejaVu Sans, sans-serif;
            color: #222;
        }

        .email-wrapper {
           padding:20px;
            max-width: 620px;
            margin: 30px auto;
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
        }

        table {
            border-collapse: collapse;
        }

        /* ── TOP BAR ── */
        .topbar-table {
            width: 100%;
            background: #0694B7;
        }

        .topbar-table td {
            padding: 18px 28px;
            vertical-align: middle;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.5px;
        }

        .invoice-badge {
            color: #fff;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 2px;
            text-align: right;
        }

        /* ── SENDER / META ── */
        .meta-row-table {
            width: 100%;
            padding: 22px 28px 0;
        }

        .meta-row-table td {
            vertical-align: top;
            padding: 22px 0 0;
        }

        .meta-left {
            padding-left: 28px;
        }

        .meta-right {
            padding-right: 28px;
            text-align: right;
        }

        .sender-name {
            font-size: 15px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 2px;
        }

        .sender-sub {
            font-size: 12px;
            color: #888;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .meta-icon-row {
            font-size: 12px;
            color: #555;
            margin-bottom: 4px;
        }

        .meta-icon-row td.icon-cell {
            width: 16px;
            color: #0694B7;
            padding-right: 4px;
        }

        .inv-table {
            border-collapse: collapse;
            font-size: 12.5px;
            margin-left: auto;
        }

        .inv-table td {
            padding: 4px 0 4px 12px;
            color: #555;
            vertical-align: top;
        }

        .inv-table td:first-child {
            color: #aaa;
            padding-left: 0;
            white-space: nowrap;
            padding-right: 8px;
        }

        .inv-table .val {
            color: #1a1a2e;
            font-weight: 700;
        }

        .paid-badge {
            display: inline-block;
            background: #d1fae5;
            color: #065f46;
            font-size: 11px;
            font-weight: 800;
            padding: 2px 10px;
            border-radius: 20px;
        }

        .divider {
            height: 1px;
            background: #eef3f6;
            margin: 18px 28px;
        }

        /* ── BILLED / COMPANY ── */
        .two-col {
            width: calc(100% - 56px);
            margin: 0 28px 18px;
            border: 1.5px solid #e8f0f4;
            border-radius: 12px;
        }

        .two-col td.col-half {
            width: 50%;
            padding: 16px 18px;
            vertical-align: top;
        }

        .two-col td.col-half.with-border {
            border-left: 1.5px solid #e8f0f4;
        }

        .col-label {
            font-size: 10px;
            font-weight: 800;
            color: #0694B7;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .col-name {
            font-size: 14px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 1px;
        }

        .col-role {
            font-size: 12px;
            color: #888;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .col-detail {
            font-size: 12px;
            color: #555;
            margin-bottom: 4px;
        }

        .col-detail td.icon-cell {
            width: 16px;
            color: #0694B7;
            padding-right: 4px;
        }

        .det-row {
            width: 100%;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .det-row td.det-key {
            color: #aaa;
            min-width: 110px;
            width: 110px;
            font-weight: 600;
        }

        .det-row td.det-val {
            color: #1a1a2e;
            font-weight: 700;
        }

        /* ── PLAN CARD ── */
        .plan-card {
            width: calc(100% - 56px);
            margin: 0 28px 18px;
            background: #eaf8fb;
            border: 1.5px solid #c9eaf3;
            border-radius: 12px;
        }

        .plan-card > tbody > tr > td {
            padding: 16px 20px;
            vertical-align: top;
        }

        .plan-icon-cell {
            width: 44px;
        }

        .plan-icon {
            width: 44px;
            height: 44px;
            background: #0694B7;
            border-radius: 10px;
            text-align: center;
            vertical-align: middle;
        }

        .plan-label {
            font-size: 10px;
            font-weight: 800;
            color: #0694B7;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .plan-name {
            font-size: 17px;
            font-weight: 800;
            color: #1a1a2e;
            margin: 2px 0;
        }

        .plan-price {
            font-size: 22px;
            font-weight: 800;
            color: #0694B7;
        }

        .plan-price span {
            font-size: 13px;
            color: #888;
            font-weight: 600;
        }

        /* plan-features: was CSS Grid (unsupported by dompdf) — now a plain table */
        .plan-features {
            width: 100%;
            margin-top: 8px;
        }

        .plan-features td {
            width: 50%;
            font-size: 12px;
            color: #444;
            font-weight: 600;
            padding: 3px 9px 3px 0;
        }

        .plan-features td.check {
            color: #0694B7;
            font-weight: 800;
            width: 14px;
            padding-right: 4px;
        }

        /* ── INVOICE TABLE ── */
        .inv-section {
            margin: 0 28px 10px;
        }

        .inv-section table {
            width: 100%;
            font-size: 13px;
        }

        .inv-section thead tr {
            border-bottom: 2px solid #eef3f6;
        }

        .inv-section thead th {
            padding: 8px 10px;
            text-align: left;
            font-size: 11px;
            font-weight: 800;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .inv-section thead th.right {
            text-align: right;
        }

        .inv-section tbody td {
            padding: 12px 10px;
            color: #333;
            font-weight: 600;
            vertical-align: top;
        }

        .inv-section tbody td.right {
            text-align: right;
            font-weight: 700;
        }

        .item-name {
            font-size: 13.5px;
            font-weight: 800;
            color: #1a1a2e;
        }

        .item-sub {
            font-size: 11.5px;
            color: #aaa;
            font-weight: 600;
            margin-top: 2px;
        }

        .totals {
            margin: 0 28px 18px;
        }

        .totals table {
            width: 100%;
            font-size: 13px;
        }

        .totals tr td {
            padding: 5px 10px;
        }

        .totals tr td.label {
            color: #888;
            font-weight: 600;
        }

        .totals tr td.value {
            text-align: right;
            font-weight: 700;
            color: #333;
        }

        .totals .total-row {
            border-top: 2px solid #eef3f6;
        }

        .totals .total-row td {
            padding-top: 10px;
            font-size: 15px;
            font-weight: 800;
        }

        .totals .total-row td.label {
            color: #1a1a2e;
        }

        .totals .total-row td.value {
            color: #0694B7;
            font-size: 17px;
        }

        /* ── PROMO ── */
        .promo {
            margin: 0 28px 18px;
            border: 1.5px dashed #c9eaf3;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            color: #aaa;
            font-weight: 600;
        }

        .promo td.icon-cell {
            width: 24px;
            color: #0694B7;
            vertical-align: top;
        }

        /* ── FOOTER ── */
        .footer-bar {
            width: 100%;
            background: #0694B7;
        }

        .footer-bar td {
            padding: 10px 28px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.85);
        }

        .footer-bar a {
            color: #fff;
            font-weight: 700;
            text-decoration: none;
        }
        a{
            text-decoration: none;
        }
        .footer-note {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
            text-align: right;
        }

        .thank-pay {
            width: calc(100% - 56px);
            margin: 0 28px 0;
            border: 1.5px solid #e8f0f4;
            border-radius: 12px 12px 0 0;
        }

        .thank-pay td.thank-col {
            width: 50%;
            padding: 16px 18px;
            vertical-align: top;
        }

        .thank-pay td.thank-col.with-border {
            border-left: 1.5px solid #e8f0f4;
        }

        .thank-title {
            font-size: 13px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 6px;
        }

        .thank-sub {
            font-size: 12px;
            color: #888;
            margin-bottom: 10px;
        }

        .pay-row {
            width: 100%;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .pay-row td.pay-key {
            color: #aaa;
            font-weight: 600;
        }

        .pay-row td.pay-val {
            text-align: right;
            color: #1a1a2e;
            font-weight: 700;
        }

        /* Prevent boxed sections from splitting awkwardly across a page break */
        .two-col,
        .plan-card,
        .thank-pay,
        .inv-section,
        .totals {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>

    <div class="email-wrapper">

        <!-- TOP BAR -->
        <table class="topbar-table">
            <tr>
                <td style="width:50%;">
                    <a href="" class="logo">
                <img src="{{ asset($constants['IMAGEFILEPATH'] . 'office.png') }}" alt="office-logo" />
            </a>
                </td>
                <td class="invoice-badge">INVOICE</td>
            </tr>
        </table>

        <!-- SENDER + META -->
        <table class="meta-row-table">
            <tr>
                <td class="meta-left" style="width:55%;">
                    <div class="sender-name">Aibuzz Technoventures</div>
                    <div class="sender-sub">IT &amp; Software Development</div>

                    <table class="meta-icon-row"><tr>
                        <td class="icon-cell">📍</td>
                        <td>Delhi, India</td>
                    </tr></table>

                    <table class="meta-icon-row"><tr>
                        <td class="icon-cell">📞</td>
                        <td>{{ $user->phone }}</td>
                    </tr></table>

                    <table class="meta-icon-row"><tr>
                        <td class="icon-cell">✉️</td>
                        <td>officelescloud@gmail.com</td>
                    </tr></table>
                </td>
                <td class="meta-right" style="width:45%;">
                    <table class="inv-table">
                        <tr>
                            <td>Invoice Number</td>
                            <td>:</td>
                            <td class="val" style="color:#0694B7;">{{ $invoice_no }}</td>
                        </tr>
                        <tr>
                            <td>Invoice Date</td>
                            <td>:</td>
                            <td class="val">{{ $invoice_date }}</td>
                        </tr>
                        <tr>
                            <td>Billing Period</td>
                            <td>:</td>
                            <td class="val">{{ $billing_period }}</td>
                        </tr>
                        <tr>
                            <td>Payment Status</td>
                            <td>:</td>
                            <td><span class="paid-badge">Paid</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="divider"></div>

        <!-- BILLED TO / COMPANY DETAILS -->
        <table class="two-col">
            <tr>
                <td class="col-half">
                    <div class="col-label">BILLED TO</div>
                    <div class="col-name">{{ $user->name }}</div>
                    <div class="col-role">{{ $user->designation }}</div>

                    <table class="col-detail"><tr>
                        <td class="icon-cell">✉️</td>
                        <td>{{ $user->email }}</td>
                    </tr></table>

                    <table class="col-detail"><tr>
                        <td class="icon-cell">📞</td>
                        <td>{{ $user->phone }}</td>
                    </tr></table>
                </td>

                @if($plan_type == 'team' && $company)
                <td class="col-half with-border">
                    <div class="col-label">COMPANY DETAILS</div>

                    <table class="det-row"><tr>
                        <td class="det-key">Company Name</td>
                        <td class="det-val">{{ optional($company)->name }}</td>
                    </tr></table>

                    <table class="det-row"><tr>
                        <td class="det-key">Company Type</td>
                        <td class="det-val">{{ optional($company)->company_type }}</td>
                    </tr></table>

                    <table class="det-row"><tr>
                        <td class="det-key">Industry</td>
                        <td class="det-val">{{ optional($company)->industry }}</td>
                    </tr></table>

                    <table class="det-row"><tr>
                        <td class="det-key">Address</td>
                        <td class="det-val">{{ optional($company)->company_address }}</td>
                    </tr></table>

                    <table class="det-row"><tr>
                        <td class="det-key">Company Email</td>
                        <td class="det-val" style="color:#0694B7;font-size:11.5px;">{{ optional($company)->email }}</td>
                    </tr></table>
                </td>
                @endif
            </tr>
        </table>

        <!-- PLAN CARD -->
        <table class="plan-card">
            <tr>
                <td class="plan-icon-cell">
                    <div class="plan-icon">
                        <span style="color:#fff;font-size:22px;">★</span>
                    </div>
                </td>
                <td>
                    <div class="plan-label">YOUR PLAN</div>
                    <div class="plan-name">{{ $plan_name }}</div>
                    <div class="plan-price">{{ $currency }}{{ $price }} <span>{{ $subscription_type }}</span></div>

                    <table class="plan-features">
                        <tr>
                            <td class="check">✓</td><td>License: {{ $license }}</td>
                            <td class="check">✓</td><td>Enterprise Security</td>
                        </tr>
                        <tr>
                            <td class="check">✓</td><td>Total Storage: {{ $storage }} {{ $unit }}</td>
                            <td class="check">✓</td><td>Personal Workspace</td>
                        </tr>
                        <tr>
                            <td class="check">✓</td><td>Security Controls</td>
                            <td class="check">✓</td><td>Manage Infra</td>
                        </tr>
                        <tr>
                            <td class="check">✓</td><td>App Integration</td>
                            <td class="check">✓</td><td>Backup &amp; Recovery</td>
                        </tr>
                        <tr>
                            <td class="check">✓</td><td>Storage Add-ons</td>
                            <td class="check">✓</td><td>Feature Add-ons</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- ITEMS TABLE -->
        <div class="inv-section">
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th style="text-align:center;">QTY</th>
                        <th class="right">Price</th>
                        <th class="right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="item-name">{{ $plan_name }} ({{ $subscription_type }})</div>
                            <div class="item-sub">
                                @if($plan_type == 'team')
                                    Billed for Team ({{ $qty }} {{ $qty > 1 ? 'users' : 'user' }})
                                @else
                                    Billed for Single User
                                @endif
                            </div>
                        </td>
                        <td style="text-align:center;font-weight:700;">{{ $qty }}</td>
                        <td class="right">{{ $price }}</td>
                        <td class="right">{{ $total_amount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="divider"></div>

        <!-- TOTALS (fixed: was a single row with 6 <td>s, now each line has its own row of 2) -->
        <div class="totals">
            <table>
                <tr>
                    <td class="label">Subtotal</td>
                    <td class="value">{{ $currency }}{{ $subtotal }}</td>
                </tr>
                <tr>
                    <td class="label">Discount Applied</td>
                    <td class="value">{{ $discount }}%</td>
                </tr>
                <tr>
                    <td class="label">Extra Discount Applied</td>
                    <td class="value">{{ $discountExtra }}%</td>
                </tr>
                <tr class="total-row">
                    <td class="label">Total</td>
                    <td class="value">{{ $currency }}{{ $finalAmount }}</td>
                </tr>
            </table>
        </div>

        <div class="divider"></div>

        <!-- PROMO CODE -->
        <table class="promo">
            <tr>
                <td class="icon-cell">🎁</td>
                <td>
                    <div style="font-size:12px;font-weight:800;color:#555;">Promo Code</div>
                    <div style="font-size:11.5px;color:#bbb;">{{ $promocode }}</div>
                </td>
            </tr>
        </table>

        <div class="divider"></div>

        <!-- THANK YOU / PAYMENT INFO -->
        <table class="thank-pay">
            <tr>
                <td class="thank-col">
                    <div class="thank-title">Thank you for your business!</div>
                    <div class="thank-sub">If you have any questions, feel free to reach out to us.</div>

                    <table class="col-detail"><tr>
                        <td class="icon-cell">✉️</td>
                        <td style="color:#0694B7;font-weight:700;">{{ $company->email ?? '' }}</td>
                    </tr></table>

                    @if($plan_type == 'team' && $company)
                    <table class="col-detail"><tr>
                        <td class="icon-cell">✉️</td>
                        <td style="color:#0694B7;font-weight:700;">{{ optional($company)->email }}</td>
                    </tr></table>

                    <table class="col-detail"><tr>
                        <td class="icon-cell">📞</td>
                        <td>{{ optional($company)->contact }}</td>
                    </tr></table>
                    @endif
                </td>
                <td class="thank-col with-border">
                    <div class="thank-title">Payment Information</div>

                    <table class="pay-row"><tr>
                        <td class="pay-key">Payment Method</td>
                        <td class="pay-val">{{ $payment_mode }}</td>
                    </tr></table>

                    <table class="pay-row"><tr>
                        <td class="pay-key">Payment Status</td>
                        <td class="pay-val" style="font-size:11.5px;">{{ $payment_status }}</td>
                    </tr></table>

                    <table class="pay-row"><tr>
                        <td class="pay-key">Payment Date</td>
                        <td class="pay-val">{{ $payment_date }}</td>
                    </tr></table>
                </td>
            </tr>
        </table>

        <!-- BOTTOM BAR -->
        <table class="footer-bar">
            <tr>
                <td style="width:50%;"><a href="https://www.pocket-office.ai">www.pocket-office.ai</a></td>
                <td class="footer-note">This is a system-generated invoice and does not require a signature.</td>
            </tr>
        </table>

    </div>

</body>

</html>