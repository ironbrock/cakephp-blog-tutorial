<?php
/**
 *@property Post $Post
 */
class PostsController extends AppController {
    public $helpers = array('Html','Form');

    public function index() {
        $this->set('posts',$this->Post->find('all'));
    }

    /**
     * @param null $id
     * @throws NotFoundException
     *
     * Checks for non null argument, then checks for requested item not found in
     * db.  Finally, returns the result.
     */
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
}