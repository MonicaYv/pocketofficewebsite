<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice – PocketOffice</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #e8f5fa;
            font-family: 'Nunito', sans-serif;
            color: #222;
        }

        .email-wrapper {
            max-width: 620px;
            margin: 30px auto;
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 28px rgba(6, 148, 183, 0.13);
        }

        /* ── TOP BAR ── */
        .topbar {
            padding: 18px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .logo-box {
            width: 34px;
            height: 34px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.5px;
        }

        .logo-text sup {
            font-size: 9px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.8);
        }

        .invoice-badge {
            color: #141414;
            font-size: 20px;
            font-weight: 800;
            padding: 6px 18px;
            border-radius: 8px;
            letter-spacing: 2px;
        }

        /* ── SENDER / META ── */
        .meta-row {
            padding: 22px 28px 0;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
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
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #555;
            margin-bottom: 4px;
        }

        .meta-icon-row svg {
            width: 13px;
            height: 13px;
            flex-shrink: 0;
            color: #0694B7;
        }

        .inv-table {
            border-collapse: collapse;
            font-size: 12.5px;
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
            display: flex;
            gap: 0;
            margin: 0 28px 18px;
            border: 1.5px solid #e8f0f4;
            border-radius: 12px;
            overflow: hidden;
        }

        .col-half {
            flex: 1;
            padding: 16px 18px;
        }

        .col-half+.col-half {
            border-left: 1.5px solid #e8f0f4;
        }

        .col-label {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 10px;
            font-weight: 800;
            color: #0694B7;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .col-label svg {
            width: 14px;
            height: 14px;
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
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #555;
            margin-bottom: 4px;
        }

        .col-detail svg {
            width: 13px;
            height: 13px;
            color: #0694B7;
            flex-shrink: 0;
        }

        .det-row {
            display: flex;
            font-size: 12px;
            margin-bottom: 5px;
            gap: 6px;
        }

        .det-key {
            color: #aaa;
            min-width: 110px;
            font-weight: 600;
        }

        .det-val {
            color: #1a1a2e;
            font-weight: 700;
        }

        /* ── PLAN CARD ── */
        .plan-card {
            margin: 0 28px 18px;
            background: linear-gradient(135deg, #e8f7fb 0%, #f0fafd 100%);
            border: 1.5px solid #c9eaf3;
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 14px;
        }

        .plan-icon {
            width: 44px;
            height: 44px;
            background: #0694B7;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .plan-icon svg {
            width: 24px;
            height: 24px;
            fill: white;
        }

        .plan-info {
            flex: 1;
            min-width: 120px;
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

        .plan-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px 18px;
            padding-top: 4px;
        }

        .feat {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #444;
            font-weight: 600;
        }

        .feat svg {
            width: 13px;
            height: 13px;
            color: #0694B7;
            flex-shrink: 0;
        }

        /* ── INVOICE TABLE ── */
        .inv-section {
            margin: 0 28px 10px;
        }

        .inv-section table {
            width: 100%;
            border-collapse: collapse;
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
            border-collapse: collapse;
            font-size: 13px;
        }

        .totals tr td {
            padding: 5px 10px;
        }

        .totals tr td:first-child {
            color: #888;
            font-weight: 600;
        }

        .totals tr td:last-child {
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

        .totals .total-row td:first-child {
            color: #1a1a2e;
        }

        .totals .total-row td:last-child {
            color: #0694B7;
            font-size: 17px;
        }

        /* ── PROMO ── */
        .promo {
            margin: 0 28px 18px;
            border: 1.5px dashed #c9eaf3;
            border-radius: 10px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #aaa;
            font-weight: 600;
        }

        .promo svg {
            width: 18px;
            height: 18px;
            color: #0694B7;
            flex-shrink: 0;
        }

        /* ── FOOTER ── */
        .footer-bar {
            background: #0694B7;
            padding: 10px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.85);
        }

        .footer-bar a {
            color: #fff;
            font-weight: 700;
            text-decoration: none;
        }

        .footer-note {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
        }

        .thank-pay {
            margin: 0 28px 0;
            display: flex;
            gap: 0;
            border: 1.5px solid #e8f0f4;
            border-radius: 12px 12px 0 0;
            overflow: hidden;
        }

        .thank-col {
            flex: 1;
            padding: 16px 18px;
        }

        .thank-col+.thank-col {
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
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .pay-key {
            color: #aaa;
            font-weight: 600;
        }

        .pay-val {
            color: #1a1a2e;
            font-weight: 700;
        }
    </style>
</head>

<body>

    <div class="email-wrapper">

        <!-- TOP BAR -->
        <div class="topbar">
            <a href="#" class="logo">
                <!-- <img src="office.svg" alt="office-logo" /> -->
            </a>
            <div class="invoice-badge">INVOICE</div>
        </div>

        <!-- SENDER + META -->
        <div class="meta-row">
            <div>
                <div class="sender-name">Aibuzz Technoventures</div>
                <div class="sender-sub">IT &amp; Software Development</div>
                <div class="meta-icon-row">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                    </svg>
                    Delhi, India
                </div>
                <div class="meta-icon-row">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z" />
                    </svg>
                    +91 92971972919
                </div>
                <div class="meta-icon-row">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                    </svg>
                    acharyarishi79@gmail.com
                </div>
            </div>
            <table class="inv-table">
                <tr>
                    <td>Invoice Number</td>
                    <td>:</td>
                    <td class="val" style="color:#0694B7;">INV-2024-0057</td>
                </tr>
                <tr>
                    <td>Invoice Date</td>
                    <td>:</td>
                    <td class="val">01 Aug, 2024</td>
                </tr>
                <tr>
                    <td>Billing Period</td>
                    <td>:</td>
                    <td class="val">Monthly</td>
                </tr>
                <tr>
                    <td>Payment Status</td>
                    <td>:</td>
                    <td><span class="paid-badge">Paid</span></td>
                </tr>
            </table>
        </div>

        <div class="divider"></div>

        <!-- BILLED TO / COMPANY DETAILS -->
        <div class="two-col">
            <div class="col-half">
                <div class="col-label">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    Billed To
                </div>
                <div class="col-name">{{ $user->name }}</div>
                <div class="col-role">{{ $user->designation }}</div>
                <div class="col-detail">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                    </svg>
                    {{ $user->email }}
                </div>
                <div class="col-detail">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z" />
                    </svg>
                    {{ $user->phone }}
                </div>
            </div>
            <div class="col-half">
                <div class="col-label">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z" />
                    </svg>
                    Company Details
                </div>
                <div class="det-row"><span class="det-key">Company Type</span>
                <span class="det-val"></span>
                </div>
                <div class="det-row"><span class="det-key">Industry</span>
                <span class="det-val"></span></div>
                <div class="det-row"><span class="det-key">Address</span>
                <span class="det-val">{{ $user->address ?? '' }}</span></div>
                <div class="det-row"><span class="det-key">Company Email</span>
                <span class="det-val" style="color:#0694B7;font-size:11.5px;">
                    {{ $user->email }}
                </span></div>
            </div>
        </div>

        <!-- PLAN CARD -->
        <div class="plan-card">
            <div class="plan-icon">
                <svg viewBox="0 0 24 24">
                    <path
                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                </svg>
            </div>
            <div class="plan-info">
                <div class="plan-label">Your Plan</div>
                <div class="plan-name">{{ $plan_name }}</div>
                <div class="plan-price">{{ $price }} <span>{{ $subscription_type }}</span></div>
            </div>
            <div class="plan-features">
                <div class="feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    License: {{ $license }}
                </div>
                <div class="feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Enterprise Security
                </div>
                <div class="feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Total Storage: {{ $storage }} {{ $unit }}
                </div>
                <div class="feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    All Integrations
                </div>
                <div class="feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Unlimited Workspaces
                </div>
                <div class="feat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Priority Support
                </div>
            </div>
        </div>

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
                            <div class="item-name">{{ $storage }} ({{ $subscription_type }})</div>
                            <div class="item-sub">Billed for 1 user</div>
                        </td>
                        <td style="text-align:center;font-weight:700;">{{ $qty }}</td>
                        <td class="right">{{ $price }}</td>
                        <td class="right">{{ $total_amount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="divider"></div>

        <!-- TOTALS -->
        <div class="totals">
            <table>
                <tr>
                    <td></td>
                    <td></td>
                    
                    <td>Subtotal</td>
                    <td>{{ $total_amount }}</td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                   
                    <td>Estimated Tax (0%)</td>
                    <td>₹0</td>
                </tr>
                <tr class="total-row"><td></td>
                   
                    <td></td>
                    <td>Total</td>
                    <td>₹599</td>
                </tr>
            </table>
        </div>

        <div class="divider"></div>

        <!-- PROMO CODE -->
        <div class="promo">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z" />
                <line x1="7" y1="7" x2="7.01" y2="7" />
            </svg>
            <div>
                <div style="font-size:12px;font-weight:800;color:#555;">Promo Code</div>
                <div style="font-size:11.5px;color:#bbb;">{{ $promocode }}</div>
            </div>
        </div>

        <div class="divider"></div>

        <!-- THANK YOU / PAYMENT INFO -->
        <div class="thank-pay">
            <div class="thank-col">
                <div class="thank-title">Thank you for your business!</div>
                <div class="thank-sub">If you have any questions, feel free to reach out to us.</div>
                <div class="col-detail" style="margin-bottom:5px;">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="13" height="13" style="color:#0694B7;">
                        <path
                            d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                    </svg>
                    <span style="font-size:12px;color:#0694B7;font-weight:700;">
                        {{ $company_email }}</span>
                </div>
                <div class="col-detail">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="13" height="13" style="color:#0694B7;">
                        <path
                            d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.02-.24c1.12.37 2.33.57 3.57.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z" />
                    </svg>
                    <span style="font-size:12px;color:#555;font-weight:600;">{{ $company_phone }}</span>
                </div>
            </div>
            <div class="thank-col">
                <div class="thank-title">Payment Information</div>
                <div class="pay-row"><span class="pay-key">Payment Method</span><span class="pay-val">{{ $payment_mode }}</span></div>
                <div class="pay-row"><span class="pay-key">Payment Status</span><span class="pay-val"
                        style="font-size:11.5px;">{{ $payment_status }}</span></div>
                <div class="pay-row"><span class="pay-key">Payment Date</span><span class="pay-val">
                    {{ $payment_date }}</span>
                </div>
            </div>
        </div>

        <!-- BOTTOM BAR -->
        <div class="footer-bar">
            <a href="https://www.poffice.com">🌐 www.poffice.com</a>
            <div class="footer-note">This is a system-generated invoice and does not require a signature.</div>
        </div>

    </div>

</body>

</html>