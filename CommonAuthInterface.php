<?php
//common auth interface
interface CommonAuthInterface
{
    public function __construct($post);
    public function authenticate();
}