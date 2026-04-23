/**
 * pricing.js
 * ================================================================
 * BLOCK 1 — Pricing page  $(document).ready
 * BLOCK 2 — Payment page  IIFE  (only when #registrationForm exists)
 * BLOCK 3 — Thank You page IIFE (only when #tyPlanName exists)
 * ================================================================
 */


/* ════════════════════════════════════════════════════════════════
   BLOCK 1 — PRICING PAGE
   ════════════════════════════════════════════════════════════════ */
$(document).ready(function () {

  /* ── 1. STATIC PRICES  (monthly base per user) ────────────── */
  const STATIC_PRICES = {
    INR: { personal: 199, basic: 799, standard: 699, advanced: 599, premium: 499 },
    MYR: { personal: 30, basic: 60, standard: 55, advanced: 50, premium: 45 },
    USD: { personal: 9, basic: 15, standard: 13.75, advanced: 12.5, premium: 11.5 },
  };

  const CURRENCY_RATES = {
    MYR: 1, USD: 0.21, INR: 17.8, EUR: 0.20, GBP: 0.17,
    SGD: 0.29, AUD: 0.33, CAD: 0.28, JPY: 31.5,
  };

  /* ── 2. PLAN BASE DATA ────────────────────────────────────── */
  const PLAN_LABELS = ['premium', 'advanced', 'standard', 'basic'];

  const PLAN_BASE = {
    personal: { licences: 1, storagePerUser: 5 },
    basic: { licences: 1, storagePerUser: 10 },
    standard: { licences: 10, storagePerUser: 10 },
    advanced: { licences: 50, storagePerUser: 10 },
    premium: { licences: 100, storagePerUser: 10 },
  };

  /* ── 3. STATE ─────────────────────────────────────────────── */
  let currentCurrency = 'INR';
  let currentSymbol = '₹';
  let currentRate = 17.8;

  /* ── 4. DOM REFS ──────────────────────────────────────────── */
  const $currencyBtn = $('#currencyBtn');
  const $currencyMenu = $('#currencyMenu');
  const $currencyCode = $('#currencyCode');

  /* ── 5. SEARCH INPUT inside currency dropdown ─────────────── */
  const $searchLi = $(`
    <li class="currency-search-li">
      <input id="currencySearch" type="text"
             placeholder="Search country or code…" autocomplete="off"/>
    </li>
  `);
  $currencyMenu.prepend($searchLi);
  $searchLi.css({
    padding: '6px 10px', position: 'sticky', top: '0', background: '#fff',
    zIndex: '2', borderBottom: '1px solid #eee', listStyle: 'none',
  });
  $searchLi.find('input').css({
    width: '100%', border: '1px solid #ccc', borderRadius: '6px',
    padding: '5px 10px', fontSize: '13px', outline: 'none', boxSizing: 'border-box',
  });

  /* Currency tooltip */
  const $tooltipEl = $('<div id="currencyTooltip"></div>').css({
    position: 'fixed', background: '#0694B7', color: '#fff', padding: '4px 10px',
    borderRadius: '6px', fontSize: '12px', fontWeight: '500', pointerEvents: 'none',
    zIndex: '9999', display: 'none', boxShadow: '0 2px 8px rgba(6,148,183,.25)',
    whiteSpace: 'nowrap',
  });
  $('body').append($tooltipEl);

  $(document)
    .on('mouseenter', '#currencyMenu li[data-currency]', function () {
      const t = $(this).text().trim(), i = t.indexOf('–');
      const c = i > -1 ? t.slice(i + 1).trim() : t;
      if (c) $tooltipEl.text(c).show();
    })
    .on('mousemove', '#currencyMenu li[data-currency]', function (e) {
      $tooltipEl.css({ top: e.clientY - 36 + 'px', left: e.clientX + 12 + 'px' });
    })
    .on('mouseleave', '#currencyMenu li[data-currency]', function () {
      $tooltipEl.hide();
    });

  $(document).on('input', '#currencySearch', function (e) {
    e.stopPropagation();
    const q = $(this).val().toLowerCase().trim();
    $currencyMenu.find('li[data-currency]').each(function () {
      $(this).toggle(!q || $(this).text().toLowerCase().includes(q));
    });
  });
  $(document).on('click', '#currencySearch, .currency-search-li', function (e) {
    e.stopPropagation();
  });

  /* ── 6. LOAD CURRENCY DROPDOWN ────────────────────────────── */
  async function loadCurrencies(pinned) {
    $currencyMenu.find('li[data-currency]').remove();
    $currencyMenu.append('<li class="currency-loading">Loading…</li>');
    let entries = [];
    try {
      const res = await fetch('https://restcountries.com/v3.1/all?fields=name,currencies');
      if (!res.ok) throw new Error();
      const countries = await res.json();
      const seen = new Set();
      countries.forEach(c => {
        if (!c.currencies) return;
        const code = Object.keys(c.currencies)[0];
        const symbol = c.currencies[code]?.symbol || code;
        const key = code + '|' + c.name.common;
        if (seen.has(key)) return;
        seen.add(key);
        entries.push({ code, symbol, name: c.name.common });
      });
    } catch (_) {
      entries = [
        { code: 'INR', symbol: '₹', name: 'India' },
        { code: 'USD', symbol: '$', name: 'United States' },
        { code: 'MYR', symbol: 'RM', name: 'Malaysia' },
        { code: 'EUR', symbol: '€', name: 'European Union' },
        { code: 'GBP', symbol: '£', name: 'United Kingdom' },
        { code: 'SGD', symbol: 'S$', name: 'Singapore' },
        { code: 'AUD', symbol: 'A$', name: 'Australia' },
        { code: 'CAD', symbol: 'C$', name: 'Canada' },
        { code: 'JPY', symbol: '¥', name: 'Japan' },
      ];
    }
    entries.sort((a, b) => a.name.localeCompare(b.name));
    if (pinned) {
      const idx = entries.findIndex(e => e.code === pinned);
      if (idx > -1) { const [p] = entries.splice(idx, 1); entries.unshift(p); }
    }
    $currencyMenu.find('.currency-loading').remove();
    entries.forEach(e => {
      const $li = $('<li>')
        .text(`${e.code} (${e.symbol}) – ${e.name}`)
        .attr({
          'data-currency': e.code, 'data-symbol': e.symbol,
          'data-rate': CURRENCY_RATES[e.code] || 1, 'data-country': e.name
        });
      if (e.code === currentCurrency) $li.addClass('selected');
      $currencyMenu.append($li);
    });
  }

  /* ── 7. AUTO-DETECT CURRENCY ──────────────────────────────── */
  async function detectUserCurrency() {
    let detected = 'INR';
    try {
      const d = await (await fetch('https://ipapi.co/json/')).json();
      if (d.currency) detected = d.currency;
    } catch (_) { }
    await loadCurrencies(detected);
    applyCurrency(detected);
  }

  /* ── 8. APPLY CURRENCY ────────────────────────────────────── */
  function applyCurrency(code) {
    currentCurrency = code;
    const $li = $currencyMenu.find(`li[data-currency="${code}"]`).first();
    currentSymbol = $li.length ? ($li.data('symbol') || code) : code;
    currentRate = $li.length ? (parseFloat($li.data('rate')) || 1) : 1;

    const liText = $li.text().trim();
    const di = liText.indexOf('–');
    const countryName = di > -1 ? liText.slice(di + 1).trim() : '';
    $currencyCode.text(countryName ? `${code} – ${countryName}` : code);

    $currencyMenu.find('li[data-currency]').removeClass('selected');
    $li.addClass('selected');

    if ($li.length) {
      const menu = $currencyMenu[0], item = $li[0];
      const top = item.offsetTop, bot = top + item.offsetHeight;
      if (top < menu.scrollTop || bot > menu.scrollTop + menu.clientHeight)
        menu.scrollTop = top - menu.clientHeight / 2;
    }

    $('#currencySearch').val('');
    $currencyMenu.find('li[data-currency]').show();
    updateAllPrices();
  }

  /* ── 9. PRICE HELPERS ─────────────────────────────────────── */
  function getMonthlyBase(plan) {
    const tbl = STATIC_PRICES[currentCurrency];
    if (tbl && tbl[plan] !== undefined) return tbl[plan];
    return (STATIC_PRICES.MYR[plan] || 0) * currentRate;
  }

  function getPrice(plan, isAnnual) {
    const base = getMonthlyBase(plan);
    return isAnnual ? Math.round(base * 12 * 0.9) : Math.round(base);
  }

  function fmt(v) {
    const r = Math.round(v * 100) / 100;
    return Number.isInteger(r) ? r.toString() : r.toFixed(2);
  }

  function storageLabel(gb) {
    return gb >= 1000 ? (gb / 1000) + ' TB' : gb + ' GB';
  }

  /* ── 10. UPDATE PERSONAL CARD ─────────────────────────────── */
  function updatePersonalCard() {
    const isAnnual = $('#personalBillingToggle').is(':checked');
    const price = getPrice('personal', isAnnual);
    const monthly = Math.round(getMonthlyBase('personal'));

    $('#personalPrice').text(fmt(price));
    $('.personal-card__symbol').text(currentSymbol);
    $('#personalPeriodLabel').text(isAnnual ? '/year' : '/month');

    const $strip = $('#personalAnnualStrip');
    if (isAnnual) {
      const saving = Math.round(monthly * 12) - price;
      $strip.text(`🎉 10% off  — you save ${currentSymbol} ${fmt(saving)} by paying annually`)
        .show();
    } else {
      $strip.hide();
    }

    const $monthLabel = $('#personalMonthlyLabel');
    $monthLabel.css('font-weight', isAnnual ? '400' : '600');
    $monthLabel.css('color', isAnnual ? '#6c757d' : '#212529');
  }

  /* ── 11. UPDATE ALL FOUR TEAM PLAN CARDS ─────────────────── */
  function updateAllPrices() {
    updatePersonalCard();

    PLAN_LABELS.forEach(plan => {
      const $priceEl = $(`#${plan}Price`);
      if (!$priceEl.length) return;

      const $card = $priceEl.closest('.card-body');

      /* Read annual state from the shared toggle pill,
         NOT from the hidden per-card checkbox              */
      const isAnnual = $('#sharedYearlyBtn').hasClass('active');

      /* Keep hidden per-card checkbox in sync so
         savePlanAndRedirect() still reads it correctly     */
      $card.find('.billing-toggle').prop('checked', isAnnual);

      const qty = parseInt($card.find('.qty-input').val()) || 1;
      const price = getPrice(plan, isAnnual);
      const monthly = Math.round(getMonthlyBase(plan));

      /* Unit price display */
      $priceEl.text(fmt(price));

      /* Currency symbol text node */
      const $ph = $priceEl.closest('.price');
      if ($ph.length) {
        const node = $ph[0].childNodes[0];
        if (node && node.nodeType === 3) node.textContent = currentSymbol + ' ';
      }

      /* Period label */
      $card.find('.user-text').text(isAnnual ? ' user/year' : ' user/month');

      /* Licence count + pool storage */
      const meta = PLAN_BASE[plan];
      const totalLicences = meta.licences * qty;
      const totalStorageGB = meta.storagePerUser * totalLicences;
      $card.find('.base-licence-count').text(meta.licences);
      $card.find('.total-licence-count').text(totalLicences);
      $card.find('.total-pool-storage').text(storageLabel(totalStorageGB));

      /* Total amount */
      const $total = $card.find('.total-amount');
      if ($total.length) $total.text(`${currentSymbol} ${fmt(price * qty)}`);

      /* Annual savings badge — injected once, shown/hidden after */
      let $badge = $card.find('.annual-discount-badge');
      if (isAnnual) {
        const saving = Math.round(monthly * 12) - price;
        if (!$badge.length) {
          $badge = $('<div class="annual-discount-badge"></div>');
          let $row = $total.parent();
          while ($row.length && !$row.is($card) && !$row.parent().is($card))
            $row = $row.parent();
          $row.after($badge);
        }
        $badge
          .text(`🎉 10% off — you save ${currentSymbol} ${fmt(saving * qty)} by paying annually`)
          .show();
      } else {
        if ($badge.length) $badge.hide();
      }

      $priceEl.attr('data-current-price', price);
    });

    updateTableButtons();
  }

  /* ── 12. COMPARISON TABLE ─────────────────────────────────── */
  function initPersonalTableColumn() {
    if ($('#pricingTable').find('[data-plan-col="personal"]').length) return;

    $('#pricingTable thead tr th').eq(0).after(
      '<th data-plan-col="personal" style="min-width:130px;">Personal</th>'
    );

    const rowData = [
      '1',
      '5 GB',
      '5 GB',
      '1 Workspace',
      '<i class="bi bi-check-circle-fill check"></i>',
      '<i class="bi bi-check-circle-fill check"></i>',
      '<i class="bi bi-check-circle-fill check"></i>',
      '<i class="bi bi-x-circle-fill cross"></i>',
      '<i class="bi bi-check-circle-fill check"></i>',
      '<i class="bi bi-check-circle-fill check"></i>',
      '<i class="bi bi-check-circle-fill check"></i>',
      '<a href="/payment.html" class="btn btn-outline-secondary" id="tablePersonalBtn">Get started</a>',
    ];

    $('#pricingTable tbody tr').each(function (i) {
      const cell = rowData[i] !== undefined ? rowData[i] : '';
      $(this).find('td').eq(0).after('<td data-plan-col="personal">' + cell + '</td>');
    });

    $(document).off('click.tablePersonal').on('click.tablePersonal', '#tablePersonalBtn', function (e) {
      e.preventDefault();
      savePlanAndRedirect('personal');
    });
  }

  function updateTableButtons() {
    initPersonalTableColumn();

    const $thead = $('#pricingTable thead tr');
    const $lastRow = $('#pricingTable tbody tr').last();

    const personalAnnual = $('#personalBillingToggle').is(':checked');
    const personalPrice = getPrice('personal', personalAnnual);
    $thead.find('[data-plan-col="personal"]').html(
      'Personal<br><span class="table-plan-price">' + currentSymbol + ' ' + fmt(personalPrice) +
      '<small>' + (personalAnnual ? ' user/year' : ' user/month') + '</small></span>'
    );

    const teamsAnnual = $('#sharedYearlyBtn').hasClass('active');
    ['basic', 'standard', 'advanced', 'premium'].forEach(function (plan, idx) {
      const col = idx + 2;
      const price = getPrice(plan, teamsAnnual);
      const $th = $thead.find('th').eq(col);
      if ($th.length) {
        $th.html(
          plan.charAt(0).toUpperCase() + plan.slice(1) +
          '<br><span class="table-plan-price">' + currentSymbol + ' ' + fmt(price) +
          '<small>' + (teamsAnnual ? ' user/year' : ' user/month') + '</small></span>'
        );
      }
      const $td = $lastRow.find('td').eq(col);
      if ($td.length) {
        $td.find('a').off('click.plan').on('click.plan', function (e) {
          e.preventDefault(); savePlanAndRedirect(plan);
        });
      }
    });
  }

  /* ── 13. SAVE & REDIRECT ──────────────────────────────────── */
  function savePlanAndRedirect(plan) {
    let isAnnual = false, qty = 1;

    if (plan === 'personal') {
      isAnnual = $('#personalBillingToggle').is(':checked');
    } else {
      /* For team plans read from the shared pill toggle */
      isAnnual = $('#sharedYearlyBtn').hasClass('active');
      const $card = $(`#${plan}Price`).closest('.card-body');
      qty = parseInt($card.find('.qty-input').val()) || 1;
    }

    const price = getPrice(plan, isAnnual);
    const meta = PLAN_BASE[plan] || { licences: 1, storagePerUser: 10 };
    const totalLicences = meta.licences * qty;
    const totalStorageGB = meta.storagePerUser * totalLicences;

    sessionStorage.setItem('selectedPlan', JSON.stringify({
      plan: plan.charAt(0).toUpperCase() + plan.slice(1),
      price: fmt(price * qty),
      unitPrice: fmt(price),
      qty,
      isAnnual,
      symbol: currentSymbol,
      currency: currentCurrency,
      totalLicences,
      totalStorage: storageLabel(totalStorageGB),
    }));
    window.location.href = '/payment.html';
  }

  /* ── 14. CURRENCY DROPDOWN EVENTS ────────────────────────── */
  $currencyBtn.on('click', function (e) {
    e.stopPropagation();
    const open = $currencyMenu.toggleClass('open').hasClass('open');
    $currencyBtn.toggleClass('open', open);
    if (open) setTimeout(() => $('#currencySearch').focus(), 50);
  });
  $(document).on('click', function () {
    $currencyMenu.removeClass('open');
    $currencyBtn.removeClass('open');
    $tooltipEl.hide();
  });
  $currencyMenu.on('click', 'li[data-currency]', function (e) {
    e.stopPropagation();
    applyCurrency($(this).data('currency'));
    $currencyMenu.removeClass('open');
    $currencyBtn.removeClass('open');
    $tooltipEl.hide();
  });

  /* ── 15. PERSONAL BILLING TOGGLE ─────────────────────────── */
  $(document).on('change', '#personalBillingToggle', updateAllPrices);

  /* ── 16. QUANTITY BUTTONS ─────────────────────────────────── */
  $(document).on('click', '.plus', function () {
    const $i = $(this).closest('.card-body, .pay-qty-wrapper').find('.qty-input');
    $i.val(parseInt($i.val()) + 1);
    updateAllPrices();
  });
  $(document).on('click', '.minus', function () {
    const $i = $(this).closest('.card-body, .pay-qty-wrapper').find('.qty-input');
    const cur = parseInt($i.val());
    if (cur > 1) { $i.val(cur - 1); updateAllPrices(); }
  });

  /* ── 17. WIRE GET STARTED BUTTONS ────────────────────────── */
  PLAN_LABELS.forEach(plan => {
    $(`#${plan}Price`).closest('.card-body').find('.pricing-buttons a')
      .off('click.plan').on('click.plan', function (e) {
        e.preventDefault(); savePlanAndRedirect(plan);
      });
  });
  $('#personalGetStarted').off('click.plan').on('click.plan', function (e) {
    e.preventDefault(); savePlanAndRedirect('personal');
  });

  /* ── 18. SHARED BILLING TOGGLE (pill above teams cards) ───── */
  (function () {
    const $monthly = $('#sharedMonthlyBtn');
    const $yearly = $('#sharedYearlyBtn');
    if (!$monthly.length || !$yearly.length) return;

    $monthly.on('click', function () {
      $monthly.addClass('active');
      $yearly.removeClass('active');
      /* Silently sync all hidden per-card checkboxes */
      $('.teams-section-wrapper .billing-toggle').each(function () {
        this.checked = false;
      });
      updateAllPrices();
    });

    $yearly.on('click', function () {
      $yearly.addClass('active');
      $monthly.removeClass('active');
      /* Silently sync all hidden per-card checkboxes */
      $('.teams-section-wrapper .billing-toggle').each(function () {
        this.checked = true;
      });
      updateAllPrices();
    });
  })();

  /* ── 19. BOOT ─────────────────────────────────────────────── */
  detectUserCurrency();






});


/* ════════════════════════════════════════════════════════════════
   BLOCK 2 — PAYMENT PAGE
   ════════════════════════════════════════════════════════════════ */
(function () {
  if (!document.getElementById('registrationForm')) return;

  const PLAN_META = {
    personal: { licences: 1, storage: '5 GB', features: ['1 Workspace', 'Personal Dashboard', 'Basic Integrations', 'Standard Support'] },
    basic: { licences: 1, storage: '10 GB', features: ['1 Workspace', 'Manage Infra', 'App Integration', 'Backup & Recovery'] },
    standard: { licences: 10, storage: '100 GB', features: ['Multi-Workspace', 'Device & IP Control', 'App Integration', 'Backup & Recovery'] },
    advanced: { licences: 50, storage: '500 GB', features: ['Unlimited Workspaces', 'Enterprise Security', 'All Integrations', 'Priority Support'] },
    premium: { licences: 100, storage: '1000 GB', features: ['Unlimited Workspaces', 'Enterprise Everything', 'Dedicated Support', 'Custom Integrations'] },
  };

  const PAY_STATIC_PRICES = {
    INR: { personal: 199, basic: 799, standard: 699, advanced: 599, premium: 499 },
    MYR: { personal: 30, basic: 60, standard: 55, advanced: 50, premium: 45 },
    USD: { personal: 9, basic: 15, standard: 13.75, advanced: 12.5, premium: 11.5 },
  };

  let selectedPlan = null;
  let couponApplied = false;

  try {
    const raw = sessionStorage.getItem('selectedPlan');
    if (raw) selectedPlan = JSON.parse(raw);
  } catch (_) { }

  if (!selectedPlan) {
    selectedPlan = {
      plan: 'Advanced', price: '6471', unitPrice: '6471',
      qty: 1, isAnnual: false, symbol: '₹', currency: 'INR',
      totalLicences: 50, totalStorage: '500 GB',
    };
  }

  function payFmt(v) { return Math.round(v).toString(); }

  function resolveUnitPrice(planKey, currency, isAnnual) {
    const tbl = PAY_STATIC_PRICES[currency] || PAY_STATIC_PRICES.INR;
    const monthly = tbl[planKey] || 0;
    return isAnnual ? Math.round(monthly * 12 * 0.9) : Math.round(monthly);
  }

  function storageLabel(gb) {
    return gb >= 1000 ? (gb / 1000) + ' TB' : gb + ' GB';
  }

  function injectPayBillingControls() {
    const planOptions = document.getElementById('planOptions');
    if (!planOptions || document.getElementById('payBillingControls')) return;

    const isAnnual = selectedPlan.isAnnual || false;
    const qty = selectedPlan.qty || 1;
    const planSelector = planOptions.closest('.pay-plan-selector') || planOptions.parentNode;

    const toggleWrapper = document.createElement('div');
    toggleWrapper.id = 'payBillingControls';
    toggleWrapper.style.cssText = 'margin-bottom:10px;';
    toggleWrapper.innerHTML = `
      <div style="display:flex;align-items:center;justify-content:space-between;">
        <span style="font-size:13px;font-weight:600;color:#333;">Billing Period</span>
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer;margin:0;">
          <span id="payBillingMonthLabel"
            style="font-size:12px;font-weight:${isAnnual ? '400' : '600'};color:${isAnnual ? '#888' : '#057A96'};">
            Monthly
          </span>
          <span style="position:relative;display:inline-block;width:40px;height:22px;">
            <input type="checkbox" id="payBillingToggle"
              style="opacity:0;width:0;height:0;position:absolute;" ${isAnnual ? 'checked' : ''}>
            <span id="payToggleTrack" style="position:absolute;inset:0;border-radius:999px;
              cursor:pointer;background:${isAnnual ? '#057A96' : '#ccc'};transition:background .2s;">
              <span id="payToggleThumb" style="position:absolute;top:3px;width:16px;height:16px;
                border-radius:50%;background:#fff;box-shadow:0 1px 4px rgba(0,0,0,.2);
                transition:left .2s;left:${isAnnual ? '21px' : '3px'};"></span>
            </span>
          </span>
          <span id="payBillingYearLabel"
            style="font-size:12px;font-weight:${isAnnual ? '600' : '400'};color:${isAnnual ? '#057A96' : '#888'};">
            Yearly <span style="background:#d1fae5;color:#065f46;border-radius:999px;
              font-size:10px;font-weight:700;padding:1px 6px;margin-left:2px;">10% off</span>
          </span>
        </label>
      </div><hr style="margin:10px 0 0 0;">
    `;
    planSelector.parentNode.insertBefore(toggleWrapper, planSelector);

    const qtyWrapper = document.createElement('div');
    qtyWrapper.id = 'payQtyControls';
    qtyWrapper.style.cssText = 'margin-top:10px;';
    qtyWrapper.innerHTML = `
      <hr style="margin:0 0 10px 0;">
      <div style="display:flex;align-items:center;justify-content:space-between;">
        <span style="font-size:13px;font-weight:600;color:#333;" id="payQtyLabel">Users</span>
        <div id="payQtyBox" style="display:flex;align-items:center;
             border:1px solid #ddd;border-radius:8px;overflow:hidden;">
          <button id="payQtyMinus" type="button"
            style="width:32px;height:32px;border:none;background:#f5f5f5;
            font-size:18px;font-weight:600;cursor:pointer;color:#333;
            display:flex;align-items:center;justify-content:center;">−</button>
          <input type="number" id="payQtyInput" value="${qty}" min="1"
            style="width:42px;height:32px;text-align:center;border:none;
              border-left:1px solid #ddd;border-right:1px solid #ddd;
              font-size:13px;font-weight:600;color:#333;
              -moz-appearance:textfield;outline:none;background:#fff;">
          <button id="payQtyPlus" type="button"
            style="width:32px;height:32px;border:none;background:#f5f5f5;
            font-size:18px;font-weight:600;cursor:pointer;color:#333;
            display:flex;align-items:center;justify-content:center;">+</button>
        </div>
      </div>
    `;
    planSelector.parentNode.insertBefore(qtyWrapper, planSelector.nextSibling);

    document.getElementById('payBillingToggle').addEventListener('change', function () {
      selectedPlan.isAnnual = this.checked;
      document.getElementById('payToggleTrack').style.background = this.checked ? '#057A96' : '#ccc';
      document.getElementById('payToggleThumb').style.left = this.checked ? '21px' : '3px';
      document.getElementById('payBillingMonthLabel').style.fontWeight = this.checked ? '400' : '600';
      document.getElementById('payBillingMonthLabel').style.color = this.checked ? '#888' : '#057A96';
      document.getElementById('payBillingYearLabel').style.fontWeight = this.checked ? '600' : '400';
      document.getElementById('payBillingYearLabel').style.color = this.checked ? '#057A96' : '#888';
      renderSummary();
    });

    document.getElementById('payQtyMinus').addEventListener('click', function () {
      const cur = parseInt(document.getElementById('payQtyInput').value) || 1;
      if (cur > 1) {
        selectedPlan.qty = cur - 1;
        document.getElementById('payQtyInput').value = selectedPlan.qty;
        renderSummary();
      }
    });
    document.getElementById('payQtyPlus').addEventListener('click', function () {
      const cur = parseInt(document.getElementById('payQtyInput').value) || 1;
      selectedPlan.qty = cur + 1;
      document.getElementById('payQtyInput').value = selectedPlan.qty;
      renderSummary();
    });
    document.getElementById('payQtyInput').addEventListener('change', function () {
      const v = parseInt(this.value);
      if (v >= 1) { selectedPlan.qty = v; renderSummary(); }
      else this.value = selectedPlan.qty || 1;
    });
  }

  function setQtyStepperState(planKey) {
    const isPersonal = planKey === 'personal';
    const qtyBox = document.getElementById('payQtyBox');
    const payQtyInput = document.getElementById('payQtyInput');
    const payQtyMinus = document.getElementById('payQtyMinus');
    const payQtyPlus = document.getElementById('payQtyPlus');
    const payQtyLabel = document.getElementById('payQtyLabel');
    if (!qtyBox) return;

    if (isPersonal) {
      selectedPlan.qty = 1;
      if (payQtyInput) { payQtyInput.value = 1; payQtyInput.disabled = true; }
      if (payQtyMinus) payQtyMinus.disabled = true;
      if (payQtyPlus) payQtyPlus.disabled = true;
      qtyBox.style.opacity = '0.4';
      qtyBox.style.pointerEvents = 'none';
      if (payQtyLabel) payQtyLabel.style.color = '#aaa';
    } else {
      if (payQtyInput) payQtyInput.disabled = false;
      if (payQtyMinus) payQtyMinus.disabled = false;
      if (payQtyPlus) payQtyPlus.disabled = false;
      qtyBox.style.opacity = '1';
      qtyBox.style.pointerEvents = 'auto';
      if (payQtyLabel) payQtyLabel.style.color = '#333';
    }
  }

  function renderSummary() {
    const planKey = selectedPlan.plan.toLowerCase();
    const meta = PLAN_META[planKey] || PLAN_META.advanced;
    const sym = selectedPlan.symbol || '₹';
    const cur = selectedPlan.currency || 'INR';
    const isAnnual = selectedPlan.isAnnual || false;
    const unit = resolveUnitPrice(planKey, cur, isAnnual);
    const qty = selectedPlan.qty || 1;
    const subtotal = unit * qty;

    const payQtyInput = document.getElementById('payQtyInput');
    if (payQtyInput) payQtyInput.value = qty;

    setQtyStepperState(planKey);

    document.querySelectorAll('.pay-plan-tile').forEach(el => {
      const active = el.dataset.plan === planKey;
      el.classList.toggle('selected', active);
      const priceEl = el.querySelector('.pay-plan-tile__price');
      if (priceEl) {
        priceEl.textContent = `${sym} ${resolveUnitPrice(el.dataset.plan, cur, isAnnual)}`;
      }
    });

    document.getElementById('summaryPlanName').textContent = selectedPlan.plan;
    document.getElementById('summarySymbol').textContent = sym;
    document.getElementById('summaryUnitPrice').textContent = unit;

    const smallEl = document.querySelector('#summaryUnitPrice')
      ?.closest('.plan-price')?.querySelector('small');
    if (smallEl) smallEl.textContent = isAnnual ? '/year' : '/month';

    const STORAGE_PER_USER = {
      personal: 5, basic: 10, standard: 10, advanced: 10, premium: 10,
    };
    const totalLicences = meta.licences * qty;
    const totalStorageGB = (STORAGE_PER_USER[planKey] || 10) * totalLicences;
    const totalStorage = storageLabel(totalStorageGB);

    const ul = document.getElementById('planFeatureList');
    ul.innerHTML = '';
    [`License: ${totalLicences}`, `Total Storage: ${totalStorage}`, ...meta.features]
      .forEach(f => {
        const li = document.createElement('li');
        li.textContent = f;
        ul.appendChild(li);
      });

    const calloutEl = document.getElementById('annualSavingsCallout');
    if (isAnnual) {
      const tbl = PAY_STATIC_PRICES[cur] || PAY_STATIC_PRICES.INR;
      const yearlySave = (Math.round((tbl[planKey] || 0) * 12) - unit) * qty;
      if (calloutEl) {
        calloutEl.textContent = `✓ Annual plan — you save ${sym} ${yearlySave} (10% off)`;
        calloutEl.style.display = 'block';
      }
    } else {
      if (calloutEl) calloutEl.style.display = 'none';
    }

    const taxEl = document.getElementById('summaryTax');
    if (taxEl) taxEl.textContent = `${sym} 0`;

    const discountAmt = couponApplied ? Math.round(subtotal * 0.1) : 0;
    const total = subtotal - discountAmt;

    document.getElementById('summarySubtotal').textContent = `${sym} ${payFmt(subtotal)}`;
    document.getElementById('summaryTotal').textContent = `${sym} ${payFmt(total)}`;

    const modalTotalEl = document.getElementById('modalTotal');
    if (modalTotalEl) modalTotalEl.textContent = `${sym} ${payFmt(total)}`;

    const discountRow = document.getElementById('discountRow');
    if (couponApplied) {
      discountRow.style.display = 'flex';
      document.getElementById('discountAmt').textContent = `−${sym} ${payFmt(discountAmt)}`;
    } else {
      discountRow.style.display = 'none';
    }

    let savingsNotice = document.getElementById('paySavingsNotice');
    if (isAnnual) {
      const tbl = PAY_STATIC_PRICES[cur] || PAY_STATIC_PRICES.INR;
      const yearlySave = (Math.round((tbl[planKey] || 0) * 12) - unit) * qty;
      if (!savingsNotice) {
        savingsNotice = document.createElement('div');
        savingsNotice.id = 'paySavingsNotice';
        savingsNotice.style.cssText = [
          'background:#d1fae5', 'color:#065f46', 'border-radius:8px',
          'font-size:12px', 'font-weight:600', 'padding:6px 12px',
          'margin-bottom:10px', 'text-align:center', 'width:100%', 'box-sizing:border-box',
        ].join(';');
        const ci = document.getElementById('couponInput');
        let inserted = false;
        if (ci) {
          const ig = ci.closest('.input-group');
          const label = ig && ig.previousElementSibling;
          if (label && label.parentNode) {
            label.parentNode.insertBefore(savingsNotice, label);
            inserted = true;
          } else if (ig && ig.parentNode) {
            ig.parentNode.insertBefore(savingsNotice, ig);
            inserted = true;
          }
        }
        if (!inserted) document.querySelector('.panel-body')?.appendChild(savingsNotice);
      }
      savingsNotice.textContent = `🎉 10% off  — you save ${sym} ${yearlySave} by paying annually`;
      savingsNotice.style.display = 'block';
    } else {
      if (savingsNotice) savingsNotice.style.display = 'none';
    }
  }

  function buildPlanOptions() {
    const container = document.getElementById('planOptions');
    if (!container) return;
    container.innerHTML = '';
    container.style.cssText = 'display:grid;grid-template-columns:1fr 1fr;gap:6px;';

    ['basic', 'standard', 'advanced', 'premium'].forEach((p, i) => {
      const div = document.createElement('div');
      div.className = 'pay-plan-tile';
      div.dataset.plan = p;
      if (i === 4) div.style.gridColumn = '1 / -1';
      div.innerHTML = `${p.charAt(0).toUpperCase() + p.slice(1)}
                       <span class="pay-plan-tile__price"></span>`;

      div.addEventListener('click', () => {
        selectedPlan.plan = p.charAt(0).toUpperCase() + p.slice(1);
        selectedPlan.qty = 1;
        delete selectedPlan.totalLicences;
        delete selectedPlan.totalStorage;
        couponApplied = false;
        const qi = document.getElementById('payQtyInput');
        if (qi) qi.value = 1;
        const ci = document.getElementById('couponInput');
        const cm = document.getElementById('couponMsg');
        if (ci) ci.value = '';
        if (cm) cm.textContent = '';
        renderSummary();
      });

      container.appendChild(div);
    });
  }

  const applyBtn = document.getElementById('applyPromoBtn');
  if (applyBtn) {
    applyBtn.addEventListener('click', function () {
      const code = document.getElementById('couponInput').value.trim();
      const msgEl = document.getElementById('couponMsg');
      if (code === '1234') {
        couponApplied = true;
        msgEl.className = 'pay-coupon-ok';
        msgEl.textContent = '✓ Coupon applied! 10% discount added.';
      } else {
        couponApplied = false;
        msgEl.className = 'pay-coupon-err';
        msgEl.textContent = '✗ Invalid coupon code.';
      }
      renderSummary();
    });
  }

  const PAY_VALIDATORS = {
    required: v => v.trim().length > 0,
    email: v => !v || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v),
    phone: v => !v || /^[\+\d\s\(\)\-]{7,20}$/.test(v),
    url: v => !v || /^https?:\/\/.+\..+/.test(v),
    username: v => !v || /^[a-zA-Z0-9_]+$/.test(v),
    minlen: (v, a) => !v || v.length >= parseInt(a),
    match: (v, a) => v === (document.getElementById(a) || {}).value,
  };

  function payValidateField(field) {
    const val = field.value;
    const rules = (field.dataset.rule || '').split('|').filter(Boolean);
    if (!rules.length) return true;
    let ok = true;
    for (const r of rules) {
      const [fn, arg] = r.split(':');
      if (PAY_VALIDATORS[fn] && !PAY_VALIDATORS[fn](val, arg)) { ok = false; break; }
    }
    const errEl = document.getElementById(field.id + '-err');
    if (errEl) errEl.style.display = ok ? 'none' : 'block';
    field.classList.toggle('error', !ok);
    return ok;
  }

  function payValidateAll() {
    let ok = true;
    document.querySelectorAll('[data-rule]').forEach(f => { if (!payValidateField(f)) ok = false; });
    const terms = document.getElementById('terms');
    const termsErr = document.getElementById('terms-err');
    if (terms && !terms.checked) {
      if (termsErr) termsErr.style.display = 'block';
      ok = false;
    } else if (termsErr) {
      termsErr.style.display = 'none';
    }
    return ok;
  }

  let paySubmitted = false;
  document.querySelectorAll('[data-rule]').forEach(f => {
    f.addEventListener('blur', () => { if (paySubmitted) payValidateField(f); });
    f.addEventListener('input', () => { if (paySubmitted) payValidateField(f); });
    f.addEventListener('change', () => { if (paySubmitted) payValidateField(f); });
  });

function buildReviewHTML() {

  const gv = id => {
    const el = document.getElementById(id);
    return el && el.value ? el.value.trim() : '—';
  };

  return `
  <div id="reviewView">

    <div class="panel panel-default mb-4">
      <div class="panel-heading pay-review-head">
        <h4>Company Details</h4>
        <button class="pay-edit-btn" id="editBtn">✏️ Edit</button>
      </div>

      <div class="panel-body">

        <div class="row">
          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Company Name</span>
              <div class="review-value">${gv('companyNameInput')}</div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Company Type</span>
              <div class="review-value">${gv('companyTypeInput')}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Industry</span>
              <div class="review-value">${gv('industryTypeInput')}</div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Address</span>
              <div class="review-value">${gv('addressInput')}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Company Number</span>
              <div class="review-value">${gv('companyNumberInput')}</div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Company Email</span>
              <div class="review-value">${gv('companyEmailInput')}</div>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="panel panel-default mb-4">
      <div class="panel-heading">
        <h4>Contact Person Details</h4>
      </div>

      <div class="panel-body">

        <div class="row">
          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Contact Person</span>
              <div class="review-value">${gv('contactPersonInput')}</div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Role</span>
              <div class="review-value">${gv('designationInput')}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Phone</span>
              <div class="review-value">${gv('phoneInput')}</div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="review-field">
              <span class="review-label">Email</span>
              <div class="review-value">${gv('emailInput')}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <div class="review-field">
              <span class="review-label">Username</span>
              <div class="review-value">${gv('usernameInput')}</div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>`;
}

  function handleSaveVerify() {
    paySubmitted = true;
    if (!payValidateAll()) {
      const firstErr = document.querySelector('[data-rule].error');
      if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
      return;
    }
    const form = document.getElementById('registrationForm');
    const formCol = document.getElementById('formCol');
    form.style.display = 'none';
    document.getElementById('reviewView')?.remove();
    formCol.insertAdjacentHTML('beforeend', buildReviewHTML());

    document.getElementById('editBtn').addEventListener('click', function () {
      document.getElementById('reviewView').remove();
      form.style.display = '';
      const btn = document.getElementById('sideSubmitBtn');
      btn.textContent = 'Save & Verify';
      btn.onclick = handleSaveVerify;
    });

    const sideBtn = document.getElementById('sideSubmitBtn');
    sideBtn.textContent = 'Verify and Checkout';
    sideBtn.onclick = openPayModal;
  }

  function openPayModal() {
    document.getElementById('paymentModal').classList.add('open');
  }

  const closeBtn = document.getElementById('closePayModal');
  if (closeBtn) closeBtn.addEventListener('click', () => {
    document.getElementById('paymentModal').classList.remove('open');
  });

  const modalEl = document.getElementById('paymentModal');
  if (modalEl) modalEl.addEventListener('click', function (e) {
    if (e.target === this) this.classList.remove('open');
  });

  const cardNumEl = document.getElementById('cardNumber');
  if (cardNumEl) cardNumEl.addEventListener('input', function () {
    let v = this.value.replace(/\D/g, '').slice(0, 16);
    this.value = v.match(/.{1,4}/g)?.join(' ') || v;
  });

  const cardExpEl = document.getElementById('cardExpiry');
  if (cardExpEl) cardExpEl.addEventListener('input', function () {
    let v = this.value.replace(/\D/g, '').slice(0, 4);
    if (v.length >= 3) v = v.slice(0, 2) + ' / ' + v.slice(2);
    this.value = v;
  });

  const cardCvvEl = document.getElementById('cardCvv');
  if (cardCvvEl) cardCvvEl.addEventListener('input', function () {
    this.value = this.value.replace(/\D/g, '').slice(0, 4);
  });






  const sideSubmit = document.getElementById('sideSubmitBtn');
  if (sideSubmit) sideSubmit.onclick = handleSaveVerify;

  buildPlanOptions();
  injectPayBillingControls();
  renderSummary();

})();


/* ════════════════════════════════════════════════════════════════
   BLOCK 3 — THANK YOU PAGE
   ════════════════════════════════════════════════════════════════ */
(function () {
  if (!document.getElementById('tyPlanName')) return;

  const TY_PLAN_META = {
    personal: { licences: 1, storage: '5 GB', features: ['1 Workspace', 'Personal Dashboard', 'Basic Integrations', 'Standard Support'] },
    basic: { licences: 1, storage: '10 GB', features: ['1 Workspace', 'Manage Infra', 'App Integration', 'Backup & Recovery'] },
    standard: { licences: 10, storage: '100 GB', features: ['Multi-Workspace', 'Device & IP Control', 'App Integration', 'Backup & Recovery'] },
    advanced: { licences: 50, storage: '500 GB', features: ['Unlimited Workspaces', 'Enterprise Security', 'All Integrations', 'Priority Support'] },
    premium: { licences: 100, storage: '1000 GB', features: ['Unlimited Workspaces', 'Enterprise Everything', 'Dedicated Support', 'Custom Integrations'] },
  };

  let order = null;
  try { const raw = sessionStorage.getItem('completedOrder'); if (raw) order = JSON.parse(raw); } catch (_) { }
  if (!order) {
    order = {
      plan: 'Advanced', price: '—', symbol: '₹', currency: 'INR', qty: 1,
      couponUsed: false, finalTotal: '—', cardLast4: '****',
      orderId: 'ORD-' + Date.now().toString(36).toUpperCase().slice(-8),
      orderDate: new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }),
    };
  }

  const planKey = (order.plan || 'advanced').toLowerCase();
  const meta = TY_PLAN_META[planKey] || TY_PLAN_META.advanced;
  const sym = order.symbol || '₹';
  const setText = (id, v) => { const el = document.getElementById(id); if (el) el.textContent = v; };

  setText('tyPlanName', order.plan); setText('tySymbol', sym);
  setText('tyAmount', order.price); setText('tyOrderId', order.orderId);
  setText('tyDate', order.orderDate); setText('tyTotal', order.finalTotal);
  setText('tyCardLast', order.cardLast4); setText('tyCurrency', order.currency);
  setText('tyQty', order.qty + (order.qty > 1 ? ' licences' : ' licence'));
  setText('tyBilling', order.isAnnual ? 'Annual (10% off)' : 'Monthly');
  setText('tyCoupon', order.couponUsed ? 'Applied (10% off)' : 'None');

  const ul = document.getElementById('tyFeatureList');
  if (ul) {
    ul.innerHTML = '';
    [meta.licences + ' Licence' + (meta.licences > 1 ? 's' : ''), 'Storage: ' + meta.storage, ...meta.features]
      .forEach(f => { const li = document.createElement('li'); li.textContent = f; ul.appendChild(li); });
  }

  sessionStorage.removeItem('completedOrder');

  (function () {
    const canvas = document.getElementById('confettiCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    function resize() { canvas.width = window.innerWidth; canvas.height = window.innerHeight; }
    resize(); window.addEventListener('resize', resize);
    const COLORS = ['#057A96', '#0694B7', '#b3dde6', '#e8f6f9', '#3ab5ce', '#f6c941', '#ffffff'];
    const pieces = Array.from({ length: 120 }, () => ({
      x: Math.random() * canvas.width, y: Math.random() * canvas.height - canvas.height,
      w: Math.random() * 10 + 5, h: Math.random() * 5 + 3,
      r: Math.random() * Math.PI * 2, vx: (Math.random() - .5) * 1.8,
      vy: Math.random() * 2.8 + 1.2, vr: (Math.random() - .5) * .08,
      col: COLORS[Math.floor(Math.random() * COLORS.length)],
      alpha: Math.random() * .55 + .35,
    }));
    const startTime = Date.now();
    function draw() {
      if (Date.now() - startTime > 5000) { ctx.clearRect(0, 0, canvas.width, canvas.height); return; }
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      pieces.forEach(p => {
        ctx.save(); ctx.globalAlpha = p.alpha; ctx.translate(p.x, p.y); ctx.rotate(p.r);
        ctx.fillStyle = p.col; ctx.fillRect(-p.w / 2, -p.h / 2, p.w, p.h); ctx.restore();
        p.x += p.vx; p.y += p.vy; p.r += p.vr;
        if (p.y > canvas.height + 20) { p.y = -20; p.x = Math.random() * canvas.width; }
      });
      requestAnimationFrame(draw);
    }
    draw();
  })();
})();


