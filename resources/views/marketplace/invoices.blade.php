<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice – PocketOffice</title>
    <link rel="stylesheet" href="{{ public_path('assets/css/invoice.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/invoice.css') }}" type="text/css" />
</head>

<body>

    <div class="email-wrapper">

        <!-- TOP BAR -->
        <table class="topbar-table">
            <tr>
                <td class="inv-topbar-logo">
                    <a href="" class="logo">
                        <img src="{{ asset($constants['IMAGEFILEPATH'] . 'office.png') }}" alt="office-logo" />
                    </a>
                </td>
                <td class="invoice-badge">INVOICE</td>
            </tr>
        </table>

        <!-- Invoice from -->
        <table class="meta-row-table">
            <tr>
                <td class="meta-left">
                    <div class="sender-name">{{ $masterData->name }}</div>
                    <div class="sender-sub">{{ $masterData->designation }}</div>

                    <table class="meta-icon-row">
                        <tr>
                            <td class="icon-cell">📍</td>
                            <td>{{ $masterData->address ?? 'NA' }}</td>
                        </tr>
                    </table>

                    <table class="meta-icon-row">
                        <tr>
                            <td class="icon-cell">📞</td>
                            <td>{{ $masterData->phone }}</td>
                        </tr>
                    </table>

                    <table class="meta-icon-row">
                        <tr>
                            <td class="icon-cell">✉️</td>
                            <td>{{ $masterData->email }}</td>
                        </tr>
                    </table>
                </td>
                <td class="meta-right">
                    <table class="inv-table">
                        <tr>
                            <td>Invoice Number</td>
                            <td>:</td>
                            <td class="val inv-val-primary">{{ $invoice_no }}</td>
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

        <!-- invoice to -->
        <table class="two-col">
            <tr>
                <td class="col-half">
                    <div class="col-label">BILLED TO</div>
                    <div class="col-name">{{ $user->name }}</div>
                    <div class="col-role">{{ $user->designation }}</div>

                    <table class="col-detail">
                        <tr>
                            <td class="icon-cell">✉️</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </table>

                    <table class="col-detail">
                        <tr>
                            <td class="icon-cell">📞</td>
                            <td>{{ $user->phone }}</td>
                        </tr>
                    </table>
                </td>

                @if($plan_type == 'team' && $company)
                <td class="col-half with-border">
                    <div class="col-label">COMPANY DETAILS</div>

                    <table class="det-row">
                        <tr>
                            <td class="det-key">Company Name</td>
                            <td class="det-val">{{ optional($company)->name }}</td>
                        </tr>
                    </table>

                    <table class="det-row">
                        <tr>
                            <td class="det-key">Company Type</td>
                            <td class="det-val">{{ optional($company)->company_type }}</td>
                        </tr>
                    </table>

                    <table class="det-row">
                        <tr>
                            <td class="det-key">Industry</td>
                            <td class="det-val">{{ optional($company)->industry }}</td>
                        </tr>
                    </table>

                    <table class="det-row">
                        <tr>
                            <td class="det-key">Address</td>
                            <td class="det-val">{{ optional($company)->company_address }}</td>
                        </tr>
                    </table>

                    <table class="det-row">
                        <tr>
                            <td class="det-key">Company Email</td>
                            <td class="det-val det-val-email">{{ optional($company)->email }}</td>
                        </tr>
                    </table>
                </td>
                @endif
            </tr>
        </table>

        <!-- PLAN CARD -->
        <table class="plan-card">
            <tr>
                <td class="plan-icon-cell">
                    <div class="plan-icon">
                        <span class="plan-icon-symbol">★</span>
                    </div>
                </td>
                <td>
                    <div class="plan-label">YOUR PLAN</div>
                    <div class="plan-name">{{ $plan_name }}</div>
                    <div class="plan-price">{{ $currency }}{{ $price }} <span>{{ $subscription_type }}</span></div>

                    <table class="plan-features">
                        <tr>
                            <td class="check">✓</td>
                            <td>License: {{ $license }}</td>
                            <td class="check">✓</td>
                            <td>Enterprise Security</td>
                        </tr>
                        <tr>
                            <td class="check">✓</td>
                            <td>Total Storage: {{ $storage }} {{ $unit }}</td>
                            <td class="check">✓</td>
                            <td>Personal Workspace</td>
                        </tr>
                        <tr>
                            <td class="check">✓</td>
                            <td>Security Controls</td>
                            <td class="check">✓</td>
                            <td>Manage Infra</td>
                        </tr>
                        <tr>
                            <td class="check">✓</td>
                            <td>App Integration</td>
                            <td class="check">✓</td>
                            <td>Backup &amp; Recovery</td>
                        </tr>
                        <tr>
                            <td class="check">✓</td>
                            <td>Storage Add-ons</td>
                            <td class="check">✓</td>
                            <td>Feature Add-ons</td>
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
                        <th class="center">QTY</th>
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
                        <td class="center">{{ $qty }}</td>
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
                <!-- <tr>
                    <td class="label">Subtotal</td>
                    <td class="value">{{ $currency }}{{ $subtotal }}</td>
                </tr> -->
                @if(!empty($discount))
                <tr>
                    <td class="label">Discount Applied</td>
                    <td class="value">{{ $discount }}%</td>
                </tr>
                @endif

                @if(!empty($discountExtra))
                <tr>
                    <td class="label">Extra Discount Applied</td>
                    <td class="value">{{ $discountExtra }}%</td>
                </tr>
                @endif

                @if(!empty($promocode))
                <tr>
                    <td class="label">Promocode Discount Applied</td>
                    <td class="value">
                        @if(in_array(strtolower((string) $promocodeType), ['percent', 'percentage'], true))
                        {{ $promocodeValue }}%
                        @elseif(in_array(strtolower((string) $promocodeType), ['flat', 'fixed', 'amount'], true))
                        {{ $currency }}{{ number_format((float) $promocodeValue, 2) }}
                        @endif
                    </td>
                </tr>
                @endif

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
                    <div class="promo-title">Promo Code</div>
                    <div class="promo-subtitle">{{ $promocode ?: 'No promo code' }}</div>
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

                    <table class="col-detail">
                        <tr>
                            <td class="icon-cell">✉️</td>
                            <td class="col-detail-highlight">{{ $company->email ?? '' }}</td>
                        </tr>
                    </table>

                    @if($plan_type == 'team' && $company)
                    <table class="col-detail">
                        <tr>
                            <td class="icon-cell">✉️</td>
                            <td class="col-detail-highlight">{{ optional($company)->email }}</td>
                        </tr>
                    </table>

                    <table class="col-detail">
                        <tr>
                            <td class="icon-cell">📞</td>
                            <td>{{ optional($company)->contact }}</td>
                        </tr>
                    </table>
                    @endif
                </td>
                <td class="thank-col with-border">
                    <div class="thank-title">Payment Information</div>

                    <table class="pay-row">
                        <tr>
                            <td class="pay-key">Payment Method</td>
                            <td class="pay-val">{{ $payment_mode }}</td>
                        </tr>
                    </table>

                    <table class="pay-row">
                        <tr>
                            <td class="pay-key">Payment Status</td>
                            <td class="pay-val pay-val-status">{{ $payment_status }}</td>
                        </tr>
                    </table>

                    <table class="pay-row">
                        <tr>
                            <td class="pay-key">Payment Date</td>
                            <td class="pay-val">{{ $payment_date }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- BOTTOM BAR -->
        <table class="footer-bar">
            <tr>
                <td class="footer-link-col"><a href="https://pocket-office.ai/">pocket-office.ai</a></td>
                <td class="footer-note">This is a system-generated invoice and does not require a signature.</td>
            </tr>
        </table>

    </div>

</body>

</html>