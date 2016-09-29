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



class TokenCommentsTest extends BaseTest {

    public static $responses = array();

    protected function setUp() {
        parent::setUp();
        //ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        BaseTest::resetAuthentication();
    }

    
    
                
        public function test_example_mdes_token_comments()
        {
            

            

            $map = new RequestMap();
            $map->set("TokenCommentsRequest.TokenUniqueReference", "DWSPMC00000000010906a349d9ca4eb1a4d53e3c90a11d9c");
            $map->set("TokenCommentsRequest.AuditInfo.UserId", "A1435477");
            $map->set("TokenCommentsRequest.AuditInfo.UserName", "John Smith");
            $map->set("TokenCommentsRequest.AuditInfo.Organization", "Any Bank");
            $map->set("TokenCommentsRequest.AuditInfo.Phone", "5555551234");
            
            
            $response = TokenComments::create($map);

            $ignoreAssert = array();
            
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[0].CommentId", "1648");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[0].CommentText", "Cardholder lost phone. Suspending device.");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[0].CommentDateTime", "2015-01-21T18:04:35-06:00");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[0].AuditInfo.UserId", "A14354774");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[0].AuditInfo.UserName", "Jade Mark");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[0].AuditInfo.Organization", "Any Bank");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[0].AuditInfo.Phone", "5555558888");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[1].CommentId", "1647");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[1].CommentText", "Cardholder called to activate their digital card.");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[1].CommentDateTime", "2015-01-19T11:02:25-06:00");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[1].AuditInfo.UserId", "A14354773");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[1].AuditInfo.UserName", "Tom Smith");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[1].AuditInfo.Organization", "Any Bank");
            $this->customAssertEqual($ignoreAssert, $response, "TokenCommentsResponse.Comments.Comment[1].AuditInfo.Phone", "5555559999");
            

            self::putResponse("example_mdes_token_comments", $response);
            
        }
        
    
    
    
    
    
    
    
}



