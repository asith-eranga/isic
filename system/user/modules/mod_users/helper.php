<?php

class Mod_Users extends Default_DBConnection implements Default_DBInterface {

      private $id;
      private $type;
      private $firstname;
      private $lastname;
      private $user_permission;
      private $username;
      private $password;
      private $email;
      private $last_login;
      private $table_name = "users";

      function id() {
            return $this->id;
      }

      function type() {
            return $this->type;
      }

      function firstname() {
            return $this->firstname;
      }

      function lastname() {
            return $this->lastname;
      }

      function userPermission() {
            return $this->user_permission;
      }

      function username() {
            return $this->username;
      }

      function password() {
            return $this->password;
      }

      function email() {
            return $this->email;
      }

      function lastLogin() {
            return $this->last_login;
      }

      //------------------------//  



      function setId($id) {
            $this->id = $id;
      }

      function setType($type) {
            $this->type = $type;
      }

      function setFirstname($firstname) {
            $this->firstname = $firstname;
      }

      function setLastname($lastname) {
            $this->lastname = $lastname;
      }

      function setUserPermission($user_permission) {
            $this->user_permission = $user_permission;
      }

      function setUsername($username) {
            $this->username = $username;
      }

      function setPassword($password) {
            $this->password = $password;
      }

      function setEmail($email) {
            $this->email = $email;
      }

      function setLastLogin($last_login) {
            $this->last_login = $last_login;
      }

      function extractor($results, $row = 0) {

            $this->setId($results[$row]['id']);
            $this->setType($results[$row]['type']);
            $this->setFirstname($results[$row]['firstname']);
            $this->setLastname($results[$row]['lastname']);
            $this->setUserPermission($results[$row]['user_permission']);
            $this->setUsername($results[$row]['username']);
            $this->setPassword($results[$row]['password']);
            $this->setEmail($results[$row]['email']);
            $this->setLastLogin($results[$row]['last_login']);
      }

      function selectAll() {

            $this->MDatabase->select($this->table_name, "*", "", "id DESC");
            return $this->MDatabase->result;
      }

      function selectAllPaginated($page) {

            $this->MDatabase->select($this->table_name, "*", "", "id DESC", $page);
            return $this->MDatabase->result;
      }

      function selectAllCount() {

            $this->MDatabase->select($this->table_name, "COUNT(*) as count", "", "");
            return $this->MDatabase->result[0]["count"];
      }

      function getById() {

            $this->MDatabase->select($this->table_name, "*", "id='" . $this->id() . "'", "id DESC");
            return $this->MDatabase->result;
      }

      function search() {
            
      }

      function searchPaginated($search_text, $page) {
            $search_txt = Default_Common::textToSQLLikeString($search_text);
            $this->MDatabase->select($this->table_name, "*", "username $search_txt OR email $search_txt  OR firstname $search_txt OR lastname $search_txt", 'firstname ASC', $page);
            return $this->MDatabase->result;
      }

      function searchCount($search_text) {
            $search_txt = Default_Common::textToSQLLikeString($search_text);
            $this->MDatabase->select($this->table_name, "COUNT(*) as count", "username $search_txt OR email $search_txt OR firstname $search_txt OR lastname $search_txt", 'firstname ASC');
            return $this->MDatabase->result[0]["count"];
      }

      function insert() {

            $status = $this->MDatabase->insert($this->table_name, array(
                "type" => 0,
                "firstname" => $this->firstname(),
                "lastname" => $this->lastname(),
                "user_permission" => $this->userPermission(),
                "username" => $this->username(),
                "password" => md5($this->password()),
                "email" => $this->email()
            ));

            return $status;
      }

      function update() {

            if ($this->password() != "") {

                  $status = $this->MDatabase->update($this->table_name, array(
                      "type" => 0,
                      "firstname" => $this->firstname(),
                      "lastname" => $this->lastname(),
                      "user_permission" => $this->userPermission(),
                      "username" => $this->username(),
                      "password" => md5($this->password()),
                      "email" => $this->email()
                          ), array("id" => $this->id()));
            } else {

                  $status = $this->MDatabase->update($this->table_name, array(
                      "type" => 0,
                      "firstname" => $this->firstname(),
                      "lastname" => $this->lastname(),
                      "user_permission" => $this->userPermission(),
                      "username" => $this->username(),
                      "email" => $this->email()
                          ), array("id" => $this->id()));
            }

            return $status;
      }

      function updateLastLogin() {

            $status = $this->MDatabase->update($this->table_name, array(
                "last_login" => $this->lastLogin()
                    ), array("id" => $this->id()));

            return $status;
      }

      function delete() {

            $status = $this->MDatabase->delete($this->table_name, "id='" . $this->id() . "'");
            return $status;
      }

      function setValues($data) {

            foreach ($data as $k => $v) {
                  $this->$k = $v;
            }
      }

      function createTable() {

            $sql = '
					CREATE TABLE IF NOT EXISTS `users` (
					`id` INT(11) NOT NULL AUTO_INCREMENT,
					`type` INT(11) NULL DEFAULT NULL,
					`firstname` VARCHAR(100) NULL DEFAULT NULL,
					`lastname` VARCHAR(100) NULL DEFAULT NULL,
					`user_permission` VARCHAR(100) NULL DEFAULT NULL,
					`username` VARCHAR(100) NULL DEFAULT NULL,
					`password` VARCHAR(50) NULL DEFAULT NULL,
					`email` VARCHAR(100) NULL DEFAULT NULL,
					`last_login` INT(11) NULL DEFAULT NULL,
					
					PRIMARY KEY (`id`)
				  )
				  AUTO_INCREMENT=1;';

            $status = $this->MDatabase->customNoResults($sql);
      }

      function selectByUsername() {
            $this->MDatabase->select($this->table_name, "*", "username='" . $this->username() . "'", "id DESC");
            return $this->MDatabase->result;
      }

      function getFullName() {
            return $this->firstname() . " " . $this->lastname();
      }

      function getAllUsersEmails() {

            $users_data = $this->selectAll();

            $email_settings = new EmailSettings();
            $email_settings->extractor($email_settings->selectAll());
            $user_group = explode(',', $email_settings->userGroup());

            for ($i = 0; $i < count($users_data); $i++) {
                  $this->extractor($users_data, $i);
                  if (in_array($this->userPermission(), $user_group)) {
                        $emails[] = $this->email();
                  }
            }
            return $emails;
      }

}

?>