# UK NI & Employer Tax Calculator (2025-2026)

A WordPress plugin for calculating UK Income Tax, National Insurance, and Employer NI contributions for the 2025-2026 tax year.

![WordPress Plugin Version](https://img.shields.io/badge/version-1.0.0-blue)
![WordPress Compatibility](https://img.shields.io/badge/wordpress-5.0%2B-blue)
![PHP Compatibility](https://img.shields.io/badge/php-7.0%2B-blue)
![License](https://img.shields.io/badge/license-GPL%20v2%2B-blue)

## Features

- ✅ **Accurate Calculations** - Based on official HMRC rates for 2025-2026
- 📊 **Complete Breakdown** - Income Tax, Employee NI, Employer NI, and net income
- 📅 **Annual & Monthly Figures** - View both timeframes
- 📈 **Percentage Display** - See what percentage goes to each tax
- 🎨 **Responsive Design** - Works on desktop, tablet, and mobile
- ⚡ **Easy Integration** - Simple shortcode `[uk_tax_calculator]`
- 🎯 **No Configuration** - Works out of the box
- 🔒 **Privacy-Focused** - No data collection or external API calls

## Installation

### From WordPress Admin

1. Download the latest release
2. Go to **Plugins > Add New > Upload Plugin**
3. Choose the ZIP file and click **Install Now**
4. Activate the plugin
5. Add `[uk_tax_calculator]` to any page or post

### Manual Installation

1. Clone this repository or download the ZIP
2. Upload to `/wp-content/plugins/`
3. Activate through the WordPress admin panel
4. Add `[uk_tax_calculator]` to any page or post

## Usage

Simply add the shortcode to any page, post, or widget:

```
[uk_tax_calculator]
```

Users can then:
1. Enter their gross annual salary
2. Enter their tax code (optional, defaults to 1257L)
3. Click "Calculate Tax"
4. View the complete breakdown

## Tax Rates (2025-2026)

### Income Tax (PAYE)
- **Personal Allowance**: £12,570
- **Basic Rate (20%)**: £12,571 to £50,270
- **Higher Rate (40%)**: £50,271 to £125,140
- **Additional Rate (45%)**: Over £125,140

### Employee National Insurance (Category A)
- **Primary Threshold**: £12,570
- **8%** on earnings between £12,570 and £50,270
- **2%** on earnings above £50,270

### Employer National Insurance
- **Secondary Threshold**: £5,000
- **15%** on all earnings above £5,000

## Example Calculation

For a salary of **£50,000**:

| Item | Annual | Monthly | % of Salary |
|------|--------|---------|-------------|
| Income Tax (PAYE) | £7,486 | £624 | 15% |
| National Insurance | £2,994 | £250 | 6% |
| **Total Taxes** | **£10,480** | **£873** | **21%** |
| **NET INCOME** | **£39,520** | **£3,293** | **79%** |

**Employer Costs:**
| Item | Annual | Monthly |
|------|--------|---------|
| Salary | £50,000 | £4,167 |
| Employer's NI | £6,750 | £563 |
| **TOTAL COST** | **£56,750** | **£4,729** |

## Customization

### Custom CSS

You can customize the appearance by adding CSS to your theme:

```css
.uk-tax-calculator-container {
    /* Your custom styles */
}
```

### Integration with Page Builders

The calculator works with all major page builders:
- Elementor
- Beaver Builder
- Divi Builder
- WPBakery
- Gutenberg

Just add the shortcode in a shortcode widget or module.

## Technical Details

### File Structure

```
uk-tax-calculator/
├── assets/
│   ├── css/
│   │   └── calculator.css
│   └── js/
│       └── calculator.js
├── templates/
│   └── calculator-form.php
├── uk-tax-calculator.php
├── readme.txt
└── README.md
```

### Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

### Security Features

- WordPress nonce verification
- Input sanitization
- AJAX request validation
- No external API calls
- No data storage

## Development

### Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher
- jQuery (included with WordPress)

### Local Development

1. Clone the repository
2. Copy to your WordPress `wp-content/plugins/` directory
3. Activate the plugin
4. Start developing!

## Support

For issues, questions, or contributions:
- Open an issue on GitHub
- Submit a pull request
- Check the WordPress.org support forum

## Contributing

Contributions are welcome! Please:
1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Open a pull request

## Legal Disclaimer

This calculator provides estimates based on standard UK tax rates for the 2025-2026 tax year. Actual tax liability may vary depending on individual circumstances. Always verify calculations with HMRC or consult a qualified tax professional.

## Credits

Tax rates and thresholds based on official HMRC guidance for the 2025-2026 tax year.

## License

This project is licensed under the GPL v2 or later - see the [LICENSE](LICENSE) file for details.

## Changelog

### Version 1.0.0
- Initial release
- Income Tax (PAYE) calculation
- Employee National Insurance calculation
- Employer National Insurance calculation
- Support for custom tax codes
- Responsive design
- Annual and monthly breakdowns

## Author

**Faruk Desk**
- GitHub: [@farukdesk](https://github.com/farukdesk)

---

Made with ❤️ for the WordPress community
