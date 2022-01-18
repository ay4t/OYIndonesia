<?php

namespace ay4t\OYIndonesia;
/*
 * File: CreateVA.php
 * Project: src
 * Created Date: Tu Jan 2022
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Tue Jan 18 2022
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2022 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


class CreateVA extends OYIndonesia
{
    /**
     * $partner_user_id
     * Nomor unik dari user yang akan dijadikan acuan sebagai user di dalam pembayaran
     * @var int
     */
    protected $partner_user_id;

    /**
     * $bankCode
     * Kode bank yang akan digunakan untuk melakukan pembayaran
     * @var int
     */
    protected $bankCode = 0;

    /**
     * $amount
     * Jumlah nominal yang akan digunakan untuk melakukan pembayaran
     * @var int
     */
    protected $amount = 0;

    /**
     * $userName
     * username dari member
     * @var string
     */
    protected $userName;

    /**
     * $userEmail
     * Email dari member
     * @var string
     */
    protected $userEmail;

    /**
     * $trxID
     * Merchant transaction id
     * @var string
     */
    protected $trxID;


    /**
     * createVA
     * 
     * Fungsi untuk membuat virtual akun baru dengan kriteria:
     * Virtual akun ini bersifat tertutup artinya user tidak dapat memasukkan nominal, dan mewajibkan mentransfer sesuai nominal tertentu
     * 1 kali penggunaan artinya virtual akun ini ini hanya dapat dilakukan untuk sekali pembayaran
     * Life Time pembayaran artinya tidak digunakan untuk pembayaran selanjutnya virtual account ini digunakan untuk sekali pembayaran
     * batas maksimal waktu yang dibutuhkan untuk membayar adalah 24 jam
     * 
     * @return mixed
     */
    public function send()
    {
        $params = [
            'partner_user_id'   => $this->getPartner_user_id(),
            'bank_code'         => $this->getBankCode(),
            'amount'            => $this->getAmount(),
            'is_open'           => false,
            'is_single_use'     => true,
            'is_lifetime'       => false,
            'expiration_time'       => 1440,
            'trx_expiration_time'   => 1440,
            'username_display'      => ucwords($this->getUserName()),
            'email'                 => $this->getUserEmail(),
            'partner_trx_id'        => $this->getTrxID(),
            'trx_counter'           => 1,
        ];

        $this->setMethod_type('POST');
        $this->setEndpoint('generate-static-va');
        return $this->exec($params);
    }

    /**
     * Get jumlah nominal yang akan digunakan untuk melakukan pembayaran
     *
     * @return  int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set jumlah nominal yang akan digunakan untuk melakukan pembayaran
     *
     * @param  int  $amount  Jumlah nominal yang akan digunakan untuk melakukan pembayaran
     *
     * @return  self
     */
    public function setAmount(int $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get nomor unik dari user yang akan dijadikan acuan sebagai user di dalam pembayaran
     *
     * @return  int
     */
    public function getPartner_user_id()
    {
        return $this->partner_user_id;
    }

    /**
     * Set nomor unik dari user yang akan dijadikan acuan sebagai user di dalam pembayaran
     *
     * @param  int  $partner_user_id  Nomor unik dari user yang akan dijadikan acuan sebagai user di dalam pembayaran
     *
     * @return  self
     */
    public function setPartner_user_id(int $partner_user_id)
    {
        $this->partner_user_id = $partner_user_id;
        return $this;
    }

    /**
     * Get kode bank yang akan digunakan untuk melakukan pembayaran
     *
     * @return  string
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * Set kode bank yang akan digunakan untuk melakukan pembayaran
     *
     * @param  string  $bankCode  Kode bank yang akan digunakan untuk melakukan pembayaran
     *
     * @return  self
     */
    public function setBankCode(string $bankCode)
    {
        $this->bankCode = $bankCode;
        return $this;
    }

    /**
     * Get username dari member
     *
     * @return  string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set username dari member
     *
     * @param  string  $userName  username dari member
     *
     * @return  self
     */
    public function setUserName(string $userName)
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * Get email dari member
     *
     * @return  string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set email dari member
     *
     * @param  string  $userEmail  Email dari member
     *
     * @return  self
     */
    public function setUserEmail(string $userEmail)
    {
        $this->userEmail = $userEmail;
        return $this;
    }

    /**
     * Get merchant transaction id
     *
     * @return  string
     */
    public function getTrxID()
    {
        return $this->trxID;
    }

    /**
     * Set merchant transaction id
     *
     * @param  string  $trxID  Merchant transaction id
     *
     * @return  self
     */
    public function setTrxID(string $trxID)
    {
        $this->trxID = $trxID;
        return $this;
    }
}
