<?php
/**
 * Plugin Name: UK NI & Employer Tax Calculator (2025-2026)
 * Plugin URI: https://github.com/farukdesk/UK-NI-Employer-Tax-Calculator-2025-to-2026---WordPress-Plugin
 * Description: Calculate UK Income Tax, National Insurance, and Employer NI contributions for the 2025-2026 tax year. Use shortcode [uk_tax_calculator] to display the calculator.
 * Version: 1.0.0
 * Author: Faruk Desk
 * Author URI: https://github.com/farukdesk
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: uk-tax-calculator
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('UK_TAX_CALC_VERSION', '1.0.0');
define('UK_TAX_CALC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('UK_TAX_CALC_PLUGIN_URL', plugin_dir_url(__FILE__));

class UK_Tax_Calculator {
    
    /**
     * Constructor
     */
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_shortcode('uk_tax_calculator', array($this, 'calculator_shortcode'));
        add_action('wp_ajax_calculate_uk_tax', array($this, 'ajax_calculate_tax'));
        add_action('wp_ajax_nopriv_calculate_uk_tax', array($this, 'ajax_calculate_tax'));
    }
    
    /**
     * Enqueue scripts and styles
     */
    public function enqueue_scripts() {
        wp_enqueue_style(
            'uk-tax-calculator-style',
            UK_TAX_CALC_PLUGIN_URL . 'assets/css/calculator.css',
            array(),
            UK_TAX_CALC_VERSION
        );
        
        wp_enqueue_script(
            'uk-tax-calculator-script',
            UK_TAX_CALC_PLUGIN_URL . 'assets/js/calculator.js',
            array('jquery'),
            UK_TAX_CALC_VERSION,
            true
        );
        
        wp_localize_script('uk-tax-calculator-script', 'ukTaxCalc', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('uk_tax_calculator_nonce')
        ));
    }
    
    /**
     * Calculator shortcode
     */
    public function calculator_shortcode($atts) {
        ob_start();
        include UK_TAX_CALC_PLUGIN_DIR . 'templates/calculator-form.php';
        return ob_get_clean();
    }
    
    /**
     * AJAX handler for tax calculation
     */
    public function ajax_calculate_tax() {
        check_ajax_referer('uk_tax_calculator_nonce', 'nonce');
        
        $salary = isset($_POST['salary']) ? floatval($_POST['salary']) : 0;
        $tax_code = isset($_POST['tax_code']) ? sanitize_text_field($_POST['tax_code']) : '1257L';
        
        if ($salary <= 0) {
            wp_send_json_error(array('message' => 'Please enter a valid salary'));
        }
        
        $results = $this->calculate_tax($salary, $tax_code);
        wp_send_json_success($results);
    }
    
    /**
     * Calculate tax and NI
     * 
     * @param float $annual_salary Gross annual salary
     * @param string $tax_code Tax code (default 1257L for 2025-2026)
     * @return array Calculation results
     */
    public function calculate_tax($annual_salary, $tax_code = '1257L') {
        // 2025-2026 Tax Year Constants
        $personal_allowance = 12570; // Standard personal allowance
        $basic_rate_limit = 50270; // £12,570 + £37,700
        $higher_rate_limit = 125140; // £12,570 + £112,570
        
        // Extract numeric value from tax code
        $tax_code_numeric = intval(preg_replace('/[^0-9]/', '', $tax_code));
        if ($tax_code_numeric > 0) {
            $personal_allowance = $tax_code_numeric * 10;
        }
        
        // Taper personal allowance for high earners (over £100,000)
        if ($annual_salary > 100000) {
            $reduction = ($annual_salary - 100000) / 2;
            $personal_allowance = max(0, $personal_allowance - $reduction);
        }
        
        // Calculate Income Tax (PAYE)
        $taxable_income = max(0, $annual_salary - $personal_allowance);
        $income_tax = 0;
        
        if ($taxable_income > 0) {
            // Basic rate (20%) up to £37,700 above personal allowance
            $basic_rate_income = min($taxable_income, $basic_rate_limit - $personal_allowance);
            $income_tax += $basic_rate_income * 0.20;
            
            // Higher rate (40%) from £37,701 to £125,140
            if ($taxable_income > ($basic_rate_limit - $personal_allowance)) {
                $higher_rate_income = min(
                    $taxable_income - ($basic_rate_limit - $personal_allowance),
                    $higher_rate_limit - $basic_rate_limit
                );
                $income_tax += $higher_rate_income * 0.40;
            }
            
            // Additional rate (45%) above £125,140
            if ($taxable_income > ($higher_rate_limit - $personal_allowance)) {
                $additional_rate_income = $taxable_income - ($higher_rate_limit - $personal_allowance);
                $income_tax += $additional_rate_income * 0.45;
            }
        }
        
        // Calculate Employee National Insurance (Category A - standard)
        $ni_primary_threshold = 12570;
        $ni_upper_earnings_limit = 50270;
        
        $employee_ni = 0;
        if ($annual_salary > $ni_primary_threshold) {
            // 8% on earnings between £12,570 and £50,270
            $ni_basic = min($annual_salary, $ni_upper_earnings_limit) - $ni_primary_threshold;
            $employee_ni += $ni_basic * 0.08;
            
            // 2% on earnings above £50,270
            if ($annual_salary > $ni_upper_earnings_limit) {
                $ni_additional = $annual_salary - $ni_upper_earnings_limit;
                $employee_ni += $ni_additional * 0.02;
            }
        }
        
        // Calculate Employer National Insurance
        $ni_secondary_threshold = 5000;
        $employer_ni = 0;
        
        if ($annual_salary > $ni_secondary_threshold) {
            // 15% on all earnings above £5,000
            $employer_ni = ($annual_salary - $ni_secondary_threshold) * 0.15;
        }
        
        // Calculate totals
        $total_taxes = $income_tax + $employee_ni;
        $net_income = $annual_salary - $total_taxes;
        $total_cost_to_employer = $annual_salary + $employer_ni;
        
        // Monthly calculations
        $monthly_salary = $annual_salary / 12;
        $monthly_income_tax = $income_tax / 12;
        $monthly_employee_ni = $employee_ni / 12;
        $monthly_total_taxes = $total_taxes / 12;
        $monthly_net_income = $net_income / 12;
        $monthly_employer_ni = $employer_ni / 12;
        $monthly_total_cost = $total_cost_to_employer / 12;
        
        // Calculate percentages
        $income_tax_percentage = $annual_salary > 0 ? ($income_tax / $annual_salary) * 100 : 0;
        $employee_ni_percentage = $annual_salary > 0 ? ($employee_ni / $annual_salary) * 100 : 0;
        $total_taxes_percentage = $annual_salary > 0 ? ($total_taxes / $annual_salary) * 100 : 0;
        $net_income_percentage = $annual_salary > 0 ? ($net_income / $annual_salary) * 100 : 0;
        
        return array(
            'annual' => array(
                'salary' => $annual_salary,
                'income_tax' => $income_tax,
                'employee_ni' => $employee_ni,
                'total_taxes' => $total_taxes,
                'net_income' => $net_income,
                'employer_ni' => $employer_ni,
                'total_cost_to_employer' => $total_cost_to_employer
            ),
            'monthly' => array(
                'salary' => $monthly_salary,
                'income_tax' => $monthly_income_tax,
                'employee_ni' => $monthly_employee_ni,
                'total_taxes' => $monthly_total_taxes,
                'net_income' => $monthly_net_income,
                'employer_ni' => $monthly_employer_ni,
                'total_cost_to_employer' => $monthly_total_cost
            ),
            'percentages' => array(
                'income_tax' => $income_tax_percentage,
                'employee_ni' => $employee_ni_percentage,
                'total_taxes' => $total_taxes_percentage,
                'net_income' => $net_income_percentage
            ),
            'tax_code_used' => $tax_code,
            'personal_allowance_used' => $personal_allowance
        );
    }
}

// Initialize the plugin
new UK_Tax_Calculator();
