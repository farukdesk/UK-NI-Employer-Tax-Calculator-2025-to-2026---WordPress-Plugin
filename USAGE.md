# Usage Guide

## Quick Start

### 1. Installation

**Via WordPress Admin:**
1. Download the plugin ZIP file
2. Go to **WordPress Admin > Plugins > Add New**
3. Click **Upload Plugin**
4. Choose the ZIP file and click **Install Now**
5. Click **Activate Plugin**

**Manual Installation:**
1. Upload the `uk-tax-calculator` folder to `/wp-content/plugins/`
2. Activate the plugin through the WordPress admin panel

### 2. Adding the Calculator to Your Site

Simply add this shortcode to any page, post, or widget:

```
[uk_tax_calculator]
```

That's it! The calculator will appear with its full interface.

## Examples

### Example 1: Dedicated Calculator Page

Create a new page called "Tax Calculator" and add:

```
[uk_tax_calculator]
```

### Example 2: In a Post

You can embed the calculator in any blog post or page content:

```
Here's a useful tool to calculate your UK taxes:

[uk_tax_calculator]

Feel free to use this calculator to estimate your take-home pay.
```

### Example 3: In a Widget

1. Go to **Appearance > Widgets**
2. Add a **Shortcode** or **Custom HTML** widget
3. Enter: `[uk_tax_calculator]`
4. Save the widget

### Example 4: With Page Builders

**Elementor:**
1. Add a **Shortcode** widget
2. Enter: `[uk_tax_calculator]`

**Divi:**
1. Add a **Code** module
2. Enter: `[uk_tax_calculator]`

**Gutenberg:**
1. Add a **Shortcode** block
2. Enter: `[uk_tax_calculator]`

## User Instructions

When users see the calculator, they should:

1. **Enter Gross Annual Salary** - The full salary before any deductions (e.g., £50,000)
2. **Enter Tax Code** (optional) - Default is 1257L, which is the standard UK tax code for 2025-2026
3. **Click "Calculate Tax"**
4. **View Results** - The calculator displays:
   - Income Tax (PAYE)
   - National Insurance (Employee)
   - Total Taxes
   - Net Income (Take-home pay)
   - Employer's National Insurance
   - Total Cost to Employer

## Understanding Tax Codes

### Standard Tax Code (1257L)
- The most common tax code for 2025-2026
- Represents a personal allowance of £12,570
- Used for employees with one job and no untaxed income

### How Tax Codes Work
The number in your tax code (e.g., **1257** in 1257L) represents your personal allowance divided by 10:
- 1257 × 10 = £12,570 personal allowance

### Other Common Tax Codes
- **BR** - All income taxed at basic rate (20%)
- **D0** - All income taxed at higher rate (40%)
- **D1** - All income taxed at additional rate (45%)
- **0T** - No personal allowance
- **K codes** - Have income or benefits to pay tax on

### Finding Your Tax Code
Check your:
- Payslip
- P45 form
- P60 form
- HMRC correspondence
- Personal Tax Account on GOV.UK

## Calculation Examples

### Example 1: £30,000 Salary

**Input:**
- Salary: £30,000
- Tax Code: 1257L

**Output:**
| Item | Annual | Monthly | % |
|------|--------|---------|---|
| Income Tax | £3,486 | £291 | 12% |
| Employee NI | £1,394 | £116 | 5% |
| Total Taxes | £4,880 | £407 | 16% |
| Net Income | £25,120 | £2,093 | 84% |

**Employer Costs:**
- Employer NI: £3,750 (annual)
- Total Cost: £33,750 (annual)

### Example 2: £50,000 Salary

**Input:**
- Salary: £50,000
- Tax Code: 1257L

**Output:**
| Item | Annual | Monthly | % |
|------|--------|---------|---|
| Income Tax | £7,486 | £624 | 15% |
| Employee NI | £2,994 | £250 | 6% |
| Total Taxes | £10,480 | £873 | 21% |
| Net Income | £39,520 | £3,293 | 79% |

**Employer Costs:**
- Employer NI: £6,750 (annual)
- Total Cost: £56,750 (annual)

### Example 3: £100,000 Salary

**Input:**
- Salary: £100,000
- Tax Code: 1257L

**Output:**
| Item | Annual | Monthly | % |
|------|--------|---------|---|
| Income Tax | £27,486 | £2,291 | 27% |
| Employee NI | £4,994 | £416 | 5% |
| Total Taxes | £32,480 | £2,707 | 32% |
| Net Income | £67,520 | £5,627 | 68% |

**Employer Costs:**
- Employer NI: £14,250 (annual)
- Total Cost: £114,250 (annual)

## Customization

### Custom CSS

You can customize the calculator's appearance by adding CSS to your theme:

```css
/* Customize container */
.uk-tax-calculator-container {
    background: #f5f5f5;
    border-radius: 20px;
}

/* Customize button */
.btn-calculate {
    background: #007bff;
}

/* Customize title */
.calculator-title {
    color: #333;
    font-size: 32px;
}
```

### Available CSS Classes

- `.uk-tax-calculator-wrapper` - Main wrapper
- `.uk-tax-calculator-container` - Container
- `.calculator-title` - Title
- `.calculator-description` - Description
- `.calculator-form` - Form
- `.form-group` - Form field group
- `.form-control` - Input fields
- `.btn-calculate` - Calculate button
- `.calculator-results` - Results section
- `.results-section` - Individual result sections
- `.result-row` - Result rows
- `.net-income-row` - Net income row
- `.employer-section` - Employer costs section

## Troubleshooting

### Calculator Not Showing
1. Make sure the plugin is activated
2. Check if the shortcode is correctly typed: `[uk_tax_calculator]`
3. Clear your browser cache
4. Check for JavaScript conflicts with other plugins

### Styling Issues
1. Check if your theme has conflicting CSS
2. Add custom CSS to override default styles
3. Try testing with a default WordPress theme

### Calculation Issues
1. Make sure you're entering a valid number for salary
2. Tax code should be in correct format (e.g., 1257L)
3. Clear browser cache and try again

### JavaScript Not Working
1. Check browser console for errors
2. Make sure jQuery is loaded (WordPress includes it by default)
3. Try disabling other plugins to check for conflicts

## Browser Support

The calculator works on:
- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Support

For help with the plugin:
1. Check this documentation
2. Visit the GitHub repository
3. Open an issue on GitHub
4. Check WordPress.org support forum

## Legal Notice

This calculator provides estimates based on standard UK tax rates for 2025-2026. Actual tax liability may vary. Always verify with HMRC or a qualified tax professional.

## Updates

The plugin will be updated annually to reflect new tax years and rates. Make sure to keep the plugin updated to get the latest tax calculations.
