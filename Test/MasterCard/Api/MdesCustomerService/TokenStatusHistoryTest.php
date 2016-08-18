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



class TokenStatusHistoryTest extends BaseTest {

    public static $responses = array();

    protected function setUp() {
        parent::setUp();
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        $privateKey = file_get_contents(getcwd()."/mcapi_sandbox_key.p12");
        ApiConfig::setAuthentication(new OAuthAuthentication("L5BsiPgaF-O3qA36znUATgQXwJB6MRoMSdhjd7wt50c97279!50596e52466e3966546d434b7354584c4975693238513d3d", $privateKey, "alias", "password"));
    }

    
    
                
        public function test_example_mdes_token_status_history()
        {
            $map = new RequestMap();
            $map->set("TokenStatusHistoryRequest.TokenUniqueReference", "DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c");
            $map->set("TokenStatusHistoryRequest.AuditInfo.UserId", "A1435477");
            $map->set("TokenStatusHistoryRequest.AuditInfo.UserName", "John Smith");
            $map->set("TokenStatusHistoryRequest.AuditInfo.Organization", "Any Bank");
            $map->set("TokenStatusHistoryRequest.AuditInfo.Phone", "5555551234");
            

            

            $response = TokenStatusHistory::create($map);
            $this->customAssertValue("D", $response->get("TokenStatusHistoryResponse.Statuses.Status[0].StatusCode"));
            $this->customAssertValue("Deleted", $response->get("TokenStatusHistoryResponse.Statuses.Status[0].StatusDescription"));
            $this->customAssertValue("2014-12-16T13:04:35-06:00", $response->get("TokenStatusHistoryResponse.Statuses.Status[0].StatusDateTime"));
            $this->customAssertValue("C", $response->get("TokenStatusHistoryResponse.Statuses.Status[0].Initiator"));
            $this->customAssertValue("L", $response->get("TokenStatusHistoryResponse.Statuses.Status[0].ReasonCode"));
            $this->customAssertValue("A", $response->get("TokenStatusHistoryResponse.Statuses.Status[1].StatusCode"));
            $this->customAssertValue("Active", $response->get("TokenStatusHistoryResponse.Statuses.Status[1].StatusDescription"));
            $this->customAssertValue("2014-12-15T11:05:35-06:00", $response->get("TokenStatusHistoryResponse.Statuses.Status[1].StatusDateTime"));
            $this->customAssertValue("I", $response->get("TokenStatusHistoryResponse.Statuses.Status[1].Initiator"));
            $this->customAssertValue("A", $response->get("TokenStatusHistoryResponse.Statuses.Status[1].ReasonCode"));
            $this->customAssertValue("AI145530", $response->get("TokenStatusHistoryResponse.Statuses.Status[1].AuditInfo.UserId"));
            $this->customAssertValue("John Smith", $response->get("TokenStatusHistoryResponse.Statuses.Status[1].AuditInfo.UserName"));
            $this->customAssertValue("Any Bank", $response->get("TokenStatusHistoryResponse.Statuses.Status[1].AuditInfo.Organization"));
            $this->customAssertValue("6362205555", $response->get("TokenStatusHistoryResponse.Statuses.Status[1].AuditInfo.Phone"));
            $this->customAssertValue("S", $response->get("TokenStatusHistoryResponse.Statuses.Status[2].StatusCode"));
            $this->customAssertValue("Suspended", $response->get("TokenStatusHistoryResponse.Statuses.Status[2].StatusDescription"));
            $this->customAssertValue("2014-12-14T12:04:35-06:00", $response->get("TokenStatusHistoryResponse.Statuses.Status[2].StatusDateTime"));
            $this->customAssertValue("I", $response->get("TokenStatusHistoryResponse.Statuses.Status[2].Initiator"));
            $this->customAssertValue("L", $response->get("TokenStatusHistoryResponse.Statuses.Status[2].ReasonCode"));
            $this->customAssertValue("AI145530", $response->get("TokenStatusHistoryResponse.Statuses.Status[2].AuditInfo.UserId"));
            $this->customAssertValue("John Smith", $response->get("TokenStatusHistoryResponse.Statuses.Status[2].AuditInfo.UserName"));
            $this->customAssertValue("Any Bank", $response->get("TokenStatusHistoryResponse.Statuses.Status[2].AuditInfo.Organization"));
            $this->customAssertValue("6362205555", $response->get("TokenStatusHistoryResponse.Statuses.Status[2].AuditInfo.Phone"));
            $this->customAssertValue("A", $response->get("TokenStatusHistoryResponse.Statuses.Status[3].StatusCode"));
            $this->customAssertValue("Active", $response->get("TokenStatusHistoryResponse.Statuses.Status[3].StatusDescription"));
            $this->customAssertValue("2014-12-13T11:05:35-06:00", $response->get("TokenStatusHistoryResponse.Statuses.Status[3].StatusDateTime"));
            $this->customAssertValue("I", $response->get("TokenStatusHistoryResponse.Statuses.Status[3].Initiator"));
            $this->customAssertValue("A", $response->get("TokenStatusHistoryResponse.Statuses.Status[3].ReasonCode"));
            $this->customAssertValue("AI145530", $response->get("TokenStatusHistoryResponse.Statuses.Status[3].AuditInfo.UserId"));
            $this->customAssertValue("John Smith", $response->get("TokenStatusHistoryResponse.Statuses.Status[3].AuditInfo.UserName"));
            $this->customAssertValue("Any Bank", $response->get("TokenStatusHistoryResponse.Statuses.Status[3].AuditInfo.Organization"));
            $this->customAssertValue("6362205555", $response->get("TokenStatusHistoryResponse.Statuses.Status[3].AuditInfo.Phone"));
            $this->customAssertValue("U", $response->get("TokenStatusHistoryResponse.Statuses.Status[4].StatusCode"));
            $this->customAssertValue("Unmapped", $response->get("TokenStatusHistoryResponse.Statuses.Status[4].StatusDescription"));
            $this->customAssertValue("2014-12-12T10:04:35-06:00", $response->get("TokenStatusHistoryResponse.Statuses.Status[4].StatusDateTime"));
            $this->customAssertValue("Z", $response->get("TokenStatusHistoryResponse.Statuses.Status[4].ReasonCode"));
            

            self::putResponse("example_mdes_token_status_history", $response);
        }
        
    
    
    
    
    
    
    
}



