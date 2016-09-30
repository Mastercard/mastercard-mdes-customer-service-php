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
use Test\BaseTest;



class TransactionsTest extends BaseTest {

    public static $responses = array();

    protected function setUp() {
        parent::setUp();
        //ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        BaseTest::resetAuthentication();
    }

    
    
                
        public function test_example_mdes_transactions()
        {
            

            

            $map = new RequestMap();
            $map->set("TransactionsRequest.TokenUniqueReference", "DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c");
            $map->set("TransactionsRequest.AuditInfo.UserId", "A1435477");
            $map->set("TransactionsRequest.AuditInfo.UserName", "John Smith");
            $map->set("TransactionsRequest.AuditInfo.Organization", "Any Bank");
            $map->set("TransactionsRequest.AuditInfo.Phone", "5555551234");
            
            
            $response = Transactions::create($map);

            $ignoreAssert = array();
            
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[0].CurrencyCode", "USD");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[0].TransactionAmount", "123.45");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[0].TransactionTypeCode", "PURCH");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[0].TransactionTypeDescription", "Purchase");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[0].TransactionStatusCode", "AUTH");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[0].MerchantName", "FOODMART");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[0].MerchantCategoryCode", "1234");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[0].MerchantCategoryDescription", "GROCERY STORES, SUPERMARKETS");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[0].POSEntryMode", "90");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[1].CurrencyCode", "USD");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[1].TransactionAmount", "29.47");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[1].TransactionTypeCode", "PURCB");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[1].TransactionTypeDescription", "Purchase with Cashback");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[1].TransactionStatusCode", "COMP");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[1].MerchantName", "RXMART");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[1].MerchantCategoryCode", "5678");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[1].MerchantCategoryDescription", "DRUG STORES, PHARMACIES");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[1].POSEntryMode", "91");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[2].CurrencyCode", "USD");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[2].TransactionAmount", "-16.30");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[2].TransactionTypeCode", "REFND");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[2].TransactionTypeDescription", "Refund");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[2].TransactionStatusCode", "COMP");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[2].MerchantName", "AUTOMART");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[2].MerchantCategoryCode", "9012");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[2].MerchantCategoryDescription", "AUTOMOTIVE PARTS, ACCESSORIES STORES");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[2].POSEntryMode", "07");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[3].CurrencyCode", "USD");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[3].TransactionAmount", "41.89");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[3].TransactionTypeCode", "AFD");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[3].TransactionTypeDescription", "Purchase Pre-Auth AFD");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[3].TransactionStatusCode", "PAUTC");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[3].MerchantName", "GASMART");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[3].MerchantCategoryCode", "3456");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[3].MerchantCategoryDescription", "FUEL DISPENSER, AUTOMATED");
            $this->customAssertEqual($ignoreAssert, $response, "TransactionsResponse.Transactions.Transaction[3].POSEntryMode", "90");
            

            self::putResponse("example_mdes_transactions", $response);
            
        }
        
    
    
    
    
    
    
    
}



