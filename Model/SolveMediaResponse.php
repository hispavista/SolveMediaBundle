<?php

namespace Hispavista\SolveMediaBundle\Model;

/**
 * Description of SolveMediaResponse
 *
 * @author rubenma
 */
class SolveMediaResponse {
    private $is_valid;
    private $error;
    
    function getIs_valid() {
        return $this->is_valid;
    }

    function getError() {
        return $this->error;
    }

    function setIs_valid($is_valid) {
        $this->is_valid = $is_valid;
    }

    function setError($error) {
        $this->error = $error;
    }

}
