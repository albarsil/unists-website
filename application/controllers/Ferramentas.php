<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ferramentas extends CI_Controller {

	public function index()
	{
		$d['v'] = 'home';
		$this->load->view('template', $d);
	}

	public function getTargets()
	{
		$d['v'] = 'getTargets';
		$this->load->view('template', $d);
	}

	public function Ner()
	{
		$d['v'] = 'Ner';
		$this->load->view('template', $d);
	}	

	public function semanRel()
	{
		$d['v'] = 'semanRel';
		$this->load->view('template', $d);
	}


	public function search_getTargets()
	{
		
		$search_word = $this->input->post('from_word');
		$search_rel = $this->input->post('rel_word');;

		$postData = array(
	    'from' => $search_word,
	    'relation' => $search_rel,
	    'target' => ''
	    );

	    $ch = curl_init('http://localhost:8080/nlp/wordnet/pt/GetTargets');
	    curl_setopt_array($ch, array(
	        CURLOPT_POST => TRUE,
	        CURLOPT_RETURNTRANSFER => TRUE,
	        CURLOPT_HTTPHEADER => array(
	            //'Authorization: '.$authToken,
	            'Content-Type: application/json'
	        ),
	        CURLOPT_POSTFIELDS => json_encode($postData)
	    ));

	    // Send the request
	    $response = curl_exec($ch);

	    //btn json controller
	    $this->output->set_content_type('application/json')
             ->set_output(json_encode($response));
	}

	public function search_getRelationTargets()
	{
		
		$search_word = $this->input->post('from_word');
		$search_rel = $this->input->post('rel_word');;

		$postData = array(
	    'from' => $search_word,
	    'relation' => '',
	    'target' => ''
	    );

	    $ch = curl_init('http://localhost:8080/nlp/wordnet/pt/GetRelationAndTargets');
	    curl_setopt_array($ch, array(
	        CURLOPT_POST => TRUE,
	        CURLOPT_RETURNTRANSFER => TRUE,
	        CURLOPT_HTTPHEADER => array(
	            //'Authorization: '.$authToken,
	            'Content-Type: application/json'
	        ),
	        CURLOPT_POSTFIELDS => json_encode($postData)
	    ));

	    // Send the request
	    $response = curl_exec($ch);

	    //btn json controller
	    $this->output->set_content_type('application/json')
             ->set_output(json_encode($response));
	}

	public function search_getLexicalSimilarity()
	{
		$from_period = $this->input->post('from_period');
		$to_period = $this->input->post('to_period');

		$postData = array(
	    'fromPeriod' => $from_period,
	    'toPeriod' => $to_period
	    );

	    $ch = curl_init('http://localhost:8080/nlp/wordnet/pt/GetLexicalSimilarity');
	    curl_setopt_array($ch, array(
	        CURLOPT_POST => TRUE,
	        CURLOPT_RETURNTRANSFER => TRUE,
	        CURLOPT_HTTPHEADER => array(
	            //'Authorization: '.$authToken,
	            'Content-Type: application/json'
	        ),
	        CURLOPT_POSTFIELDS => json_encode($postData)
	    ));

	    // Send the request
	    $response = curl_exec($ch);

	    //btn json controller
	    $this->output->set_content_type('application/json')
             ->set_output(json_encode($response));
	}

	public function search_ner()
	{
		
		$search_word = $this->input->post('from_word');

		$postData = $search_word;

	    $ch = curl_init('http://localhost:8080/nlp/apache/ner');
	    curl_setopt_array($ch, array(
	        CURLOPT_POST => TRUE,
	        CURLOPT_RETURNTRANSFER => TRUE,
	        CURLOPT_HTTPHEADER => array(
	            //'Authorization: '.$authToken,
	            'Content-Type: application/json'
	        ),
	        CURLOPT_POSTFIELDS => json_encode($postData)
	    ));

	    // Send the request
	    $response = curl_exec($ch);

	    //btn json controller
	    $this->output->set_content_type('application/json')
             ->set_output(json_encode($response));

	}
}
