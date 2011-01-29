<?php
/**
* SimpleStub
*
* Copyright (c) 2011, Mario Nunes <mario@pensandoenred.com>.
* All rights reserved.
*
* Redistribution and use in source and binary forms, with or without
* modification, are permitted provided that the following conditions
* are met:
*
* * Redistributions of source code must retain the above copyright
* notice, this list of conditions and the following disclaimer.
*
* * Redistributions in binary form must reproduce the above copyright
* notice, this list of conditions and the following disclaimer in
* the documentation and/or other materials provided with the
* distribution.
*
* Neither the name of Mario Nunes nor the names of his
* contributors may be used to endorse or promote products derived
* from this software without specific prior written permission.
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
* "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
* LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
* FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
* COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
* INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
* BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
* LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
* CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
* LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
* ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
* POSSIBILITY OF SUCH DAMAGE.
*
* @author Mario Nunes <mario@pensandoenred.com>
* @copyright 2011 Mario Nunes <mario@pensandoenred.com>
* @license http://www.opensource.org/licenses/bsd-license.php BSD License
* @link http://www.pensandoenred.com
* @version 0.2 
* 
*/
class SimpleStub {

    private $object;
    private $methods = array();
    private $actual_name = null;
    
    public function __construct($object = null){
        $this->object = $object;
    }

    public function __call($name,$arguments){
        if(array_key_exists($name,$this->methods))
            return $this->methods[$name];
        try{
            return call_user_func_array(array($this->object,$name), $arguments);
        }  catch (Exception $e){
            throw new Exception('method not exist');
        }
    }

    public function method($name){
        $this->methods[$name] = null;
        $this->actual_name = $name;
        return $this;
    }

    public function returnValue($argument){
        $this->methods[$this->actual_name] = $argument;
        $this->actual_name = null;
    }

}

?>
