<?php

require './User.php';

class UserBuilder {

  private $firstName = 'firstnamename';

  private $lastName = 'lastnamename';

  private $email = 'email';

  public function buildUser ($get, $post) {
    $source = $this->determineSource($get, $post);

    if (!$source) {
      return null;
    } else if (array_key_exists('lastnamename', $source)) {

      return new User($source['email'], $source['firstnamename'], $source['lastnamename']);
    } else {
 
      return new User($source['email'], $source['firstnamename']);
    }
  }
  private function determineSource ($get, $post) {
    if ($this->hasRequiredParameters($get))
      return $get;
    else if ($this->hasRequiredParameters($post))
      return $post;
    else
      return null;
  }



