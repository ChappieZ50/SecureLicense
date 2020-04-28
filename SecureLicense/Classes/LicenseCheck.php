<?php

namespace SecureLicense\Classes;

use PDO;

class LicenseCheck
{
    protected $db;

    public function __construct()
    {
        global $sldb;
        $this->db = $sldb;
    }

    public function license_check($domain, $ip, $date)
    {
        if (isset($domain[0]) && isset($domain[1])) {
            $safe_domain = $domain[0] . "." . $domain[1];
            $safe_domain = isset($domain[2]) ? $safe_domain . '.' . $domain[2] : $safe_domain;
            $query = $this->db->prepare("SELECT * FROM sl_licenses WHERE sl_domain = :sl_domain");
            $query->execute(array(
                "sl_domain" => $safe_domain
            ));
            if ($query->rowCount()) {
                $data = $query->fetch(PDO::FETCH_ASSOC);

                return array("status" => true, "license_activity" => $data["sl_activity"] == 1 ? true : false);
            } else {
                $this->no_license($safe_domain, $ip, $date);

                return array("status" => false);
            }
        } else {
            return array("status" => false);
        }
    }

    public function no_license($domain, $ip, $date)
    {

        $check_domain = $this->db->prepare("SELECT id,sl_domain,sl_count FROM sl_notice WHERE sl_domain =:domain ");
        $check_domain->execute(array("domain" => $domain));
        if ($check_domain->rowCount()) {
            $data_domain = $check_domain->fetch(PDO::FETCH_ASSOC);
            $id = $data_domain["id"];
            $count = $data_domain["sl_count"];
            $update_count = $this->db->prepare("UPDATE sl_notice SET sl_count = :count WHERE id = :id");
            $update_count->execute(array(
                "id"    => $id,
                "count" => $count + 1
            ));
        } else {
            $query = $this->db->prepare("INSERT INTO sl_notice SET sl_domain = :domain ,sl_ip=:ip,sl_date=:date,sl_count=:count");
            $query->execute(array(
                "domain" => $domain,
                "ip"     => $ip,
                "date"   => $date,
                "count"  => 1
            ));
        }
    }
}