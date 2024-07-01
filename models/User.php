<?php

class User {
    public int $id = 0;
    public string $name;
    public string $email;
    public string $password;
    public string $user_document;

    public function __construct($id, $name, $email, $password, $user_document) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->user_document = $user_document;
        $this->validate_user_document();
    }

    private function validate_user_document() {
        $user_document_size = strlen($this->user_document);

        if ($user_document_size !== 14 && $user_document_size !== 11) {
            throw new Exception("UserException: Cannot accept the provided user document. The provided user document size was " . $user_document_size . ", but is required 11 or 14 of length.");
        }
    }

    public function hash_password() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
}