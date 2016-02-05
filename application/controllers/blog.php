<?php

use Entities\Post;
use Entities\Comment;
/**
 * Created by PhpStorm.
 * User: amtisb2
 * Date: 5/2/2016
 * Time: 2:29 PM
 */
class Blog extends CI_Controller
{

    public $em;

    public function __construct(){
        parent::__construct();

        $this->em = $this->doctrine->em;
    }


    public function index(){
        $content['title'] = 'My Blog';
        $content['posts'] = $this->em->getRepository('Entities\Post')->findAll();
        $data['content'] = $this->load->view('blog/post', $content, TRUE);

        $this->load->view('main', $data);
    }

    public function insert(){
        $insert = $this->input->post('insert');

        if($insert == 'insert'){
            $title = $this->input->post('post-title');
            $body = $this->input->post('post-body');

            $post = new Post();
            $post->setTitle($title);
            $post->setBody($body);
            $post->setPublicationDate(new \DateTime());

            $this->em->persist($post);
            $this->em->flush();

            redirect('blog', 'refresh');

        }

        $content['title'] = "Create a new post";
        $data['content'] = $this->load->view('blog/insert', $content, true);
        $this->load->view('main', $data);
    }

    public function edit(){
        $id = $this->uri->segment(3);

        $post = $this->em->getRepository('Entities\Post')->find($id);

        if($post === null){
            throw new \Exception('Post not found');
        }

        $submit = $this->input->post('update');

        if($submit == "update"){
            $title = $this->input->post('post-title');
            $body = $this->input->post('post-body');

            $post->setTitle($title);
            $post->setBody($body);
            $post->setPublicationDate(new \DateTime());

            $this->em->flush();

            redirect('blog/edit/' . $post->getId(), 'refresh');
        }

        $data['content'] = $this->load->view('blog/edit',
            array('title' => 'Edit Post', 'post' => $post), true);

        $this->load->view('main', $data);

    }

    public function delete(){
        $id = $this->uri->segment(3);

        $post = $this->em->getRepository('Entities\Post')->find($id);

        if($post === null){
            throw new \Exception("Post not found");
        }

        $this->em->remove($post);
        $this->em->flush();

        redirect('blog', 'refresh');
    }

    public function comments(){
        $id = $this->uri->segment(3);

        $post = $this->em->getRepository('Entities\Post')->find($id);

        if($post === NULL){
            throw new \Exception("Post not found!");
        }


        $add = $this->input->post('comment');

        if($add == 'comment'){
            $body = $this->input->post('post-comment');
            $comment = new Comment();

            $comment->setBody($body);
            $comment->setPublicationDate(new \DateTime());
            $comment->setPost($post);

            $this->em->persist($comment);
            $this->em->flush();

            redirect('blog/comments/' . $post->getId(), 'refresh');
        }


        $data['content'] = $this->load->view('blog\comments', array(
            'post' => $post
        ), true);

        $this->load->view('main', $data);
    }
}