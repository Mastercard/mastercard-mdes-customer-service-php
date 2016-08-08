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



class TokenUpdateTest extends \PHPUnit_Framework_TestCase {

    protected function setUp() {
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        $privateKey = file_get_contents(getcwd()."/mcapi_sandbox_key.p12");
        ApiConfig::setAuthentication(new OAuthAuthentication("L5BsiPgaF-O3qA36znUATgQXwJB6MRoMSdhjd7wt50c97279!50596e52466e3966546d434b7354584c4975693238513d3d", $privateKey, "alias", "password"));
    }

    
    
                
        public function test_example_mdes_token_update_pan_exp_token_unique_ref()
        {
            $map = new RequestMap();
            $map->set ("TokenUpdateRequest.TokenUniqueReference", "DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c");
            $map->set ("TokenUpdateRequest.NewAccountPan", "5412345678908888");
            $map->set ("TokenUpdateRequest.ExpirationDate", "0519");
            $map->set ("TokenUpdateRequest.AccountPanSequenceNumber", "1");
            $map->set ("TokenUpdateRequest.UpdateWalletProviderIndicator", "1");
            $map->set ("TokenUpdateRequest.CommentText", "Confirmed cardholder identity.");
            $map->set ("TokenUpdateRequest.AuditInfo.UserId", "A1435477");
            $map->set ("TokenUpdateRequest.AuditInfo.UserName", "John Smith");
            $map->set ("TokenUpdateRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("TokenUpdateRequest.AuditInfo.Phone", "5555551234");
            
            $response = TokenUpdate::create($map);
            $this->customAssertValue("DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c", $response->get("TokenUpdateResponse.Tokens.Token.TokenUniqueReference"));
            $this->customAssertValue("2345", $response->get("TokenUpdateResponse.Tokens.Token.CommentId"));
            
        }
        
        public function test_example_mdes_token_update_pan_exp_current_pan()
        {
            $map = new RequestMap();
            $map->set ("TokenUpdateRequest.CurrentAccountPan", "1234567890123456");
            $map->set ("TokenUpdateRequest.NewAccountPan", "5412345678908888");
            $map->set ("TokenUpdateRequest.ExpirationDate", "1219");
            $map->set ("TokenUpdateRequest.AccountPanSequenceNumber", "1");
            $map->set ("TokenUpdateRequest.CommentText", "Cardholder has a new Account Pan.");
            $map->set ("TokenUpdateRequest.AuditInfo.UserId", "A1435477");
            $map->set ("TokenUpdateRequest.AuditInfo.UserName", "John Smith");
            $map->set ("TokenUpdateRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("TokenUpdateRequest.AuditInfo.Phone", "555 1234");
            
            $response = TokenUpdate::create($map);
            
        }
        
        public function test_example_mdes_token_update_issuer_prod_config_single_token_by_token_unique_ref()
        {
            $map = new RequestMap();
            $map->set ("TokenUpdateRequest.TokenUniqueReference", "DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c");
            $map->set ("TokenUpdateRequest.IssuerProductConfigurationId", "ANYGOLD101");
            $map->set ("TokenUpdateRequest.CommentText", "Update gold artwork");
            $map->set ("TokenUpdateRequest.AuditInfo.UserId", "A1435477");
            $map->set ("TokenUpdateRequest.AuditInfo.UserName", "John Smith");
            $map->set ("TokenUpdateRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("TokenUpdateRequest.AuditInfo.Phone", "555 1234");
            
            $response = TokenUpdate::create($map);
            
        }
        
        public function test_example_mdes_token_update_issuer_prod_config_token_by_pan()
        {
            $map = new RequestMap();
            $map->set ("TokenUpdateRequest.CurrentAccountPan", "1234567890123456");
            $map->set ("TokenUpdateRequest.IssuerProductConfigurationId", "ANYGOLD101");
            $map->set ("TokenUpdateRequest.CommentText", "Update gold artwork");
            $map->set ("TokenUpdateRequest.AuditInfo.UserId", "A1435477");
            $map->set ("TokenUpdateRequest.AuditInfo.UserName", "John Smith");
            $map->set ("TokenUpdateRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("TokenUpdateRequest.AuditInfo.Phone", "555 1234");
            
            $response = TokenUpdate::create($map);
            
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



