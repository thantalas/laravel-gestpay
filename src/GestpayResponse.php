<?php

/**
 *
 * Biscolab Laravel Gestpay - GestpayResponse Class
 * web : robertobelotti.com, github.com/biscolab
 *
 * @package Biscolab\Gestpay
 * @author author: Roberto Belotti - info@robertobelotti.com
 * @license MIT License @ https://github.com/biscolab/laravel-gestpay/blob/master/LICENSE
 */

namespace Biscolab\Gestpay;

class GestpayResponse {

	/**
	 * The transaction_result
	 * boolean true | false
	 */
	protected $transaction_result	= false;

	/**
	 * The bank_transaction_id
	 * Bank Transaction ID
	 */	
	protected $bank_transaction_id	= '';

	/**
	 * The bank_auth_code
	 * Bank $bank_auth_code
	 *
	 **/	
	protected $bank_auth_code	= '';
	/**
	 * The shop_transaction_id
	 * Transaction ID
	 */	
	protected $shop_transaction_id	= '';

	/**
	 * The error_code
	 * Error code
	 */		
	protected $error_code	= '';

	/**
	 * The error_description
	 * Error description
	 */		
	protected $error_description	= '';
	
	/**
	 * list of properties to return with toArray an toJson methods
	 * @var array
	 */
	protected $_properties = array(
		'transaction_result',
		'shop_transaction_id',
		'bank_transaction_id',
		'bank_auth_code',
		'error_description',
	);

	/**
	 * Create a GestpayResponse Object
	 *
	 * @param $transaction_result boolean The transaction_result
	 * @param $shop_transaction_id string The shop_transaction_id
	 * @param $error_code string The error_code
	 * @param $error_description string The error_description
	 */
	public function __construct($Response) {
		
		$this->transaction_result	= (strtolower($Response->TransactionResult) == 'ok');
		$this->shop_transaction_id	= (string)$Response->ShopTransactionID;
		$this->bank_transaction_id	= (string)$Response->BankTransactionID;
		$this->bank_auth_code	= 	(string)$Response->AuthorizationCode;
		$this->error_code			= (string)$Response->ErrorCode;
		$this->error_description	= (string)$Response->ErrorDescription; 
	}
	
	public function toArray(){
		$data = [];
		foreach($this->_properties as $prop){
			$data[$prop] = $this->{$prop};
		}
		return $data;
	}
	public function toJson(){
		return @json_encode($this->toArray());
	}
	
	/**
	 * Get the transaction result
	 *
	 * @return $transaction_result boolean The transaction_result
	 */
	public function getTransactionResult() {
		return $this->transaction_result;
	}

	/**
	 * Get the client transaction id
	 *
	 * @return $shop_transaction_id string The shop_transaction_id
	 */
	public function getShopTransactionId() {
		return $this->shop_transaction_id;
	}
	/**
	 * Get the bank transaction id
	 *
	 * @return $bank_transaction_id string The bank_transaction_id
	 */
	public function getBankTransactionId() {
		return $this->bank_transaction_id;
	}
	/**
	 * Get the bank auth code
	 *
	 * @return $bank_auth_code string The bank auth code
	 */
	public function getBankAuthCode() {
		return $this->bank_auth_code;
	}

	/**
	 * Get the error code
	 *
	 * @return $error_code boolean The error_code
	 */
	public function getErrorCode() {
		return $this->error_code;
	}

	/**
	 * Get the error description
	 *
	 * @return $error_description boolean The error_description
	 */
	public function getErrorDescription() {
		return $this->error_description;
	}	


}