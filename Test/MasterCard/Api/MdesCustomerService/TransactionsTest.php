<?php
/*
 * Copyright 2016 MasterCard International.
 *
 * Redistribution and use in source and binary forms, with or without modification, are 
 * permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of 
 * conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its 
 * contributors may be used to endorse or promote products derived from this software 
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES 
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT 
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; 
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER 
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING 
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF 
 * SUCH DAMAGE.
 *
 */

namespace MasterCard\Api\MdesCustomerService;

use MasterCard\Core\Model\RequestMap;
use MasterCard\Core\ApiConfig;
use MasterCard\Core\Security\OAuth\OAuthAuthentication;



class TransactionsTest extends \PHPUnit_Framework_TestCase {

    protected function setUp() {
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        $privateKey = file_get_contents(getcwd()."/mcapi_sandbox_key.p12");
        ApiConfig::setAuthentication(new OAuthAuthentication("L5BsiPgaF-O3qA36znUATgQXwJB6MRoMSdhjd7wt50c97279!50596e52466e3966546d434b7354584c4975693238513d3d", $privateKey, "alias", "password"));
    }

    
    
                
        public function test_example_mdes_transactions()
        {
            $map = new RequestMap();
            $map->set ("TransactionsRequest.TokenUniqueReference", "DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c");
            $map->set ("TransactionsRequest.AuditInfo.UserId", "A1435477");
            $map->set ("TransactionsRequest.AuditInfo.UserName", "John Smith");
            $map->set ("TransactionsRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("TransactionsRequest.AuditInfo.Phone", "5555551234");
            
            $response = Transactions::create($map);
            $this->customAssertValue("USD", $response->get("TransactionsResponse.Transactions.Transaction[0].CurrencyCode"));
            $this->customAssertValue("123.45", $response->get("TransactionsResponse.Transactions.Transaction[0].TransactionAmount"));
            $this->customAssertValue("PURCH", $response->get("TransactionsResponse.Transactions.Transaction[0].TransactionTypeCode"));
            $this->customAssertValue("Purchase", $response->get("TransactionsResponse.Transactions.Transaction[0].TransactionTypeDescription"));
            $this->customAssertValue("AUTH", $response->get("TransactionsResponse.Transactions.Transaction[0].TransactionStatusCode"));
            $this->customAssertValue("FOODMART", $response->get("TransactionsResponse.Transactions.Transaction[0].MerchantName"));
            $this->customAssertValue("1234", $response->get("TransactionsResponse.Transactions.Transaction[0].MerchantCategoryCode"));
            $this->customAssertValue("GROCERY STORES, SUPERMARKETS", $response->get("TransactionsResponse.Transactions.Transaction[0].MerchantCategoryDescription"));
            $this->customAssertValue("90", $response->get("TransactionsResponse.Transactions.Transaction[0].POSEntryMode"));
            $this->customAssertValue("USD", $response->get("TransactionsResponse.Transactions.Transaction[1].CurrencyCode"));
            $this->customAssertValue("29.47", $response->get("TransactionsResponse.Transactions.Transaction[1].TransactionAmount"));
            $this->customAssertValue("PURCB", $response->get("TransactionsResponse.Transactions.Transaction[1].TransactionTypeCode"));
            $this->customAssertValue("Purchase with Cashback", $response->get("TransactionsResponse.Transactions.Transaction[1].TransactionTypeDescription"));
            $this->customAssertValue("COMP", $response->get("TransactionsResponse.Transactions.Transaction[1].TransactionStatusCode"));
            $this->customAssertValue("RXMART", $response->get("TransactionsResponse.Transactions.Transaction[1].MerchantName"));
            $this->customAssertValue("5678", $response->get("TransactionsResponse.Transactions.Transaction[1].MerchantCategoryCode"));
            $this->customAssertValue("DRUG STORES, PHARMACIES", $response->get("TransactionsResponse.Transactions.Transaction[1].MerchantCategoryDescription"));
            $this->customAssertValue("91", $response->get("TransactionsResponse.Transactions.Transaction[1].POSEntryMode"));
            $this->customAssertValue("USD", $response->get("TransactionsResponse.Transactions.Transaction[2].CurrencyCode"));
            $this->customAssertValue("-16.30", $response->get("TransactionsResponse.Transactions.Transaction[2].TransactionAmount"));
            $this->customAssertValue("REFND", $response->get("TransactionsResponse.Transactions.Transaction[2].TransactionTypeCode"));
            $this->customAssertValue("Refund", $response->get("TransactionsResponse.Transactions.Transaction[2].TransactionTypeDescription"));
            $this->customAssertValue("COMP", $response->get("TransactionsResponse.Transactions.Transaction[2].TransactionStatusCode"));
            $this->customAssertValue("AUTOMART", $response->get("TransactionsResponse.Transactions.Transaction[2].MerchantName"));
            $this->customAssertValue("9012", $response->get("TransactionsResponse.Transactions.Transaction[2].MerchantCategoryCode"));
            $this->customAssertValue("AUTOMOTIVE PARTS, ACCESSORIES STORES", $response->get("TransactionsResponse.Transactions.Transaction[2].MerchantCategoryDescription"));
            $this->customAssertValue("07", $response->get("TransactionsResponse.Transactions.Transaction[2].POSEntryMode"));
            $this->customAssertValue("USD", $response->get("TransactionsResponse.Transactions.Transaction[3].CurrencyCode"));
            $this->customAssertValue("41.89", $response->get("TransactionsResponse.Transactions.Transaction[3].TransactionAmount"));
            $this->customAssertValue("AFD", $response->get("TransactionsResponse.Transactions.Transaction[3].TransactionTypeCode"));
            $this->customAssertValue("Purchase Pre-Auth AFD", $response->get("TransactionsResponse.Transactions.Transaction[3].TransactionTypeDescription"));
            $this->customAssertValue("PAUTC", $response->get("TransactionsResponse.Transactions.Transaction[3].TransactionStatusCode"));
            $this->customAssertValue("GASMART", $response->get("TransactionsResponse.Transactions.Transaction[3].MerchantName"));
            $this->customAssertValue("3456", $response->get("TransactionsResponse.Transactions.Transaction[3].MerchantCategoryCode"));
            $this->customAssertValue("FUEL DISPENSER, AUTOMATED", $response->get("TransactionsResponse.Transactions.Transaction[3].MerchantCategoryDescription"));
            $this->customAssertValue("90", $response->get("TransactionsResponse.Transactions.Transaction[3].POSEntryMode"));
            
        }
        
    
    
    
    
    
    
    

    protected function customAssertValue($expected, $actual) {
        if (is_bool($actual)) {
            $this->assertEquals(boolval($expected), $actual);
        } else if (is_float($actual)) {
            $this->assertEquals(floatval($expected), $actual);
        } else {
            $this->assertEquals(strtolower($expected), strtolower($actual));
        }
    }
}



