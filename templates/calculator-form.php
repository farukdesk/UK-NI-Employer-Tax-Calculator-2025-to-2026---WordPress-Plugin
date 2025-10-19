<?php
/**
 * Calculator Form Template
 * 
 * @package UK_Tax_Calculator
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="uk-tax-calculator-wrapper">
    <div class="uk-tax-calculator-container">
        <h2 class="calculator-title">UK Tax Calculator 2025-2026</h2>
        <p class="calculator-description">Calculate your Income Tax, National Insurance, and total employer costs</p>
        
        <form id="uk-tax-calculator-form" class="calculator-form">
            <div class="form-group">
                <label for="annual-salary">
                    Gross Annual Salary (£)
                    <span class="required">*</span>
                </label>
                <input 
                    type="number" 
                    id="annual-salary" 
                    name="salary" 
                    placeholder="50000" 
                    min="0" 
                    step="1" 
                    required
                    class="form-control"
                >
                <small class="form-help">Enter your annual salary before tax</small>
            </div>
            
            <div class="form-group">
                <label for="tax-code">
                    Tax Code
                </label>
                <input 
                    type="text" 
                    id="tax-code" 
                    name="tax_code" 
                    value="1257L" 
                    placeholder="1257L"
                    class="form-control"
                >
                <small class="form-help">Standard UK tax code for 2025-2026 is 1257L</small>
            </div>
            
            <button type="submit" class="btn-calculate">
                <span class="btn-text">Calculate Tax</span>
                <span class="btn-loader" style="display:none;">Calculating...</span>
            </button>
        </form>
        
        <div id="calculator-results" class="calculator-results" style="display:none;">
            <div class="results-header">
                <h3>Your Tax Breakdown</h3>
                <p class="tax-code-info">Tax Code: <strong id="result-tax-code"></strong> | Personal Allowance: <strong id="result-personal-allowance"></strong></p>
            </div>
            
            <div class="results-grid">
                <!-- Employee Deductions Section -->
                <div class="results-section">
                    <h4 class="section-title">Employee Deductions</h4>
                    
                    <div class="result-row">
                        <div class="result-label">Income Tax (PAYE)</div>
                        <div class="result-values">
                            <div class="result-annual">
                                <span class="label">Annual:</span>
                                <strong id="income-tax-annual">£0</strong>
                            </div>
                            <div class="result-monthly">
                                <span class="label">Monthly:</span>
                                <strong id="income-tax-monthly">£0</strong>
                            </div>
                            <div class="result-percentage">
                                <span id="income-tax-percentage">0%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="result-row">
                        <div class="result-label">National Insurance (NI)</div>
                        <div class="result-values">
                            <div class="result-annual">
                                <span class="label">Annual:</span>
                                <strong id="employee-ni-annual">£0</strong>
                            </div>
                            <div class="result-monthly">
                                <span class="label">Monthly:</span>
                                <strong id="employee-ni-monthly">£0</strong>
                            </div>
                            <div class="result-percentage">
                                <span id="employee-ni-percentage">0%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="result-row total-row">
                        <div class="result-label">Total Taxes</div>
                        <div class="result-values">
                            <div class="result-annual">
                                <span class="label">Annual:</span>
                                <strong id="total-taxes-annual">£0</strong>
                            </div>
                            <div class="result-monthly">
                                <span class="label">Monthly:</span>
                                <strong id="total-taxes-monthly">£0</strong>
                            </div>
                            <div class="result-percentage">
                                <span id="total-taxes-percentage">0%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="result-row net-income-row">
                        <div class="result-label">NET INCOME</div>
                        <div class="result-values">
                            <div class="result-annual">
                                <span class="label">Annual:</span>
                                <strong id="net-income-annual">£0</strong>
                            </div>
                            <div class="result-monthly">
                                <span class="label">Monthly:</span>
                                <strong id="net-income-monthly">£0</strong>
                            </div>
                            <div class="result-percentage">
                                <span id="net-income-percentage">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Employer Costs Section -->
                <div class="results-section employer-section">
                    <h4 class="section-title">Employer Costs</h4>
                    
                    <div class="result-row">
                        <div class="result-label">Salary</div>
                        <div class="result-values">
                            <div class="result-annual">
                                <span class="label">Annual:</span>
                                <strong id="salary-annual">£0</strong>
                            </div>
                            <div class="result-monthly">
                                <span class="label">Monthly:</span>
                                <strong id="salary-monthly">£0</strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="result-row">
                        <div class="result-label">Employer's NI</div>
                        <div class="result-values">
                            <div class="result-annual">
                                <span class="label">Annual:</span>
                                <strong id="employer-ni-annual">£0</strong>
                            </div>
                            <div class="result-monthly">
                                <span class="label">Monthly:</span>
                                <strong id="employer-ni-monthly">£0</strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="result-row total-row">
                        <div class="result-label">TOTAL COST TO EMPLOYER</div>
                        <div class="result-values">
                            <div class="result-annual">
                                <span class="label">Annual:</span>
                                <strong id="total-cost-annual">£0</strong>
                            </div>
                            <div class="result-monthly">
                                <span class="label">Monthly:</span>
                                <strong id="total-cost-monthly">£0</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="results-footer">
                <p class="disclaimer">
                    <small>
                        <strong>Note:</strong> This calculator uses the standard UK tax rates for 2025-2026. 
                        Calculations assume standard Category A National Insurance (employees aged 21 and over). 
                        Results are estimates and may vary based on individual circumstances. 
                        Always consult with HMRC or a qualified tax professional for accurate tax advice.
                    </small>
                </p>
            </div>
        </div>
        
        <div id="calculator-error" class="calculator-error" style="display:none;">
            <p class="error-message"></p>
        </div>
    </div>
</div>
