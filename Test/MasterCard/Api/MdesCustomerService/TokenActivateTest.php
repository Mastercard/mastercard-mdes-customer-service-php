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



class TokenActivateTest extends \PHPUnit_Framework_TestCase {

    protected function setUp() {
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        $privateKey = file_get_contents(getcwd()."/mcapi_sandbox_key.p12");
        ApiConfig::setAuthentication(new OAuthAuthentication("L5BsiPgaF-O3qA36znUATgQXwJB6MRoMSdhjd7wt50c97279!50596e52466e3966546d434b7354584c4975693238513d3d", $privateKey, "alias", "password"));
    }

    
    
                
        public function test_example_mdes_token_activate_token_unique_ref()
        {
            $map = new RequestMap();
            $map->set ("TokenActivateRequest.TokenUniqueReference", "DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c");
            $map->set ("TokenActivateRequest.CommentText", "Confirmed cardholder identity.");
            $map->set ("TokenActivateRequest.ReasonCode", "C");
            $map->set ("TokenActivateRequest.AuditInfo.UserId", "A1435477");
            $map->set ("TokenActivateRequest.AuditInfo.UserName", "John Smith");
            $map->set ("TokenActivateRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("TokenActivateRequest.AuditInfo.Phone", "5555551234");
            
            $response = TokenActivate::create($map);
            $this->customAssertValue("DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c", $response->get("TokenActivateResponse.Token.TokenUniqueReference"));
            $this->customAssertValue("1234", $response->get("TokenActivateResponse.Token.CommentId"));
            
        }
        
        public function test_example_mdes_token_activate_pan_payment_app()
        {
            $map = new RequestMap();
            $map->set ("TokenActivateRequest.AccountPan", "5412345678901234");
            $map->set ("TokenActivateRequest.PaymentAppInstanceId", "645b532a245e4723d7a9c4f62b24f24a24ba98e27d43e34e");
            $map->set ("TokenActivateRequest.CommentText", "Confirmed cardholder identity.");
            $map->set ("TokenActivateRequest.ReasonCode", "A");
            $map->set ("TokenActivateRequest.AuditInfo.UserId", "A14354773");
            $map->set ("TokenActivateRequest.AuditInfo.UserName", "John Smith");
            $map->set ("TokenActivateRequest.AuditInfo.Organization", "Any Bank");
            $map->set ("TokenActivateRequest.AuditInfo.Phone", "5556789876");
            
            $response = TokenActivate::create($map);
            
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



