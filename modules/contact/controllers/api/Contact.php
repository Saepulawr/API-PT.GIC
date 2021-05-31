<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Contact extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_contact');
	}

	/**
	 * @api {get} /contact/all Get all contacts.
	 * @apiVersion 0.1.0
	 * @apiName AllContact 
	 * @apiGroup contact
	 * @apiHeader {String} X-Api-Key Contacts unique access-key.
	 * @apiHeader {String} X-Token Contacts unique token.
	 * @apiPermission Contact Cant be Accessed permission name : api_contact_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Contacts.
	 * @apiParam {String} [Field="All Field"] Optional field of Contacts : id, nama, telp, email.
	 * @apiParam {String} [Start=0] Optional start index of Contacts.
	 * @apiParam {String} [Limit=10] Optional limit data of Contacts.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of contact.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataContact Contact data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_contact_all');

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id', 'nama', 'telp', 'email'];
		$contacts = $this->model_api_contact->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_contact->count_all($filter, $field);
		$contacts = array_map(function($row){
						
			return $row;
		}, $contacts);

		$data['contact'] = $contacts;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Contact',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /contact/detail Detail Contact.
	 * @apiVersion 0.1.0
	 * @apiName DetailContact
	 * @apiGroup contact
	 * @apiHeader {String} X-Api-Key Contacts unique access-key.
	 * @apiHeader {String} X-Token Contacts unique token.
	 * @apiPermission Contact Cant be Accessed permission name : api_contact_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Contacts.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of contact.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ContactNotFound Contact data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_contact_detail');

		$this->requiredInput(['id']);

		$id = $this->get('id');

		$select_field = ['id', 'nama', 'telp', 'email'];
		$contact = $this->model_api_contact->find($id, $select_field);

		if (!$contact) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['contact'] = $contact;
		if ($data['contact']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Contact',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Contact not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /contact/add Add Contact.
	 * @apiVersion 0.1.0
	 * @apiName AddContact
	 * @apiGroup contact
	 * @apiHeader {String} X-Api-Key Contacts unique access-key.
	 * @apiHeader {String} X-Token Contacts unique token.
	 * @apiPermission Contact Cant be Accessed permission name : api_contact_add
	 *
 	 * @apiParam {String} Nama Mandatory nama of Contacts.  
	 * @apiParam {String} Telp Mandatory telp of Contacts.  
	 * @apiParam {String} Email Mandatory email of Contacts.  
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function add_post()
	{
		$this->is_allowed('api_contact_add');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telp', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'nama' => $this->input->post('nama'),
				'telp' => $this->input->post('telp'),
				'email' => $this->input->post('email'),
			];
			
			$save_contact = $this->model_api_contact->store($save_data);

			if ($save_contact) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully stored into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	/**
	 * @api {post} /contact/update Update Contact.
	 * @apiVersion 0.1.0
	 * @apiName UpdateContact
	 * @apiGroup contact
	 * @apiHeader {String} X-Api-Key Contacts unique access-key.
	 * @apiHeader {String} X-Token Contacts unique token.
	 * @apiPermission Contact Cant be Accessed permission name : api_contact_update
	 *
	 * @apiParam {String} Nama Mandatory nama of Contacts.  
	 * @apiParam {String} Telp Mandatory telp of Contacts.  
	 * @apiParam {String} Email Mandatory email of Contacts.  
	 * @apiParam {Integer} id Mandatory id of Contact.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function update_post()
	{
		$this->is_allowed('api_contact_update');

		
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telp', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'nama' => $this->input->post('nama'),
				'telp' => $this->input->post('telp'),
				'email' => $this->input->post('email'),
			];
			
			$save_contact = $this->model_api_contact->change($this->post('id'), $save_data);

			if ($save_contact) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully updated into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
	/**
	 * @api {post} /contact/delete Delete Contact. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteContact
	 * @apiGroup contact
	 * @apiHeader {String} X-Api-Key Contacts unique access-key.
	 * @apiHeader {String} X-Token Contacts unique token.
	 	 * @apiPermission Contact Cant be Accessed permission name : api_contact_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Contacts .
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function delete_post()
	{
		$this->is_allowed('api_contact_delete');

		$contact = $this->model_api_contact->find($this->post('id'));

		if (!$contact) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Contact not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_contact->remove($this->post('id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Contact deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Contact not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Contact.php */
/* Location: ./application/controllers/api/Contact.php */