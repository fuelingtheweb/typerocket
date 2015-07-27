<?php
namespace TypeRocket\Http;

class Response {

    private $message = 'No Response';
    private $redirect = false;
    private $valid = false;
    private $errors = array();
    private $data = array();


    public function setMessage( $message )
    {
        $this->message = (string) $message;

        return $this;
    }

    public function setRedirect( $url )
    {
        $this->redirect = $url;

        return $this;
    }

    public function setValid( $valid = true )
    {
        $this->valid = (bool) $valid;

        return $this;
    }

    public function setErrors( array $errors )
    {
        $this->errors = $errors;

        return $this;
    }

    public function setError($key, $value) {
        $this->errors[$key] = $value;

        return $this;
    }

    public function removeError($key) {

        if(array_key_exists($key, $this->errors)) {
            unset($this->errors[$key]);
        }

        return $this;

    }

    public function setData( array $data ) {
        $this->data = $data;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getData() {
        return $this->data;
    }

    public function getRedirect() {
        return $this->redirect;
    }

    public function getValid() {
        return $this->valid;
    }

    public function getResponseArray() {
        return get_object_vars($this);
    }

}