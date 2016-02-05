<?php

/**
 * Created by PhpStorm.
 * User: amtisb2
 * Date: 5/2/2016
 * Time: 11:53 AM
 */

use Entities\Product;
use Entities\Comment;

class Products extends CI_Controller
{
    public $em;

    public function __construct(){
        parent::__construct();

        $this->em = $this->doctrine->em;
    }


    public function show(){
        $input['products'] = $this->em->getRepository('Entities\Product')->findAll();
        $input['title'] = 'List of Product';

        $data['content'] = $this->load->view('product/product-list', $input, true);
        $this->load->view('main', $data);

    }

    public function insert(){

        $isClicked = $this->input->post('insertProduct');

        if($isClicked == "insert"){
            $productName = $this->input->post('productName');
            $product = new Product();
            $product->setName($productName);

            $this->em->persist($product);
            $this->em->flush();

            redirect('products/show', 'refresh');
        }

        $data['content'] = $this->load->view('product/insert',NULL,true);
        $this->load->view('main', $data);

    }



}