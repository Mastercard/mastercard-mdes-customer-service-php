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



class SearchTest extends \PHPUnit_Framework_TestCase {

    protected function setUp() {
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        $privateKey = file_get_contents(getcwd()."/mcapi_sandbox_key.p12");
        ApiConfig::setAuthentication(new OAuthAuthentication("L5BsiPgaF-O3qA36znUATgQXwJB6MRoMSdhjd7wt50c97279!50596e52466e3966546d434b7354584c4975693238513d3d", $privateKey, "alias", "password"));
    }

    
    
                
        public function test_example_mdes_search_token_unique_ref()
        {
            $map = new RequestMap();
            $map->set ("SearchRequest.TokenUniqueReference", "DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c");
            $map->set ("SearchRequest.AuditInfo.UserId", "A1435477");
            $map->set ("SearchRequest.AuditInfo.UserName", "John Smith");
            $map->set ("SearchRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("SearchRequest.AuditInfo.Phone", "5555551234");
            
            $response = Search::create($map);
            $this->customAssertValue("1234", $response->get("SearchResponse.Accounts.Account.AccountPanSuffix"));
            $this->customAssertValue("1215", $response->get("SearchResponse.Accounts.Account.ExpirationDate"));
            $this->customAssertValue("DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c", $response->get("SearchResponse.Accounts.Account.Tokens.Token.TokenUniqueReference"));
            $this->customAssertValue("FWSPMC0000000004793dac803f190a4dca4bad33c90a11d31", $response->get("SearchResponse.Accounts.Account.Tokens.Token.PrimaryAccountNumberUniqueReference"));
            $this->customAssertValue("7639", $response->get("SearchResponse.Accounts.Account.Tokens.Token.TokenSuffix"));
            $this->customAssertValue("0216", $response->get("SearchResponse.Accounts.Account.Tokens.Token.ExpirationDate"));
            $this->customAssertValue("2015-01-20T18:04:35-06:00", $response->get("SearchResponse.Accounts.Account.Tokens.Token.DigitizationRequestDateTime"));
            $this->customAssertValue("2015-01-20T18:04:35-06:00", $response->get("SearchResponse.Accounts.Account.Tokens.Token.TokenActivatedDateTime"));
            $this->customAssertValue("A", $response->get("SearchResponse.Accounts.Account.Tokens.Token.FinalTokenizationDecision"));
            $this->customAssertValue("101234", $response->get("SearchResponse.Accounts.Account.Tokens.Token.CorrelationId"));
            $this->customAssertValue("A", $response->get("SearchResponse.Accounts.Account.Tokens.Token.CurrentStatusCode"));
            $this->customAssertValue("Active", $response->get("SearchResponse.Accounts.Account.Tokens.Token.CurrentStatusDescription"));
            $this->customAssertValue("S", $response->get("SearchResponse.Accounts.Account.Tokens.Token.ProvisioningStatusCode"));
            $this->customAssertValue("Provisioning successful", $response->get("SearchResponse.Accounts.Account.Tokens.Token.ProvisioningStatusDescription"));
            $this->customAssertValue("00212345678", $response->get("SearchResponse.Accounts.Account.Tokens.Token.TokenRequestorId"));
            $this->customAssertValue("103", $response->get("SearchResponse.Accounts.Account.Tokens.Token.WalletId"));
            $this->customAssertValue("92de9357a535b2c21a3566e446f43c532a46b54c46", $response->get("SearchResponse.Accounts.Account.Tokens.Token.PaymentAppInstanceId"));
            $this->customAssertValue("S", $response->get("SearchResponse.Accounts.Account.Tokens.Token.TokenType"));
            $this->customAssertValue("2376", $response->get("SearchResponse.Accounts.Account.Tokens.Token.LastCommentId"));
            $this->customAssertValue("3e5edf24a24ba98e27d43e345b532a245e4723d7a9c4f624e93452c92de9357a535b2c21a3566e446f43c532d34s6", $response->get("SearchResponse.Accounts.Account.Tokens.Token.Device.DeviceId"));
            $this->customAssertValue("John Phone", $response->get("SearchResponse.Accounts.Account.Tokens.Token.Device.DeviceName"));
            $this->customAssertValue("09", $response->get("SearchResponse.Accounts.Account.Tokens.Token.Device.DeviceType"));
            $this->customAssertValue("92de9357a535b2c21a3566e446f43c532a46b54c46", $response->get("SearchResponse.Accounts.Account.Tokens.Token.Device.SecureElementId"));
            
        }
        
        public function test_example_mdes_search_account_pan()
        {
            $map = new RequestMap();
            $map->set ("SearchRequest.AccountPan", "5412345678901234");
            $map->set ("SearchRequest.ExcludeDeletedIndicator", "false");
            $map->set ("SearchRequest.AuditInfo.UserId", "A1435477");
            $map->set ("SearchRequest.AuditInfo.UserName", "John Smith");
            $map->set ("SearchRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("SearchRequest.AuditInfo.Phone", "5555551234");
            
            $response = Search::create($map);
            
        }
        
        public function test_example_mdes_search_token()
        {
            $map = new RequestMap();
            $map->set ("SearchRequest.Token", "5598765432109876");
            $map->set ("SearchRequest.AuditInfo.UserId", "A14354773");
            $map->set ("SearchRequest.AuditInfo.UserName", "John Smith");
            $map->set ("SearchRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("SearchRequest.AuditInfo.Phone", "5551234658");
            
            $response = Search::create($map);
            
        }
        
        public function test_example_mdes_search_comment_id()
        {
            $map = new RequestMap();
            $map->set ("SearchRequest.CommentId", "123456");
            $map->set ("SearchRequest.AuditInfo.UserId", "A1435477");
            $map->set ("SearchRequest.AuditInfo.UserName", "John Smith");
            $map->set ("SearchRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("SearchRequest.AuditInfo.PhoneNumber", "5555551234");
            
            $response = Search::create($map);
            
        }
        
        public function test_example_mdes_search_payment_app_id()
        {
            $map = new RequestMap();
            $map->set ("SearchRequest.PaymentAppInstanceId", "645b532a245e4723d7a9c4f62b24f24a24ba98e27d43e34e");
            $map->set ("SearchRequest.AuditInfo.UserId", "A14354773");
            $map->set ("SearchRequest.AuditInfo.UserName", "John Smith");
            $map->set ("SearchRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("SearchRequest.AuditInfo.Phone", "5551234658");
            
            $response = Search::create($map);
            
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



